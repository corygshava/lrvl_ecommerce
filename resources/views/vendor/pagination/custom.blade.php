@if ($paginator->hasPages())
    <ul class="pages">
        {{-- Previous Page --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a></li>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            {{-- Dots --}}
            @if (is_string($element))
                <li class="disabled"><a href="#">{{ $element }}</a></li>
            @endif

            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
        @else
            <li class="disabled"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
        @endif
    </ul>
@endif
