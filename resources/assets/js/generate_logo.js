function checkForImage() {
  console.log(`${window.count} of ${window.limit}`)

  // If filename not set redirect to main page
  if (!window.filename){ window.location = '/' }

  // if count is more than expected then we need to kill the checking process
  if (window.count > window.limit && $('.alert').hasClass('hidden')) {
    $('.alert').removeClass('hidden')
    clearInterval(window.checkInterval)
  } else {
    $.ajax({
      url: '/check_for_img',
      type: 'POST',
      data: {
        _token: window._token,
        filename: window.filename
      },
      success: (result) => {
        let res = JSON.parse(result)
        console.log(res);

        if (res.logoCreated) {
          window.location = `/result/${res.filename}`
        } else {
          console.log(`Image not ready`)
        }
      },
    })
  }
  window.count++
}


$(function(){ if (window.page === 'generate_logo'){
  window.count = 0
  window.timeout = 10000
  window.limit = 120000 / window.timeout;
  checkForImage()

  window.checkInterval = setInterval(checkForImage, window.timeout)
}})
