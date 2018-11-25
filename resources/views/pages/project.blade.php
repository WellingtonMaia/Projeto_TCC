@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
   <div class="container-fluid">
      <div class="row bg-title">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Página de Projetos</h4> </div>
         <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
            <ol class="breadcrumb">
               <li><a href="{{ route('home') }}">Dashboard</a></li>
               <li class="active"> Projetos</li>
            </ol>
         </div>
      </div>
      <div class="col-md-12">
         <div class="white-box">
            <div class="list-content">
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
                           @can("isAdmin")
                                <th>Actions</th>
                           @endcan
                        </tr>
                     </thead>
                     <tbody>
                            @forelse ($projects as $project)
                            <tr>
                            <td> <a href="{{ url('projects/show-info/'.$project->id) }}">{{ $project->name }}</a></td>
                            <td>{{ \Carbon\Carbon::parse($project->estimate_date)->format('d/m/Y') }}</td>
                            <td class="timepicker">{{ $project->estimate_time }}</td>
                            <td>@if( $project->status == "A")Ativo @else Inativo @endif</td>
                            <td class="money">{{ $project->project_price }}</td>
                            <td>@if( $project->project_type == "I")Interno @else Externo @endif</td>
                            @can("isAdmin")
                                <td>
                                    <a class="btn btn-info" href="{{ url('projects/show/'.$project->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" href="{{ url('projects/delete/'.$project->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            @endcan
                            </tr>
                            @empty
                                <p>No Project</p>
                            @endforelse
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