<div class="alert alert-success text-right">Total Rating and Reviews <span
        class="badge badge-warning">{{ $length }}</span></div>
@foreach($comments as $comment)
<div class="row pb-3">
    <div class="col-lg-1  col-md-1 col-2"><i class="fas fa-user-circle c-pink heading-2"></i></div>
    <div class="col-lg-11 col-md-11 col-10">
        <div class="border-radius-99 alert-gray p-2 px-3">
            <div class="name font-weight-bolder">{{ $comment->name }}</div>
            <div class="comment text-justify">{{ $comment->comment }}</div>
            <div class="rating text-right">
                @for($i=0 ; $i<$comment->rating; $i++)
                    <i class="fas fa-star text-warning"></i>
                    @endfor
            </div>
        </div>
        <div class="time"><small>{{ $comment->created_at->format('j F Y') }} -
                {{ $comment->created_at->diffForHumans() }}</small></div>
        @if($comment->reply != 'NULL')
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-1 col-2 pr-0"><i class="fas fa-user-circle heading-2 c-pink"></i></div>
                    <div class="col-lg-9 col-md-11 col-10">
                        <div class="border-radius-99 alert-gray p-2 px-3">
                            <div class="name font-weight-bolder">Halal Ghor</div>
                            <div class="reply text-justify">{{ $comment->reply }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif
    </div>
</div>
@endforeach
