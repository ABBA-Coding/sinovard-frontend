@if ($paginator->hasPages())
    <div class="pagination">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            <li>
                @if ($paginator->onFirstPage())
                    <a href="javascript:void(0)" class="pagination-arrow disabled">
                        <img src="/frontend/images/icon/arrowPrevWhite.svg" alt="" />
                    </a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="pagination-arrow active">
                        <img src="/frontend/images/icon/arrowPrevWhite.svg" alt="" />
                    </a>
                @endif
            </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <a href="javascript:void(0)" class="pagination-link disabled">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                <a href="javascript:void(0)" class="pagination-link active">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="pagination-arrow active">
                        <img src="/frontend/images/icon/arrowNextWhite.svg" alt="" />
                    </a>
                @else
                    <a href="javascript:void(0)" class="pagination-arrow disabled">
                        <img src="/frontend/images/icon/arrowNextWhite.svg" alt="" />
                    </a>
                @endif
            </li>
        </ul>
    </div>
@endif
