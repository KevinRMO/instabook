@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-container">
         <div class="pagination-links">
            @if ($paginator->onFirstPage())
                <span class="pagination-button disabled">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-button">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pagination-link disabled">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagination-link active">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="pagination-link">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-button">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="pagination-button disabled">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
