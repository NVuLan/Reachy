// var owl = $('.owl-carousel');
//     owl.owlCarousel({
//         // items: 4,
//         loop: true,
//         margin: 18,
//         // autoplay: true,
//         autoplayTimeout: 3000,
//         autoplayHoverPause: true,
//         responsiveClass:true,
//         responsive:{
//             0:{
//                 items:1,
//             },
//             600:{
//                 items:1,
//             },
//             1200:{
//                 items:1,
//             }
//         }
//     });
//     $('.play').on('click', function() {
//         owl.trigger('play.owl.autoplay', [3000])
//     })
//     $('.stop').on('click', function() {
//         owl.trigger('stop.owl.autoplay')
//     })
// k có auto
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        // autoplay:true,
        responsive: {
            0: {
                items: 1
            },

            1440: {
                items: 1
            }
        },
    })
});
