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
                            <li class="breadcrumb-item"><a href="{{ route('admin.banners.index') }}">Баннер</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Изменить</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <form action="{{ route('admin.banners.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
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

                            <!------ ссылка ------>
                            <div class="form-group">
                                <label>Ссылка</label>
                                <input type="text"
                                       name="link"
                                       class="form-control"
                                       value="{{ old('link') ?? @$data->translate->link }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ btn_text ------>
                            <div class="form-group mb-0">
                                <label>Текст кнопки</label>
                                <input type="text"
                                       name="btn_text"
                                       class="form-control"
                                       value="{{ old('btn_text') ?? @$data->translate->btn_text }}"
                                       autocomplete="off"
                                       title="">
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
                                <label>Тип</label>
                                <select name="type" class="select2">
                                    <option value="{{ \App\Models\Banner::TYPE_HOME }}" {{ $data->type == \App\Models\Banner::TYPE_HOME ? 'selected' : '' }}>{{ \App\Models\Banner::getTypeLabel(\App\Models\Banner::TYPE_HOME) }}</option>
                                    <option value="{{ \App\Models\Banner::TYPE_CATALOG }}" {{ $data->type == \App\Models\Banner::TYPE_CATALOG ? 'selected' : '' }}>{{ \App\Models\Banner::getTypeLabel(\App\Models\Banner::TYPE_CATALOG) }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Сортировка</label>
                                <input type="text"
                                       class="form-control"
                                       name="sort"
                                       autocomplete="off"
                                       value="{{ old('sort') ?? $data->sort }}">
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
