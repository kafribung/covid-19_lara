@extends('layouts.master') @section('title', 'Covid-19 | Indonesia') @section('content')

<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-2.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <img src="assets/img/logo.svg" alt="image error" width="120" height="120">
        </div>

        <ul class="nav">

            <li >
                <a href="/global">
                    <i class="pe-7s-global"></i>
                    <p>Global</p>
                </a>
            </li>
            <li>
                <a href="/indonesia">
                    <i class="pe-7s-world"></i>
                    <p>Indonesia</p>
                </a>
            </li>
            <li >
                <a href="/covid19">
                    <i class="pe-7s-display1"></i>
                    <p>Covid-19</p>
                </a>
            </li>
            <li >
                <a href="/pencegahan">
                    <i class="pe-7s-news-paper"></i>
                    <p>Pencegahan</p>
                </a>
            </li>
            <li class="active">
                <a href="/rumah-sakit">
                    <i class="pe-7s-note"></i>
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
                <a class="navbar-brand" href="#">Informasi</a>
            </div>
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                Develop
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Kafri Bung</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Rumah Sakit Rujukan Covid-19</h4>
                        </div>
                        <div class="content">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Provinsi</th>
                                    <th>Rumah Sakit</th>
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

                <div class="col-md-4">

                    {{-- Session Message --}}
                    @if (session('msg'))
                        <p class="alert alert-info">{{session('msg')}}</p>
                    @endif

                    <div class="card">
                        <div class="header">
                            <h4 class="title">Pesan</h4>
                        </div>
                        <div class="content">
                            <form action="/message" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="nama">nama</label>
                                  <input type="text" name="nama" class="form-control" id="nama" autofocus="on" autocomplete="off" value="{{old('nama')}}">

                                  @if ($errors->has('nama'))
                                     <p class="alert alert-danger">{{$errors->first('nama')}}</p>
                                  @endif
                                </div>

                                <div class="form-group">
                                    <label for="subjek">subjek</label>
                                    <input type="text" name="subjek" class="form-control" id="subjek" autocomplete="off" value="{{old('subjek')}}">

                                    @if ($errors->has('subjek'))
                                        <p class="alert alert-danger">{{$errors->first('subjek')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input type="email" name="email" class="form-control" id="email"autocomplete="off" value="{{old('email')}}" aria-describedby="emailHelp">
                                    <small id="emailHelp" class="form-text text-muted">Kami tidak akan membagikan email anda !.</small>
                                    @if ($errors->has('email'))
                                        <p class="alert alert-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="message">message</label>
                                    <textarea  name="message" class="form-control" id="message"></textarea>

                                    @if ($errors->has('message'))
                                        <p class="alert alert-danger">{{$errors->first('message')}}</p>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @endsection
