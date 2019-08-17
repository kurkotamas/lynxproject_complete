<!-- CREATE TERM MODAL -->
<div class="modal" id="allTermModal" aria-hidden="true" style="display: none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terms And Conditions</h5>
                <button class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                @if($term)
                <h3>{{$term->name}}</h3>
                <small><p class="font-italic text-secondary pl-1">{{$term->published_at}}</p></small>
                <p class="lead pl-3">{{$term->content}}</p>
                @else
                    <p>No Terms</p>
                @endif
            </div>
        </div>
    </div>
</div>