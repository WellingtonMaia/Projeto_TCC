@extends('layouts.structure')
@section('content')

	 <div class="financial-content">
    <div class="container-fluid">
      <div class="col-md-12">
          <div class="card">
              <div class="block-icon">
                    
              </div>
              <div class="list-content">
                  <h4 class="title-add">Adicionar Novo</h4>
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($financials as $financial)
                          <tr>
                            <td>{{  }}</td>
                            <td>{{  }}</td>
                            <td>{{  }}</td>
                            <td>{{  }}</td>
                            <td>{{  }}</td>
                            <td>{{  }}</td>
                            <td><a class="btn btn-info" href="">Editar</a></td>
                            <td><a class="btn btn-danger" href="">Excluir</a></td>
                          </tr>
                          @endforeach
                        <tbody>
                    </table>
                    <a class="btn btn-success" href="{{ route('')}}"> Criar novo</a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>


@endsection