@extends('admin.layout.master')

@section('section')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Настройки сайта</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <form action="{{ route('admin.settings.update', ['id'=>$data->id]) }}" method="post"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <!------ email ------>
                            <div class="form-group">
                                <label>Почта</label>
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') ?? $data->{'email'} }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ telegram ------>
                            <div class="form-group">
                                <label>Telegram</label>
                                <input type="text"
                                       class="form-control"
                                       name="telegram"
                                       value="{{ old('telegram') ?? $data->{'telegram'} }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ youtube ------>
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="text"
                                       class="form-control"
                                       name="youtube"
                                       value="{{ old('youtube') ?? $data->{'youtube'} }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ facebook ------>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text"
                                       class="form-control"
                                       name="facebook"
                                       value="{{ old('facebook') ?? $data->{'facebook'} }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ instagram ------>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text"
                                       class="form-control"
                                       name="instagram"
                                       value="{{ old('instagram') ?? $data->{'instagram'} }}"
                                       autocomplete="off"
                                       title="">
                            </div>


                            <!------ phone ------>
                            <div class="form-group">
                                <label>Номер телефоны (пищите через запятой)</label>
                                <textarea class="form-control"
                                          name="phone"
                                          title="">{{ old('phone') ?? $data->phone }}</textarea>
                            </div>


                            <!------ meta_tags ------>
                            <div class="form-group mb-0">
                                <label>Мета Теги</label>
                                <textarea class="form-control"
                                          name="meta_tags"
                                          style="min-height: 410px"
                                          title="">{{ old('meta_tags') ?? $data->{'meta_tags'} }}</textarea>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
                <div class="col-md-6">

                    @include('admin.parts.nav-lang')

                    @php
                        $locales = config('env.LOCALES');
                    @endphp

                    <div class="tab-content" id="pills-tabContent">
                        @foreach($locales as $key => $locale)
                            <div class="tab-pane fade {{ $locale == 1 ? 'show active' : '' }}" id="pills-{{ $key }}"
                                 role="tabpanel" aria-labelledby="pills-{{ $key }}-tab">

                                <!------ address ------>
                                <div class="form-group">
                                    <label>Адрес ({{ $key }})</label>
                                    <textarea class="form-control"
                                              name="address[{{ $key }}]"
                                              title="">{{ old('address')[$key] ?? @$data->address[$key] }}</textarea>
                                </div>

                                <!------ meta_title ------>
                                <div class="form-group">
                                    <label>Мета заголовок ({{ $key }})</label>
                                    <input type="text"
                                           class="form-control"
                                           name="meta_title[{{$key}}]"
                                           value="{{ old('meta_title')[$key] ?? @$data->meta_title[$key] }}"
                                           title=""
                                           autocomplete="off">
                                </div>
                                <!------ meta_description ------>
                                <div class="form-group">
                                    <label>Мета описание ({{ $key }})</label>
                                    <textarea class="form-control"
                                              name="meta_description[{{ $key }}]"
                                              title="">{{ old('meta_description')[$key] ?? @$data->meta_description[$key] }}</textarea>
                                </div>
                                <!------ meta_keywords ------>
                                <div class="form-group">
                                    <label>Мета ключевые слова ({{ $key }})</label>
                                    <textarea class="form-control"
                                              name="meta_keywords[{{ $key }}]"
                                              title="">{{ old('meta_keywords')[$key] ?? @$data->meta_keywords[$key] }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
