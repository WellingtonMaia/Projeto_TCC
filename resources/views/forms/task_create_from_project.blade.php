{{-- @extends('layouts.ample')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Profile page</h4> </div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Dashboard</a></li>
					<li class="active"> Criar Tarefa</li>
				</ol>
			</div>
		</div> --}}
		<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<script src="{{ asset('css/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
				<link rel="icon shortcut" type="image/gif" href="{{ asset('img/favicon.svg') }}">
				<link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
				<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
				<link href="{{ asset('css/style.css') }}"  rel="stylesheet" >
				<link href="{{ asset('css/jquery.fancybox.min.css') }}"  rel="stylesheet" >
				<link href="{{ asset('css/animate.css') }}"  rel="stylesheet" >
				<link href="{{ asset('css/spinners.css') }}"  rel="stylesheet" >
				<link href="{{ asset('css/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
				<link href="{{ asset('css/plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
				<link href="{{ asset('css/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
				<link href="{{ asset('css/plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
				<link href="{{ asset('css/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')
					}} " rel="stylesheet">
					<script src="{{ asset('css/plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
					<title>Easy Tools</title>
					{{-- <link href="css/colors/blue.css" id="theme" rel="stylesheet"> --}}
					
				</head>
				<body class="fix-header">
					<div class="col-md-12">
						<div class="white-box">
							<div class="list-content">
								<div class="table-responsive">
									<div class="panel-body">
										<form class="form-horizontal" method="POST" @if(isset($task)) action="{{ url('/tasks/edit/'.$task->id) }}" @else action="{{ route('tasks_store') }}" @endif ">
											@if(isset($task))<input name="_method" type="hidden" value="PUT">@endif
											{{ csrf_field() }}
											<input type="hidden" name="status" value="I">
											<div class="form-group">
												<label for="project_id">Projeto</label>
												<select name="project" id="project" class="form-control" required>
													<option value="{{ $project->id }}">{{ $project->name }}</option>
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
												<input type="text" name="name" class="form-control" placeholder="Digite aqui o nome da sua tarefa" value="{{ old('name')? old('name') : isset($task) ? $task->name : "" }}" required autofocus>
											</div>
											<div class="form-group">
												<label for="description">Descricao</label>
												<textarea  placeholder="Descreva o que precisa ser feito" cols="10" rows="5" name="description" class="form-control"> {{ old('description')? old('description') : isset($task) ? $task->description : "" }}</textarea>
											</div>
											
											<div class="form-content-50">
												<div class="form-group">
													<label for="estimate_date">Data Estimada</label>
													<input type="text" name="estimate_date" class="form-control datepicker" placeholder="Selecione a data estimada para finalização da tarefa" data-date-format="dd/mm/yyyy" value="{{ old('estimate_date')? old('estimate_date') : isset($task) ? \Carbon\Carbon::parse($task->estimate_date)->format('d/m/Y') : "" }}" required>
												</div>
												
												<div class="form-group">
													<label for="estimate_time">Tempo Estimado</label>
													<input type="text" name="estimate_time" class="form-control timepicker" placeholder="Digite o tempo estimado que será necessário para finalização da tarefa" value="{{ old('estimate_time')? old('estimate_time') : isset($task) ? $task->estimate_time : "" }}" required>
												</div>
											</div>
											<div class="form-content-50">
												<div class="form-group">
													<label for="begin_date">Data Inicio</label>
													<input type="text" name="begin_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" placeholder="Digite a data de Inicio da tarefa" value="{{ old('begin_date')? old('begin_date') : isset($task) ?  \Carbon\Carbon::parse($task->begin_date)->format('d/m/Y') : "" }}" required>
												</div>
												<div class="form-group">
													<label for="final_date">Data Final</label>
													<input type="text" name="final_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" placeholder="Digite a data Final de entrega da tarefa" value="{{ old('final_date')? old('final_date') : isset($task) ? \Carbon\Carbon::parse($task->final_date)->format('d/m/Y') : "" }}" required>
												</div>
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
					<!-- Bootstrap Core JavaScript -->
					<script src="{{ asset('js/bootstrap.min.js') }}"></script>
					<!-- Menu Plugin JavaScript -->
					<script src="{{ asset('css/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
					<!--slimscroll JavaScript -->
					<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
					<!--Wave Effects -->
					<script src="{{ asset('js/waves.js') }}"></script>
					<!--Counter js -->
					<script src="{{ asset('css/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
					<script src="{{ asset('css/plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
					<!-- chartist chart -->
					
					<script src="{{ asset('css/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
					<!-- Sparkline chart JavaScript -->
					<script src="{{ asset('css/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
					<!-- Custom Theme JavaScript -->
					<script src="{{ asset('js/custom.min.js') }}"></script>
					<script src="{{ asset('js/dashboard1.js') }}"></script>
					<script src="{{ asset('css/plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
					
					{{-- <script src="{{ asset('js/jquery.min.js') }}"></script>  --}}
					<script src="{{ asset('js/index.js') }}"></script>
					<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
					<script src="{{ asset('js/jquery.mask.js') }}"></script>
					<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
				</body>
				{{--
			</div>
		</div> --}}
		{{-- @endsection --}}