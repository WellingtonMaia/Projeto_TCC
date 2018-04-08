@extends('layouts.structure')
@section('content')

	<div class="task-content">
		<div class="container-fluid">
      <div class="col-md-12">
          <div class="card">
              <div class="block-icon">
                    
              </div>
              <div class="list-content">
                  <h4 class="title-add">Adicionar Novo</h4>
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
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->estimated_date }}</td>
                            <td>{{ $task->estimated_time }}</td>
                            <td>{{ $task->status }}</td>
                            <td>{{ $task->begin_date }}</td>
                            <td>{{ $task->final_date }}</td>                           
                            <td>
                              <a class="btn btn-info" href="">Editar</a>
                              <a class="btn btn-danger" href="">Excluir</a>
                            </td>
                          </tr>
                          @endforeach
                        <tbody>
                    </table>
                    <a class="btn btn-success" href="{{ route('tasks_create')}}"> Criar novo</a>
                </div>
              </div>
          </div>
        </div>
		</div>
	</div>

@endsection