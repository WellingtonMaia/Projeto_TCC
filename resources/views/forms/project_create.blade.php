@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Página de Projetos</h4></div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				{{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Dashboard</a></li>
					<li class="active"> Criar Projeto</li>
				</ol>
			</div>
		</div>
		<div class="col-md-12">
			<div class="white-box">
				<div class="list-content">
					<div class="table-responsive">
						<div class="panel-body">
							<form class="form-horizontal"  method="POST" @if(isset($project)) action="{{ url('/projects/edit/'.$project->id) }}" @else action="{{ route('projects_store') }}" @endif >
								@if(isset($project))<input name="_method" type="hidden" value="PUT">@endif
								{{ csrf_field() }}
								<div class="form-group">
									<label for="name">Nome</label>
									<input type="text" name="name" class="form-control" value="{{ old('name')? old('name') : isset($project) ? $project->name : "" }}" required autofocus>
								</div>
								<div class="form-group">
									<label for="client_name">Nome do Cliente</label>
									<input type="text" name="client_name" class="form-control" value="{{ old('client_name')? old('client_name') : isset($project) ? $project->client_name : "" }}" required autofocus>
								</div>
								<div class="form-content-50">
									<div class="form-group">
										<label for="estimate_date ">Data Estimada de Entrega</label>
										<input type="text" name="estimate_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" value="{{ old('estimate_date')? old('estimate_date') : isset($project) ? $project->estimate_date : "" }}" required>
									</div>
									
									<div class="form-group">
										<label for="estimate_time ">Tempo Estimado de entrega</label>
										<input type="text" name="estimate_time" class="form-control timepicker" value="{{ old('estimate_time')? old('estimate_time') : isset($project) ? $project->estimate_time : "" }}" required>
									</div>
								</div>

								@if(isset($project))
									<div class="form-group">
										<label for="status">Status</label>
										<select class="form-control" name="status" id="status" required>
											<option value="">Selecione um Status</option>
											<option @if($project->status == 'A') selected @endif value="A">Ativo</option>
											<option @if($project->status == 'I') selected @endif value="I">Inativo</option>
										</select>
									</div>
								@endif
								
								<div class="form-group">

									<label for="project_price">Preco do Projeto</label>
									<input type="text" name="project_price" class="form-control" value="{{ old('project_price')? old('project_price') : isset($project) ? $project->project_price : "" }}" required>

								</div>
								
								<div class="form-group">
									<label for="project_type">Tipo de Projeto</label>
									<select class="form-control" name="project_type" id="project_type" required>
										<option value="">Selecione um Tipo</option>
										<option  @if(isset($project->project_type)) {{ $project->project_type == 'I'?'selected':''}} @endif  value="I">Interno</option>
										<option  @if(isset($project->project_type)) {{ $project->project_type == 'E'?'selected':''}} @endif  value="E">Externo</option>
									</select>
								</div>
								<div class="form-group">
									<label for="name">Adicionar usuários no Projeto</label>
									<select multiple name="users[]" class="form-control">
										@foreach($users as $key => $user)												
											@if($user->status == 'A'):
												<option @if(isset($project) && $project->users()->where('user_id',$user->id)->exists()) selected="selected" @endif  value="{{ $user->id }}">{{ $user->name }}</option>
											@endif
										@endforeach
									</select>
									{{-- {{ dd($project->users) }} --}}

									{{-- @foreach($users as $key => $user)
										{{ dd($project->users) }}
										@if($user->status == 'A')
										<div class="users-box">
											<label class="user-project-edit">
												<input type="checkbox" name="users[]" value="{{ $user->id }}" @if(isset($project) && $project->users) {{ ($project->users[$key]->id == $user->id)?"checked":"" }}@endif class="form-control">
												{{ $user->name }}
											</label>
										</div>
										@endif
									@endforeach --}}

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