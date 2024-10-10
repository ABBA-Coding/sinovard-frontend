@if(count($banners))
<section class="sec-padding">
    <div class="container">
        <div class="catalog-slider">
            <div class="swiper swiper-6">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <div class="catalog-slider__card">
                                <div class="catalog-slider__img">
                                    <img src="{{ $banner->getFile('file', 'low') }}" alt="" />
                                </div>
                                <div class="catalog-slider__logo">
                                    <img src="/frontend/images/png/logoWhite.png" alt="" />
                                </div>
                                <div class="catalog-slider__info">
                                    <div class="catalog-slider__title">{{ $banner->translate->title }}</div>
                                    <div class="catalog-slider__text">
                                        {{ $banner->translate->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev swiper-v6-prev">
                    <img src="/frontend/images/icon/arrowPrevWhite.svg" alt="" />
                </div>
                <div class="swiper-button-next swiper-v6-next">
                    <img src="/frontend/images/icon/arrowNextWhite.svg" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
@endif
