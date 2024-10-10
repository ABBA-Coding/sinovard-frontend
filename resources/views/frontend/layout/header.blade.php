<header class="header">
    <div class="header-offer">
        <div class="container">
            <div class="header-offer__wrapper">
                <div class="header-offer__text">
                    <img src="/frontend/images/icon/truck-side.svg" alt="" />
                    {{ __('static.header-text') }}
                </div>
                <div class="header-offer__close">
                    <img src="/frontend/images/icon/exit.svg" alt="" />
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-wrapper">
            <div class="header-menu">
                <a href="/" class="header-menu__logo">
                    <img src="/frontend/images/icon/logo.svg" alt="" />
                </a>
                <ul class="header-menu__list">
                    <li class="header-menu__item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="header-menu__link">{{ __('static.Главная') }}</a>
                    </li>
                    <li class="header-menu__item {{ request()->routeIs('catalog') ? 'active' : '' }}">
                        <a href="{{ route('catalog') }}" class="header-menu__link">{{ __('static.Каталог') }}</a>
                        @component('frontend.components.dropdown') @endcomponent
                    </li>
                    <li class="header-menu__item {{ request()->routeIs('about') ? 'active' : '' }}">
                        <a href="{{ route('about') }}" class="header-menu__link">{{ __('static.Компания') }}</a>
                    </li>
                    <li class="header-menu__item {{ request()->routeIs('news') ? 'active' : '' }}">
                        <a href="{{ route('news') }}" class="header-menu__link">{{ __('static.Новости') }}</a>
                    </li>
                    <li class="header-menu__item {{ request()->routeIs('contacts') ? 'active' : '' }}">
                        <a href="{{ route('contacts') }}" class="header-menu__link">{{ __('static.Контакты') }}</a>
                    </li>
                </ul>
            </div>
            <div class="header-info">
                <div class="header-dropdown">
                    <div class="header-dropdown__value">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if($localeCode == App::getLocale())
                                <span>{{ $properties['visible'] }}</span>
                                <img src="/frontend/images/icon/arrowDropdown.svg" alt="" />
                            @endif
                        @endforeach
                    </div>
                    <div class="header-dropdown__wrapper">
                        <ul class="header-dropdown__list">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if($localeCode !== App::getLocale())
                                    <li class="header-dropdown__link">
                                        <a hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            <span>{{ $properties['visible'] }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="header-info__buttons">
                    <div class="header-info__search">
                        <button class="header-info__btn">
                            <img src="/frontend/images/icon/searchBlue.svg" alt="" />
                        </button>
                        <div class="header-info__box">
                            <input type="text" data-action="{{ route('catalog') }}" placeholder="{{ __('static.Введите текст') }}" />
                        </div>
                    </div>
                    <button class="header-info__btn basketBtn">
                        <img src="/frontend/images/icon/basketBlue.svg" alt="" />
                    </button>
                </div>
                @if(count($setting->phones))
                <a class="header-info__phone" href="tel:@phone($setting->phones[0])">
                    <img src="/frontend/images/icon/phoneWhite.svg" alt="" />
                    <span>{{ $setting->phones[0] }}</span>
                </a>
                @endif
            </div>
        </div>
    </div>
</header>
