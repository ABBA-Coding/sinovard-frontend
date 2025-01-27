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
