@extends('layouts.structure')
@section('content')

<div class="list-content">
	<div class="table-responsive task-content">		
		  <div class="col-md-12">
          <div class="card">
              <div class="list-content">
                <div class="block-title">
                  <h2>{{ $project->name }}</h2><span> - Nome do Cliente : {{ $project->client_name }}</span>
                </div>

                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#info">Informações</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tarefas">Tarefas</a>
                  </li>                  
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade" id="tarefas">
                      <div class="list-tasks">                        
                      {{--   @if(!$project->tasks)
                        @else
                          <div>
                            Esse projeto ainda não possui nenhuma tarefa
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                          </div>
                        @endif --}}
                        @foreach ($project->tasks as $task)
                            <div class="iten-task">
                              <div class="item"> 
                                    <label>
                                      <input type="checkbox" name="completed" data-id="{{ $task->id }}" data-status="{{ $task->status }}" class="task-completed" @if($task->status == "C") checked="checked" @endif>
                                      <span class="check-bottom"></span> 
                                    </label>
                                    <a href="{{ url('projects/tasks/show-info/'.$task->id) }}">
                                      
                                        <span class="task-users">
                                          @foreach($task->users as $user)
                                           <span title="{{ $user->name }}">{{ $user->name }}</span> 
                                          @endforeach
                                        </span>
                                      
                                      <h3 title="{{ $task->name }}">{{ $task->name }}</h3>
                                      <div class="hidden">{{ $task->description }}</div>
                                      {{-- <div class="dates">{{  \Carbon\Carbon::parse($task->estimate_date)->format(' l F Y') }}</div> --}}
                                      <div class="dates begin">(Inicio: {{  \Carbon\Carbon::parse($task->begin_date)->format(' l F Y') }}</div>
                                      <div class="dates final">Vence: {{  \Carbon\Carbon::parse($task->final_date)->format(' l F Y') }})</div>
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
                  <div class="tab-pane fade  active show" id="info">
                    <div class="info-project">
                       <span class="date-created"><i class="fa fa-calendar"></i> Data de Criação : {{  \Carbon\Carbon::parse($project->created_at)->format(' l F Y') }}</span>


                       <span class="date-estimated"><i class="fa fa-calendar"></i> Data Estimada para entrega do Projeto : {{ $project->estimate_date }}</span>
                       <span class="time"><i class="fa fa-o-clock"></i> Tempo Estimado de Conclusão do Projeto : {{ $project->estimate_time }}</span>
                       <span class="price"><i class="fa fa-dollar-sign"></i> Preço do Projeto : {{ $project->project_price }}</span>

                       <span class="addto"> <a href="">Adicionar Projeto no Financeiro</a></span>

                       <div class="project-users">
                          @foreach($project->users as $user)
                            <div class="item">
                                <span class="name">Nome: {{ $user->name }}</span>
                                <span class="status">Status : @if($user->status == "A") Ativo @else Inativo @endif</span>
                                <span class="role">Cargo : {{ $user->role }}</span>
                            </div>
                          @endforeach

                       </div>

                    </div>
                  </div>  
                </div>
{{-- 
                <p>{{ $project->estimate_date }}</p>
                <p>{{ $project->estimate_time }}</p>
                <p>{{ $project->project_price }}</p> --}}



                </div>                                    
              </div>
              <div class="container-login100-form-btn buttonAdd">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <a href="{{ url('tasks/createFromProject/'.$project->id) }}" class="login100-form-btn">
                                + Adicionar nova tarefa
                            </a>
                        </div>
                    </div>
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