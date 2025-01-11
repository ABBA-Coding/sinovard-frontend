<section class="form-section" id="form-section">
    <div class="container">
        <div class="form-section__wrapper">
            <div class="form-section__info">
                <div class="form-section__df">
                    <div class="form-section__logo">
                        <img src="/frontend/images/icon/logo.svg" alt="" />
                    </div>
                    <h2 class="form-section__title">Sinoward</h2>
                </div>
                <div class="form-section__text">
                    {{ __('static.Наша цель —') }}
                </div>
            </div>

            <form action="{{ route('feedback') }}" method="POST" class="form-form feedbackForm">
                <div class="form-form__title">{{ __('static.Форма для заявки') }}</div>

                <input type="hidden" name="type" value="1">

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
                           name="surname"
                           placeholder="{{ __('static.Фамилия') }}" />
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
</section>
