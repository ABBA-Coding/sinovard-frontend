@foreach($data as $category)
    <li class="dd-item" data-id="{{ $category->id }}">
        <div class="dd-handle" style="position:relative">
            <div>{{$category->name_ru}}</div>
        </div>
        <div class="d-flex btn-icons" style="position:absolute;top:5px;right:0;">
            <div class="mr-1">
                {!! $category->statusUi !!}
            </div>
            <a href="{{ route('admin.brands.edit', ['id' => $category->id]) }}"
               class="label theme-bg text-white f-12 mb-0">Посмотреть
            </a>
            <a  href="{{ route('admin.brands.destroy', ['id' => $category->id]) }}"
                onclick="confirmDelete(event,this.getAttribute('href'))"
                class="label theme-bg2 text-white f-12 mb-0">
                Удалить
            </a>
        </div>
        @if($category->sub->count())
            <ol class="dd-list">
                @include('admin.brands.nestable', ['data' => $category->sub])
            </ol>
        @endif
    </li>
@endforeach
