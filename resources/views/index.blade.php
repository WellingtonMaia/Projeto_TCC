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
<footer class="footer text-center"> 2018 &copy; Easytools</footer>
</div>
@endsection