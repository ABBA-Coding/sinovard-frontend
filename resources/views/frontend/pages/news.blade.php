@extends('frontend.layout.master')

@section('section')

    <div class="site-wrapper">
        <section class="sec-padding">
            <div class="container">
                <div class="m-box">
                    <div class="m-title">{{ __('static.Новости') }}</div>
                </div>

                <div class="row --news --news-gap">
                    @foreach($news as $new)
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            @component('frontend.components.news-card', compact('new')) @endcomponent
                        </div>
                    @endforeach
                </div>

                {{ $news->links('frontend.components.pagination') }}

            </div>
        </section>

        @include('frontend.sections.form')
    </div>

@endsection
