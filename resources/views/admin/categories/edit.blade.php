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
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Категории</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Изменить</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <form action="{{ route('admin.categories.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body">
                            <!------ name_ru ------>
                            <div class="form-group">
                                <label>Заголовок (ру)</label>
                                <input type="text"
                                       name="name_ru"
                                       class="form-control"
                                       value="{{ old('name_ru') ?? $data->name_ru }}"
                                       autocomplete="off"
                                       title="">
                            </div>
                            <!------ name_uz ------>
                            <div class="form-group">
                                <label>Заголовок (uz)</label>
                                <input type="text"
                                       name="name_uz"
                                       class="form-control"
                                       value="{{ old('name_uz') ?? $data->name_uz }}"
                                       autocomplete="off"
                                       title="">
                            </div>
                            <!------ name_en ------>
                            <div class="form-group mb-0">
                                <label>Заголовок (en)</label>
                                <input type="text"
                                       name="name_en"
                                       class="form-control"
                                       value="{{ old('name_en') ?? $data->name_en }}"
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

                            <div id="f2" class="fm-field"> <x-filemanager-field name="icon_id" label="Иконка" id="f2" value="{{ $data->icon_id }}"></x-filemanager-field> </div>

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
