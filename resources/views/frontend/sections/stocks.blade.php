<div class="swiper swiper-4 swiper-arrows">
    <div class="swiper-wrapper">
        @foreach($stocks as $stock)
            <div class="swiper-slide">
                <div class="promotion-card">
                    <div class="promotion-card__img">
                        <img src="{{ $stock->getFile('file', 'low') }}" alt="" />
                    </div>
                    <div>
                        <div class="promotion-card__title">{{ $stock->translate->tite }}</div>
                        <div class="promotion-card__text">
                            {{ $stock->translate->description }}
                        </div>
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
