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
                  <span>Data estimada:{{  \Carbon\Carbon::parse($task->estimate_date)->format(' d - m - Y ') }}</span>
                  <span>Inicio: {{  \Carbon\Carbon::parse($task->begin_date)->format(' d - m - Y ') }}</span>
                  <span>Vence: {{  \Carbon\Carbon::parse($task->final_date)->format(' d - m - Y') }})</span>
                  <span>Tempo Estimado: {{ $task->estimate_time }}</span>
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
                  <h2><i class="fa fa-dashboard fa-fw" aria-hidden="true"></i> Tempo</h2>
                  <div class="buttons">
                     <a href="" class="start-time btn btn-success"><i class="fa fa-play fa-fw" aria-hidden="true"></i>Iniciar tempo</a>
                     <a href="" class="btn btn-info time" ><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Adicionar Tempo</a>
                  </div>
               </div>
                  <div class="popup time">
                     <div class="conteudo">
                        <div class="header-conteudo">Adicionando Tempo</div>
                        <form action="{{ url('task/addTime/'.$task->id) }}" method="POST">                           
                           <input type="hidden" name="users_id" id="time_users_id" value="{{ Auth::user()->id }}">
                           <input type="hidden" name="task_id" id="time_task_id" value="{{ $task->id }}">
                           <div class="box-tempo">
                              <label>
                                 Quem
                                 <input type="text" name="author" class="form-control" value="{{ Auth::user()->name}}"                                  style="background: url(' {{ url("storage/users/".Auth::user()->image) }}'); background-repeat: no-repeat; background-size: 20px; background-position: 100% 50%;">
                              </label>
                              <label>
                                 Data
                                 <input type="text" name="begin_date" id="time_begin_date" class="datepicker form-control" placeholder="10/15/2018">
                              </label>
                              <label>
                                 Hora início 
                                 <input type="text" name="time_start" id="time_start" class="timepicker form-control" placeholder="25:20">  
                              </label>
                              <label>
                                 Hora final
                                 <input type="text" name="time_end" id="time_end" class="timepicker form-control" name="26:10">
                              </label>
                              <label>
                                 Tempo Registrado
                                 <input type="text" class="timepicker form-control" name="time" id="time_value" placeholder="01:30">
                              </label>
                              
                           </div>
                           <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                     </div>
                  </div>
               
               @if(count($task->times) < 1)
                  <div class="iten-task">
                     <label>
                        <span>Não existem tempos registrados nessa tarefa</span>
                     </label>
                  </div> 
               @else               
                  <div class="iten-task header-task">  
                     <label>
                        <span>Quem</span>
                        <span>Data</span>
                        <span>Hora inicio</span>
                        <span>Hora final</span>
                        <span>Tempo</span>
                     </label>
                  </div>
                  @foreach ($task->times as $time)
                  <div class="iten-task">
                     <label>
                        <div class="img">
                           <img src="{{ Helper::getImageUser($time->users_id) }}">
                        </div>
                        <span>{{  \Carbon\Carbon::parse($time->begin_date)->format(' d - m - Y ') }}</span>
                        <span>{{ $time->time_start }}</span>                        
                        <span>{{ $time->time_final }}</span>                        
                        <span>{{ $time->time_value }}</span>
                        <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                     </label>
                  </div>
                  @endforeach
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
                     <form action="" method="post">
                        <input type="hidden" name="users_id" id="file_users_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="task_id" id="file_task_id" value="{{ $task->id }}">
                        <div class="form-group">
                           <div class="img">
                              <img src="{{ url("storage/users/".Auth::user()->image) }}">
                           </div>
                           <input type="file" id="#file_url" class="form-control" name="file">   
                           <span>Arquivos com tamanho máximo de 2mb</span>
                        </div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                     </form>
                  </div>
               </div>

               @if(count($task->files) < 1)
                  <label>
                     <span>Não existem arquivos anexados</span>
                  </label>
               @else
                  <div class="iten-task header-task">  
                     <label>
                        <span>Usuario</span>
                        <span>Arquivo</span>
                     </label>
                  </div>
                  @foreach ($task->files as $file)
                  <div class="iten-task">                     
                     <div class="img">
                        <img src="{{ Helper::getImageUser($file->users_id) }}">
                     </div>
                     <div>{{ $file->file_url }}</div>
                     <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>                  
                  </div>
                  @endforeach
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
                  <label>
                     <span>Não exitem anotações registradas</span>
                  </label>
               @else
                  <div class="iten-task header-task">  
                     <label>
                        <span>Usuario</span>
                        <span>Descrição</span>
                     </label>
                  </div>
                  @foreach ($task->notes as $note)
                  <div class="iten-task">
                     <div class="img">
                        <img src="{{ Helper::getImageUser($note->users_id) }}">
                     </div>
                     <div class="note-desc">{{ $note->description }}</div>
                     <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                  </div>
                  @endforeach
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