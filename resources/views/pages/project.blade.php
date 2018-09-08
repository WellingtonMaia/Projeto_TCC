@extends('layouts.ample')
@section('content')

	<div class="project-content">
		<div class="container-fluid">

			<div class="col-md-12">
                <!--<div class="card">
                    <div class="block-icon">
                        <svg viewBox="0 0 628.549 628.549">
            							<path d="M570.272,0H58.284C30.672,0,8.282,22.375,8.282,49.979v349.757c0,27.604,22.39,49.972,50.002,49.972H282.75v128.869     h-37.505c-13.81,0-25.001,11.191-25.001,25.001c0,13.795,11.191,24.971,25.001,24.971H370.25     c13.81,0,25.001-11.184,25.001-24.971c0-13.81-11.191-25.001-25.001-25.001h-37.506V449.708h237.521     c27.62,0,50.003-22.367,50.003-49.972V49.979C620.282,22.375,597.892,0,570.272,0z M559.383,374.019     c0,13.787-11.191,24.979-25.002,24.979H94.898c-13.81,0-25.001-11.199-25.001-24.979V74.21c0-13.794,11.199-24.978,25.001-24.978     h439.491c13.81,0,25.001,11.191,25.001,24.978v299.808H559.383z M480.682,112.433c-16.104,0-29.167,13.055-29.167,29.151     c0,3.555,0.732,6.913,1.895,10.067l-73.365,105.77c-1.449-0.242-2.913-0.445-4.43-0.445c-1.57,0-3.095,0.204-4.589,0.46     l-71.003-88.322c0.377-1.887,0.588-3.833,0.588-5.826c0-16.255-13.191-29.446-29.468-29.446     c-16.27,0-29.468,13.183-29.468,29.446c0,5.229,1.479,10.067,3.871,14.323l-89.447,124.869c-2.06-0.528-4.173-0.891-6.399-0.891     c-14.3,0-25.892,11.584-25.892,25.892c0,14.263,11.591,25.854,25.892,25.854s25.899-11.591,25.899-25.854     c0-3.667-0.785-7.146-2.158-10.309l89.975-125.586c2.476,0.672,5.034,1.155,7.728,1.155c5.614,0,10.807-1.653,15.274-4.377     l66.045,82.157c-2.249,3.917-3.63,8.391-3.63,13.229c0,14.791,11.991,26.767,26.789,26.767c14.791,0,26.79-11.976,26.79-26.767     c0-3.977-0.921-7.72-2.482-11.116l71.758-103.46c2.853,0.928,5.841,1.562,9.003,1.562c16.111,0,29.166-13.063,29.166-29.144     C509.856,125.488,496.793,112.433,480.682,112.433z"></path>
            						</svg>
                    </div>-->
                    <div class="list-content">
                        <h4 class="title-add">Projetos</h4>
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
                              			<td> <a href="{{ url('projects/show-info/'.$project->id) }}">{{ $project->name }}</a></td>
                              			<td>{{ \Carbon\Carbon::parse($project->estimate_date)->format('d/m/Y') }}</td>
                              			<td>{{ $project->estimate_time }}</td>
                                    <td>@if( $project->status == "A")Ativo @else Inativo @endif</td>
                              			<td>{{ $project->project_price }}</td>
                                    <td>@if( $project->project_type == "I")Interno @else Externo @endif</td>
                              			<td>
                              				<a class="btn btn-info" href="{{ url('projects/show/'.$project->id) }}"><i class="fa fa-edit"></i></a> 	
                              				<a class="btn btn-danger" href="{{ url('projects/delete/'.$project->id) }}"><i class="fa fa-trash"></i></a>
                              			</td>
                              		</tr>
                              		@endforeach
                                <tbody>
                            </table>
                            
                        </div>
                        <a class="btn btn-success" href="{{ route('projects_create')}}"> Criar novo</a>
                    </div>
                </div>

                @if( \Session::has("message") )
                  <div class="alert alert-success">
                      <span> {{ \Session::get("message") }}</span>
                  </div>
                @endif
                
            </div>

		</div>
	</div>

@endsection