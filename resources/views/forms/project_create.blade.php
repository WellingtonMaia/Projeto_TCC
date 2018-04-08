@extends('layouts.structure')
@section('content')
	<div class="project-content">
		<div class="container-fluid">
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('projects_create') }}">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>						
					</div>
				
					<div class="form-group">
						<label for="estimate_date">Data Estimada</label>
						<input type="text" name="estimate_date" class="form-control" value="{{ old('estimate_date') }}" required autofocus>						
					</div>
				
					<div class="form-group">
						<label for="estimate_time">Tempo Estimado</label>
						<input type="text" name="estimate_time" class="form-control" value="{{ old('estimate_time') }}" required autofocus>						
					</div>
				
					<div class="form-group">
						<label for="status">Status</label>		
						<select class="form-group" name="status" id="status" >
							<option @if( old('status') == 'A') selected @endif value="A">Ativo</option>
							<option @if( old('status') == 'I') selected @endif value="I">Inativo</option>
						</select>					
					</div>
				
					<div class="form-group">
						<label for="project_price">Preco do Projeto</label>
						<input type="text" name="project_price" class="form-control" value="{{ old('project_price') }}" required autofocus>						
					</div>
				
					<div class="form-group">
						<label for="project_type">Tipo de Projeto</label>		
						<select class="form-group" name="project_type" id="project_type" >
							<option @if( old('project_type') == 'A') selected @endif value="I">Interno</option>
							<option @if( old('project_type') == 'I') selected @endif value="E">Externo</option>
						</select>					
					</div>


                    <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                Adicionar
                            </button>
                        </div>
                    </div>				
				</form>
			</div>
		</div>
	</div>

@endsection