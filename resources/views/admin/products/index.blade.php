@extends('admin.layout.master')

@section('section')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="page-header-title">
                                </div>
                                <ul class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Продукты</a></li>
                                </ul>
                            </div>
                            <a href="{{ route('admin.products.create') }}" class="btn btn-primary mr-0">Добавить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="main-body">
            <div class="page-wrapper">
                <!-- [ Main Content ] start -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="w-50p">№</th>
                                    <th class="w-80p"></th>
                                    <th>наименование</th>
                                    <th>артикул</th>
                                    <th>цена</th>
                                    <th>кол-во</th>
                                    <th>галерея</th>
                                    <th class="w-100p">топ</th>
                                    <th class="w-100p">статус</th>
                                    <th class="w-200p">действие</th>
                                </tr>
                                <tr>
                                    <th colspan="10">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="searchInput" value="{{ request('_query') }}" placeholder="Поиск">
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="result">
                                @if (count($data) > 0)
                                    @foreach($data as $key => $item)
                                        <tr>
                                            <td>
                                                {{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}
                                            </td>
                                            <td>
                                                <img src="{{ $item->getFile('file', 'small', '/admin-panel/favicon.svg') }}" alt="">
                                            </td>
                                            <td>
                                                {{ $item->translate->name ?? $item->name }}
                                            </td>
                                            <td>
                                                {{ $item->vendor_code }}
                                            </td>
                                            <td>
                                                {{ $item->price }}
                                            </td>
                                            <td>
                                                {{ $item->quantity }}
                                            </td>
                                            <td>
                                                <a class="btn-link" href="{{ route('admin.product-photos.index', ['product_id' => $item->id]) }}">Галерея ({{ count($item->photos) }})</a>
                                            </td>
                                            <td>
                                                {!! $item->topUi !!}
                                            </td>
                                            <td>
                                                {!! $item->statusUi !!}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', ['id' => $item->id]) }}"
                                                   class="label theme-bg text-white f-12 mb-0">Изменить
                                                </a>
                                                <a
                                                    href="{{ route('admin.products.destroy', ['id' => $item->id]) }}"
                                                    onclick="confirmDelete(event,this.getAttribute('href'))"
                                                    class="label theme-bg2 text-white f-12 mb-0">
                                                    Удалить
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Нет данные
                                        </td>
                                    </tr>
                                @endif

                                @if ($data->hasPages())
                                    <tr>
                                        <td colspan="10">{{ $data->appends(request()->query())->links() }}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        // Функция для дебаунса
        function debounce(func, delay) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), delay);
            };
        }

        const result = $("#result");

        // Логика для обработки ввода
        $('body').on(
            'input',
            "#searchInput",
            debounce(function () {
                let query = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: '{{ route('admin.products.index') }}',
                    method: 'GET',
                    data: { _query: query },
                    success: function (data) {
                        result.empty().append(data.products_view);

                        // Обновление URL без перезагрузки страницы
                        let newUrl = new URL(window.location);
                        if (query) {
                            newUrl.searchParams.set('_query', query);
                        } else {
                            newUrl.searchParams.delete('_query');
                        }
                        history.replaceState(null, '', newUrl);
                    },
                });
            }, 600) // задержка в 600 мс
        );
    </script>
@endsection
