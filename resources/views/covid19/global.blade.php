@extends('layouts.master')
@section('title', 'Covid-19 | Global')

@section('content')

    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-2.jpg">

        <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo text-center">
                <img src="assets/img/logo.svg" alt="image error" width="120" height="120">
            </div>

            <ul class="nav">

                <li class="active">
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
                <li>
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
                    <a class="navbar-brand" href="#">Global</a>
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
                                <h4 class="title">Data Global</h4>
                            </div>
                            <div class="content">
                                <table class="table table-hover">
                                    <thead>
                                      <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Positif</th>
                                        <th scope="col">Sembuh</th>
                                        <th scope="col">Meninggal</th>
                                      </tr>
                                    </thead>

                                    @php
                                        $angkaAwal = 1
                                    @endphp
                                    <tbody>
                                      @foreach ($countrys as $country)

                                        <tr>
                                            <th scope="row">{{$angkaAwal}}</th>
                                            <td>{{$country['attributes']['Country_Region']}}</td>
                                            <td>{{number_format($country['attributes']['Confirmed'])}}</td>
                                            <td>{{number_format($country['attributes']['Recovered'])}}</td>
                                            <td>{{number_format($country['attributes']['Deaths'])}}</td>
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
                        <div class="card card-user ">
                            <div class="alert alert-danger alert-with-icon" data-notify="container">
                                 <img src="{{ asset('assets/img/anxious.ico')}}" alt="error" data-notify="icon">
                                <h3 data-notify="message">{{$positif['name']}} : {{$positif['value']}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user ">
                            <div class="alert alert-success alert-with-icon" data-notify="container">
                                 <img src="{{ asset('assets/img/happy.ico')}}" alt="error" data-notify="icon">
                                <h3 data-notify="message">{{$sembuh['name']}} : {{$sembuh['value']}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user ">
                            <div class="alert alert-info alert-with-icon" data-notify="container">
                                 <img src="{{ asset('assets/img/cry.ico')}}" alt="error" data-notify="icon">
                                <h3 data-notify="message">{{$meninggal['name']}} : {{$meninggal['value']}}</h3>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Covid-19 Global</h4>
                            </div>
                            <div class="content">
                                <div id="chart" style="width:100%; height:400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @section('chart')
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
         Highcharts.chart('chart', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Perkembangan Covid-19 Di GLobal'
            },
            subtitle: {
                text: 'Data: <a href="https://data.kemkes.go.id/">Kementrian Kesehatan RI</a>'
            },
            xAxis: {
                categories: {!!json_encode( $chartNegara)!!},
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Populasi Orang',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: 'Orang'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -50,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true,

            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Positif',
                data: {!!json_encode($chartPositif)!!}
            }]


        });
        </script>
    @endsection

@endsection


