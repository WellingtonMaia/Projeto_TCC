@extends('layouts.ample')
@section('content')

	 <div class="financial-content">
    <div class="container-fluid">
      <div class="col-md-12">
          <div class="card">

              <div class="block-icon">
                <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{ asset('img/sprite.svg#financeiro') }}"></use></svg>
              </div>
              <div class="list-content">
                  <h4 class="title-add">Financeiro</h4>
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
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