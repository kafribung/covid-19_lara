@extends('layouts.master')
@section('title', 'Admin Dashboard')
@section('content')

<div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-1.jpg') }} ">

    <!--

Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
Tip 2: you can also add an image using data-image tag

-->

    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <h4>Dashboard Covid-19</h4>
        </div>

        <ul class="nav">
            <li class="active">
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
            <li>
                <a href="/cegah">
                    <i class="pe-7s-note2"></i>
                    <p>Pencegahan</p>
                </a>
            </li>
            <li>
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
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Message</h4>
                            <hr>
                        </div>
                        <div class="content text-center">
                            <h1>Selamat Datang {{$user->name}}</h1>
                            <p>Mari kita perangai wabah corona</p>
                            <p class="text-danger">Yakin kita bisa, Indonesia Bisa !!</p>
                            <hr class="bg-warning">
                            <h3>Jangan lupa berdoa dan berusaha</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection

