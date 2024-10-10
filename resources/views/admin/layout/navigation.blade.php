<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('admin.home') }}" class="b-brand">
                <div>
                    <img src="/admin-panel/favicon.svg" alt="" style="width: 30px;">
                </div>
                <div class="b-title">
                    Sinoward
                </div>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">

                <li class="nav-item pcoded-menu-caption">
                    <label>Разделы</label>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.banners.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather note-icon-picture"></i>
                        </span>
                        <span class="pcoded-mtext">Баннеры</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-list"></i>
                        </span>
                        <span class="pcoded-mtext">Категории</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-package"></i>
                        </span>
                        <span class="pcoded-mtext">Продукты</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.reviews.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-star"></i>
                        </span>
                        <span class="pcoded-mtext">Отзывы</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.teams.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-users"></i>
                        </span>
                        <span class="pcoded-mtext">Наша команда</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.faqs.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather note-icon-question"></i>
                        </span>
                        <span class="pcoded-mtext">F.A.Q</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.stocks.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-slack"></i>
                        </span>
                        <span class="pcoded-mtext">Акции</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather note-icon-picture"></i>
                        </span>
                        <span class="pcoded-mtext">Новости</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings.edit', ['id' => 1]) }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-settings"></i>
                        </span>
                        <span class="pcoded-mtext">Настройки сайта</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">Пользователи</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.feedback.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-mail"></i>
                        </span>
                        <span class="pcoded-mtext">Заявки</span>
                    </a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Действии</label>
                </li>


                <li class="nav-item">
                    <a href="javascript:" onclick="getElementById('logout-form').submit()" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-power"></i>
                        </span>
                        <span class="pcoded-mtext">Выйти</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="post"
                          hidden>{{ csrf_field() }}</form>
                </li>
            </ul>
        </div>
    </div>
</nav>
