<div class="news-card">
    <div class="news-card__img">
        <img src="{{ $new->getFile('file', 'low') }}" alt="" />
    </div>
    <div class="news-card__bottom">
        <div>
            <h3 class="news-card__title">{{ $new->translate->title }}</h3>
            <div class="news-card__text">{{ $new->translate->description }}</div>
        </div>
        <a href="{{ route('new', ['slug' => $new->slug]) }}" class="btn btn-main">
            <span>{{ __('static.Перейти') }}</span>
        </a>
    </div>
</div>
