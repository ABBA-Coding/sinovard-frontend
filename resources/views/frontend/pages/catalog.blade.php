@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">

        @include('frontend.sections.catalog-banner')

        <section class="sec-padding">
            <div class="container">
                <div class="catalog-info">
                    <div class="breadcrumbs">
                        <a href="{{ route('home') }}" class="btn btn-main btn-back">
                            <img src="/frontend/images/icon/arrowPrevWhite.svg" alt=""/>
                            <span>{{ __('static.Перейти на главную') }}</span>
                        </a>
                    </div>

                    <div class="catalog-info__wrapper">
                        <h3 class="catalog-info__title">{{ __('static.Каталог') }}</h3>
                        <div class="catalog-info__text">
                            {{ __('static.catalog-text') }}
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
                            <img src="/frontend/images/icon/catalogBurger.svg" alt=""/>
                            <span>{{ __('static.Каталог') }}</span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-9">
                        <div class="catalog-filter">
                            <ul class="catalog-filter__list">
                                @if(!empty($category))
                                    <li><a class="catalog-filter__link" data-query="category"
                                           href="javascript:">{{ $category->{'name_'.$lang} }}</a></li>
                                @endif

                                @if(!empty($brand))
                                    <li><a class="catalog-filter__link" data-query="brand"
                                           href="javascript:">{{ $brand->{'name_'.$lang} }}</a></li>
                                @endif
                            </ul>

                            <form class="catalog-filter__form">
                                <div class="btn btn-main catalog-filter__btn" style="cursor: pointer">
                                    <img src="/frontend/images/icon/searchWhite.svg" alt=""/>
                                    <span>{{ __('static.Поиск') }}</span>
                                </div>
                                <div class="catalog-filter__search">
                                    <input type="text" class="catalog-filter__input"
                                           data-action="{{ request('url') }}"/>
                                    <div class="catalog-filter__box" style="cursor: pointer">
                                        <img src="/frontend/images/icon/searchBlue.svg" alt=""/>
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
                                            <img src="/frontend/images/icon/arrowBlue.svg" alt=""/>
                                        </div>

                                        <ul class="catalog-dropdown__list">
                                            @foreach($categories as $category)
                                                <li>
                                                    <a href="{{ route('catalog', ['category' => $category->slug]) }}"
                                                       class="catalog-dropdown__link">{{ $category->{'name_'.$lang} }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="catalog-dropdown">
                                        <div class="catalog-dropdown__top">
                                            <span>{{ __('static.Бренды') }}</span>
                                            <img src="/frontend/images/icon/arrowBlue.svg" alt=""/>
                                        </div>

                                        <ul class="catalog-dropdown__list">
                                            @foreach($brands as $brand)
                                                <li>
                                                    <a href="{{ route('catalog', ['brand' => $brand->slug]) }}"
                                                       class="catalog-dropdown__link">{{ $brand->{'name_'.$lang} }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="catalog-left__bottom">
                                    <div class="catalog-left__img">
                                        <img src="/frontend/images/png/slide-6.png" alt=""/>
                                    </div>

                                    <div class="catalog-left__logo">
                                        <img src="/frontend/images/png/logoWhite.png" alt=""/>
                                    </div>
                                    <div class="catalog-left__info">
                                        <div class="catalog-left__title">Sinoward</div>
                                        <div class="catalog-left__text">
                                            {{ __('static.Наша компания —') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-8 col-xl-9">
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

@section('scripts')
    <script>
        $('.catalog-filter__link').on('click', function (e) {
            $(this).hide();
            let query = $(this).attr('data-query');
            removeQueryParam(query);
        });

        function removeQueryParam(param) {
            const url = new URL(window.location);
            url.searchParams.delete(param);
            window.history.pushState({}, '', url);
            window.location.reload();
        }
    </script>
@endsection
