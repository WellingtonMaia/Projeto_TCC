<div class="iten-task file">                     
    <div class="img" title="{{ Helper::getObjectUser($file->users_id)->name }}">
       <img src="{{ Helper::getImageUser($file->users_id) }} ">
    </div>
    <div class="content-file">
        <a class="link" title="Clique aqui para baixar o arquivo" href="{{ url('storage/files/'.$file->file_url) }}" download="{{ $file->name }}" target="_blank">
            <div class="block-image-file">
                <img src="{{ url('storage/icons/'.$file->icon) }}" >
                <span>{{ $file->name }} </span>
            </div>
        </a>
    </div>
    <div class="block-a">
    	<a class="btn btn-danger removeFile " href="" data-id="{{ $file->id }}"><i class="fa fa-trash"></i></a>                  
    </div>
    <div class="created-at">
          Criado em : {{ \Carbon\Carbon::parse($file->created_at)->format('d/m/Y H:i:s') }}
    </div>
 </div>