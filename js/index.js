const swiper = new Swiper('.mySwiper', {
    loop: true, // Loop through slides
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 5000, // Auto-slide every 5 seconds
        disableOnInteraction: false,
    },
    spaceBetween: 20, // Spacing between slides
    breakpoints: {
        640: {
        slidesPerView: 1, // 1 slide on small screens
        },
        768: {
        slidesPerView: 2, // 2 slides on medium screens
        },
        1024: {
        slidesPerView: 4, // 3 slides on large screens
        },
    },
});