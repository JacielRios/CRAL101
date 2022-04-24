<div class="d-lg-none">
	<form action="{{ route('comments.store', $post) }}" method="POST">
		@csrf
	
		@if (isset($comment->id))
			<input type="hidden" name="parent_id"
				value="{{ $comment->id }}">
		@endif
	
		<input type="hidden" name="user_id"
			value="{{ Auth::user()->id }}">
	
		<textarea class="form-control mt-2" name="body" id="body" rows="3" required></textarea>
		<div class="text-end mt-2">
			<input class="btn " type="submit" value="Comentar"
				id="btn-color">
		</div>
	</form>
</div>
<div class="d-none d-lg-block">
	<form action="{{ route('comments.store', $post) }}" method="POST">
		@csrf
	
		@if (isset($comment->id))
			<input type="hidden" name="parent_id"
				value="{{ $comment->id }}">
		@endif
	
		<input type="hidden" name="user_id"
			value="{{ Auth::user()->id }}">
	
		<textarea class="form-control fs-4 mt-2" name="body" id="body" rows="3" required></textarea>
		<div class="text-end mt-2">
			<input class="btn fs-4" type="submit" value="Comentar"
				id="btn-color">
		</div>
	</form>
</div>
