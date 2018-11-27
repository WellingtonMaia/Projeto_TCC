@extends('layouts.ample')
@section('content')
<div id="page-wrapper" class="task">
   <div class="container-fluid">
      <div class="row bg-title">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Tarefa - {{ $task->name }}</h4> </div>
         <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
            <ol class="breadcrumb">
               <li><a href="{{ route('home') }}">Dashboard</a></li>
               <li><a href="">Projeto</a></li>
               <li class="active"> {{ $task->name }}</li>
            </ol>
         </div>
      </div>
      <div class="col-md-12">
         <div class="card content-task">
            <div class="white-box">
               <div class="block-title"><h2>{{ $task->name }}</h2></div>
               <div class="info-task">
                  <span>Data estimada: {{ \Carbon\Carbon::parse($task->estimate_date)->format('d/m/Y') }}</span>
                  <span>Inicio: {{ \Carbon\Carbon::parse($task->begin_date)->format('d/m/Y') }}</span>
                  <span>Vence: {{ \Carbon\Carbon::parse($task->final_date)->format('d/m/Y') }}</span>
                  {{-- <span>Tempo Estimado: {{ $task->estimate_time }} horas </span> --}}
                  <span>Tempo Estimado: {{ \Carbon\Carbon::parse($task->estimate_time)->format('H:i') }} horas </span>
                  <span>Valor Referente ao tempo gasto na tarefa: {{ $task->tasks_price }}</span>
                  <div class="descricao-tarefa">
                     {{ $task->description }}
                  </div>
               </div>
            </div>
         </div>
         <div class="white-box">
            <div class="box-content">
               <div class="topo-box">
                  <h2><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> Tempo</h2>
                  <div class="buttons">
                     <a href="" class="start-time btn btn-success"><i class="fa fa-play fa-fw" aria-hidden="true"></i>Iniciar tempo</a>
                     <a href="" class="btn btn-info time" ><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Adicionar Tempo</a>
                  </div>
               </div>
                  <div class="popup time">
                     <div class="conteudo">
                        <div class="header-conteudo">Adicionando Tempo</div>
                        <form action="{{ url('task/addTime/') }}" id="addTime" method="POST">                           
                           <input type="hidden" name="time_id" id="time_id" value="">
                           <input type="hidden" name="users_id" id="time_users_id" value="{{ Auth::user()->id }}">
                           <input type="hidden" name="task_id" id="time_task_id" value="{{ $task->id }}">
                           <div class="box-tempo">
                              <label>
                                 Quem
                                 <input type="text" name="author" disabled class="form-control" value="{{ Auth::user()->name}}" style="background: url(' {{ url("storage/users/".Auth::user()->image) }}'); background-repeat: no-repeat; background-size: 20px; background-position: 100% 50%;">
                              </label>
                              <label>
                                 Data
                                 <input type="text" autocomplete="off" name="begin_date" id="time_begin_date" class="datepicker form-control" placeholder="10/15/2018">
                              </label>
                              <label>
                                 Hora início 
                                 <input type="text" autocomplete="off" name="time_start" id="time_start" class="timepicker form-control" placeholder="15:20">  
                              </label>
                              <label>
                                 Hora final
                                 <input type="text" autocomplete="off" name="time_stop" id="time_stop" class="timepicker form-control" placeholder="15:30">
                              </label>
                              <label>
                                 Tempo Registrado
                                 <input type="text" autocomplete="off" class="timepicker form-control" name="time" id="time_value" placeholder="01:30">
                              </label>
                              
                           </div>
                           <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                     </div>
                  </div>
               
               @if(count($task->times) < 1)
                  <div class="iten-task">
                     <label class="no-registers-time">
                        <span>Não existem tempos registrados nessa tarefa</span>
                     </label>
                  </div> 
                  <div class="time-registers"></div>
               @else               
                  <div class="iten-task header-task">  
                     <label class="task-time">
                        <span>Quem</span>
                        <span>Data</span>
                        <span>Hora inicio</span>
                        <span>Hora final</span>
                        <span>Tempo</span>
                        <span>Ações</span>
                     </label>
                  </div>
                  <div class="time-registers">
                     @foreach ($task->times as $time)
                     <div class="iten-task time">
                           <div class="usr">
                              <div class="img" title="{{ Helper::getObjectUser($time->users_id)->name }}">
                                 <img src="{{ Helper::getImageUser($time->users_id) }}">
                              </div>
                              <label>{{ Helper::getFirstNameWithObject($time->users_id) }}</label>
                           </div>
                           <span class="date-time">{{ \Carbon\Carbon::parse($time->date)->format('d/m/Y') }}</span>
                           <span class="timepicker start">{{ $time->time_start }}</span>                        
                           <span class="timepicker stop">{{ $time->time_stop }}</span>                        
                           <span class="timepicker value">{{ $time->time_value }}</span>
                           <div class="block-a">
                              @if($time->users_id == Auth::user()->id)
                                 <a class="btn btn-info editTime" href="" data-id="{{ $time->id }}"><i class="fa fa-edit"></i></a>
                                 <a class="btn btn-danger removeTime" href="" data-id="{{ $time->id }}" ><i class="fa fa-trash"></i></a>
                              @endif
                           </div>
                     </div>
                     @endforeach
                  </div>
               @endif

               
            </div>
         </div>   
         <div class="white-box">
            <div class="box-content">
               <div class="topo-box">
                  <h2><i class="fa fa-file-o fa-fw" aria-hidden="true"></i> Arquivos</h2>
                  <div class="buttons">
                     <a href="" class="btn btn-info file"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>Adicionar Novo arquivo</a>   
                  </div>
                  
               </div>
               <div class="popup file">
                  <div class="conteudo">
                     <div class="header-conteudo">Adicionando arquivos</div>
                     <form action="{{ url('task/addFile') }}" id="addFile" method="post">
                        <input type="hidden" name="users_id" id="users_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="task_id" id="task_id" value="{{ $task->id }}">
                        <div class="form-group">
                           <div class="img">
                              <img src="{{ url("storage/users/".Auth::user()->image) }}">
                           </div>
                           <div class="file-box">
                              <input type="text" name="name" class="form-control" placeholder="Nome do arquivo">
                              <input type="file" id="#file_url" class="form-control" name="file_url">   
                              <span>Arquivos com tamanho máximo de 2mb</span>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                     </form>
                  </div>
               </div>

               @if(count($task->files) < 1)
                  <label class="no-registers-file">
                     <span>Não existem arquivos anexados</span>
                  </label>
                  <div class="file-registers">
                  </div>
               @else
                  <div class="iten-task header-task">  
                     <label class="task-file">
                        <span>Listagem de arquivos</span>
                     </label>
                  </div>
                  <div class="file-registers">
                     @foreach ($task->files as $file)                  
                     <div class="iten-task file">                     
                        <div class="img" title="{{ Helper::getObjectUser($file->users_id)->name }}">
                           <img src="{{ Helper::getImageUser($file->users_id) }}">
                        </div>
                        <div class="content-file">
                           <a class="link" title="Clique aqui para baixar o arquivo" href="{{ url('storage/files/'.$file->file_url) }}" download="{{ $file->name }}" target="_blank">
                              <div class="block-image-file">
                                 <img src="{{ url('storage/icons/'.$file->icon) }}">
                                 <span>{{ $file->name }}</span>
                              </div>
                           </a>
                        </div>
                        <div class="block-a">
                           <a class="btn btn-danger removeFile" href="" data-id="{{ $file->id }}"><i class="fa fa-trash"></i></a>                  
                        </div>
                     </div>
                     @endforeach
                  </div>
               @endif

               
            </div>
         </div>
         <div class="white-box">
            <div class="box-content">
               <div class="topo-box">
                  <h2><i class="fa fa-pencil fa-fw" aria-hidden="true"></i> Notes</h2>
                  <div class="buttons">
                     <a href="" class="btn btn-info note"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>Adicionar Nova notação</a>
                  </div>
               </div>
               <div class="popup note">
                  <div class="conteudo">
                     <div class="header-conteudo">Adicionando anotação</div>
                      <form action="{{ url('task/addNote') }}" id="addNote" method="post">
                           <input type="hidden" name="note_id" id="note_id" value="">
                           <input type="hidden" name="users_id" id="note_users_id" value="{{ Auth::user()->id }}">
                           <input type="hidden" name="task_id" id="note_task_id" value="{{ $task->id }}">
                           <div class="box-note">
                              <div class="img">
                                  <img src="{{ url("storage/users/".Auth::user()->image) }}">
                              </div>
                              <div class="box-textarea">
                                 <textarea name="description" id="note_description" placeholder="Digite sua anotação aqui"></textarea>
                              </div>

                           </div>
                           <button type="submit" class="btn btn-success">Enviar</button>
                      </form>
                   </div>
               </div>
               @if(count($task->notes) < 1)
                  <label class="no-registers-note">
                     <span>Não exitem anotações registradas</span>
                  </label>
                  <div class="note-registers"></div>
               @else
                  <div class="iten-task header-task">  
                     <label>
                        <span>Usuario</span>
                        <span>Descrição</span>
                     </label>
                  </div>
                  <div class="note-registers">
                     @foreach ($task->notes as $note)                  
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
                     @endforeach
                  </div>
               @endif 
               
            </div>
         </div>
         
      {{-- </div>                                     --}}
   </div>
   {{-- <div class="container-login100-form-btn buttonAdd">
      <div class="wrap-login100-form-btn">
         <div class="login100-form-bgbtn"></div>
         <button class="login100-form-btn">
         + Adicionar nova tarefa
         </button>
      </div>
   </div> --}}
</div>

@if( \Session::has("message") )
<div class="alert alert-success">
   <span> {{ \Session::get("message") }}</span>
</div>
@endif
{{-- <div class="list-tasks">
   tarefas do projeto
   
</div> --}}
</div>
</div>
@endsection