function myFunction() {
    var element = document.getElementsByClassName("pg");
    element.classList.toggle("pgshow");
}

const responsive = {
    0: {
        items: 1
    },
    320: {
        items: 1
    },
    590: {
        items: 2
    },
    960: {
        items: 3
    }

}


$(document).ready(function () {

    // $NAV = $('.nav');
    // $ICON = $('.toggle-icons i');


    // $ICON.click(function () {
    //     $NAV.toggleClass('collapse')
    // })




    $NAV = $('.nav');
    $ICON = $('.toggle-icons i');

    $ICON.click(function () {
        $NAV.toggleClass('collapse')
    })





    $('.owl-carousel').owlCarousel({
        mouseDrag: true,
        responsive: responsive
    });

    //click to scroll up
    $('.move-up i').click(function () {
        $('html,body').animate({
            scrollTop: 0
        }, 2000);
    })

});

AOS.init();