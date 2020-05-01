<div class="alert alert-success text-right">Total Comments <span class="badge badge-warning">{{ $length }}</span></div>
@foreach($comments as $comment)
<div class="row pb-3">
    <div class="col-lg-1"><i class="fas fa-user-circle heading-2"></i></div>
    <div class="col-lg-11">
        <div class="border-radius-99 alert-gray p-2 px-3">
            <div class="name font-weight-bolder">{{ $comment->name }}</div>
            <div class="comment text-justify">{{ $comment->comment }}</div>
            <div class="rating text-right">
                @for($i=0 ; $i<$comment->rating; $i++)
                    <i class="fas fa-star text-warning"></i>
                @endfor
            </div>
        </div>
        <div class="time"><small>{{ $comment->created_at->format('j F Y') }} - {{ $comment->created_at->diffForHumans() }}</small></div>
    </div>
</div>
@endforeach