@if (isset($item))
<div class="modal fade" id="viewImage_{{$item->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card mb-4">
                @if ($item->image !=null)
                <img class="card-img-top" src="{{$item->image->url}}" height="400px" alt="Card image cap" />
                @else
                <img class="card-img-top" src="http://anirachemicals.com/admin/assets/images/visit.png" alt="Card image cap" />
                @endif

            </div>
        </div>
        </div>
    </div>
</div>
@endif
