@extends('layouts.structure')
@section('content')

<div class="list-content">
	<div class="table-responsive task-content">		
		  <div class="col-md-12">
          <div class="card">
              <div class="list-content">
                <h2>Meu Perfil</h2>
                
                

                <div class="my-profile">
                	<p>{{ $user->name }}</p>
                	<p>{{ $user->email }}</p>
	                <p>{{ $user->role }}</p>
	                <p>{{ $user->status }}</p>
	                <p>{{ $user->permission }}</p>	
                </div>
{{-- 
                <p>{{ $project->estimate_date }}</p>
                <p>{{ $project->estimate_time }}</p>
                <p>{{ $project->project_price }}</p> --}}


{{--                 <div class="list-tasks">
                    @foreach ($user->tasks as $task)

                        <div class="iten-task">
                          <div class="item"> 
                                <label>
                                  <input type="checkbox" name="completed">
                                  <span class="check-bottom"></span>
                                </label>
                                <a href="{{ url('projects/tasks/show-info/'.$task->id) }}">
                                  <span class="task-users">Matheus B.</span>
                                  <h3>{{ $task->name }}</h3>
                                  <div class="hidden">{{ $task->description }}</div>
                                  <div class="dates begin">(Inicio: {{  \Carbon\Carbon::parse($task->begin_date)->format(' l F Y') }}</div>
                                  <div class="dates final">Vence: {{  \Carbon\Carbon::parse($task->final_date)->format(' l F Y') }})</div>
                                </a>
                                <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a> 

                          </div>                        
                        </div>
                    @endforeach
                </div> --}}
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