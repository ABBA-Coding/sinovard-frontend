<div class="order-modal">
    <div class="order-modal__overlay"></div>
    <div class="order-modal__wrapper">
        <div class="order-modal__form">

            <button class="order-modal__close"></button>

            <form action="{{ route('order') }}" method="POST" class="form-form orderForm">
                <div class="form-form__title">{{ __('static.Форма для заявки') }}</div>

                <input type="hidden" name="type" value="2">

                <div class="form-form__box">
                    <input type="text"
                           autocomplete="off"
                           required
                           class="form-form__input"
                           name="name"
                           placeholder="{{ __('static.Имя') }}" />
                </div>
                <div class="form-form__box">
                    <input type="text"
                           autocomplete="off"
                           required
                           class="form-form__input"
                           name="phone"
                           placeholder="{{ __('static.Номер телефона') }}"/>
                </div>

                <button type="submit" class="btn btn-main">
                    <span>{{ __('static.Отправить') }}</span>
                </button>
            </form>
        </div>
    </div>
</div>
