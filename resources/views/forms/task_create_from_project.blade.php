<div class="col-md-12">	
	<div class="list-content">
		<div class="table-responsive">
			<div class="panel-body">
				<form class="form-horizontal" method="POST" action="{{ route('tasks_store') }}">
					
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
						<input type="text" name="name" class="form-control" placeholder="Digite aqui o nome da sua tarefa" value="{{ old('name') }}" required autofocus>
					</div>
					<div class="form-group">
						<label for="description">Descricao</label>
						<textarea  placeholder="Descreva o que precisa ser feito" cols="10" rows="5" name="description" class="form-control"> {{ old('description') }}</textarea>
					</div>
					
					<div class="form-content-50">
						<div class="form-group">
							<label for="estimate_date">Data Estimada</label>
							<input type="text" name="estimate_date" class="form-control datepicker" placeholder="Selecione a data estimada para finalização da tarefa" data-date-format="dd/mm/yyyy" value="{{ old('estimate_date') }}" required>
						</div>
						
						<div class="form-group">
							<label for="estimate_time">Tempo Estimado</label>
							<input type="text" name="estimate_time" class="form-control timepicker" placeholder="Digite o tempo estimado que será necessário para finalização da tarefa" value="{{ old('estimate_time') }}" required>
						</div>
					</div>
					<div class="form-content-50">
						<div class="form-group">
							<label for="begin_date">Data Inicio</label>
							<input type="text" name="begin_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" placeholder="Digite a data de Inicio da tarefa" value="{{ old('begin_date') }}" required>
						</div>
						<div class="form-group">
							<label for="final_date">Data Final</label>
							<input type="text" name="final_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" placeholder="Digite a data Final de entrega da tarefa" value="{{ old('final_date')}}" required>
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