@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Relatório de Projetos por data</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="active"> Relatório Projeto por data</li>
                </ol>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="white-box">
                    <div class="block-title">
                        <h2>Relatórios</h2><span> - Projetos por data</span>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-filtro form-group">
                        <form {{-- id="date-for-project" --}}  method="POST" action="{{ route('date_for_project') }}">
                            <div class="form-box">
                                <div class="item-filtro">
                                    <label>
                                        <span>De:</span>
                                        <input type="text" class="form-control datepicker" name="date_ini" placeholder="10/08/2018">
                                    </label>
                                </div>    

                                <div class="item-filtro">
                                    <label>
                                        <span>Até:</span>
                                        <input type="text" name="date_final" class="form-control datepicker" placeholder="11/09/2018">
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-success" value="Gerar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-result date-for-project">
                        <div id="date-for-project-result"></div>
                        {{-- <div class="ct-chart ct-golden-section" id="chart1"></div> --}}
                        {{-- <div class="ct-chart ct-golden-section" id="chart2"></div> --}}
                        <script>
                        $( document ).ready(function() {


                            // new Chartist.line
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