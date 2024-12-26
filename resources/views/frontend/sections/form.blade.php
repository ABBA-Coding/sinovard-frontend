<section class="form-section">
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
                    Наша цель — обеспечить быструю доставку, отличное обслуживание и профессиональную поддержку, помогая
                    каждому клиенту найти нужную деталь для его автомобиля. Мы ценим доверие наших клиентов и строим
                    долгосрочные отношения, ориентируясь на их потребности и удовлетворение.
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
