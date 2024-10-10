<section class="sec-padding reviews-section">
    <div class="container">
        <div class="m-box">
            <div class="m-title">{{ __('static.Отзывы') }}</div>
        </div>

        <div class="reviews-section__wrapper">
            <div class="swiper swiper-5">
                <div class="swiper-wrapper">
                    @foreach($reviews as $review)
                        <div class="swiper-slider">
                            <div class="reviews-card">
                                <div class="reviews-card__img">
                                    <img src="{{ $review->getFile('file', 'low') }}" alt="" />
                                </div>
                                <div class="reviews-card__right">
                                    <div>
                                        <div class="reviews-card__name">{{ $review->translate->name }}</div>
                                        <div class="reviews-card__brand">({{ $review->translate->company_name }})</div>
                                    </div>

                                    <div class="reviews-card__bottom">
                                        <img src="/frontend/images/icon/“.svg" alt="" />
                                        <div class="reviews-card__text">
                                            {{ $review->translate->comment }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="reviews-section__buttons">
                <div class="swiper-v5-prev">
                    <img src="/frontend/images/icon/sliderNext.svg" alt="" />
                </div>
                <div class="swiper-v5-next">
                    <img src="/frontend/images/icon/sliderNext.svg" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
