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
                        <form id="date-for-project" method="POST" action="{{ route('date_for_project') }}">
                            <div class="form-box">
                                <div class="item-filtro">
                                    <label>
                                        <span>De:</span>
                                        <input type="text" class="form-control datepicker" id="date_ini" name="date_ini" placeholder="10/08/2018">
                                    </label>
                                </div>    

                                <div class="item-filtro">
                                    <label>
                                        <span>Até:</span>
                                        <input type="text" name="date_final" id="date_final"  class="form-control datepicker" placeholder="11/09/2018">
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-success" value="Gerar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-result date-for-project">
                        <canvas id="myChart"></canvas>
                        
                        <script>
                        $( document ).ready(function() {
                            $("#date-for-project").submit(function(e){
                                    e.preventDefault();

                                    var date_ini = $("#date_ini").val();
                                    var date_final = $("#date_final").val();

                                    $.ajax({
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                                        },
                                        url: '/report/post/finish-task-user-project',
                                        type: "POST",
                                        data: {date_ini : date_ini,date_final:date_final},
                                        dataType:'JSON',
                                        success:function(response){
                                            if(response.error == false){
                                                
                                                console.log(response);

                                                let myChart = document.getElementById('myChart').getContext('2d');

                                                // var myChart = $("#myChart");

                                                let massPopChart = new Chart(myChart, {
                                                        type:'bar', // bar, horizontalBar, pie, line , doughnut, radar, polarArea
                                                        data:{
                                                            labels:['Matheus', 'Welligton', 'Daiane', 'Marcos', 'Carlos'],
                                                            datasets:[{
                                                                label:'Time',
                                                                backgroundColor:'#45da7d',
                                                                data:[
                                                                    '30:00:00',
                                                                    '15:20:00',
                                                                    '14:20:32',
                                                                    '15:50:00',
                                                                    '12:20:00',

                                                                ]
                                                            }]
                                                        },
                                                         options: {
                                                            scales: {
                                                                yAxes: [{
                                                                    ticks:{
                                                                        beginAtZero:true
                                                                    },
                                                                    // type: 'time',
                                                                    // distribution: 'series'
                                                                }]
                                                            }
                                                        }

                                                    });

                                            }else{
                                                console.log("erro");
                                            }
                                        }
                                    });
                                });
                            });
                        // });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection