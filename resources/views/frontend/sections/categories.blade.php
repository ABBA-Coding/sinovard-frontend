@if(count($categories))
<section class="sec-padding categories-section">
    <div class="container">
        <div class="m-box">
            <div class="m-title">{{ __('static.Категории') }}</div>
            @if(count($categories) > 6)
            <a href="{{ route('catalog') }}" class="btn btn-main">
                <span>{{ __('static.Еще') }}</span>
            </a>
            @endif
        </div>
        <div class="row">
            @foreach($categories as $category)
                @if($loop->index == 6)
                    @continue
                @endif
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2">
                    <a href="{{ route('catalog', ['slug' => $category->slug]) }}" class="categories-card">
                        <div class="categories-card__img">
                            <img src="{{ $category->getFile('file', 'low') }}" alt="" />
                        </div>
                        <div class="categories-card__title">{{ $category->{"name_".$lang} }}</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
