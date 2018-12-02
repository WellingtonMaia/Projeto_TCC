<div class="iten-task note">
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
	<div class="created-at">
       @if($note->updated_at == $note->created_at):
          Criado em: {{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y H:i:s') }}
       @else
          Atualizado em: {{ \Carbon\Carbon::parse($note->updated_at)->format('d/m/Y H:i:s') }}
       @endif
    </div>
</div>