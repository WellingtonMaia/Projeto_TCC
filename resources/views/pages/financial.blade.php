@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
   <div class="container-fluid">
      <div class="row bg-title">
         <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
         <h4 class="page-title">Página de Financeiro</h4> </div>
         <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
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
                              <th>#</th>
                              <th>Nome do Projeto</th>
                              <th>Data inicial</th>
                              <th>Data de Vencimento</th>
                              <th>Valor</th>
                              <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($financials as $financial)
                               <tr>
                                  <td>{{ $financial->id }}</td>
                                  <td>{{ $financial->project['name'] }}</td>
                                  <td>{{ \Carbon\Carbon::parse($financial->date_ini)->format('d/m/Y') }}</td>
                                  <td>{{ \Carbon\Carbon::parse($financial->due_date)->format('d/m/Y') }}</td>
                                  <td class="money">{{ $financial->value }}</td>
                                  <td>
                                      <a class="btn btn-info openFinancial" data-id="{{ $financial->id }}" href=""><i class="fa fa-eye"></i></a>
                                  </td>
                                </tr>
                          @endforeach
                        <tbody>
                    </table>
                </div>
              </div>
          </div>
          <div class="financial-box">
              <div class="financial-content">
                  <div class="line">
                      <span class="f-price"><i class="fa fa-money fa-fw text-success" aria-hidden="true"></i> Preço do Projeto: <i class="value-price money alert alert-success">600.000,00</i></span>
                      <span class="f-price"> - Custos Adicionais <i class="addicional-cost money alert alert-danger">800.00</i></span>
                  </div>
                  <div class="users-project line">
                      <span class="item"><i class="fa fa-user fa-fw text-info" aria-hidden="true"></i> <span class="name">Matheus</span> - Pagamento refente a horas : <i class="money alert alert-info"> 3.000,00</i></span>
                      <span class="item"><i class="fa fa-user fa-fw text-info" aria-hidden="true"></i> <span class="name">Wellington</span> - Pagamento refente a horas : <i class="money alert alert-info"> 2.000,00</i></span>
                  </div>
                  <div class="line">
                      <span class="due-date"><i class="fa fa-calendar text-danger"></i> Data de Vencimento: <i class="text-danger due-date-value">{{ \Carbon\Carbon::parse($financial->due_date)->format('d/m/Y') }}</i> </span>
                      <span class="expirate-string alert alert-danger">O Projeto está a 2 meses de ficar atrasado</span>
                  </div>
                  <div class="line alert">
                      <span class="lucro-string"> O lucro atual está sendo de <i class="lucro money">400.000,00</i></span>
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