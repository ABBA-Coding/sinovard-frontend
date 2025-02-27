@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">
        <section class="sec-padding about-main">
            <div class="container">
                <div class="about-main__wrapper">
                    <img class="about-main__bg" src="/frontend/images/png/aboutBg.png" alt="" />
                    <div class="about-main__title">{{ __('static.О нас') }}</div>
                    <div class="about-main__text">
                        {{ __('static.about-text') }}
                    </div>
                </div>
            </div>
        </section>

        <div id="info-section">
            <section class="info-section">
                <div class="container">
                    <div class="info-section__wrap">
                        <div class="info-section__left">
                            <div class="info-section__info">
                                <div class="info-section__top">
                                    <div class="info-section__title">{{ __('static.Наши ценности') }}</div>
                                    <div class="info-section__text">
                                        {{ __('static.values-text') }}
                                    </div>
                                </div>

                                <div class="info-section__card">
                                    <div class="info-section__subtitle">{{ __('static.Качество') }}</div>
                                    <div class="info-section__description">
                                        {{ __('static.quality-text') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-section__right">
                            <div class="info-section__animation">
                                <div class="info-section__item --decor1">
                                    <div class="icon"></div>
                                </div>
                                <div class="info-section__item --decor2">
                                    <div class="icon"></div>
                                </div>
                                <div class="info-section__item --decor3">
                                    <div class="icon"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="sec-padding portners-section">
            <video
                class="portners-section__bg"
                autoplay
                muted
                src="/frontend/images/2711290-uhd_3840_2160_24fps.mp4"
            ></video>
            <div class="container">
                <div class="portners-section__wrapper">
                    <div class="portners-section__title">
                        @if($lang === 'ru')
                            <span>Наши партнеры </span>
                        @elseif($lang === 'uz')
                            <span>Bizning hamkorlarimiz</span>
                        @else
                            <span>Our partners</span>
                        @endif
                    </div>

                    <div class="portners-section__slider">
                        <div class="portners-slider">
                            <div class="swiper swiper-7">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="portners-card" style="padding: 20px;min-height: auto">
                                            <div class="portners-card__logo">
                                                <img src="/frontend/images/partners/p1.png" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="portners-card" style="padding: 20px;min-height: auto">
                                            <div class="portners-card__logo">
                                                <img src="/frontend/images/partners/p2.png" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="portners-card" style="padding: 20px;min-height: auto">
                                            <div class="portners-card__logo">
                                                <img src="/frontend/images/partners/p3.png" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="portners-card" style="padding: 20px;min-height: auto">
                                            <div class="portners-card__logo">
                                                <img src="/frontend/images/partners/p4.png" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portners-section__buttons">
                            <button class="portners-section__prev">
                                <img src="/frontend/images/icon/sliderPrev.svg" alt="" />
                            </button>
                            <button class="portners-section__next">
                                <img src="/frontend/images/icon/sliderNext.svg" alt="" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sec-padding team-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                        <div class="team-info">
                            <div class="team-info__title">{{ __('static.Наша команда') }}</div>
                            <div class="team-info__text">
                                {{ __('static.team-text') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                        @foreach($team as $teamItem)
                            <div class="team-card">
                                <div class="team-card__img">
                                    <img src="{{ $teamItem->getFile('file', 'low') }}" alt="" />
                                </div>
                                <div class="team-card__info">
                                    <div class="team-card__name">{{ $teamItem->translate->name }}</div>
                                    <div class="team-card__job">{{ $teamItem->translate->position }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @include('frontend.sections.form')
    </div>

@endsection


@section('scripts')
    <script>
        let stickyDiv = document.querySelector(".info-section"),
            stickyDivParent = document.getElementById('info-section'),
            stickyOffset = stickyDiv.offsetTop;

        window.onload = function () {
            stickyDivParent.style.height = stickyDiv.offsetHeight+'px'
        };

        window.onscroll = function () {
            if (window.pageYOffset >= stickyOffset && window.pageYOffset <= stickyOffset+stickyDiv.offsetHeight) {
                body.style.overflowY = "hidden";
            } else {
                body.style.overflowY = "auto";
            }
        };
    </script>
@endsection
