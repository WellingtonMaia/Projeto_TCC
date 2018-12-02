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
                        <h2>Relatório</h2>
                        <span>Tempo gasto total em um projeto</span>
                    </div>
                </div>
                <div class="white-box">
                  <div class="content-filtro form-group">
                        <form id="project-users-time" method="POST" action="#">
                            <div class="form-box">
                                <div class="item-filtro">
                                    <label>
                                        <span>Selecione o projeto:</span>
                                        <select class="form-control " id="project_id">
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
                        {{-- <div id="project-users-time"></div> --}}
                        <canvas id="myChart"></canvas>
                        {{-- <div class="ct-chart ct-golden-section" id="chart2"></div> --}}

                        <script type="text/javascript">
                        $(document).ready(function (){
                            // let myChartjs = document.getElementById('myChart').getContext('2d');

                            // let massPopChart = new Chart(myChartjs, {
                            //         type:'bar', // bar, horizontalBar, pie, line , doughnut, radar, polarArea
                            //         data:{
                            //             labels:['Matheus', 'Welligton', 'Daiane', 'Marcos', 'Carlos'],
                            //             datasets:[{
                            //                 label:'Horas Trabalhadas',
                            //                 backgroundColor:'#45da7d',
                            //                 data:[
                            //                     '30',
                            //                     '15',
                            //                     '14',
                            //                     '15',
                            //                     '12',

                            //                 ]
                            //             }]
                            //         },
                            //          options: {
                            //             scales: {
                            //                 yAxes:[{
                            //                     ticks:{
                            //                       beginAtZero:true
                            //                     }
                                              
                            //                 }],
                            //             }
                            //         }

                            //     });
                            
                           

                                $("#project-users-time").submit(function(e){
                                    e.preventDefault();

                                    var id = $("#project_id").val();


                                    $.ajax({
                                        headers:{
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
                                        },
                                        url: '/report/post/project-for-users-times',
                                        type: "POST",
                                        data: {id : id},
                                        dataType:'JSON',
                                        success:function(response){
                                            if(response.error == false){
                                                
                                                console.log(response);

                                                let myChart = document.getElementById('myChart').getContext('2d');

                                                // var myChart = $("#myChart");
                                                var usersArray = [];
                                                var timesArray = [];
                                                $.each(response.users, function (k, v){
                                                    usersArray.push(v.name);
                                                });

                                                $.each(response.times, function(k, v){
                                                    timesArray.push(getOnlyHours(v.time));
                                                });


                                                let massPopChart = new Chart(myChart, {
                                                        type:'bar', // bar, horizontalBar, pie, line , doughnut, radar, polarArea
                                                        data:{
                                                            labels:usersArray,
                                                            datasets:[{
                                                                label:'Horas Trabalhadas',
                                                                backgroundColor:'#45da7d',
                                                                data:timesArray,
                                                            }]
                                                        },
                                                         options: {
                                                            scales: {
                                                                yAxes:[{
                                                                    ticks:{
                                                                        beginAtZero:true    
                                                                    }
                                                                    
                                                                }],
                                                                // xAxes: [{
                                                                //     type: 'time',
                                                                //     time: {
                                                                //             unit: 'hour'
                                                                //         }
                                                                // }]
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