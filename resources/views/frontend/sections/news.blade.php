<section class="sec-padding --news-cards">
    <div class="container">
        <div class="m-box">
            <div class="m-title">{{ __('static.Новости') }}</div>
        </div>
        <div class="row --news-gap">
            @foreach($news as $new)
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    @component('frontend.components.news-card', compact('new')) @endcomponent
                </div>
            @endforeach
        </div>
    </div>
</section>
