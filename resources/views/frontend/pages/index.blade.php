@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">
        @include('frontend.sections.banner')
        @include('frontend.sections.categories')
        @include('frontend.sections.top-products')
        @include('frontend.sections.brands')
        @include('frontend.sections.advantages')
        <div class="sec-padding">
            <div class="container">
                <div class="m-box">
                    <div class="m-title">{{ __('static.Наши акции') }}</div>
                </div>
                @include('frontend.sections.stocks')
                @include('frontend.sections.about-us')
            </div>
        </div>
        @include('frontend.sections.reviews')
        @include('frontend.sections.news')
        @include('frontend.sections.faq')
        @include('frontend.sections.form')
    </div>

@endsection
