@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tempo gasto em um projeto</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
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
                        <span> - Tempo gasto total em um projeto</span>
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
                                <button class="btn btn-success">Gerar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-result">

                        <div class="no-results-report">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve"><path d="M416.004,32c-0.001,0-0.003,0-0.004,0H312V8c0.001-4.417-3.579-7.999-7.996-8c-0.001,0-0.003,0-0.004,0H176    c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v24H64c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v432    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h352c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V40    C424.001,35.583,420.421,32.001,416.004,32z M184,16h112v48H184V16z M408,464H72V48h96v24c-0.001,4.417,3.579,7.999,7.996,8    c0.001,0,0.003,0,0.004,0h128c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V48h96V464z"></path><rect x="88" y="368" width="176" height="16"></rect>   <rect x="280" y="368" width="112" height="16"></rect><rect x="88" y="400" width="304" height="16"></rect><rect x="88" y="432" width="128" height="16"></rect><rect x="232" y="432" width="160" height="16"></rect>
                                <path d="M144.004,232c-0.001,0-0.003,0-0.004,0H96c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v104    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V240    C152.001,235.583,148.421,232.001,144.004,232z M136,336h-32v-88h32V336z"></path>
                                <path d="M224.004,200c-0.001,0-0.003,0-0.004,0h-48c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v136    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V208    C232.001,203.583,228.421,200.001,224.004,200z M216,336h-32V216h32V336z"></path>
                                <path d="M304.004,168c-0.001,0-0.003,0-0.004,0h-48c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v168    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V176    C312.001,171.583,308.421,168.001,304.004,168z M296,336h-32V184h32V336z"></path>
                                <path d="M384.004,136c-0.001,0-0.003,0-0.004,0h-48c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v200    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V144    C392.001,139.583,388.421,136.001,384.004,136z M376,336h-32V152h32V336z"></path>
                                <path d="M382.43,80.156l-80,16c-1.024,0.205-1.998,0.609-2.867,1.188L229.578,144H160c-1.499,0-2.968,0.422-4.238,1.219l-64,40    l8.477,13.563L162.293,160H232c1.579-0.001,3.123-0.468,4.438-1.344l70.684-47.125l78.449-15.688L382.43,80.156z"></path>
                             </svg>
                             <span>Selecione o projeto e clique no botão gerar para visualizar o relatório</span>
                        </div>
                        <canvas id="myChart" class="hid"></canvas>

                        <script type="text/javascript">
                            // var massPopChart = '';
                        $(document).ready(function (){                          

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


                                                $(".no-results-report").remove();
                                                $("#myChart").removeClass('hid');
                                                
                                                console.log(response);

                                                var myChart = document.getElementById('myChart').getContext('2d');

                                                // var myChart = $("#myChart");
                                                var usersArray = [];
                                                var timesArray = [];
                                                $.each(response.users, function (k, v){
                                                    usersArray.push(v.name);
                                                });

                                                $.each(response.times, function(k, v){
                                                    timesArray.push(getOnlyHours(v.time));
                                                });

                                                console.log(timesArray);

                                                if(massPopChart instanceof Chart){
                                                    massPopChart.destroy();
                                                    console.log("destroy");
                                                }

                                               var massPopChart = new Chart(myChart, {
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

                                if(param == null){
                                    param = "00:00:00";
                                    console.log(param);
                                }
                                console.log(param);
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