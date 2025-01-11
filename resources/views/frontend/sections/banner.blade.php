<section class="banner-section">
    <div class="container">
        <div class="banner-section__wrapper">
            <div class="swiper swiper-1">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <div class="banner-section__slide">
                                <img
                                    class="banner-section__bg"
                                    src="{{ $banner->getFile('file', 'original') }}"
                                    alt=""
                                />
                                <div class="banner-section__title" style="max-width: 900px">
                                    {{ $banner->translate->title }}
                                </div>
                                <div class="banner-section__text" style="max-width: 700px">
                                    {{ $banner->translate->description }}
                                </div>
                                @if(!empty($banner->translate->link))
                                    <div class="d-inline-block">
                                        <a href="{{ $banner->translate->link }}" class="btn btn-white">
                                            <span>{{ !empty($banner->translate->btn_text) ? $banner->translate->btn_text : __('static.Перейти') }}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>

                @if (count($banners) > 1)
                <div class="banner-section__buttons">
                    <div class="swiper-banner-prev">
                        <img src="/frontend/images/icon/sliderPrev.svg" alt="" />
                    </div>
                    <div class="swiper-banner-next">
                        <img src="/frontend/images/icon/sliderNext.svg" alt="" />
                    </div>
                </div>
                @endif
            </div>

            <div class="banner-section__bottom">
                <div class="banner-item">
                    <div class="banner-item__title">{{ __('static.banner_bottom.100% Качество') }}</div>
                    <div class="banner-item__text">{!! __('static.banner_bottom.Качественный <br/>продукт с гарантией') !!}</div>
                </div>
                <div class="banner-item">
                    <div class="banner-item__title">{{ __('static.banner_bottom.Больше 10 000 довольных клиентов') }}</div>
                    <div class="banner-item__text">{!! __('static.banner_bottom.Большое кол-во <br/>постоянных покупателей') !!}</div>
                </div>
                <div class="banner-item">
                    <div class="banner-item__title">{{ __('static.banner_bottom.Профессиональные специалисты') }}</div>
                    <div class="banner-item__text">{!! __('static.banner_bottom.Наши сотрудники помогут <br/>подобрать товар') !!}</div>
                </div>
            </div>
        </div>
    </div>
</section>
