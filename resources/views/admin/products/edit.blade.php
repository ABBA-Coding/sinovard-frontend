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
                            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Продукты</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">Изменить</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <form action="{{ route('admin.products.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">

                    @include('admin.parts.nav-lang-link')

                    <div class="card">
                        <div class="card-body">
                            <!------ name ------>
                            <div class="form-group">
                                <label>Наименование</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name') ?? ($data->translate->name ?? $data->name)  }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ description ------>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control min-height-200" title=""
                                          name="description">{!! old('description') ?? @$data->translate->description !!}</textarea>
                            </div>

                            <!------ characteristics ------>
                            <label>Характеристики</label>
                            <table class="table table-bordered">
                                <tbody>
                                @if($data->translate->characteristic)
                                    @foreach($data->translate->characteristics as $i => $characteristic)
                                        <tr>
                                            <td style="vertical-align: top; width: 60px">
                                                {{ $i + 1 }}
                                            </td>
                                            <td style="vertical-align: top">
                                                <div class="form-group mb-0">
                                                    <input class="form-control" type="text" value="{{ $characteristic[0] }}" name="characteristics[{{$i}}][0]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-0">
                                                    <textarea class="form-control" name="characteristics[{{$i}}][1]" style="min-height: 60px">{{ $characteristic[1] }}</textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @for($i=0;$i<10;$i++)
                                        <tr>
                                            <td style="vertical-align: top; width: 60px">
                                                {{ $i + 1 }}
                                            </td>
                                            <td style="vertical-align: top">
                                                <div class="form-group mb-0">
                                                    <input class="form-control" type="text" name="characteristics[{{$i}}][0]">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group mb-0">
                                                    <textarea class="form-control" name="characteristics[{{$i}}][1]" style="min-height: 60px"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    @endfor
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="f1" class="fm-field"> <x-filemanager-field name="file_id" label="Фото" id="f1" value="{{ $data->file_id }}"></x-filemanager-field> </div>

                            <div class="form-group">
                                <a class="btn-link" href="{{ route('admin.product-photos.index', ['product_id' => $data->id]) }}">Галерея ({{ count($data->photos) }})</a>
                            </div>

                            <!------ category ------>
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="category_id" class="select2">
                                    <option value="0">Не выбрано</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>{{ $category->name_ru }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!------ brand ------>
                            <div class="form-group">
                                <label>Бренд</label>
                                <select name="brand_id" class="select2">
                                    <option value="0">Не выбрано</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $brand->id == $data->brand_id ? 'selected' : '' }}>{{ $brand->name_ru }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!------ vendor_code ------>
                            <div class="form-group">
                                <label>Артикул</label>
                                <input type="text"
                                       name="vendor_code"
                                       class="form-control"
                                       value="{{ old('vendor_code') ?? $data->vendor_code }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ price ------>
                            <div class="form-group">
                                <label>Цена</label>
                                <input type="text"
                                       name="price"
                                       class="form-control"
                                       value="{{ old('price') ?? $data->price }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ quantity ------>
                            <div class="form-group">
                                <label>Кол-во</label>
                                <input type="text"
                                       name="quantity"
                                       class="form-control"
                                       value="{{ old('quantity') ?? $data->quantity }}"
                                       autocomplete="off"
                                       title="">
                            </div>

                            <!------ top ------>
                            <div class="form-group form-check">
                                <input type="hidden" name="top" value="off">
                                <input type="checkbox" class="form-check-input" id="topLabel" name="top" {{ $data->top ? 'checked' : '' }}>
                                <label class="form-check-label" for="topLabel">Топ</label>
                            </div>

                            <!------ status ------>
                            <div class="form-group form-check mb-0 mr-20">
                                <input type="hidden" name="status" value="off">
                                <input type="checkbox" class="form-check-input" id="statusLabel" name="status" {{ $data->status ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusLabel">Статус</label>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>

                </div>
            </div>
        </form>
    </div>
@endsection
