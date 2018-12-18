@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Projetos</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div class="icon-dash project">
                                <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{ asset('img/sprite.svg'.'#dash-projects') }}"></use></svg>
                            </div>

                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{ $nproject }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Tarefas</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div class="icon-dash task">
                                <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{ asset('img/sprite.svg'.'#dash-tasks') }}"></use></svg>
                            </div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{ $ntask }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Usuarios</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div class="icon-dash user">
                                <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{ asset('img/sprite.svg'.'#dash-users') }}"></use></svg>
                            </div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{ $nuser }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Tempo Registrado</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div class="icon-dash time">
                                <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="{{ asset('img/sprite.svg'.'#dash-times') }}"></use></svg>
                            </div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-danger"></i> <span class="text-danger">{{ $ntime }}</span></li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
    <div class="container-fluid">

        {{-- {{ dd($projectsArray) }} --}}

        <input type="hidden" name="" id="auth-id" value="{{ Auth::user()->id }}">
        
        <div class="white-box">            
            <canvas id="myChart"></canvas>
        </div>
    

        <script type="text/javascript">


            $( document ).ready(function() {
             var id = $("#auth-id").val();

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

                        // $(".no-results-report").remove();
                        // $("#myChart").removeClass('hid');
                        
                        console.log(response);

                        let myChart = document.getElementById('myChart').getContext('2d');


                        var userName = "{{ $userG }}"

                        var projectArray = [];
                        var timesArray   = [];

                        $.each(response.projects, function(k, v){
                            projectArray.push(v.name);
                        });

                        $.each(response.times, function (k,v){
                             timesArray.push(getOnlyHours(v.time));
                        });


                        var stringUser = userName+' - Horas Trabalhadas no Projeto';
                        // var myChart = $("#myChart");
                        if(myChart instanceof Chart){
                            myChart.destroy();
                        }

                        let massPopChart = new Chart(myChart, {
                                type:'bar', // bar, horizontalBar, pie, line , doughnut, radar, polarArea
                                data:{
                                    labels:projectArray,
                                    datasets:[{
                                        label:stringUser,
                                        backgroundColor:'#41b3f9',
                                        data:timesArray,
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
      function getOnlyHours(param){
           var time = param.split(":");

           var newTime = moment().hour(time[0]);

           return newTime.format("HH");
        }
        </script>

    </div>
<footer class="footer text-center"> 2018 &copy; Easytools</footer>
</div>
@endsection