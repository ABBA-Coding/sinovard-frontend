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
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.stocks.index') }}">Акции</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Изменить</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <form action="{{ route('admin.stocks.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">

                    @include('admin.parts.nav-lang-link')

                    <div class="card">
                        <div class="card-body">
                            <!------ title ------>
                            <div class="form-group">
                                <label>Заголовок</label>
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       value="{{ old('title') ?? @$data->translate->title }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ description ------>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" title=""
                                          name="description">{!! old('description') ?? @$data->translate->description !!}</textarea>
                            </div>

                            <!------ content ------>
                            <div class="form-group mb-0">
                                <label>Контент</label>
                                <div class="sum_note__wrapper">
                                    <textarea class="form-control sum_note" title=""
                                              name="content">{!! old('content') ?? @$data->translate->content !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="f1" class="fm-field"> <x-filemanager-field name="file_id" label="Фото" id="f1" value="{{ $data->file_id }}"></x-filemanager-field> </div>

                            <div class="form-group">
                                <label>Дата публикации</label>
                                <input type="text"
                                       class="form-control datepicker-here"
                                       name="published_at"
                                       autocomplete="off"
                                       value="{{ old('published_at') ?? $data->published_at->format('d.m.Y') }}">
                            </div>

                            <!------ status ------>
                            <div class="form-group form-check mb-0 mr-20">
                                <input type="hidden" name="status" value="off">
                                <input type="checkbox" class="form-check-input" id="statusLabel" name="status" {{ $data->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusLabel">Статус</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
