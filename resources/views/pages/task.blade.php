@extends('layouts.ample')
@section('content')

	<div class="task-content">
		<div class="container-fluid">

      <div class="col-md-12">
          <div class="card">
              <div class="block-icon">
                    <svg viewBox="0 0 485 485">
                      <path d="M483.8,46.25H181.6c-0.6,0-1.2,0.5-1.2,1.2v28.3c0,0.6,0.5,1.2,1.2,1.2h302.2c0.6,0,1.2-0.5,1.2-1.2v-28.3    C485,46.75,484.5,46.25,483.8,46.25z"></path>
                      <circle cx="71.5" cy="253.35" r="37.9"></circle>
                      <circle cx="71.5" cy="419.55" r="38.1"></circle>
                      <path d="M181.6,128.15h142.8c0.6,0,1.2-0.5,1.2-1.2v-28.3c0-0.6-0.5-1.2-1.2-1.2H181.6c-0.6,0-1.2,0.5-1.2,1.2v28.3    C180.5,127.65,181,128.15,181.6,128.15z"></path>
                      <path d="M483.8,212.45H181.6c-0.6,0-1.2,0.5-1.2,1.2v28.3c0,0.6,0.5,1.2,1.2,1.2h302.2c0.6,0,1.2-0.5,1.2-1.2v-28.3    C485,212.95,484.5,212.45,483.8,212.45z"></path>
                      <path d="M181.6,294.35h142.8c0.6,0,1.2-0.5,1.2-1.2v-28.3c0-0.6-0.5-1.2-1.2-1.2H181.6c-0.6,0-1.2,0.5-1.2,1.2v28.3    C180.5,293.75,181,294.35,181.6,294.35z"></path>
                      <path d="M483.8,378.55H181.6c-0.6,0-1.2,0.5-1.2,1.2v28.3c0,0.6,0.5,1.2,1.2,1.2h302.2c0.6,0,1.2-0.5,1.2-1.2v-28.3    C485,379.05,484.5,378.55,483.8,378.55z"></path>
                      <path d="M324.4,429.85H181.6c-0.6,0-1.2,0.5-1.2,1.2v28.3c0,0.6,0.5,1.2,1.2,1.2h142.8c0.6,0,1.2-0.5,1.2-1.2v-28.3    C325.6,430.35,325.1,429.85,324.4,429.85z"></path>
                      <polygon points="53.4,86.55 27.3,60.25 0,87.45 26.2,113.65 53.3,140.95 80.5,113.85 143,51.75 115.9,24.45   "></polygon> 
                    </svg>
              </div>
              <div class="list-content">
                  <h4 class="title-add">Tarefas</h4>
                  <div class="table-responsive">
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
                          @foreach ($tasks as $task)
                          <tr>
                            <td> <a href="{{ url('projects/tasks/show-info/'.$task->id) }}">{{ $task->name }}</a></td>
                            <td>{{ $task->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($task->estimate_date)->format('d/m/Y') }}</td>
                            <td>{{ $task->estimate_time }}</td>
                            <td>@if( $task->status == "A")Ativo @else Inativo @endif</td>
                            <td>{{ \Carbon\Carbon::parse($task->begin_date)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($task->final_date)->format('d/m/Y') }}</td>                           
                            <td>
                              <a class="btn btn-info" href="{{ url('tasks/show/'.$task->id) }}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        <tbody>
                    </table>                    
                </div>
                <a class="btn btn-success" href="{{ route('tasks_create')}}"> Criar novo</a>                
              </div>
          </div>
            @if( \Session::has("message") )
              <div class="alert alert-success">
                  <span> {{ \Session::get("message") }}</span>
              </div>
            @endif
        </div>
		</div>
	</div>
@endsection