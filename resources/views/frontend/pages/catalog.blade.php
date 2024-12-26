@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">

        @include('frontend.sections.catalog-banner')

        <section class="sec-padding">
            <div class="container">
                <div class="catalog-info">
                    <div class="breadcrumbs">
                        <a href="{{ route('home') }}" class="btn btn-main btn-back">
                            <img src="/frontend/images/icon/arrowPrevWhite.svg" alt="" />
                            <span>{{ __('static.Перейти на главную') }}</span>
                        </a>
                    </div>

                    <div class="catalog-info__wrapper">
                        <h3 class="catalog-info__title">Каталог</h3>
                        <div class="catalog-info__text">
                            Добро пожаловать в наш каталог запчастей для траков! Здесь вы
                            найдете обширный выбор деталей для грузовых автомобилей, подобранных
                            с учетом самых высоких стандартов качества. Независимо от того,
                            какой бренд или модель трака вам требуется, у нас есть все
                            необходимое для поддержания вашего автопарка в отличном состоянии
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="catalog-left__catalog">
                            <img src="/frontend/images/icon/catalogBurger.svg" alt="" />
                            <span>Каталог</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-9">
                        <div class="catalog-filter">
                            <ul class="catalog-filter__list">
                                @if(!empty($category))
                                    <li><a class="catalog-filter__link" href="javascript:">{{ $category->{'name_'.$lang} }}</a></li>
                                @endif
                            </ul>

                            <form class="catalog-filter__form">
                                <div class="btn btn-main catalog-filter__btn">
                                    <img src="/frontend/images/icon/searchWhite.svg" alt="" />
                                    <span>{{ __('static.Поиск') }}</span>
                                </div>
                                <div class="catalog-filter__search">
                                    <input type="text" class="catalog-filter__input" />
                                    <div class="catalog-filter__box">
                                        <img src="/frontend/images/icon/searchBlue.svg" alt="" />
                                        <span>{{ __('static.Поиск') }}</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="catalog-left">
                            <div class="catalog-left__wrapper">
                                <div class="catalog-left__top">
                                    <div class="catalog-dropdown">
                                        <div class="catalog-dropdown__top">
                                            <span>{{ __('static.Категория') }}</span>
                                            <img src="/frontend/images/icon/arrowBlue.svg" alt="" />
                                        </div>

                                        <ul class="catalog-dropdown__list">
                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{ route('catalog', ['slug' => $category->slug]) }}" class="catalog-dropdown__link">{{ $category->{'name_'.$lang} }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="catalog-left__bottom">
                                    <div class="catalog-left__img">
                                        <img src="/frontend/images/png/slide-6.png" alt="" />
                                    </div>

                                    <div class="catalog-left__logo">
                                        <img src="/frontend/images/png/logoWhite.png" alt="" />
                                    </div>
                                    <div class="catalog-left__info">
                                        <div class="catalog-left__title">Sinoward</div>
                                        <div class="catalog-left__text">
                                            Lorem Ipsum has been the industry's standard dummy text ever
                                            since the 1500s, when an unknown Lorem Ipsum has been the
                                            industry's standard Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown
                                            Lorem Ipsum has been the industry's standard
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-9">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                    @component('frontend.components.product-card', compact('product')) @endcomponent
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{ $products->appends(request()->query())->links('frontend.components.pagination') }}
            </div>
        </section>

        @include('frontend.sections.form')
    </div>

@endsection
