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
                            <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">F.A.Q</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Создать</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <form action="{{ route('admin.faqs.store') }}" method="post" enctype="multipart/form-data">
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
                                       value="{{ old('title') ?? '' }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ description ------>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" title=""
                                          name="description">{!! old('description') ?? '' !!}</textarea>
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">

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
