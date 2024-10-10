<header class="header-mobile --index">
    <div class="container">
        <div class="header-mobile__top">
            <button class="header-info__btn basketBtn">
                <img src="/frontend/images/icon/basketBlue.svg" alt="" />
            </button>
            <a href="/" class="header-mobile__logo">
                <img src="/frontend/images/icon/logo.svg" alt="" />
            </a>
            <div class="header-mobile__right">
                <div class="header-mobile__burger">
                    <span></span>
                </div>
            </div>
        </div>
        <div class="header-mobile__bottom">
            <ul class="header-mobile__list">
                <li><a href="{{ route('home') }}" class="header-mobile__link">{{ __('static.Главная') }}</a></li>
                <li><a href="{{ route('catalog') }}" class="header-mobile__link">{{ __('static.Каталог') }}</a></li>
                <li><a href="{{ route('about') }}" class="header-mobile__link">{{ __('static.Компания') }}</a></li>
                <li><a href="{{ route('news') }}" class="header-mobile__link">{{ __('static.Новости') }}</a></li>
                <li><a href="{{ route('contacts') }}" class="header-mobile__link">{{ __('static.Контакты') }}</a></li>
            </ul>
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
            <div class="header-mobile__social">
                <div class="header-mobile__social-name">{{ __('static.Наши соц.сети') }}:</div>
                <ul class="header-mobile__social-list">
                    @if(!empty($setting->telegram))
                    <li>
                        <a href="{{ $setting->telegram }}" target="_blank" class="header-mobile__social-icon">
                            <img src="/frontend/images/icon/social1.svg" alt="" />
                        </a>
                    </li>
                    @endif
                    @if(!empty($setting->youtube))
                        <li>
                            <a href="{{ $setting->youtube }}" target="_blank" class="header-mobile__social-icon">
                                <img src="/frontend/images/icon/social2.svg" alt="" />
                            </a>
                        </li>
                    @endif
                    @if(!empty($setting->facebook))
                        <li>
                            <a href="{{ $setting->facebook }}" target="_blank" class="header-mobile__social-icon">
                                <img src="/frontend/images/icon/social3.svg" alt="" />
                            </a>
                        </li>
                    @endif
                    @if(!empty($setting->instagram))
                        <li>
                            <a href="{{ $setting->instagram }}" target="_blank" class="header-mobile__social-icon">
                                <img src="/frontend/images/icon/social4.svg" alt="" />
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
