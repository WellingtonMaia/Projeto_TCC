@extends('layouts.structure')
@section('content')

<div class="list-content">
	<div class="table-responsive task-content">		
		  <div class="col-md-12">
          <div class="card">
              <div class="list-content">
                <h2>{{ $project->name }}</h2>

                <div class="list-tasks">
                    @foreach ($project->tasks as $task)

                        <div class="iten-task">                        
                          <input type="checkbox" name="completed">
                          <span class="check-bottom"></span>
                          <h3>{{ $task->name }}</h3>
                          <div class="hidden">
                            {{ $task->description }}
                          </div>
                          {{ $task->estimate_date }}
                          {{ $task->status }}
                          {{ $task->estimate_time }}
                          {{ $task->begin_date }}
                          {{ $task->final_date }}
                          <a class="btn btn-info" href="{{ url('tasks/show/'.$task->id) }}"><i class="fa fa-edit"></i></a>
                          <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a> 
                        </div>
                    @endforeach
                </div>
                </div>                    
                 {{--  <div class="table-responsive">
                    <h4 class="title-add">Tarefas</h4>
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Nome</th>
                              <th>Descricao</th>
                              <th>Data estimada</th>
                              <th>Tempo estimado</th>
                              <th>Status</th>
                              <th>Data inicio</th>
                              <th>Data final</th>
                              <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($project->tasks as $task)
                          <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->estimate_date }}</td>
                            <td>{{ $task->estimate_time }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->begin_date }}</td>
                            <td>{{ $task->final_date }}</td>                           
                            <td>
                              <a class="btn btn-info" href="{{ url('tasks/show/'.$task->id) }}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        <tbody>
                    </table>                    
                </div>
                <a class="btn btn-success" href="{{ url('tasks/create/'.$project->id) }}"> Criar novo</a>            --}}     
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