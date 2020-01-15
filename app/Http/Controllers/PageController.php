<?php

namespace App\Http\Controllers;

use Storage;
use App\Utils;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller {

    public static function home(Request $request) {
      return view('main')->with([
        'page' => 'main',
      ]);
    }

    public static function generate_logo(Request $request) {
      $filename = Str::random();
      $data = [
        "filename" => $filename,
        "color" => $request->color,
      	"tag1" => strtoupper($request->socialTag1),
      	"tag2" => strtoupper($request->socialTag2)
      ];
      $fileContents = json_encode($data, JSON_PRETTY_PRINT);
      Storage::disk('s3')->put("requests/{$filename}.json", $fileContents);

      return view('generate_logo')->with([
        'page' => 'generate_logo',
        'filename' => "{$filename}.json",
      ]);
    }

    public static function result(Request $request) {
      $filename = $request->filename;

      return view('result')->with([
        'page' => 'result',
        'link' => Storage::disk('s3')->url("results/{$filename}.png"),
        'filename' => $filename,
      ]);
    }

    public static function shop(Request $request) {
      $filename = $request->filename;

      return view('shop')->with([
        'page' => 'shop',
        'logoLink' => Storage::disk('s3')->url("results/{$filename}.png"),
        'filename' => $filename,
      ]);
    }

    public static function checkout_success(Request $request) {
      return view('checkout_success')->with([
        'page' => 'checkout_success',
      ]);
    }

    public static function checkout_cancel(Request $request) {
      return view('checkout_cancel')->with([
        'page' => 'checkout_cancel',
      ]);
    }

    public static function privacy(Request $request) {
      return view('privacy')->with([
        'page' => 'privacy',
      ]);
    }

    public static function gallery(Request $request) {
      return view('gallery')->with([
        'page' => 'gallery',
        'logos' => Utils::getLogos(),
      ]);
    }

    public static function checkout(Request $request) {
      $cart = $request->cart;
      $checkout_items = [];

      foreach($cart as $item => $details) {
        // If qty is zero then skip the item
        $qty = (int)$details['qty'];
        if ($qty <= 0){
          continue;
        }

        $item_details = [
          'name' => ucwords($item),
          'description' => "Name: {$details['name']} \nColor: {$details['color']} \nSize: {$details['size']}",
          'amount' => Utils::costPerItem($item, true),
          'images' => [$request->logo],
          'currency' => 'usd',
          'quantity' => $qty,
        ];
        array_push($checkout_items, $item_details);
      }

      try {
        $session_id = Utils::createStripeCheckoutSession($checkout_items);
        $result = [
          'session_created' => true,
          'session_id' => $session_id,
        ];
      } catch(Exception $e) {
        $result = [
          'session_created' => false,
        ];
      }

      return json_encode($result);
    }

    public static function check_for_img(Request $request) {
      $filenameFull = $request->filename;
      $filenameBase = basename($filenameFull, '.json');
      $result = [
        'logoCreated' => Storage::disk('s3')->exists("results/{$filenameBase}.png"),
        'filename' => $filenameBase,
      ];

      return json_encode($result);
    }
}
