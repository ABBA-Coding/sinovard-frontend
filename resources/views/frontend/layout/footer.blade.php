<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top__wrapper">
                <div class="footer-top__title">{{ __('static.Навигация по сайту') }}</div>
                <div class="footer-top__inner">
                    <ul class="footer-top__list">
                        <li class="footer-top__type">{{ __('static.Главная') }}</li>
                        <li class="footer-top__link">
                            <a href="{{ route('home') }}">{{ __('static.Приветствие') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('home', '#categories-section') }}">{{ __('static.Категории') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('home', '#top-products-section') }}">{{ __('static.Топ-продаж') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('home', '#services-section') }}">{{ __('static.Преимущества') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('home', '#stocks-section') }}">{{ __('static.Акции') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('home', '#about-section') }}">{{ __('static.О нас') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('home', '#reviews-section') }}">{{ __('static.Отзывы') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('home', '#news-section') }}">{{ __('static.Новости') }}</a>
                        </li>
                    </ul>

                    <ul class="footer-top__list">
                        <li class="footer-top__type">{{ __('static.Каталог') }}</li>
                        <li class="footer-top__link">
                            <a href="{{ route('catalog') }}">{{ __('static.Каталог продукции') }}</a>
                        </li>
                    </ul>

                    <ul class="footer-top__list">
                        <li class="footer-top__type">{{ __('static.О нас') }}</li>
                        <li class="footer-top__link">
                            <a href="{{ route('about') }}">{{ __('static.Представление') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('about', '#info-section') }}">{{ __('static.Информация') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('about', '#form-section') }}">{{ __('static.Заявка') }}</a>
                        </li>
                    </ul>

                    <ul class="footer-top__list">
                        <li class="footer-top__type">{{__('static.Новости')}}</li>
                        <li class="footer-top__link">
                            <a href="{{ route('news') }}">{{ __('static.Новости') }}</a>
                        </li>
                    </ul>

                    <ul class="footer-top__list">
                        <li class="footer-top__type">{{__('static.Контакты')}}</li>
                        <li class="footer-top__link">
                            <a href="{{ route('contacts') }}">{{ __('static.Контакты') }}</a>
                        </li>
                        <li class="footer-top__link">
                            <a href="{{ route('contacts') }}">{{ __('static.Заявка') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bootom">
        <div class="container">
            <div class="footer-bootom__wrapper">
                <div class="footer-bootom__description">SINOWARD ©{{ date('Y') }}</div>
                <div class="footer-bootom__text">{{ __('static.Все права защищены') }}</div>
                <div class="footer-bootom__text">Made by <a href="https://abba.uz/" target="_blank" class="">ABBA</a></div>
            </div>
        </div>
    </div>
</footer>
