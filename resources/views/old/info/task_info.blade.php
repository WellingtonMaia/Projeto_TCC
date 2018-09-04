@extends('layouts.structure')
@section('content')

<div class="list-content">
	<div class="table-responsive task-content">		
		  <div class="col-md-12">
          <div class="card">
              <div class="list-content">
                <h2>{{ $task->name }}</h2>
{{-- 
                <p>{{ $tasks->estimate_date }}</p>
                <p>{{ $tasks->estimate_time }}</p>
                <p>{{ $tasks->tasks_price }}</p> --}}


                <div class="list-tasks">
                  <h2>Tempo</h2>
                    <a href="">adicionar novo tempo</a>
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
                <div class="list-tasks">
                    <h2>Arquivos</h2>
                    <a href="">adicionar novo arquivo</a>
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

                <div class="list-tasks">
                    <h2>Notes</h2>
                    <a href="">adicionar nova notação</a>

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