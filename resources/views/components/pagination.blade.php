<div class="row">
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="scroll-horizontal-datatable_paginate">
            <ul class="pagination pagination-rounded">
                @if ($items->onFirstPage())
                    <li class="paginate_button page-item previous disabled"><a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                @else
                    <li class="paginate_button page-item previous"><a href="{{ $items->previousPageUrl() }}" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                @endif

                @foreach ($items->links()->elements as $element)
                    @if (is_string($element))
                        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $items->currentPage())
                                <li class="paginate_button page-item active"><a href="#" class="page-link">{{ $page }}</a></li>
                            @else
                                <li class="paginate_button page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($items->hasMorePages())
                    <li class="paginate_button page-item next"><a href="{{ $items->nextPageUrl() }}" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                @else
                    <li class="paginate_button page-item next disabled"><a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
