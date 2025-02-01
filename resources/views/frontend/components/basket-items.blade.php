@foreach($products as $product)
    <div class="basket-card">
        <div class="basket-card__left">
            <div class="basket-card__img">
                <img src="{{ $product->getFile('file', 'low') }}" alt="" />
            </div>
            <div class="basket-card__info">
                <div class="basket-card__title">{{ $product->translate->name }}</div>
                <div class="basket-card__text mb-10">{{ __('static.Арт') }} {{ $product->vendor_code }}</div>
                @if($product->category)
                <div class="basket-card__text">
                    {{ $product->category->{"name_".$lang} }}
                </div>
                @endif
            </div>
        </div>

        <div class="basket-card__right">
            @if($setting->show_price == 1)
            <div class="basket-card__price">@price($product->amount) {{ __('static.сум') }}</div>
            @endif
            <div class="basket-card__quantity">
                <button class="basket-card__decr decrementFromBasket" data-id="{{ $product->id }}">-</button>
                <div class="basket-card__value">{{ $product->cart_quantity }}</div>
                <button class="basket-card__incr addToBasket" data-id="{{ $product->id }}">+</button>
            </div>

            <button class="basket-card__delete removeFromBasket" data-id="{{ $product->id }}">
                <span>{{ __('static.Удалить') }}</span>
            </button>
        </div>
    </div>
@endforeach
