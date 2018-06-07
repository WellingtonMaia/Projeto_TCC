@extends('layouts.structure')
@section('content')

<div class="list-content">
	<div class="table-responsive task-content">		
		  <div class="col-md-12">
          <div class="card">
              <div class="list-content">
                <h2>{{ $project->name }}</h2>

                <p>{{ $project->estimate_date }}</p>
                <p>{{ $project->estimate_time }}</p>
                <p>{{ $project->project_price }}</p>


                <div class="list-tasks">
                    @foreach ($project->tasks as $task)

                        <div class="iten-task">
                          <label> 
                                <input type="checkbox" name="completed">
                                <span class="check-bottom"></span>
                                <h3>{{ $task->name }}</h3>
                                <div class="hidden">{{ $task->description }}</div>
                                {{-- <div class="dates">{{  \Carbon\Carbon::parse($task->estimate_date)->format(' l F Y') }}</div> --}}
                                <div class="dates begin">(Inicio: {{  \Carbon\Carbon::parse($task->begin_date)->format(' l F Y') }}</div>
                                <div class="dates final">Vence: {{  \Carbon\Carbon::parse($task->final_date)->format(' l F Y') }})</div>
                                {{-- {{ $task->begin_date }}
                                {{ $task->final_date }} --}}
                                {{-- {{ $task->status }} --}}
                                {{-- <a class="btn btn-info" href="{{ url('tasks/show/'.$task->id) }}"><i class="fa fa-edit"></i></a> --}}
                                <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a> 
                          </label>                        
                        </div>
                    @endforeach
                </div>
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