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
                        <span>Tempo gasto em cada projeto por colaborador</span>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-filtro">
                        <form id="time-users-project" method="POST" action="#">
                            <div class="form-box">
                                <div class="item-filtro">
                                    <label>
                                        <span>Selecione o colaborador:</span>
                                        <select class="form-control " id="colaborador">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
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

                        <canvas id="myChart"></canvas>
                        
                        <script>
                        $( document ).ready(function() {
                            $("#time-users-project").submit(function(e){
                                    e.preventDefault();

                                    var id = $("#colaborador").val();

                                    $.ajax({
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                                        },
                                        url: '/report/post/time-users-for-project',
                                        type: "POST",
                                        data: {id : id},
                                        dataType:'JSON',
                                        success:function(response){
                                            if(response.error == false){
                                                
                                                console.log(response);

                                                let myChart = document.getElementById('myChart').getContext('2d');


                                                var projectArray = [];
                                                var timeArray    = [];

                                                $.each(response.projects, function(k, v){
                                                    projectArray.push(v.name);
                                                });

                                                $.each(response.times, function (k,v){
                                                    timeArray.push(v);
                                                });


                                                var stringUser = response.user+' Horas Trabalhadas nos Projetos';
                                                // var myChart = $("#myChart");

                                                let massPopChart = new Chart(myChart, {
                                                        type:'bar', // bar, horizontalBar, pie, line , doughnut, radar, polarArea
                                                        data:{
                                                            labels:projectArray,
                                                            datasets:[{
                                                                label:stringUser,
                                                                backgroundColor:'#45da7d',
                                                                data:timeArray,
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

                            function getOnlyHours(param){
                               var time = param.split(":");

                               var newTime = moment().hour(time[0]);

                               return newTime.format("HH");
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection