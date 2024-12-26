$(document).ready(function () {

    if (document.querySelector(".header-mobile")) {
        const headerBurger = document.querySelector(".header-mobile__burger");
        const headerMenu = document.querySelector(".header-mobile__bottom");
        const body = document.querySelector("body");

        headerBurger.addEventListener("click", () => {
            headerBurger.classList.toggle("--active");
            headerMenu.classList.toggle("open");
            body.classList.toggle("active");
        });
    }

    if (document.querySelector(".swiper-1")) {
        new Swiper(".swiper-1", {
            loop: true,
            spaceBetween: 20,

            pagination: {
                el: ".swiper-pagination",
            },

            navigation: {
                nextEl: ".swiper-banner-next",
                prevEl: ".swiper-banner-prev",
            },
        });
    }

    if (document.querySelector(".swiper-2")) {
        new Swiper(" .swiper-2", {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 15,

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1.4,
                    spaceBetween: 15,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 2.5,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1400: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
            },
        });
    }
    if (document.querySelector(".swiper-3")) {
        new Swiper(" .swiper-3", {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 10,

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1.4,
                    spaceBetween: 15,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 2.5,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1400: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
            },
        });
    }
    if (document.querySelector(".swiper-4")) {
        new Swiper(" .swiper-4", {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 15,

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1.4,
                    spaceBetween: 15,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 2.5,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1400: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
            },
        });
    }
    if (document.querySelector(".swiper-5")) {
        new Swiper(" .swiper-5", {
            loop: true,
            direction: "vertical",
            slidesPerView: 1,
            spaceBetween: 20,

            navigation: {
                nextEl: ".swiper-v5-next",
                prevEl: ".swiper-v5-prev",
            },
        });
    }
    if (document.querySelector(".swiper-6")) {
        new Swiper(" .swiper-6", {
            loop: true,
            slidesPerView: 1.4,
            spaceBetween: 20,
            centeredSlides: true,

            navigation: {
                nextEl: ".swiper-v6-next",
                prevEl: ".swiper-v6-prev",
            },

            pagination: {
                clickable: true,
                el: ".swiper-pagination",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 1.1,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                },
                1200: {
                    slidesPerView: 1.3,
                    spaceBetween: 20,
                },
                1400: {
                    slidesPerView: 1.4,
                    spaceBetween: 20,
                },
            },
        });
    }

    if (document.querySelector(".swiper-7")) {
        new Swiper(".swiper-7", {
            loop: true,
            slidesPerView: 3,
            spaceBetween: 20,

            navigation: {
                nextEl: ".portners-section__next",
                prevEl: ".portners-section__prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1.3,
                    spaceBetween: 15,
                    centeredSlides: true,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 1.9,
                    spaceBetween: 15,
                    centeredSlides: true,
                },
                992: {
                    slidesPerView: 2.1,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 2.5,
                    spaceBetween: 15,
                },
                1400: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
    }

    if (document.querySelector(".swiper-8")) {
        new Swiper(".swiper-8", {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 15,

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1.4,
                    spaceBetween: 15,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 2.5,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1400: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
            },
        });
    }

    if (document.querySelector(".thump-slider")) {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 4.1,
                    spaceBetween: 15,
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 4.5,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 5.5,
                    spaceBetween: 15,
                },
                1400: {
                    slidesPerView: 6,
                    spaceBetween: 15,
                },
            },
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    }

    if (document.querySelector(".accordion")) {
        const accordionContent = document.querySelectorAll(".accordion-content");

        accordionContent.forEach((item, index) => {
            let accordionHeader = item.querySelector(".accordion-header");

            accordionHeader.addEventListener("click", () => {
                item.classList.toggle("open");

                let accordionBody = item.querySelector(".accordion-body");

                if (item.classList.contains("open")) {
                    accordionBody.style.height = `${accordionBody.scrollHeight}px`;
                } else {
                    accordionBody.style.height = "0px";
                }
                removeOpen(index);
            });
        });

        function removeOpen(index1) {
            accordionContent.forEach((item2, index2) => {
                if (index1 != index2) {
                    item2.classList.remove("open");
                    let dec = item2.querySelector(".accordion-body");
                    dec.style.height = "0";
                }
            });
        }
    }

    if (document.querySelector(".catalog-dropdown")) {
        const accordionContent = document.querySelectorAll(".catalog-dropdown");

        accordionContent.forEach((item, index) => {
            let accordionHeader = item.querySelector(".catalog-dropdown__top");

            accordionHeader.addEventListener("click", () => {
                item.classList.toggle("open");

                let accordionBody = item.querySelector(".catalog-dropdown__list");

                if (item.classList.contains("open")) {
                    accordionBody.style.height = `${accordionBody.scrollHeight}px`;
                } else {
                    accordionBody.style.height = "0px";
                }
                removeOpen(index);
            });
        });

        function removeOpen(index1) {
            accordionContent.forEach((item2, index2) => {
                if (index1 != index2) {
                    item2.classList.remove("open");
                    let dec = item2.querySelector(".catalog-dropdown__list");
                    dec.style.height = "0";
                }
            });
        }
    }

    if (document.querySelector(".scroll-top")) {
        const scroll = document.querySelector(".scroll-top");

        scroll.addEventListener("click", () => {
            window.scrollTo(0, 0);
        });
    }

    if (document.querySelector(".header-info__search")) {
        const searchWrapper = $('.header-info__search');
        const searchBtn = searchWrapper.find('.header-info__btn');
        const searchInputWrap = searchWrapper.find('.header-info__box');
        const searchInput = searchWrapper.find('input')

        searchBtn.on('click', function (e) {
            e.preventDefault();
            if (searchWrapper.hasClass('open')) {
                const query = searchInput.val();
                if (query) {
                    window.location = searchInput.attr('data-action') + '?query=' + query
                } else {
                    searchInputWrap.removeClass('open');
                    searchWrapper.removeClass('open');
                }
            } else {
                searchInputWrap.addClass('open');
                searchWrapper.addClass('open');
            }

        })
    }

    if (document.querySelector(".catalog-filter__form")) {
        const searchBtn = $('.catalog-filter__btn');
        const searchBtnInner = $('.catalog-filter__box');
        const searchInputWrap = $('.catalog-filter__search');
        const searchInput = searchInputWrap.find('input');

        searchBtn.on('click', function (e) {
            e.preventDefault();
            searchInputWrap.addClass('open');
        });

        searchBtnInner.on('click', function (e) {
            e.preventDefault();

            const query = searchInput.val();
            if (query) {
                window.location = searchInput.attr('data-action') + '?query='+query
            } else {
                searchInputWrap.removeClass('open');
            }
        })
    }

    AOS.init();
});
