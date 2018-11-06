@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
   <div class="container-fluid">
      <div class="row bg-title">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Profile page</h4> </div>
         <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
            <ol class="breadcrumb">
               <li><a href="{{ route('home') }}">Dashboard</a></li>
               <li class="active"> Projetos</li>
            </ol>
         </div>
      </div>
      <div class="col-md-12">
         <div class="card">
            <div class="white-box">
               <div class="block-title">
                  <h2>Projeto - {{ $project->name }}</h2><span> - Nome do Cliente : {{ $project->client_name }}</span>
               </div>
            </div>
            
            <div id="myTabContent" class="tab-content">
               <div class="white-box">
                  <div class="" id="info">
                     <div class="info-project">
                        <h3 class="block-title">Informações</h3>
                        <span class="date-created"><i class="fa fa-calendar"></i> Data de Criação : {{  \Carbon\Carbon::parse($project->created_at)->format(' d F Y') }}</span>
                        <span class="date-estimated"><i class="fa fa-calendar"></i> Data Estimada para entrega do Projeto : {{  \Carbon\Carbon::parse($project->estimate_date)->format(' d F Y') }}</span>
                        <span class="time"><i class="fa fa-clock-o"></i> Tempo Estimado de Conclusão do Projeto : {{ $project->estimate_time }}</span>
                        <span class="price"><i class="fa fa-money"></i> Preço do Projeto : R$ {{ $project->project_price }}.00</span>
                        {{-- <span class="addto"> <a href="">Adicionar Projeto no Financeiro</a></span> --}}
                        
                     </div>
                     
                  </div>
               </div>
               <div class="white-box">
                  <div class="project-users">
                     <h3 class="block-title">Usuários nesse Projeto</h3>
                     @foreach($project->users as $user)
                     <div class="item">
                        @if( $user->image )
                        <img src="{{ asset('img'.$user->image)  }}">
                        @endif
                        <span class="name">Nome: {{ $user->name }}</span>
                        <span class="status">Status : @if($user->status == "A") Ativo @else Inativo @endif</span>
                        <span class="role">Cargo : {{ $user->role }}</span>
                        <span class="edit"> Editar meus dados: </span><a class="btn btn-info" href=" {{ url('users/show/'.$user->id) }}"><i class="fa fa-edit"></i></a>
                        <br/>
                     </div>
                     @endforeach
                  </div>
               </div>
               <div class="white-box">
                  <div class="" id="tarefas">
                     <h3 class="block-title">Tarefas</h3>
                     <div class="list-tasks">
                        @if($project->tasks->count() == 0)
                        <span>Projeto sem tarefas cadastradas</span>
                        @endif
                        @foreach ($project->tasks as $task)
                        <div class="iten-task">
                           <div class="item">
                              <label>
                                 <input type="checkbox" name="completed" data-id="{{ $task->id }}" data-status="{{ $task->status }}" class="task-completed" @if($task->status == "C") checked="checked" @endif>
                                 <span class="check-bottom"></span>
                              </label>
                              <a class="link" href="{{ url('projects/tasks/show-info/'.$task->id) }}">
                                 <span class="task-users">
                                    @foreach($task->users as $user)
                                    <span title="{{ $user->name }}">{{ $user->name }}</span>
                                    @endforeach
                                 </span>
                                 <h3 title="{{ $task->name }}">{{ $task->name }}</h3>
                                 <div class="hidden">{{ $task->description }}</div>
                                 {{-- <div class="dates">{{  \Carbon\Carbon::parse($task->estimate_date)->format(' l F Y') }}</div> --}}
                                 <div class="dates begin">(Inicio: {{  \Carbon\Carbon::parse($task->begin_date)->format(' d - m - Y ') }}</div>
                                 <div class="dates final">Vence: {{  \Carbon\Carbon::parse($task->final_date)->format(' d - m - Y') }})</div>
                                 {{-- {{ $task->begin_date }}
                                 {{ $task->final_date }} --}}
                                 {{-- {{ $task->status }} --}}
                                 {{-- <a class="btn btn-info" href="{{ url('tasks/show/'.$task->id) }}"><i class="fa fa-edit"></i></a> --}}
                              </a>
                              <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            {{-- </div> --}}
            {{--
            <p>{{ $project->estimate_date }}</p>
            <p>{{ $project->estimate_time }}</p>
            <p>{{ $project->project_price }}</p> --}}
         </div>
      </div>
      {{-- <a data-fancybox  data-src="http://codepen.io/fancyapps/full/jyEGGG/" href="javascript:;"> --}}
         <div class="container-login100-form-btn buttonAdd">
            <div class="wrap-login100-form-btn">
               <div class="login100-form-bgbtn"></div>
               <a id="open-fancy" class="button-add btn btn-success" href="">
                   + Adicionar nova tarefa
               </a>
               {{-- <a id="open-fancy" href="javascript: void(0);" onclick="window.open('{{ url('tasks/createFromProject/'.$project->id) }}' ,'Compartilhar',' toolbar=0, status=0, width=800, height=600 ,left=' + (document.documentElement.clientWidth - 800) / 2 + ',top=' + (document.documentElement.clientHeight - 600) / 2);" class="button-add btn btn-success">
                  + Adicionar nova tarefa
               </a> --}}
            </div>
         </div>
      </div>
      @if( \Session::has("message") )
      <div class="alert alert-success">
         <span> {{ \Session::get("message") }}</span>
      </div>
      @endif
   </div>
   <div class="task-box">
      <div class="task-content">
            @include("forms.task_create_from_project")
      </div>
   </div>
</div>
@endsection