<div class="col-md-12">	
	<div class="list-content">
		<div class="table-responsive">
			<div class="panel-body">
				<form class="form-horizontal" method="POST" id="addTask" action="{{ route('tasks_store') }}">
					
					{{ csrf_field() }}
					<input type="hidden" name="status" value="I">
					<input type="hidden" name="task_id" id="task_id">
					<div class="form-group">
						<label for="">Projeto</label>
						<select name="project" id="project_id" class="form-control" required>
							<option selected value="{{ $project->id }}">{{ $project->name }}</option>
						</select>
						{{-- <input type="text" class="form-control" name="" disable value="{{ $project->name }}"> --}}
						{{-- <input type="hidden" name="project" value="{{ $project->id }}"> --}}
					</div>
					<div class="form-group">
						<label for="name">Usuarios</label>
						<select multiple name="users[]" required id="usersProject" class="form-control">
							@foreach($users as $user)
								<option value="{{ $user->id }}">{{ $user->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" name="name" id="name_task" class="form-control" autocomplete="off" placeholder="Digite aqui o nome da sua tarefa" value="{{ old('name') }}" required autofocus>
					</div>
					<div class="form-group">
						<label for="description">Descricao</label>
						<textarea  placeholder="Descreva o que precisa ser feito" cols="10" id="description" rows="5" name="description" class="form-control"> {{ old('description') }}</textarea>
					</div>
					
					<div class="form-content-50">
						{{-- <div class="form-group">
							<label for="estimate_date">Data Estimada</label>
							<input type="text" name="estimate_date" class="form-control datepicker" id="estimate_date" autocomplete="off" placeholder="Selecione a data estimada para finalização da tarefa" data-date-format="dd/mm/yyyy" value="{{ old('estimate_date') }}" required>
						</div> --}}
						
						<div class="form-group">
							<label for="estimate_time">Tempo Estimado</label>
							<input type="text" name="estimate_time" id="estimate_time" class="form-control timepicker" autocomplete="off" placeholder="Digite o tempo estimado que será necessário para finalização da tarefa" value="{{ old('estimate_time') }}" required>
						</div>
					</div>
					<div class="form-content-50">
						<div class="form-group">
							<label for="begin_date">Data Inicio</label>
							<input type="text" name="begin_date" autocomplete="off" id="begin_date" class="form-control datepicker" data-date-format="dd/mm/yyyy" placeholder="Digite a data de Inicio da tarefa" value="{{ old('begin_date') }}" required>
						</div>
						<div class="form-group">
							<label for="final_date">Data Final Estimada</label>
							<input type="text" name="final_date" id="final_date" class="form-control datepicker" autocomplete="off" data-date-format="dd/mm/yyyy" placeholder="Digite a data Final que deve ser entregue a tarefa" value="{{ old('final_date')}}" required>
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