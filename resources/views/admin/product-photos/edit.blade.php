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
                            <li class="breadcrumb-item"><a href="{{ route('admin.products.edit', ['id' => $product->id]) }}">{{$product->name}}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.product-photos.index', ['product_id' => $product->id]) }}">Галерея</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Изменить</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <form action="{{ route('admin.product-photos.update', ['product_id' => $product->id, 'id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body">

                            <div id="f1" class="fm-field"> <x-filemanager-field name="file_id" label="Фото" id="f1" value="{{ $data->file_id }}"></x-filemanager-field> </div>

                            <!------ sort ------>
                            <div class="form-group mb-0">
                                <label>Сортировка</label>
                                <input type="text"
                                       name="sort"
                                       class="form-control"
                                       value="{{ old('sort') ?? $data->sort }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>

            </div>
        </form>
    </div>
@endsection
