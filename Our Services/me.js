function init() {
    const slides = document.querySelectorAll('.slide');
    const pages = document.querySelectorAll('.page');
    const backgrounds = [
        `radial-gradient(#2B3760, #0B1023)`,
        `radial-gradient(#4E3022, #161616)`,
        `radial-gradient(#4E4342, #161616)`,
    ];

    let current = 0;
    let scrollSlide = 0;

    slides.forEach((slide, index) => {
        slide.addEventListener('click', function () {
            changeDots(this);
            nextSlide(index);
            scrollSlide = index;
        });
    });


    function changeDots(dot) {

        slides.forEach(slide => {
            slide.classList.remove('active')
        });

        dot.classList.add('active');

    }



    function nextSlide(pageNumber) {
        const nextPage = pages[pageNumber];
        const currentPage = pages[current];
        const nextLeft = nextPage.querySelector('.hero .model-left');
        const nextRight = nextPage.querySelector('.hero .model-right');
        const currentLeft = currentPage.querySelector('.hero .model-left');
        const currentRight = currentPage.querySelector('.hero .model-right');
        const detils = nextPage.querySelector('.details');
        const ptf = document.querySelector('.protofolio')

        const tl = new TimelineMax({
            onStart: function () {
                slides.forEach(slide => {
                    slide.style.pointerEvents = 'none';
                });
            },
            onComplete: function () {
                slides.forEach(slide => {
                    slide.style.pointerEvents = 'all';
                });
            }


        });

        tl.fromTo(currentLeft, 0.3, {
                y: '-10%'
            }, {
                y: '-100%'
            })
            .fromTo(currentRight, 0.3, {
                y: '10%'
            }, {
                y: '100%'
            }, '-= 0.2')


            .to(ptf, 0.3, {
                backgroundImage: backgrounds[pageNumber]
            })




            .fromTo(currentPage, 0.3, {
                opacity: 1,
                pointerEvents: 'all'
            }, {
                opacity: 0,
                pointerEvents: 'none'
            })


            .fromTo(nextPage, 0.3, {
                opacity: 0,
                pointerEvents: 'none'
            }, {
                opacity: 1,
                pointerEvents: 'all'
            })


            .fromTo(nextLeft, 0.3, {
                y: '-100%'
            }, {
                y: '-10%'
            }, '-=6')


            .fromTo(nextRight, 0.1, {
                y: '-100%'
            }, {
                y: '-10%'
            }, '-=6')


            .fromTo(detils, 0.3, {
                opacity: 0,
                y: 0
            }, {
                y: 0,
                opacity: 1
            }, '-=6')

            .set(nextRight, {
                clearProps: 'all'
            })
            .set(nextLeft, {
                clearProps: 'all'
            })




        current = pageNumber;
    }




    document.addEventListener('wheel', throttle(scrollChangw, 2000));
    document.addEventListener('touchmove', throttle(scrollChangw, 2000));

    function switchDot(dotNumber) {
        const activeDot = document.querySelectorAll('.slide')[dotNumber];
        slides.forEach(slide => {
            slide.classList.remove('active');
        })
        activeDot.classList.add('active');
    }

    function scrollChangw(e) {
        if (e.deltaY > 0) {
            scrollSlide += 1;
        } else {
            scrollSlide -= 1;
        }

        if (scrollSlide > 2) {
            scrollSlide = 0;
        }

        if (scrollSlide < 0) {
            scrollSlide = 2;
        }

        switchDot(scrollSlide)
        nextSlide(scrollSlide)
        console.log(scrollSlide)
    }







    const humburger = document.querySelector('.menu');
    const humburgerLines = document.querySelectorAll('.line');
    const navOpen = document.querySelector('.nav-open');
    const contact = document.querySelector('.contact');
    const social = document.querySelector('.social');
    const logo = document.querySelector('.logo');


    const tl = new TimelineMax({
        paused: true,
        reversed: true,
    });

    tl.to(navOpen, 0.5, {
            y: 0
        })
        .fromTo(contact, 0.5, {
            opacity: 0,
            y: 10
        }, {
            opacity: 1,
            y: 0
        })
        .fromTo(social, 0.5, {
            opacity: 0,
            y: 10
        }, {
            opacity: 1,
            y: 0
        })

        .fromTo(logo, 0.5, {
            color: 'white',
            y: 10
        }, {
            color: 'black',
            y: 0
        }, '-=0.5')

        .fromTo(humburgerLines, 0.5, {
            background: 'white',
            y: 10
        }, {
            background: 'black',
            y: 0,
        }, '-=0.5');


    humburger.addEventListener('click', () => {
        tl.reversed() ? tl.play() : tl.reverse();
    })




}























const throttle = (func, limit) => {
    let inThrottle
    return function () {
        const args = arguments
        const context = this
        if (!inThrottle) {
            func.apply(context, args)
            inThrottle = true
            setTimeout(() => inThrottle = false, limit)
        }
    }
}



init();