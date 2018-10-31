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
               <li class="active"> Financeiro</li>
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
                           <th>Status</th>
                           <th>Data de Vencimento</th>
                           <th>Tipo de Conta</th>
                           <th>Valor</th>
                           <th>Tags</th>
                           <th>Centro de custo</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($financials as $financial)
                        <tr>
                           <td>{{ $financial->name }}</td>
                           <td>{{ $financial->status }}</td>
                           <td>{{ $financial->due_date }}</td>
                           <td>{{ $financial->account_type }}</td>
                           <td>{{ $financial->value }}</td>
                           <td>{{ $financial->tags }}</td>
                           <td>{{ $financial->cost_center }}</td>
                           <td>
                              <a class="btn btn-info" href=" {{ url('financials/show/'.$financial->id) }}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href=" {{ url('financials/delete/'.$financial->id) }}"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                        <tbody>
                        </table>
                        <a class="btn btn-success" href="{{ route('financials_create')}}"> Criar novo</a>
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