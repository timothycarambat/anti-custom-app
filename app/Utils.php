<?php

namespace App;

use Storage;

use Illuminate\Database\Eloquent\Model;

class Utils extends Model {
  public static function costPerItem($item, $for_stripe = false) {
    switch ($item) {
      case 'shirt':
        $value = 30.00;
        break;
      case 'hoodie':
        $value = 50.00;
        break;
      default:
        $value = 0;
        break;
    }

    return $for_stripe ? intval($value * 100) : $value;
  }

  public static function getLogos() {
    $links = [];
    $logos = Storage::disk('s3')->files('results');

    foreach($logos as $logo) {
      $filename = basename($logo, '.png');
      array_push($links, [
        'filename' => $filename,
        'link' => Storage::disk('s3')->url($logo)
      ]);
    }

    return $links;
  }

  public static function createStripeCheckoutSession($checkout_items) {
    \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);
    $session = \Stripe\Checkout\Session::create([
      'payment_method_types' => ['card'],
      'line_items' => $checkout_items,
      'billing_address_collection' => 'required',
      'success_url' => $_ENV['APP_URL'].'/checkout/success',
      'cancel_url' => $_ENV['APP_URL'].'/checkout/cancel',
    ]);

    return $session->id;
  }
}
