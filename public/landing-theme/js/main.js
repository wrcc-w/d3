// setting background image width and height
const setBackgroundImageSize = () => {
    let elements = document.querySelectorAll('.background-loop')

    if (elements.length < 1) return

    Array.from(elements).forEach((element, index) => {

        let imageSrc = element.style.backgroundImage.replace(
            /url\((['"])?(.*?)\1\)/gi, '$2').split(',')[0]

        // I just broke it up on newlines for readability

        let image = new Image()
        image.src = imageSrc

        image.addEventListener('load', () => {

            let width = image.width,
                height = image.height

            element.dataset.width = width
            element.dataset.height = height

        })
    })
}

const animateBackgrounds = () => {
    const loop_elements = document.querySelectorAll('.background-loop')

    if (loop_elements.length > 0) {
        Array.from(loop_elements).forEach((element, index) => {
            let tl = new TimelineMax({ repeat: -1 })

            tl.to(element, 20, {
                backgroundPosition: `-${element.dataset.width}px center`,
                ease: Linear.easeNone,
            })
        })
    }
}

// pricing slider
const pricing_slider = new Swiper('.pricing-slider .swiper-container', {
    resizeObserver: true,
    breakpoints: {
        0: {
            enabled: true,
            centeredSlides: true,
            slidesPerView: 1.2,
            spaceBetween: 30,
            initialSlide: 1,
        },
        400: {
            enabled: true,
            centeredSlides: true,
            slidesPerView: 1.4,
            spaceBetween: 30,
            initialSlide: 1,
        },
        576: {
            enabled: true,
            centeredSlides: true,
            slidesPerView: 1.5,
            spaceBetween: 30,
            initialSlide: 1,
        },
        768: {
            enabled: true,
            centeredSlides: true,
            slidesPerView: 1.8,
            spaceBetween: 30,
            initialSlide: 1,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 30,
            enabled: true,
            centeredSlides: true,
            centerInsufficientSlides: true,
            centeredSlidesBounds: true
        },
    },
})

// testimonial slider
const testimonial_slider = new Swiper('.testimonial-slider .swiper-container', {
    resizeObserver: true,
    spaceBetween: 0,
    initialSlide: 1,
    init: false,
    speed: 250,
    slideToClickedSlide: true,
    breakpoints: {
        0: {
            direction: 'horizontal',
            centeredSlides: true,
            loop: true,
            slidesPerView: 1.7,
        },
        992: {
            direction: 'vertical',
            centeredSlides: true,
            loop: true,
            slidesPerView: 1.7,
        },
    },
})

// const testimonial_height = () => {
//     const parent = document.querySelector('.testimonial-slider .swiper-container');

//     if (window.innerWidth <= 992) {
//         parent.style.height = 'initial';
//         return;
//     }

//     const heights = [];

//     Array.from(parent.querySelectorAll('.swiper-slide')).forEach((element) => {
//         heights.push(element.offsetHeight);
//         console.log('slide height', element.offsetHeight);
//     })

//     if (parent.style.height !== 'initial')
//         parent.style.height = Math.max(...heights) + 'px';
//     else
//         parent.style.height = Math.max(...heights) + 'px';

//     console.log('parent height', parent.style.height)

//     // testimonial_slider.updateSize();

// }

//testimonial_slider.on('beforeInit', testimonial_height);
//testimonial_slider.on('beforeResize', testimonial_height);

// screen slider
const screen_slider = new Swiper('.screen-slider .swiper-container', {
    spaceBetween: 30,
    autoplay: true,
    speed: 500,
    navigation: {
        nextEl: '.screen-slider-navigation-prev',
        prevEl: '.screen-slider-navigation-next',
    },
    breakpoints: {
        0: {
            centeredSlides: true,
            loop: false,
            slidesPerView: 1.8,
        },
        576: {
            centeredSlides: true,
            loop: false,
            slidesPerView: 2.4,
        },
        768: {
            centeredSlides: true,
            loop: false,
            slidesPerView: 2.8,
        },
        992: {
            centeredSlides: true,
            loop: false,
            slidesPerView: 4.8,
        },
    },
})

// team slider
const team_slider = new Swiper('.team-slider .swiper-container', {
    navigation: {
        nextEl: '.team-slider-navigation-next',
        prevEl: '.team-slider-navigation-prev',
    },
    breakpoints: {
        0: {
            slidesPerView: 1.5,
            spaceBetween: 30,
            centeredSlides: true,
            initialSlide: 1,
            loop: true,
        },
        992: {
            slidesPerView: 3,
            spaceBetween: 0,
            centeredSlides: true,
            initialSlide: 1,
            loop: true,
        },
    },
})

// instagram slider
const instagram_slider = new Swiper('.instagram-slider .swiper-container', {
    autoplay: {
        delay: 1500,
    },
    breakpoints: {
        0: {
            speed: 1500,
            slidesPerView: 2.2,
            spaceBetween: 4,
            centeredSlides: true,
            loop: true,
        },
        768: {
            speed: 1500,
            slidesPerView: 3.2,
            spaceBetween: 4,
            centeredSlides: true,
            loop: true,
        },
        992: {
            speed: 1500,
            slidesPerView: 6,
            spaceBetween: 4,
            centeredSlides: true,
            loop: true,
        },
    },
})

// related posts slider
const related_posts_slider = new Swiper(
    '.related-posts-slider .swiper-container', {

        navigation: {
            nextEl: '.related-posts-slider-navigation-next',
            prevEl: '.related-posts-slider-navigation-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1.3,
                spaceBetween: 30,
                centeredSlides: true,
                initialSlide: 1,
                loop: true,
            },
            600: {
                slidesPerView: 2,
                spaceBetween: 30,
                centeredSlides: true,
                initialSlide: 1,
                loop: true,
            },
            768: {
                slidesPerView: 2.2,
                spaceBetween: 30,
                centeredSlides: true,
                initialSlide: 1,
                loop: true,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 30,
                centeredSlides: true,
                initialSlide: 1,
                loop: true,
            },
        },
    })

// related posts slider
const tab_button_slider = new Swiper('.tab-button-slider .swiper-container', {
    breakpoints: {
        0: {
            slidesPerView: 1.8,
            spaceBetween: 30,
            enabled: true,
        },
        992: {
            enabled: false,
        },
    },
})

const animateValue = (element, start, end, duration) => {
    start = parseFloat(start)
    end = parseFloat(end)

    if (start === end) return

    var range = end - start
    var current = start
    var increment = end > start ? .01 : -.01
    var stepTime = Math.abs(Math.floor(duration / range))

    var timer = setInterval(function () {
        current += increment
        element.innerHTML = parseFloat((current).toFixed(2))

        if (current == end) {
            clearInterval(timer)
        }
    }, stepTime)
}

const price_number_height = () => {
    const prices = document.querySelectorAll('.price')

    if (prices.length < 1) return

    Array.from(prices).forEach((price) => {
        const month = price.querySelector('.month')
        const year = price.querySelector('.year')

        price.style.height = Math.max(month.offsetHeight, year.offsetHeight) -
            2 + 'px'
        price.style.width = Math.max(month.offsetWidth, year.offsetWidth) +
            'px'
    })
}

const pricing_switch = () => {
    const switch_parent = document.querySelector('.pricing .switch')
    const prices = document.querySelectorAll('.price')

    if (typeof (switch_parent) === 'undefined' || switch_parent ===
        null) return
    if (prices.length < 1) return

    switch_parent.addEventListener('click', (e) => {
        if (e.target.tagName === 'LABEL')
            e.preventDefault()

        const input = switch_parent.querySelector('input')

        if (input.hasAttribute('checked')) {

            input.removeAttribute('checked')
            Array.from(prices).forEach((price) => {
                price.classList.remove('price-month')
            })
        } else {
            input.setAttribute('checked', true)
            Array.from(prices).forEach((price) => {
                price.classList.add('price-month')
            })
        }

    })
}

// set heights for the tab section
const tabPaneHeight = () => {
    const elements = document.querySelectorAll('.tab-pane')

    elements.forEach((element) => {
        element.style.height = element.offsetHeight + 'px'

        if (element.classList.contains('active')) {

            document.querySelector(
                '.tab-content').style.height = element.offsetHeight + 'px'

            // gsap.to(`#${element.id} > *`, {
            //     y: 0,
            //     opacity: 1,
            //     visibility: 'visible',
            //     zIndex: 1
            // })
            gsap.to(`#${element.id} .tab-pane-wrapper > *`, {
                y: 0,
                opacity: 1,
                visibility: 'visible',

            })
        } else {
            gsap.to(`#${element.id} .tab-pane-wrapper > *`, {
                y: 100,
                opacity: 0,
                visibility: 'hidden',

            })
        }

    })

}

const tabFunc = () => {
    const tab_el = document.querySelectorAll('button[data-bs-toggle="pill"]')

    if (tab_el.length < 1) return

    tab_el.forEach((element) => {
        element.addEventListener('hide.bs.tab', (e) => {
            const active_id = e.target.dataset.bsTarget

            const target_id = e.relatedTarget.dataset.bsTarget
            const target_parent = document.querySelector(target_id)

            document.querySelector(
                '.tab-content').style.height = target_parent.style.height

            const tl = gsap.timeline({ defaults: { duration: .5 } })

            tl.to(`${active_id} .tab-pane-wrapper > *`, {
                y: 100,
                stagger: 0.1,
            })

            tl.to(`${active_id} .tab-pane-wrapper > *`, {
                opacity: 0,
                visibility: 'hidden',
                stagger: 0.1,
            }, .25)

            tl.to(`${target_id} .tab-pane-wrapper > *`, {
                y: 0,
                stagger: 0.1,
            }, .25)

            tl.to(`${target_id} .tab-pane-wrapper > *`, {
                opacity: 1,
                visibility: 'visible',
                stagger: 0.1,

            }, .25)

        })
    })
}

/****************************************
 app feature hover
 ****************************************/
const app_features = document.querySelectorAll('.app-feature-single')

/****************************************
 blog hover
 ****************************************/
const blog_list = document.querySelectorAll('.blog-single')

if (blog_list.length > 0) {
    Array.from(blog_list).forEach((element) => {
        element.addEventListener('mouseover', (e) => {
            if (e.target.tagName === 'A' || e.target.parentElement.tagName ===
                'A') {
                e.currentTarget.querySelector('.circle').classList.add('hover')
                const figure = e.currentTarget.querySelector('.figure')

                if (typeof (figure) !== undefined || figure !== null) {
                    figure.classList.add('hover')
                }
            }
        })

        element.addEventListener('mouseout', (e) => {
            e.currentTarget.querySelector('.circle').classList.remove('hover')
            const figure = e.currentTarget.querySelector('.figure')

            if (typeof (figure) !== undefined || figure !== null) {
                figure.classList.remove('hover')
            }
        })
    })
}

/****************************************
 lightbox
 ****************************************/
const lightbox = GLightbox()

/****************************************
 navigation
 ****************************************/

const navigation_responsive = () => {
    const width = window.innerWidth
    const navigation = document.querySelector('.navigation')

    if (typeof (navigation) === 'undefined' || navigation === null) return

    if (width < 992) {
        navigation.classList.add('responsive')
    } else {
        navigation.classList.remove('responsive')
    }
}

window.addEventListener('resize', navigation_responsive)
window.addEventListener('load', navigation_responsive)

// display navigation on mobile
const navigation = document.querySelector('.navigation-bar')

if (typeof (navigation) !== 'undefined' && navigation !== null) {
    document.querySelector('.navigation-bar').addEventListener('click', (e) => {
        document.querySelector('.navigation').classList.add('shown')
    })
}

const getHeight = (el) => {
        var el_style = window.getComputedStyle(el),
            el_display = el_style.display,
            el_position = el_style.position,
            el_visibility = el_style.visibility,
            el_max_height = el_style.maxHeight.replace('px', '').replace('%', ''),

            wanted_height = 0

        // if its not hidden we just return normal height
        if (el_display !== 'none' && el_max_height !== '0') {
            return el.offsetHeight
        }

        // the element is hidden so:
        // making the el block so we can meassure its height but still be hidden
        el.style.position = 'absolute'
        el.style.visibility = 'hidden'
        el.style.display = 'block'

        wanted_height = el.offsetHeight

        // reverting to the original values
        el.style.display = el_display
        el.style.position = el_position
        el.style.visibility = el_visibility

        return wanted_height
    },

    toggleSlide = (el, display = 'block') => {
        var el_max_height = 0

        if (el.getAttribute('data-max-height')) {
            // we've already used this before, so everything is setup
            if (el.style.maxHeight.replace('px', '').replace('%', '') === '0') {
                el.style.maxHeight = el.getAttribute('data-max-height')
            } else {
                el.style.maxHeight = '0'
            }
        } else {
            el_max_height = getHeight(el) + 'px'
            el.style['transition'] = 'max-height 0.5s ease-in-out'
            el.style.overflowY = 'hidden'
            el.style.maxHeight = '0'
            el.setAttribute('data-max-height', el_max_height)
            el.style.display = display

            // we use setTimeout to modify maxHeight later than display (to we have the transition effect)
            setTimeout(function () {
                el.style.maxHeight = el_max_height
            }, 10)
        }
    }

Array.from(document.querySelectorAll('.has-child')).
    forEach((element, index) => {
        element.addEventListener('click', (e) => {

            if (window.innerWidth > 992) return

            if (e.target.parentElement.parentElement.classList.contains(
                    'has-child') ||
                e.target.parentElement.parentElement.classList.contains(
                    'parent')) {
                e.preventDefault()
            }

            console.log(e.target.parentElement.parentElement)

            if (e.currentTarget.classList.contains('dropped')) {
                toggleSlide(e.currentTarget.querySelector('.child'))
                e.currentTarget.classList.remove('dropped')
                return
            }

            // hide dropdown for other list items
            Array.from(e.currentTarget.parentElement.querySelectorAll(
                '.has-child.dropped')).forEach((e, i) => {
                e.classList.remove('dropped')
                toggleSlide(e.querySelector('.child'))

            })

            e.currentTarget.classList.add('dropped')

            toggleSlide(e.currentTarget.querySelector('.child'))

        })
    })

// hide navigation on mobile
const close_button = document.querySelector('.close-button')

if (typeof (close_button) != 'undefined' && close_button != null) {
    close_button.addEventListener('click', (e) => {
        const dropped = document.querySelector('.dropped')

        if (typeof (dropped) == 'undefined' && dropped == null) {
            toggleSlide(dropped.querySelector('.child'))
            dropped.classList.remove('dropped')
        }

        document.querySelector('.navigation').classList.remove('shown')
    })
}

/****************************************
 custom scrollbar
 ****************************************/
var scrollbar = OverlayScrollbars(document.querySelector('body'), {
    overflowBehavior: {
        x: 'hidden',
        y: 'scroll',
    },
    callbacks: {
        onScroll: () => {
            const scroll_position = scrollbar.scroll().position.y
            const navigation = document.querySelector('.navigation')

            if (typeof (navigation) === 'undefined' || navigation ===
                null) return

            if (window.innerHeight > 991 && scroll_position > 0) {
                navigation.classList.add('scrolled')
            } else if (window.innerHeight < 991 && scroll_position > 0) {
                navigation.classList.add('scrolled')
            } else {
                navigation.classList.remove('scrolled')
            }
        },
    },
})

window.addEventListener('load', () => {

    price_number_height()

    setBackgroundImageSize()

    setTimeout(() => {
        animateBackgrounds()
    })

    testimonial_slider.init()

    pricing_switch()

    tabPaneHeight()

    tabFunc()

    // document.querySelector('.preloader').classList.add('loaded')

})

window.addEventListener('resize', () => {
    price_number_height()

    tabPaneHeight()

    // testimonial_height();
})
