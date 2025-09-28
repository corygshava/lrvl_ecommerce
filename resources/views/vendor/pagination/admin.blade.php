@if ($paginator->hasPages())
    <div class="btn-group bs" role="group" aria-label="Pagination">
        {{-- Previous Page --}}
        @if ($paginator->onFirstPage())
            <button type="button" class="btn btn-outline-secondary disabled">
                <i class="mdi mdi-chevron-double-left"></i>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-secondary">
                <i class="mdi mdi-chevron-double-left"></i>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            {{-- Dots --}}
            @if (is_string($element))
                <button type="button" class="btn btn-outline-secondary disabled">{{ $element }}</button>
            @endif

            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <button type="button" class="btn btn-primary">{{ $page }}</button>
                    @else
                        <a href="{{ $url }}" class="btn btn-outline-secondary">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-secondary">
                <i class="mdi mdi-chevron-double-right"></i>
            </a>
        @else
            <button type="button" class="btn btn-outline-secondary disabled">
                <i class="mdi mdi-chevron-double-right"></i>
            </button>
        @endif
    </div>
@endif
