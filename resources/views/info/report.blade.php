@extends('layouts.ample')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Pagina de Relatorio</h4> </div>
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
                        <h2>Relatórios</h2>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-filtro">
                        <div class="item-filtro">
                            filtro
                        </div>
                        <div class="item-filtro">
                            filtro
                        </div>
                        <div class="item-filtro">
                            filtro
                        </div>
                    </div>
                </div>
                <div class="white-box">
                    <div class="content-result">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection