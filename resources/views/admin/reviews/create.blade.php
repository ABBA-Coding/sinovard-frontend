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
                            <li class="breadcrumb-item"><a href="{{ route('admin.reviews.index') }}">Отзывы</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Создать</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <form action="{{ route('admin.reviews.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">

                    @include('admin.parts.nav-lang-link')

                    <div class="card">
                        <div class="card-body">
                            <!------ name ------>
                            <div class="form-group">
                                <label>Имя</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name') ?? '' }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ company_name ------>
                            <div class="form-group">
                                <label>Компания</label>
                                <input type="text"
                                       name="company_name"
                                       class="form-control"
                                       value="{{ old('company_name') ?? '' }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ comment ------>
                            <div class="form-group mb-0">
                                <label>Отзыв</label>
                                <textarea class="form-control" title=""
                                          name="comment">{!! old('comment') ?? '' !!}</textarea>
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

                            <div id="f1" class="fm-field">
                                <x-filemanager-field name="file_id" label="Фото" id="f1"></x-filemanager-field>
                            </div>

                            <div class="form-group">
                                <label>Сортировка</label>
                                <input type="text"
                                       class="form-control"
                                       name="sort"
                                       autocomplete="off"
                                       value="{{ old('sort') ?? '' }}">
                            </div>

                            <!------ status ------>
                            <div class="form-group form-check mb-0 ">
                                <input type="hidden" name="status" value="off">
                                <input type="checkbox" class="form-check-input" id="statusLabel" name="status" checked>
                                <label class="form-check-label" for="statusLabel">Статус</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
