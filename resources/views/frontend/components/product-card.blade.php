<div class="product-card">
    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-card__top">
{{--        <div class="product-card__status">Статус</div>--}}
        <div class="product-card__img">
            <img src="{{ $product->getFile('file', 'low') }}" alt="" />
        </div>
    </a>

    <a href="{{ route('product', ['slug' => $product->slug]) }}" class="product-card__bottom">
        @if($setting->show_price == 1)
        <div class="product-card__price">@price($product->amount) {{ __('static.сум') }}</div>
        @endif
        <div class="product-card__article">{{ $product->vendor_code }}</div>
        <div class="product-card__text">
            {{ \Illuminate\Support\Str::limit($product->translate->description, 130) }}
        </div>
        <button class="product-card__btn addToBasket" data-id="{{ $product->id }}">
            <span>{{ __('static.В корзину') }}</span>
        </button>
    </a>
</div>
