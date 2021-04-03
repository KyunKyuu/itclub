window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    $(".index-nav .navbar").addClass('navbar-white');
  } else {
    $(".index-nav .navbar").removeClass('navbar-white');
  }
}

ScrollOut({
  targets: '.judul-1, .judul-2, .ml-n-4 img, .down, .slide, .animasi, .down-delay-1, .down-delay-2, .down-delay-3, .slide-delay-1, .slide-delay-2, .slide-delay-3, .zoomin, .down-delay-static-1'
});

// if (window.innerWidth < 480) {
//   $('.index-nav .navbar-brand').append('<img src="img/logo_putih.png" class="w-75 mt-1">');
// } else {
//   $('.index-nav .navbar-brand').append('<img src="img/logo.png" class="w-75 mt-1">');
// }