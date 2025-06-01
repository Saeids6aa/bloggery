 <div class="col-lg-12">
     <ul class="page-numbers">
         @if ($posts->onFirstPage())
             <li class="disabled">
                 <span><i class="fa fa-angle-double-left"></i></span>
             </li>
         @else
             <li>
                 <a href="{{ $posts->previousPageUrl() }}">
                     <i class="fa fa-angle-double-left"></i>
                 </a>
             </li>
         @endif

         @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
             <li class="{{ $posts->currentPage() == $page ? 'active' : '' }}">
                 <a href="{{ $url }}">{{ $page }}</a>
             </li>
         @endforeach

         @if ($posts->hasMorePages())
             <li>
                 <a href="{{ $posts->nextPageUrl() }}">
                     <i class="fa fa-angle-double-right"></i>
                 </a>
             </li>
         @else
             <li class="disabled">
                 <span><i class="fa fa-angle-double-right"></i></span>
             </li>
         @endif
     </ul>
 </div>
