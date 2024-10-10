@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">
        <section class="sec-padding about-main">
            <div class="container">
                <div class="about-main__wrapper">
                    <img class="about-main__bg" src="/frontend/images/png/aboutBg.png" alt="" />
                    <div class="about-main__title">О нас</div>
                    <div class="about-main__text">
                        Добро пожаловать на наш сайт! Мы — ведущая компания по продаже
                        качественных запчастей для траков, стремящаяся обеспечить наших
                        клиентов лучшими решениями для их транспортных средств. С самого
                        начала нашей деятельности мы поставили перед собой цель стать надежным
                        партнером для всех владельцев и операторов грузового транспорта.
                    </div>
                </div>
            </div>
        </section>

        <section class="sec-padding info-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-6">
                        <div class="info-section__info">
                            <div class="info-section__top">
                                <div class="info-section__title">Наши ценности</div>
                                <div class="info-section__text">
                                    Мы стремимся стать вашим постоянным поставщиком, на которого
                                    можно положиться в любой ситуации. Ваши траки — наша забота, и
                                    мы делаем всё, чтобы они всегда были на ходу!
                                </div>
                            </div>

                            <div class="info-section__card">
                                <div class="info-section__subtitle">Качество</div>
                                <div class="info-section__description">
                                    Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown Lorem Ipsum has been the
                                    industry's standard Lorem Ipsum has been the industry's standard
                                    dummy text ever since the 1500s, when an unknown Lorem Ipsum has
                                    been the industry's standard
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-5">
                        <div class="info-section__animation">
                            <div class="info-section__item --decor1">
                                <img src="/frontend/images/png/aboutDecor1.png" alt="" />
                            </div>
                            <div class="info-section__item --decor2">
                                <img src="/frontend/images/png/aboutDecor2.png" alt="" />
                            </div>
                            <div class="info-section__item --decor3">
                                <img src="/frontend/images/png/aboutDecor3.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                        <span>Лучшие партнеры</span>

                        <span> делают лучшие продукты</span>
                    </div>

                    <div class="portners-section__slider">
                        <div class="row align-items-end">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                <div class="portners-section__buttons">
                                    <button class="portners-section__prev">
                                        <img src="/frontend/images/icon/sliderPrev.svg" alt="" />
                                    </button>
                                    <button class="portners-section__next">
                                        <img src="/frontend/images/icon/sliderNext.svg" alt="" />
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-9">
                                <div class="swiper swiper-7">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            {% include 'components/portners-card.html' %}
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="portners-card">
                                                <div class="portners-card__logo">
                                                    <img src="/frontend/images/icon/brand1.svg" alt="" />
                                                </div>

                                                <div class="portners-card__text">
                                                    Lorem Ipsum has been the industry's standard dummy text
                                                    ever since the 1500s, when an unknown Lorem Ipsum has
                                                    been the industry's standard
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="portners-card">
                                                <div class="portners-card__logo">
                                                    <img src="/frontend/images/icon/brand3.svg" alt="" />
                                                </div>

                                                <div class="portners-card__text">
                                                    Lorem Ipsum has been the industry's standard dummy text
                                                    ever since the 1500s, when an unknown Lorem Ipsum has
                                                    been the industry's standard
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <div class="team-info__title">Наша команда</div>
                            <div class="team-info__text">
                                За каждым успешным бизнесом стоит команда профессионалов, которые
                                разделяют общую цель и страсть к своему делу. Наша команда — это
                                опытные специалисты, которые ежедневно работают над тем, чтобы
                                предоставить вам лучший сервис и надежные запчасти для вашего
                                трака.
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
