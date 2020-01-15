function showAvailableMerch() {
  Object.keys(window.products).map((product) => {
    var prodObj = window.products[product]
    var productText = `
      <div class='product-container' data-product='${product}'>
        <h4 class='product-title'>${prodObj.name} ($${prodObj.cost})</h4>
        <p> Please keep in mind these are simple mockups. Sometimes the logo is too large and it may appear 'off' the shirt in the mockup.
         The delivered product will be more accurate in style to the traditional print.
        <br>
            All Products are <b>FREE SHIPPING</b>.
        <br>
        <a href='#' data-toggle="modal" data-target="#${product}">Product Info</a>
        </p>
        <div class='overlay-container'>
    `

    Object.keys(prodObj.views).map((view) => {
      productText += `
        <img class='main-product' data-${product}-img src='${window.products[product]['views'][view]}' />
        <img class='overlay-img-${view}' src='${window.logoLink}' />
      `
    })

    productText += `
      </div>
    </div>
    `
    $('.shop-container').append(productText)
  })
}

function appendAddItemButton() {
  $('.product-container').map((idx, container) => {
    let prodType = $(container).data('product')
    let product = window.products[prodType]

    let colorOptions = ''
    Object.keys(product.colors).map((key) => {
      colorOptions += `<option data-hex='${product.colors[key]}' value='${key.toUpperCase()}'>${key.toUpperCase()}</option>`
    })

    let sizeOptions = ''
    Object.keys(product.sizes).map((key) => {
      sizeOptions += `<option value='${product.sizes[key]}'>${key.toUpperCase()}</option>`
    })

    $(container).append(`
      <table class='table product-table'>
        <tbody>
          <tr>
            <td>
              <div>
                <label>Quantity</label>
                <input data-${prodType}-qty type='number' class='form-control qty' value='0' min='0' placeholder='Quantity' onchange='evalQtyChange("${prodType}")'/>
              </div>
            </td>

            <td>
              <div>
                <label>Product Color</label>
                <select data-${prodType}-color class='form-control' onchange='evalItemColor("${prodType}")'>
                  ${colorOptions}
                </select>
              </div>
            </td>

            <td>
              <div>
                <label>Size</label>
                <select data-${prodType}-size class='form-control'>
                  ${sizeOptions}
                </select>
              </div>
            </td>

            <td>
              <div class='cost'>
                <label>Cost</label>
                <p data-${prodType}-cost >$0.00</p>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    `)
  })
}

function handleCartSubmission() {
    $('.proceed-to-checkout').click((e) => {
      let checkoutData = {}
      let hasProducts = false

      // build cart data object
      Object.keys(window.products).map((item) => {
        let qty = parseInt($(`[data-${item}-qty]`).val())
        // check if any of the products have a positive qty
        if (!hasProducts && qty > 0) {
          hasProducts = true
        }
        checkoutData[item] = {
          'name': window.products[item].name,
          'qty': qty,
          'color': $(`[data-${item}-color]`).val(),
          'size': $(`[data-${item}-size]`).val()
        }
      })

      // if checkout cart is valid then we will create the confirmation and checkout
      if (hasProducts) {
        $.ajax({
          url: '/checkout',
          type: 'POST',
          data: {
            _token: window._token,
            cart: checkoutData,
            logo: window.logoLink,
          },
          success: (result) => {
            let res = JSON.parse(result)
            if (res.session_created) {
              handleStripeSession(res.session_id)
            } else {
              console.log('Session Could not be created');
            }
          }
        })
      } else {
        return false
      }
    })
}

function handleStripeSession(sessionId) {
  stripe.redirectToCheckout({
    sessionId: sessionId
  }).then(function (result) {
    console.log('Stripe Session encountered a problem:');
    console.log(result.error.message);
  });
}

window.evalItemColor = function (item) {
  let colorName = $(`[data-${item}-color]`).val()
  let colorHex = $(`[value="${colorName}"]`).data('hex')

  $(`[data-${item}-img]`).css({'background-color': colorHex})
}

window.evalQtyChange = function (item) {
  let qty = parseInt($(`[data-${item}-qty]`).val())
  let costPer = parseFloat(window.products[item].cost)

  $(`[data-${item}-cost]`).text('$'+(qty * costPer).toFixed(2))
}

$(function(){ if (window.page === 'shop'){
  showAvailableMerch()
  appendAddItemButton()

  handleCartSubmission()



}})
