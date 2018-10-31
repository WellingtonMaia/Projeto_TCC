@extends('layouts.ample')
@section('content')
<div class="user-content1sw" id="page-wrapper">
   <div class="container-fluid">
      <div class="row bg-title">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Profile page</h4> </div>
         <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
            <ol class="breadcrumb">
               <li><a href="{{ route('home') }}">Dashboard</a></li>
               <li class="active"> Pessoas/Usuarios</li>
            </ol>
         </div>
      </div>
      <div class="col-md-12">
         <div class="white-box">
            <div class="list-content">
               {{-- <h4 class="title-add">Pessoas/Usuarios</h4> --}}
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Nome</th>
                           <th>E-mail</th>
                           <th>Profissão</th>
                           <th>Status</th>
                           <th>Permissão</th>
                           <th>Ações</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                        <tr>
                           <td> <a href="{{ url('users/show-info/'.$user->id) }}">{{ $user->name }}</a></td>
                           <td>{{ $user->email }}</td>
                           <td>{{ $user->role }}</td>
                           <td>@if( $user->status == "A")Ativo @else Inativo @endif</td>
                           <td>@if( $user->permission == "A")Administrador @else Colaborador @endif</td>
                           <td><a class="btn btn-info" href=" {{ url('users/show/'.$user->id) }}"><i class="fa fa-edit"></i></a>
                           <a class="btn btn-danger" href="{{ url('users/delete/'.$user->id) }}"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                     @endforeach
                     <tbody>
                     </table>
                     <a class="btn btn-success" href="{{ route('users_create')}}"> Criar novo</a>
                  </div>
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