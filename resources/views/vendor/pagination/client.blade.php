@if ($paginator->hasPages())
<div class="toolbar-shop toolbar-bottom">
    <div class="page-amount">
        <p>
            {!! __('Hiển thị') !!}
            <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
            {!! __('đến') !!}
            <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
            {!! __('trên') !!}
            <span class="fw-semibold">{{ $paginator->total() }}</span>
            {!! __('kết quả') !!}
        </p>
    </div>
    <div class="pagination">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="previous"><a><i class="fa fa-angle-left"></i> Trước</a></li>
            @else
                <li class="previous"><a id="link-previous" href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left"></i> Trước</a></li>
            @endif
            {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="current"">{{ $page }}</li>
                            @else
                                <li><a id="{{$page}}" class="link-page" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="next"><a id="link-next" href="{{ $paginator->nextPageUrl() }}">Sau <i class="fa fa-angle-right"></i></a></li>
            @else
                <li class="next"><a>Sau <i class="fa fa-angle-right"></i></a></li>
            @endif
        </ul>
    </div>
</div>
@endif