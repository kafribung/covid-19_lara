

@extends('layouts.master')
@section('title', 'Admin Dashboard')
@section('content')

<div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-3.jpg') }} ">

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
            <li  class="active">
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
                            <li><a href="#">Logout</a></li>
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
                            <h4 class="title">Covid-19</h4>
                            <hr>
                        </div>
                        <div class="content">

                            <form action="/cegah" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="pencegahan">pencegahan Covid-19</label>
                                  <textarea name="pencegahan" id="pencegahan" class="form-control ckeditor">{{old('pencegahan')}}</textarea>
                                </div>

                                @if ($errors->has('pencegahan'))
                                    <p class="alert alert-danger">{{$errors->first('pencegahan')}}</p>
                                @endif

                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

@push('after-script')
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endpush

@endsection

