@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">
        <section class="sec-padding --breadcrumbs">
            <div class="container">@component('frontend.components.breadcrumbs', ['model' => $new]) @endcomponent</div>
        </section>

        <section class="sec-padding news-single">
            <div class="container">
                <div class="news-single__wrapper">
                    <div class="news-single__img">
                        <img src="{{ $new->getFile('file', 'normal') }}" alt="" />
                    </div>
                    <div class="news-single__info">
                        <div>
                            <h2 class="news-single__title">{{ $new->translate->title }}</h2>
                            <div class="news-single__subtitle">
                                {!! $new->translate->content !!}
                            </div>
                        </div>
                        <div class="news-single__date">{{ $new->published_at->format('d.m.Y') }}</div>
                    </div>
                </div>
            </div>
        </section>

        @if(count($otherNews))
        <section class="sec-padding">
            <div class="container">
                <div class="m-box">
                    <div class="m-title">{{ __('static.Другие новости') }}</div>
                </div>

                <div class="swiper swiper-8 swiper-arrows">
                    <div class="swiper-wrapper">
                        @foreach($otherNews as $otherNew)
                            <div class="swiper-slide">
                                @component('frontend.components.news-card', ['new' => $otherNew]) @endcomponent
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-button-prev">
                        <img src="/frontend/images/icon/sliderPrev.svg" alt="" />
                    </div>
                    <div class="swiper-button-next">
                        <img src="/frontend/images/icon/sliderNext.svg" alt="" />
                    </div>
                </div>
            </div>
        </section>
        @endif

        @include('frontend.sections.form')
    </div>

@endsection
