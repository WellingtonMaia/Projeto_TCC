<div class="iten-task">
	<div class="img" title="{{ Helper::getObjectUser($note->users_id)->name }}">
	   <img src="{{ Helper::getImageUser($note->users_id) }}">
	</div>
	<div class="note-desc">{{ $note->description }}</div>
	<div class="block-a">
	   @if($note->users_id == Auth::user()->id)
	      <a class="btn btn-info editNote" data-id="{{ $note->id }}" href=""><i class="fa fa-edit"></i></a>
	      <a class="btn btn-danger removeNote" href="" data-id="{{ $note->id }}" ><i class="fa fa-trash"></i></a>
	   @endif
	</div>
</div>