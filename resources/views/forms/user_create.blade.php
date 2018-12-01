@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">@if(isset($user))Editar usuário @else Novo usuário @endif</h4></div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				{{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Dashboard</a></li>
					<li class="active"> Criar Usuario</li>
				</ol>
			</div>
		</div>
		<div class="col-md-12">
			<div class="white-box">
				<div class="list-content">
					<div class="table-responsive">
						<div class="panel-body">
							@if(isset($user))
								<form class="form-horizontal" method="POST"  action="{{ route('users_edit') }}" enctype="multipart/form-data">
									<input name="id_user" type="hidden" value="{{$user->id}}">
							@else
								<form class="form-horizontal" method="POST" action="{{ route('users_store') }}" enctype="multipart/form-data">
									<input name="id_user" type="hidden" value="">
							@endif
								{{-- @if(isset($user))<input name="_method" type="hidden" value="PUT">@endif --}}
								{{ csrf_field() }}
								<div class="form-group">
									<label for="name">Nome</label>
									<input type="text" name="name" class="form-control"  placeholder="Digite seu nome" value="{{ old('name')? old('name') : isset($user) ? $user->name : "" }}" required autofocus>
								</div>
								<div class="form-group">
									<label for="email">E-mail</label>
									<input type="email" name="email" class="form-control" placeholder="Digite seu email" value="{{ old('email')? old('email') : isset($user) ? $user->email : "" }}" required>
								</div>
								@if(!isset($user))
								<div class="form-group">
									<label for="password">Senha</label>
									<input type="password" name="password" class="form-control" placeholder="Digite uma senha de no mínimo 6 caracteres" value="{{ old('password')? old('password') : isset($user) ? $user->password : "" }}" required>
								</div>
								@endif
								<div class="form-group">
									<label for="role">Cargo</label>
									<select class="form-control" name="role" required>
										<option value="">Selecione sua profissão</option>
										<option @if( old('role') == 'Gerente de Projetos') selected @endif @if(isset($user) && $user->role == 'Gerente de Projetos') selected @endif value="Gerente de Projetos">Gerente de Projetos</option>
										<option @if( old('role') == 'Programador') selected @endif @if(isset($user) && $user->role == 'Programador') selected @endif  value="Programador">Programador</option>
										<option  @if( old('role') == 'Líder de Desenvolvimento') selected @endif @if(isset($user) && $user->role == 'Líder de Desenvolvimento') selected @endif value="Líder de Desenvolvimento">Líder de Desenvolvimento</option>
										<option @if( old('role') == 'Administrador') selected @endif @if(isset($user) && $user->role == 'Administrador') selected @endif value="Administrador">Administrador</option>
									</select>
									{{-- <input type="text" placeholder="Digite o nome da sua profissão" name="role" class="form-control" value="{{ old('role')? old('role') : isset($user) ? $user->role : "" }}" required> --}}
								</div>
								<div class="form-group">
									<label for="role">Imagem de Perfil</label>
									<input type="file" name="image" class="form-control" value="" >
								</div>
								<div class="form-content-50">
									<div class="form-group">
										<label for="status">Status</label>
										<select class="form-control" name="status" id="status" >
											<option value="">Selecione um status</option>
											<option @if( old('status') == 'A') selected @endif  @if(isset($user) && $user->status == 'A') selected @endif value="A">Ativo</option>
											<option @if( old('status') == 'I') selected @endif  @if(isset($user) && $user->status == 'I') selected @endif value="I">Inativo</option>
										</select>
									</div>
									<div class="form-group">
										<label for="permission">Permissao</label>
										<select class="form-control" name="permission" id="permission" >
											<option value="">Selecione uma opção</option>
											<option @if( old('permission') == 'A') selected @endif  @if(isset($user) && $user->permission == 'A') selected @endif value="A">Administrativo</option>
											<option @if( old('permission') == 'C') selected @endif  @if(isset($user) && $user->permission == 'C') selected @endif value="C">Colaborador</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="payment_by_hours">Valor Recebido por Hora</label>
									<input type="text" name="payment_by_hours" id="payment_by_hours" class="form-control" value="{{ old('payment_by_hours')? old('payment_by_hours') : isset($user) ? $user->payment_by_hours : "" }}" placeholder="30.00">
								</div>
								<div class="form-group">
									<label for="celular">Numero de Celular</label>
									<input type="text" name="celular" class="form-control celular" id="celular" value="{{ old('celular')? old('celular') : isset($user) ? $user->celular : "" }}" placeholder="(18) 99656-5566">
								</div>
								<div class="form-group">
									<label for="info">Formação Academica</label>
									<textarea id="info" name="info" rows="5" class="form-control">{{ old('info')? old('info') : isset($user) ? $user->info : "" }}</textarea>
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