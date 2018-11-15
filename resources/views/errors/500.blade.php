@extends('layouts.ample')
@section('content')
 <section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class="text-info">500</h1>
            <h3 class="text-uppercase">Erro Inesperado</h3>
            {{-- <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p> --}}
            <p class="text-muted m-t-30 m-b-30">PARECE ESTAR TENTANDO ENCONTRAR O CAMINHO PARA HOME</p>
            <a href="{{ route('home') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Voltar para home</a> </div>
        <footer class="footer text-center">2018 © EasyTools.</footer>
    </div>
</section>
@endsection