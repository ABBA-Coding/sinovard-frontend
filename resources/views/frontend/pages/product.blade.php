@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">
        <section class="sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-8">
                        @component('frontend.components.breadcrumbs', ['model' => $product]) @endcomponent

                        <div class="thump-slider">
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="thump-slider__img">
                                            <img src="{{ $product->getFile('file', 'normal') }}" alt="{{ $product->translate->name }}"/>
                                        </div>
                                    </div>
                                    @foreach($product->photos as $photo)
                                        <div class="swiper-slide">
                                            <div class="thump-slider__img">
                                                <img src="{{ $photo->getFile('file', 'normal') }}" alt="{{ $product->translate->name }}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next">
                                    <img src="/frontend/images/icon/arrowNextWhite.svg" alt="" />
                                </div>
                                <div class="swiper-button-prev">
                                    <img src="/frontend/images/icon/arrowPrevWhite.svg" alt="" />
                                </div>
                            </div>
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="thump-slider__images">
                                            <img src="{{ $product->getFile('file', 'normal') }}" alt="{{ $product->translate->name }}"/>
                                        </div>
                                    </div>
                                    @foreach($product->photos as $photo)
                                        <div class="swiper-slide">
                                            <div class="thump-slider__images">
                                                <img src="{{ $photo->getFile('file', 'normal') }}" alt="{{ $product->translate->name }}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                        <div class="product-single">
                            <div class="product-single__top">
                                <div>
                                    <div class="product-single__title">{{ $product->translate->name }}</div>
                                    <div class="product-single__article">{{ __('static.Арт') }} {{ $product->vendor_code }}</div>
                                    <!--<div class="product-single__name">Название бренда</div>-->
                                    <div class="product-single__price">@price($product->amount) {{ __('static.сум') }}</div>
                                </div>
                                <button class="product-single__default">
                                    <span>{{ __('static.Руководство по размерам') }}</span>
                                    <img src="/frontend/images/icon/about.svg" alt="" />
                                </button>
                            </div>

                            <div class="product-single__center">
{{--                                <div class="product-single__size">--}}
{{--                                    <div class="product-single__size-name">Размеры</div>--}}
{{--                                    <ul class="product-single__size-list">--}}
{{--                                        <li>40</li>--}}
{{--                                        <li>45</li>--}}
{{--                                        <li>50</li>--}}
{{--                                        <li>55</li>--}}
{{--                                        <li>60</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <div class="product-single__color">--}}
{{--                                    <span>Цвет</span>--}}
{{--                                    <img src="/frontend/images/icon/arrowDropdown.svg" alt="" />--}}
{{--                                </div>--}}

                                <div class="product-single__buttons">
                                    <button class="btn btn-main">
                                        <span>{{ __('static.Заказать') }}</span>
                                    </button>
                                    <button class="btn btn-white addToBasket" data-id="{{ $product->id }}">
                                        <span>{{ __('static.Добавить в корзину') }}</span>
                                    </button>
                                </div>
                            </div>

                            <div class="product-single__info">
                                <div class="product-single__info-box">
                                    <div class="product-single__info-title">{{ __('static.Описание товара') }}</div>
                                    <div class="product-single__info-text">
                                        {{ $product->translate->description }}
                                    </div>
                                </div>

                                <br>

                                <div class="product-single__info-box">
                                    <div class="product-single__info-title" style="margin-bottom: 20px">{{ __('static.Характеристики') }}</div>

                                    @foreach($product->translate->characteristics as $i => $characteristic)
                                        <div class="product-single__info-item" style="border-bottom: 1px solid #B1B1B1; padding-bottom: 10px">
                                            <div class="product-single__info-characteristics">{{ $characteristic[0] }}</div>
                                            <div class="product-single__info-characteristics --max">{{ $characteristic[1] }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
