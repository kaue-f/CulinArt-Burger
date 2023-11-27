@if ($paginator->hasPages())

    <nav class="flex items-center justify-between my-5 mx-2">

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">

            <div>

                <p class="text-sm text-white leading-5">

                    {!! __('Mostrando') !!}

                    <span class="font-semibold">{{ $paginator->firstItem() }}</span>

                    {!! __('á') !!}

                    <span class="font-semibold">{{ $paginator->lastItem() }}</span>

                    {!! __('de') !!}

                    <span class="font-semibold">{{ $paginator->total() }}</span>

                    {!! __('resultados') !!}

                </p>

            </div>

            <div class="join">

                @if ($paginator->onFirstPage())
                    <a
                        class="join-item text-base btn bg-[#d2d0d3] dark:btn-disabled text-primary font-semibold border-[#d2d0d3]">«</a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="join-item text-base btn btn-secondary btn-outline">«</a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <a class="join-item btn btn-disabled text-white bg-base-2">...</a>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <a
                                    class="join-item text-white text-base font-semibold btn btn-secondary ">{{ $page }}</a>
                            @else
                                <a href="{{ $url }}"
                                    class="join-item text-base btn btn-secondary btn-outline">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="join-item text-base btn btn-secondary btn-outline">»</a>
                @else
                    <a
                        class="join-item text-base btn bg-[#d2d0d3] dark:btn-disabled text-primary font-semibold border-[#d2d0d3]">»</a>
                @endif

            </div>
        </div>
    </nav>
@endif
