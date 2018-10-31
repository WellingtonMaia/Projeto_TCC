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
                    <li><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="active">Perfil</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="{{ asset("img/example.jpg")}}">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="{{ asset("img/example.jpg")}}" class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white">{{ $user->name }}</h4>
                            <h5 class="text-white">{{ $user->email }}</h5> </div>
                        </div>
                    </div>
                    <div class="user-btm-box">
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-purple"><i class="ti-facebook"></i></p>
                        <h1>258</h1> </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-blue"><i class="ti-twitter"></i></p>
                        <h1>125</h1> </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-danger"><i class="ti-dribbble"></i></p>
                        <h1>556</h1> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Full name" value="{{ $user->name }}" class="form-control form-control-line"> </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com"  value="{{ $user->email}}" class="form-control form-control-line" name="example-email" id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="{{ $user->password }}" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Message</label>
                                            <div class="col-md-12">
                                                <textarea rows="5" class="form-control form-control-line"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12">Select Country</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line">
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>Usa</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                        {{-- <div class="my-profile">
                            <div class="box-img">
                                <img src="{{ $user->image }}">
                            </div>
                            <span>Nome: {{ $user->name }}</span>
                            {{ dd($user->image) }}
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->role }}</p>
                            <p>{{ $user->status }}</p>
                            <p>{{ $user->permission }}</p>
                        </div> --}}
                        {{--
                        <p>{{ $project->estimate_date }}</p>
                        <p>{{ $project->estimate_time }}</p>
                        <p>{{ $project->project_price }}</p> --}}
                        {{--                 <div class="list-tasks">
                            @foreach ($user->tasks as $task)
                            <div class="iten-task">
                                <div class="item">
                                    <label>
                                        <input type="checkbox" name="completed">
                                        <span class="check-bottom"></span>
                                    </label>
                                    <a href="{{ url('projects/tasks/show-info/'.$task->id) }}">
                                        <span class="task-users">Matheus B.</span>
                                        <h3>{{ $task->name }}</h3>
                                        <div class="hidden">{{ $task->description }}</div>
                                        <div class="dates begin">(Inicio: {{  \Carbon\Carbon::parse($task->begin_date)->format(' l F Y') }}</div>
                                        <div class="dates final">Vence: {{  \Carbon\Carbon::parse($task->final_date)->format(' l F Y') }})</div>
                                    </a>
                                    <a class="btn btn-danger" href="{{ url('tasks/delete/'.$task->id) }}"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                            @endforeach
                        </div> --}}
                    </div>
                </div>
            </div>
            @if( \Session::has("message") )
            <div class="alert alert-success">
                <span> {{ \Session::get("message") }}</span>
            </div>
            @endif
            {{-- <div class="list-tasks">
                tarefas do projeto
                
            </div> --}}
        </div>
        
    </div>
    @endsection