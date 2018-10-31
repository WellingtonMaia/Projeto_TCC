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
					<li class="active"> Criar Usuario</li>
				</ol>
			</div>
		</div>
		<div class="col-md-12">
			<div class="white-box">
				<div class="list-content">
					<div class="table-responsive">
						<div class="panel-body">
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<form class="form-horizontal" method="POST" @if(isset($financial)) action="{{ url('/financials/edit/'.$financial->id) }}" @else action="{{ route('financials_store') }}" @endif>
								@if(isset($financial))<input name="_method" type="hidden" value="PUT">@endif
								{{ csrf_field() }}
								<div class="form-group">
									<label for="name">Nome</label>
									<input type="text" name="name" class="form-control" value="{{ old('name')? old('name') : isset($financial) ? $financial->name : "" }}" required autofocus>
								</div>
								<div class="form-group">
									<label for="value">Valor da Conta</label>
									<input type="text" name="value" class="form-control" value="{{ old('value')? old('value') : isset($financial) ? $financial->value : "" }}" required>
								</div>
								<div class="form-group">
									<label for="tags">Tags</label>
									<input type="text" name="tags" class="form-control" value="{{ old('tags')? old('tags') : isset($financial) ? $financial->tags : "" }}" required>
								</div>
								<div class="form-group">
									<label for="financial_classification">Classificacao Financeira</label>
									<input type="text" name="financial_classification" class="form-control" value="{{ old('financial_classification')? old('financial_classification') : isset($financial) ? $financial->financial_classification : "" }}" required>
								</div>
								<div class="form-group">
									<label for="description">Descricao</label>
									<textarea name="description" class="form-control"> {{ old('description')? old('description') : isset($financial) ? $financial->description : "" }} </textarea>
								</div>
								
								<div class="form-group">
									<label for="due_date">Data de Vencimento</label>
									<input type="date" name="due_date" class="form-control" value="{{ old('due_date')? old('due_date') : isset($financial) ? $financial->due_date : "" }}" required autofocus>
								</div>
								
								<div class="form-group">
									<label for="status">Status</label>
									<select class="form-control" name="status" id="status" >
										<option @if( old('status') == 'A') selected @endif @if(isset($financial) && $financial->status == 'A') selected @endif  value="A">Ativo</option>
										<option @if( old('status') == 'I') selected @endif @if(isset($financial) && $financial->status == 'I') selected @endif  value="I">Inativo</option>
									</select>
								</div>
								<div class="form-group">
									<label for="cost_center">Centro de custo</label>
									<input type="text" name="cost_center" class="form-control" value="{{ old('cost_center')? old('cost_center') : isset($financial) ? $financial->cost_center : "" }}">
								</div>
								<div class="form-group">
									<label for="account_type">Tipo de Conta</label>
									<select class="form-control" name="account_type" id="account_type" >
										<option @if( old('account_type') == 'P') selected @endif value="P">Pagar</option>
										<option @if( old('account_type') == 'R') selected @endif value="R">Receber</option>
										<option @if( old('account_type') == 'F') selected @endif value="F">Fixa</option>
									</select>
								</div>
								<div class="form-group">
									<label for=""></label>
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