@extends('layouts.structure')
@section('content')

	<div class="project-content">
		<div class="container-fluid">

			<div class="col-md-12">
                <div class="card">
                    <div class="block-icon">
                        
                    </div>
                    <div class="list-content">
                        <h4 class="title-add">Adicionar Novo Projeto</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
										<th>Nome</th>
										<th>Data Estimada</th>
										<th>Tempo Estimado</th>
										<th>Status</th>
										<th>Preco do Projeto</th>
										<th>Tipo de Projeto</th>
										<th>Actions</th>
                                    </tr>
                                </thead>
                              	<tbody>
                              		@foreach ($projects as $project)
                              		<tr>
                              			<td>{{ $project->name }}</td>
                              			<td>{{ $project->estimate_date }}</td>
                              			<td>{{ $project->estimate_time }}</td>
                              			<td>{{ $project->status }}</td>
                              			<td>{{ $project->project_price }}</td>
                              			<td>{{ $project->project_type }}</td>
                              			<td><a class="btn btn-info" href="">Editar</a> <a class="btn btn-danger" href="">Excluir</a></td>
                              		</tr>
                              		@endforeach
                                <tbody>
                            </table>
                            
                        </div>
                        <a class="btn btn-success" href="{{ route('projects_create')}}"> Criar novo</a>
                    </div>
                </div>
            </div>

		</div>
	</div>

@endsection