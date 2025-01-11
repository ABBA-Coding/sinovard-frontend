@if(count($topProducts))
    <section class="sec-padding product-section" id="top-products-section">
        <div class="container">
            <div class="m-box">
                <div class="m-title">{{ __('static.Топ-продаж') }}</div>
                @if(count($topProducts) > 4)
                    <button class="btn btn-main">
                        <span>{{ __('static.Еще') }}</span>
                    </button>
                @endif
            </div>

            <div class="swiper swiper-2 swiper-arrows">
                <div class="swiper-wrapper">
                    @foreach($topProducts as $topProduct)
                        @if($loop->index == 6)
                            @continue
                        @endif
                            <div class="swiper-slide">
                                @component('frontend.components.product-card', ['product' => $topProduct]) @endcomponent
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
    </section>
@endif
