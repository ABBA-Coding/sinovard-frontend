<section class="sec-padding brand-section">
    <div class="container">
        <div class="m-box">
            <div class="m-title">{{ __('static.Бренды') }}</div>
        </div>
        <div class="brand-section__wrapper">
            <div class="swiper swiper-3 swiper-arrows">
                <div class="swiper-wrapper">
                    @foreach($brands as $brand)
                        <div class="swiper-slide">
                            <div class="brand-card">
                                <div class="brand-card__img" style="max-width: none">
                                    <img src="{{ $brand->getFile('file', 'low') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-prev">
                    <img src="/frontend/images/icon/sliderPrev.svg" alt="" />
                </div>
                <div class="swiper-button-next">
                    <img src="/frontend/images/icon/sliderNext.svg" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
