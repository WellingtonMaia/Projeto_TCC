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
                           <th>Descricao</th>
                           <th>Data estimada</th>
                           <th>Tempo estimado</th>
                           <th>Status</th>
                           <th>Data inicio</th>
                           <th>Data final</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                           <td> <a href="{{ url('projects/tasks/show-info/'.$task->id) }}">{{ $task->name }}</a></td>
                           <td>{{ $task->description }}</td>
                           <td>{{ \Carbon\Carbon::parse($task->estimate_date)->format('d/m/Y') }}</td>
                           <td>{{ $task->estimate_time }}</td>
                           <td>@if( $task->status == "A")Ativo @else Inativo @endif</td>
                           <td>{{ \Carbon\Carbon::parse($task->begin_date)->format('d/m/Y') }}</td>
                           <td>{{ \Carbon\Carbon::parse($task->final_date)->format('d/m/Y') }}</td>
                           <td>
                              <a class="btn btn-info" href="{{ url('tasks/show/'.$task->id) }}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                        <tbody>
                        </table>
                     </div>
                     <a class="btn btn-success" href="{{ route('tasks_create')}}"> Criar novo</a>
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