$(document).ready(function () {
    fixedheader();
    Owlcarousla();
    Owlcarouslamain();
    OwlcarouslaOur();
    Owlcarouwel();
    Owlcarouslaowlbar();
    // factCounter();
});

//Background Image
function dataBackgroundImage() {
    $("[data-bgimg]").each(function () {
        var bgImgUrl = $(this).data("bgimg");
        $(this).css({
            "background-image": "url(" + bgImgUrl + ")", // + meaning concat
        });
    });
}
$(window).on("load", function () {
    dataBackgroundImage();
});

//Fixed Header
function fixedheader() {
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 50) {
            jQuery(".navbar").addClass("fixed");
        } else {
            jQuery(".navbar").removeClass("fixed");
        }
    });
}

// Fact Counter
$(".counter").counterUp({
    delay: 10,
    time: 2000,
});

// Popup Video
$(".popup-youtube").magnificPopup({
    disableOn: 320,
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
});

//Gallery
$(".image-popup-vertical-fit").magnificPopup({
    type: "image",
    mainClass: "mfp-with-zoom",
    gallery: {
        enabled: true,
    },

    zoom: {
        enabled: true,

        duration: 300, // duration of the effect, in milliseconds
        easing: "ease-in-out", // CSS transition easing function

        opener: function (openerElement) {
            return openerElement.is("img") ? openerElement : openerElement.find("img");
        },
    },
});

function Owlcarousla() {
    $("#owl-demo1").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        items: 3,
        autoplay: false,
        margin: 15,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
        },
    });
}
function Owlcarouslaowlbar() {
    $("#owlbar").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        items: 3,
        autoplay: false,
        margin: 15,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 3,
            },
            600: {
                items: 4,
            },
            1000: {
                items: 5,
            },
        },
    });
}

function Owlcarouslamain() {
    $("#owl-demomain").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        items: 3,
        autoplay: true,
        margin: 0,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
}
function Owlcarouwel() {
    $("#owlwelc").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        autoplay: true,
        margin: 0,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
}

function OwlcarouslaOur() {
    $("#ourone").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        items: 3,
        autoplay: false,
        margin: 15,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1,
            },
            1000: {
                items: 4,
            },
        },
    });
}