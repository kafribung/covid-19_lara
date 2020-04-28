

@extends('layouts.master')
@section('title', 'Admin Dashboard')
@section('content')

<div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-4.jpg') }} ">

    <!--

Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
Tip 2: you can also add an image using data-image tag

-->

    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <h4>Dashboard Covid-19</h4>
        </div>

        <ul class="nav">
            <li>
                <a href="/dashboard">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="/covid">
                    <i class="pe-7s-user"></i>
                    <p>Covid-19</p>
                </a>
            </li>
            <li  >
                <a href="/cegah">
                    <i class="pe-7s-note2"></i>
                    <p>Pencegahan</p>
                </a>
            </li>
            <li class="active">
                <a href="/hospital">
                    <i class="pe-7s-news-paper"></i>
                    <p>Rumah Sakit</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                Logout?
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout?
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    <div class="content">

        @if (session('msg'))
            <p class="alert alert-info">{{session('msg')}}</p>
        @endif

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Rumah Sakit Rujukan Covid-19</h4>
                            <hr>
                        </div>
                        <div class="content">

                            <a href="/hospital/create" class="btn btn-primary btn-sm pull-right">+</a>

                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Provinsi</th>
                                    <th>Rumah Sakit</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $angkaAwal = 1
                                    @endphp
                                    @foreach ($hospitals as $hospital)
                                        <tr>
                                            <td>{{$angkaAwal}}</td>
                                            <td>{{$hospital->provinsi}}</td>
                                            <td>{!!$hospital->hospital!!}</td>
                                            <td>
                                                <a href="/hospital/{{$hospital->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button type="submit" onclick="deleteData({{$hospital->id}})" class="btn btn-danger btn-sm d-inline"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @php
                                        $angkaAwal++
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Pesan</h4>
                            <hr>
                        </div>
                        <div class="content">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Subjek</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $angkaAwal = 1
                                    @endphp
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>{{$angkaAwal}}</td>
                                            <td>{{$message->nama}}</td>
                                            <td>{{$message->subjek}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->message}}</td>
                                            <td>
                                                <button type="submit" onclick="deleteMsg({{$message->id}})" class="btn btn-danger btn-sm d-inline"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @php
                                        $angkaAwal++
                                    @endphp
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<script>

    function deleteData(id){
                var csrf_token=$('meta[name="csrf_token"]').attr('content');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url : "{{ url('/hospital')}}" + '/' + id,
                            type : "GET",
                            data : {'_method' : 'DELETE', '_token' :csrf_token},
                            success: function(data){
                                swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                                });
                                location.reload();

                            },
                            error : function(){
                                swal({
                                    title: 'Opps...',
                                    text : data.message,
                                    type : 'error',
                                    timer : '1500'
                                })
                            }
                        })
                    } else {
                    swal("Your imaginary file is safe!");
                    }
                });
    }

    function deleteMsg(id){
                var csrf_token=$('meta[name="csrf_token"]').attr('content');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url : "{{ url('/message')}}" + '/' + id,
                            type : "GET",
                            data : {'_method' : 'DELETE', '_token' :csrf_token},
                            success: function(data){
                                swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                                });
                                location.reload();

                            },
                            error : function(){
                                swal({
                                    title: 'Opps...',
                                    text : data.message,
                                    type : 'error',
                                    timer : '1500'
                                })
                            }
                        })
                    } else {
                    swal("Your imaginary file is safe!");
                    }
                });
    }
    </script>




@endsection

