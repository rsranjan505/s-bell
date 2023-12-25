@if ($paginator->hasPages())
    <nav aria-label="...">
        <ul class="pagination pagination-circle">
        <li class="page-item">
            <a class="page-link" href="{{$paginator->previousPageUrl()}}">Previous</a>
        </li>
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $link)
            <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : ''}} " aria-current="page">

                <a class="page-link" href="{{$link}}">{{$page}}</a>
            </li>

        @endforeach

        <li class="page-item">
            <a class="page-link" href="{{$paginator->nextPageUrl()}}">Next</a>
        </li>
        </ul>
    </nav>
@endif
