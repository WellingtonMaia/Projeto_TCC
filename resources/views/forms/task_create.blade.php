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
					<li class="active"> Criar Tarefa</li>
				</ol>
			</div>
		</div>
		<div class="col-md-12">
			<div class="white-box">
				<div class="list-content">
					<div class="table-responsive">
						<div class="panel-body">
							<form class="form-horizontal" method="POST" @if(isset($task)) action="{{ url('/tasks/edit/'.$task->id) }}" @else action="{{ route('tasks_store') }}" @endif ">
								@if(isset($task))<input name="_method" type="hidden" value="PUT">@endif
								{{ csrf_field() }}
								<div class="form-group">
									<label for="project_id">Projeto</label>
									<select name="project" id="project" class="form-control" required>
										<option value="">Selecione um projeto</option>
										@foreach($projects as $project)
										<option value="{{ $project->id }}">{{ $project->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="name">Usuarios</label>
									<select multiple name="users[]" id="usersProject" class="form-control">
										@foreach($users as $user)
										<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label for="name">Nome</label>
									<input type="text" name="name" class="form-control" value="{{ old('name')? old('name') : isset($task) ? $task->name : "" }}" required autofocus>
								</div>
								<div class="form-group">
									<label for="description">Descricao</label>
									<textarea name="description" class="form-control"> {{ old('description')? old('description') : isset($task) ? $task->description : "" }}</textarea>
								</div>
								
								<div class="form-group">
									<label for="estimate_date">Data Estimada</label>
									<input type="text" name="estimate_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="{{ old('estimate_date')? old('estimate_date') : isset($task) ? \Carbon\Carbon::parse($task->estimate_date)->format('d/m/Y') : "" }}" required>
								</div>
								
								<div class="form-group">
									<label for="estimate_time">Tempo Estimado</label>
									<input type="text" name="estimate_time" class="form-control timepicker" value="{{ old('estimate_time')? old('estimate_time') : isset($task) ? $task->estimate_time : "" }}" required>
								</div>
								
								<div class="form-group">
									<label for="status">Status</label>
									<select class="form-control" name="status" id="status" required>
										<option @if( old('status') == 'A') selected @endif @if(isset($task) && $task->status == 'A') selected @endif value="A">Ativo</option>
										<option @if( old('status') == 'I') selected @endif @if(isset($task) && $task->status == 'I') selected @endif value="I">Inativo</option>
									</select>
								</div>
								<div class="form-group">
									<label for="begin_date">Data Inicio</label>
									<input type="text" name="begin_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="{{ old('begin_date')? old('begin_date') : isset($task) ?  \Carbon\Carbon::parse($task->begin_date)->format('d/m/Y') : "" }}" required>
								</div>
								<div class="form-group">
									<label for="final_date">Data Final</label>
									<input type="text" name="final_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="{{ old('final_date')? old('final_date') : isset($task) ? \Carbon\Carbon::parse($task->final_date)->format('d/m/Y') : "" }}" required>
								</div>
								<div class="form-group">
									<div class="">
										<button type="submit" class="btn btn-success">
										Salvar
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endsection