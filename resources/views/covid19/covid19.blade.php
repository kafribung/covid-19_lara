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
            <li class="active">
                <a href="/covid19">
                    <i class="pe-7s-display1"></i>
                    <p>Covid-19</p>
                </a>
            </li>
            <li>
                <a href="/pencegahan">
                    <i class="pe-7s-news-paper"></i>
                    <p>Pencegahan</p>
                </a>
            </li>
            <li>
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
                <a class="navbar-brand" href="#">Covid19</a>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <p>{!!$covid->info!!}</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @endsection
