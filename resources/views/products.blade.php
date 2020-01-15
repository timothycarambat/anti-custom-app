<script>
window.logoLink = '{{$logoLink}}'
window.products = {
  'shirt': {
    'name': 'Classic T-Shirt',
    'cost': {{App\Utils::costPerItem('shirt')}},
    'colors': {
      'White': '#f1f0f5',
      'Black': '#14191e',
      'Forest': '#151b17',
      'Olive': '#49403d',
      'Navy': '#191c25',
      'Blue Dusk': '#333a4d',
      'Sport Grey': '#9b969c',
      'Irish Green': '#1e8043',
      'Sand': '#d4cab4',
      'Maroon': '#471924',
      'Natural': '#e2d8c9',
      'Galapagos Blue': '#0c6382',
      'Kelly': '#1b9579',
      'Lime': '#93c460',
      'Sky': '#aed3ef',
      'Sapphire': '#3e7fc6',
      'Ash': '#c6c2c3',
      'Daisy': '#faea7f',
      'Light Pink': '#f6ced6',
      'Orange': '#e34d31',
      'Cherry Red': '#a2012c',
      'Red': '#af011f',
    },
    'sizes': {
      'SMALL': 'SM',
      'MEDIUM': 'MD',
      'LARGE': 'LG'
    },
    'views': {
      'front': @include('product_templates.shirt_front'),
      'back': @include('product_templates.shirt_back'),
    },
  },
  'hoodie': {
    'name': 'Classic Kangaoo Hoodie',
    'cost': {{App\Utils::costPerItem('hoodie')}},
    'colors': {
      'White': '#f1f0f5',
      'Black': '#14191e',
      'Indigo Blue': '#4d718f',
      'Irish Green': '#1e8043',
      'Maroon': '#471924',
      'Light Blue': '#a1c5e1',
      'Light Pink': '#f1c5d4',
      'Red': '#da0a1a',
    },
    'sizes': {
      'SMALL': 'SM',
      'MEDIUM': 'MD',
      'LARGE': 'LG'
    },
    'views': {
      'front': @include('product_templates.hoodie_front'),
      'back': @include('product_templates.hoodie_back'),
    },
  }
}
</script>
