@extends('layouts.structure')
@section('content')
	<div class="task-content">
		<div class="container-fluid">
			<div class="col-md-12">
				<div class="card">
					<div class="block-icon">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M498.791,161.127c-17.545-17.546-46.094-17.545-63.645,0.004c-5.398,5.403-39.863,39.896-45.128,45.166V87.426    c0-12.02-4.681-23.32-13.181-31.819L334.412,13.18C325.913,4.68,314.612,0,302.592,0H45.018c-24.813,0-45,20.187-45,45v422    c0,24.813,20.187,45,45,45h300c24.813,0,45-20.187,45-45V333.631L498.79,224.767C516.377,207.181,516.381,178.715,498.791,161.127    z M300.019,30c2.834,0,8.295-0.491,13.18,4.393l42.426,42.427c4.76,4.761,4.394,9.978,4.394,13.18h-60V30z M360.018,467    c0,8.271-6.728,15-15,15h-300c-8.271,0-15-6.729-15-15V45c0-8.271,6.729-15,15-15h225v75c0,8.284,6.716,15,15,15h75v116.323    c0,0-44.254,44.292-44.256,44.293l-21.203,21.204c-1.646,1.646-2.888,3.654-3.624,5.863l-21.214,63.64    c-1.797,5.39-0.394,11.333,3.624,15.35c4.023,4.023,9.968,5.419,15.35,3.624l63.64-21.213c2.209-0.736,4.217-1.977,5.863-3.624    l1.82-1.82V467z M326.378,312.427l21.213,21.213l-8.103,8.103l-31.819,10.606l10.606-31.82L326.378,312.427z M368.8,312.422    l-21.213-21.213c11.296-11.305,61.465-61.517,72.105-72.166l21.213,21.213L368.8,312.422z M477.573,203.558l-15.463,15.476    l-21.213-21.213l15.468-15.481c5.852-5.849,15.366-5.848,21.214,0C483.426,188.19,483.457,197.673,477.573,203.558z"></path>
							<path d="M285.018,150h-210c-8.284,0-15,6.716-15,15s6.716,15,15,15h210c8.284,0,15-6.716,15-15S293.302,150,285.018,150z"></path>
							<path d="M225.018,210h-150c-8.284,0-15,6.716-15,15s6.716,15,15,15h150c8.284,0,15-6.716,15-15S233.302,210,225.018,210z"></path>
							<path d="M225.018,270h-150c-8.284,0-15,6.716-15,15s6.716,15,15,15h150c8.284,0,15-6.716,15-15S233.302,270,225.018,270z"></path>
							<path d="M225.018,330h-150c-8.284,0-15,6.716-15,15s6.716,15,15,15h150c8.284,0,15-6.716,15-15S233.302,330,225.018,330z"></path>
							<path d="M285.018,422h-90c-8.284,0-15,6.716-15,15s6.716,15,15,15h90c8.284,0,15-6.716,15-15S293.302,422,285.018,422z"></path>
						</svg>
					</div>
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