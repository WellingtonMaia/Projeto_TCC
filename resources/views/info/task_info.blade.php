@extends('layouts.ample')
@section('content')
<div id="page-wrapper" class="task">
   <div class="container-fluid">
      <div class="row bg-title">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Profile page</h4> </div>
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
               </div>
            </div>
         </div>
         <div class="white-box">
            <div class="box-content">
               <h2>Tempo</h2>
               <a href="" class="btn btn-info time" >adicionar novo tempo</a>
               <div class="popup time">
                  <div class="conteudo">
                     <form action="" method="POST">
                        <label>
                           Tempo 
                           <input type="text" name="time" class="timepicker form-control" placeholder="tempo">  
                        </label>
                        <label>
                           Data inicial
                        <input type="text" name="begin_date" class="datepicker form-control" placeholder="data inicial">
                        </label>
                        <label>
                           Data Final
                           <input type="text" name="final_date" class="datepicker form-control" placeholder="data final">
                        </label>
                     </form>
                  </div>
               </div>

               @foreach ($task->times as $time)
               <div class="iten-task">
                  <label>
                     <h3>{{ $time->time_value }}</h3>
                     <div>{{ $task->description }}</div>
                     <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                  </label>
               </div>
               @endforeach
            </div>
         </div>   
         <div class="white-box">
            <div class="box-content">
               <h2>Arquivos</h2>
               <a href="" class="btn btn-info file">adicionar novo arquivo</a>
               <div class="popup file">
                   
               </div>
               @foreach ($task->files as $file)
               <div class="iten-task">
                  <label>
                     {{-- <h3>{{ $file->time_value }}</h3> --}}
                     <div>{{ $task->description }}</div>
                     <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                  </label>
               </div>
               @endforeach
            </div>
         </div>
         <div class="white-box">
            <div class="box-content">
               <h2>Notes</h2>
               <a href="" class="btn btn-info note">adicionar nova notação</a>
               <div class="popup note">
                   
               </div>
               @foreach ($task->notes as $note)
               <div class="iten-task">
                  <label>
                     {{-- <h3>{{ $file->time_value }}</h3> --}}
                     <div>{{ $task->description }}</div>
                     <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                  </label>
               </div>
               @endforeach
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