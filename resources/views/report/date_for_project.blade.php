@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Relatório de Projetos por data</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
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
                                        <input type="text" autocomplete="off" class="form-control datepicker" id="date_ini" name="date_ini" placeholder="10/08/2018">
                                    </label>
                                </div>    

                                <div class="item-filtro">
                                    <label>
                                        <span>Até:</span>
                                        <input type="text" autocomplete="off" name="date_final" id="date_final"  class="form-control datepicker" placeholder="11/09/2018">
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-success" value="Gerar">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-result date-for-project">
                        <div class="no-results-report">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 480 480" style="enable-background:new 0 0 480 480;" xml:space="preserve"><path d="M416.004,32c-0.001,0-0.003,0-0.004,0H312V8c0.001-4.417-3.579-7.999-7.996-8c-0.001,0-0.003,0-0.004,0H176    c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v24H64c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v432    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h352c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V40    C424.001,35.583,420.421,32.001,416.004,32z M184,16h112v48H184V16z M408,464H72V48h96v24c-0.001,4.417,3.579,7.999,7.996,8    c0.001,0,0.003,0,0.004,0h128c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V48h96V464z"></path><rect x="88" y="368" width="176" height="16"></rect>   <rect x="280" y="368" width="112" height="16"></rect><rect x="88" y="400" width="304" height="16"></rect><rect x="88" y="432" width="128" height="16"></rect><rect x="232" y="432" width="160" height="16"></rect>
                                <path d="M144.004,232c-0.001,0-0.003,0-0.004,0H96c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v104    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V240    C152.001,235.583,148.421,232.001,144.004,232z M136,336h-32v-88h32V336z"></path>
                                <path d="M224.004,200c-0.001,0-0.003,0-0.004,0h-48c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v136    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V208    C232.001,203.583,228.421,200.001,224.004,200z M216,336h-32V216h32V336z"></path>
                                <path d="M304.004,168c-0.001,0-0.003,0-0.004,0h-48c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v168    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V176    C312.001,171.583,308.421,168.001,304.004,168z M296,336h-32V184h32V336z"></path>
                                <path d="M384.004,136c-0.001,0-0.003,0-0.004,0h-48c-4.417-0.001-7.999,3.579-8,7.996c0,0.001,0,0.003,0,0.004v200    c-0.001,4.417,3.579,7.999,7.996,8c0.001,0,0.003,0,0.004,0h48c4.417,0.001,7.999-3.579,8-7.996c0-0.001,0-0.003,0-0.004V144    C392.001,139.583,388.421,136.001,384.004,136z M376,336h-32V152h32V336z"></path>
                                <path d="M382.43,80.156l-80,16c-1.024,0.205-1.998,0.609-2.867,1.188L229.578,144H160c-1.499,0-2.968,0.422-4.238,1.219l-64,40    l8.477,13.563L162.293,160H232c1.579-0.001,3.123-0.468,4.438-1.344l70.684-47.125l78.449-15.688L382.43,80.156z"></path>
                             </svg>
                             <span>Selecione o intervalo de datas e clique no botão gerar para visualizar o relatório</span>
                        </div>
                        <canvas id="myChart" class="hid"></canvas>
                        
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
                                        url: '/report/post/date-for-project',
                                        type: "POST",
                                        data: {date_ini : date_ini,date_final:date_final},
                                        dataType:'JSON',
                                        success:function(response){
                                            if(response.error == false){

                                                $(".no-results-report").remove();
                                                $("#myChart").removeClass('hid');
                                                
                                                console.log(response);

                                                let myChart = document.getElementById('myChart').getContext('2d');

                                                // if(massPopChart instanceof Chart){
                                                //     massPopChart.destroy();
                                                // }

                                                var arrayData  = [];
                                                var arrayCount = []

                                                $.each(response.projects , function (k, v){
                                                    arrayData.push(v.created_at);
                                                });

                                                
                                                $.each(response.projects , function (k, v){
                                                    arrayCount.push(v.total);
                                                });

                                                // var myChart = $("#myChart");

                                                let massPopChart = new Chart(myChart, {
                                                        type:'bar', // bar, horizontalBar, pie, line , doughnut, radar, polarArea
                                                        data:{
                                                            labels:arrayData,
                                                            datasets:[{
                                                                label:'Projetos Por Data',
                                                                backgroundColor:'#45da7d',
                                                                data:arrayCount,
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