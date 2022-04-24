<div class="d-lg-none p-2 border-left my-3">
    <div class="row">
        <div class="col-1" id="img-card_bottom">
            @if (Auth::user()->image)
                <img src="../../storage/images_users/{{ Auth::user()->image }}"
                    class="rounded-circle" id="img-user">
            @else
                <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle"
                    id="img-user">
            @endif
        </div>
<div class="col-9 lh-1 ms-4 pe-0">
    <p class="fw-bold m-0 mt-2 ">{{ $comment->user->name }}</p>
    <p class="text-muted ">
        {{ $post->created_at->format('d M Y') }}
    </p>
</div>
    </div>
    <p>{{ $comment->body }}</p>
        <div class="mb-3 mt-1">
            <button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#reply-{{$comment->id}}" aria-expanded="false" aria-controls="reply-{{$comment->id}}">
                Responder
            </button>
        </div>
        <div class="collapse my-3" id="reply-{{$comment->id}}">
            <div class="card card-body">
                  @include('comments.form', ['comment' => $comment])
            </div>
          </div>
        @if ($comment->replies)   
            @include('comments.list', ['comments' => $comment->replies])
        @endif
</div>

<div class="d-none d-lg-block p-4 border-left my-3">
    <div class="row">
        <div class="col-1" id="img-card_bottom">
            @if ($comment->user->image)
                <img src="../../storage/images_users/{{ $comment->user->image }}"
                    class="rounded-circle" id="img-user">
            @else
                <img src="{{ asset('images/user-profile.png') }}" class="rounded-circle"
                    id="img-user">
            @endif
        </div>
<div class="col-6 lh-1 ps-2 pe-0">
    <p class="fw-bold m-0 mt-2 fs-4">{{ $comment->user->name }}</p>
    <p class="text-muted fs-5">
        {{ $post->created_at->format('d M Y') }}
    </p>
</div>
    </div>
    <p>{{ $comment->body }}</p>
        <div class="mb-3 mt-1">
            <button class="btn btn-outline-secondary fs-4" type="button" data-toggle="collapse" data-target="#reply-{{$comment->id}}" aria-expanded="false" aria-controls="reply-{{$comment->id}}">
                Responder
            </button>
        </div>
        <div class="collapse my-3" id="reply-{{$comment->id}}">
            <div class="card card-body">
                  @include('comments.form', ['comment' => $comment])
            </div>
          </div>
          @if ($comment->replies)
        @include('comments.list', ['comments' => $comment->replies])
    @endif
</div>
