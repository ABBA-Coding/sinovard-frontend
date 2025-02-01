<div class="menu-dropdown">
    <div class="menu-dropdown__left">
        <ul class="menu-dropdown__list">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('catalog', ['category' => $category->slug]) }}" class="menu-dropdown__link">
                        <div class="menu-dropdown__box">
                            <div class="menu-dropdown__icon">
                                <img src="{{ $category->getFile('icon', 'small') }}" alt="" />
                            </div>
                            <span>{{ $category->{'name_'.$lang} }}</span>
                        </div>
                        <img
                            class="menu-dropdown__arrow"
                            src="/frontend/images/icon/menuArrow.svg"
                            alt=""
                        />
                    </a>
                </li>
            @endforeach

        </ul>
    </div>
    <!--<div class="menu-dropdown__right">
        <ul class="menu-dropdown__sublist">
            <li>
                <a href="#!" class="menu-dropdown__sublink">
                    Детали кузова/Крыло/Бампер
                </a>
            </li>
            <li><a href="#!" class="menu-dropdown__sublink">Люки/Капоты/Двери</a></li>
            <li><a href="#!" class="menu-dropdown__sublink">Окна</a></li>
            <li>
                <a href="#!" class="menu-dropdown__sublink">Подвеска кабины водителя</a>
            </li>
            <li><a href="#!" class="menu-dropdown__sublink">Аксессуары</a></li>
        </ul>
    </div>-->
</div>
