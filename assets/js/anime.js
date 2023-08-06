document.addEventListener("DOMContentLoaded", function () {
    // From left
    anime({
        targets: ".site-logo, .acf-form-submit input[type='submit']",
        opacity: [0, 1],
        translateX: [-100, 0],
        duration: 2000,
    });

    // From top
    anime({
        targets: "#page-title",
        opacity: [0, 1],
        translateY: [-100, 0],
        duration: 2000,
    });

    // From top staggered
    anime({
        targets: ".order-row",
        opacity: [0, 1],
        translateY: [-100, 0],
        duration: 250,
        delay: anime.stagger(50),
        easing: "linear",
    });

    // From left staggered
    anime({
        targets: ".acf-field:nth-of-type(odd), .widget-form-header > *",
        opacity: [0, 1],
        translateX: [-100, 0],
        duration: 500,
        delay: anime.stagger(150),
        easing: "linear",
    });

    // From right staggered
    anime({
        targets: ".acf-field:nth-of-type(even)",
        opacity: [0, 1],
        translateX: [100, 0],
        duration: 500,
        delay: anime.stagger(150),
        easing: "linear",
    });
});
