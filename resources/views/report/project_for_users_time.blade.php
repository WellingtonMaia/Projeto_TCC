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
            <div class="card">
                <div class="white-box">
                    <div class="block-title">
                        <h2>Relatórios</h2>
                    </div>
                </div>
                <div class="white-box">
                  <div class="content-filtro form-group">
                        <form id="project-users-time" method="POST" action="#">
                            <div class="form-box">
                                <div class="item-filtro">
                                    <label>
                                        <span>Selecione o projeto:</span>
                                        <select class="form-control ">
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>    
{{--                            <div class="item-filtro">
                                    <label>
                                        <span>Até:</span>
                                        <input type="text" name="date_final" class="form-control datepicker" placeholder="11/09/2018">
                                    </label>
                                </div> --}}
                                <button class="btn btn-success">Gerar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-result">
                        <div id="project-users-time"></div>
                        {{-- <div class="ct-chart ct-golden-section" id="chart2"></div> --}}
                        <script>
                        $( document ).ready(function() {
                            // Initialize a Line chart in the container with the ID chart1
                            new Chartist.Line('#chart1', {
                            labels: [1, 2, 3, 4],
                            series: [[100, 120, 180, 200]]
                            });
                            // Initialize a Line chart in the container with the ID chart2
                            new Chartist.Bar('#chart2', {
                            labels: [1, 2, 3, 4],
                            series: [[5, 2, 8, 3]]
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection