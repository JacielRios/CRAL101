@foreach($comments as $comment)
	@include('comments.item_2', ['comment' => $comment])
@endforeach