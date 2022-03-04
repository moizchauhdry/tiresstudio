@if ($paginator->hasPages())
    <nav class="text-center">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                </li>
            @else
                <li>
                    <a class="thisPage" href="javascript:void(0)" onclick="getResults('{{ $paginator->previousPageUrl() }}')" rel="prev" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true"><i class="fa fa-angle-left"></i></span>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a class="thisPage" href="javascript:void(0)" onclick="getResults('{{ $url }}')">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="thisPage" href="javascript:void(0)" onclick="getResults('{{ $paginator->nextPageUrl() }}')" rel="next" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
                </li>
            @endif

        </ul>
    </nav>
@endif
