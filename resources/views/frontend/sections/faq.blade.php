<section class="sec-padding accordion-section">
    <div class="container">
        <div class="m-box">
            <div class="m-title">{{ __('static.FAQ') }}</div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                <div class="accordion">
                    @foreach($faqs as $faq)
                        <div class="accordion-content">
                            <div class="accordion-header">
                                <span>{{ $faq->translate->title }}</span>
                                <div class="accordion-arrow">
                                    <img src="/frontend/images/icon/arrowBlue.svg" alt="" />
                                </div>
                            </div>
                            <div class="accordion-body">
                                {{ $faq->translate->description }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
