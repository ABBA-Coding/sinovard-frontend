<div class="breadcrumbs">
    @switch(get_class($model))
        @case(\App\Models\Product::class)
            <a href="{{ route('catalog') }}" class="btn btn-main btn-back">
                <img src="/frontend/images/icon/arrowPrevWhite.svg" alt="" />
                <span>{{ __('static.Перейти в каталог') }}</span>
            </a>
            <ul class="breadcrumbs-list">
                <li>
                    <a href="{{ route('home') }}" class="breadcrumbs-link">{{ __('static.Главная') }}</a>
                </li>
                <li>
                    <a href="{{ route('catalog') }}" class="breadcrumbs-link">{{ __('static.Каталог') }}</a>
                </li>
                @if($model->category)
                <li>
                    <a href="{{ route('catalog', ['slug' => $model->category->slug]) }}" class="breadcrumbs-link">{{ $model->category->{'name_'.$lang} }}</a>
                </li>
                @endif
                <li style="opacity: 0.6">
                    <span class="breadcrumbs-link">{{ $model->translate->name }}</span>
                </li>
            </ul>
            @break

        @case(\App\Models\Post::class)
            <a href="{{ route('news') }}" class="btn btn-main btn-back">
                <img src="/frontend/images/icon/arrowPrevWhite.svg" alt="" />
                <span>{{ __('static.Перейти в новости') }}</span>
            </a>
            <ul class="breadcrumbs-list">
                <li>
                    <a href="{{ route('home') }}" class="breadcrumbs-link">{{ __('static.Главная') }}</a>
                </li>
                <li>
                    <a href="{{ route('news') }}" class="breadcrumbs-link">{{ __('static.Новости') }}</a>
                </li>
                <li style="opacity: 0.6">
                    <span class="breadcrumbs-link">{{ $model->translate->title }}</span>
                </li>
            </ul>
            @break
    @endswitch

</div>
