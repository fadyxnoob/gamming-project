  // Testimonials carousel
  $(".product-carousel").owlCarousel({
    center: true,
    dots: false,
    loop: true,
    nav : true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2000,
    smartSpeed: 1500,
    navText : [
        '<i class="bi bi-arrow-left"></i>',
        '<i class="bi bi-arrow-right"></i>'
    ],
    responsive: {
        0:{
            items:1
        },
        768:{
          items:2
        },
        1024: {
          items: 2,
      },
      1200: {
          items: 3,
      }
    }
  });
 // Testimonials carousel
 $(".testimonial-carousel").owlCarousel({
  autoplay: true,
  smartSpeed: 1000,
  center: true,
  dots: false,
  loop: true,
  nav : true,
  navText : [
      '<i class="bi bi-arrow-left"></i>',
      '<i class="bi bi-arrow-right"></i>'
  ],
  responsive: {
      0:{
          items:1
      },
      768:{
          items:2
      }
  }
});



