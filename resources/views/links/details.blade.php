@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

    <div class="container">
        <div class="mx-4">
        <h1 class="card-title fw-bolder">{{ $link->name }} Analytics</h1>
        {{-- <div class="row mt-3">
            <div class="col-md-3 col-sm-12 card shadow-sm border-0 bg-white rounded ">
                <div class="card-body col-md-12">
                    <div class="my-3 text-center">{!! QrCode::size(260)->color(0, 87, 163)->generate('http://192.168.3.157:8000/visit/'.$compaign->id.'/'.$link->id) !!}</div>
                    <div>
                        <div class="mb-2">
                            <span class="badge rounded-pill bg-info text-dark px-3">URL</span>
                        </div>
                        <h2 class="card-title">{{ $link->name }}</h2>
                        <div class="text-xs mb-1">
                            <span class="text-secondary">Created: {{ $link->created_at }}</span>
                        </div>
                    </div>
                    <div class="d-grid mt-3">
                        <button class="btn btn-outline-danger" type="button">Reset Scans</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 card shadow-sm border-0 bg-white rounded">
                <div class="card-body col-md-12">
                    
                </div>
            </div>
            
            
        </div> --}}
        <div class="row mt-3">
                <div class=" mb-3 col-md-3">
                    <div class="card shadow-sm border-0 bg-white rounded">
                        <div class="card-body">
                            <div class="my-3 text-center">{!! QrCode::size(260)->color(0, 87, 163)->generate('http://192.168.3.157:8000/visit/'.$compaign->id.'/'.$link->id) !!}</div>
                                <div>
                                    <div class="mb-2">
                                        <span class="badge rounded-pill bg-info text-dark px-3">URL</span>
                                    </div>
                                    <h2 class="card-title">{{ $link->name }}</h2>
                                    <div class="text-xs mb-1">
                                        <span class="text-secondary">Created: {{ $link->created_at }}</span>
                                    </div>
                                </div>
                                <div class="col mt-5 text-center">
                                    <div class="text-secondary h6">Total Scans</div>
                                    <div class="fw-bolder h2">{{$total_scans}}</div>
                                    {{-- <h1></h1> --}}
                                </div>
                                <div class="d-grid mt-3">
                                    <button class="btn btn-outline-danger" type="button">Reset Scans</button>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 row">
                    <div class=" col-md-7 ">
                        <div class="card shadow-sm border-0 bg-white rounded">
                            <div class="card-body">
                                <div class="card-title fw-bold border-bottom pb-3">
                                    Scans by time
                                </div>
                                <div>
                                    <canvas id="myChart2" height="200"></canvas>
                                    <script>
                                    const ctx2 = document.getElementById('myChart2');
                                    var date_labels = JSON.parse('{!! json_encode($date_labels) !!}');
                                    var date_values = JSON.parse('{!! json_encode($date_values) !!}');
    // SELECT COUNT(*), DATE_FORMAT(`created_at`,"%Y-%m-%d") as formatted FROM `visits` GROUP BY formatted;

                                    // console.log(devicesValues);
                                    const myChart2 = new Chart(ctx2, {
                                        type: 'bar',
                                        // labels : 'jje',
                                        data: {
                                            labels: date_labels,
                                            datasets: [{
                                                label: 'Visits by time',
                                                data: date_values,
                                                backgroundColor: [
                                                    'rgba(12, 114, 194, 0.9)',
                                                    
                                                    // 'rgba(0, 0, 0, 0.2)'
                                                    ],
                                                    borderWidth: 1
                                            }],
                                        },
                                        options: {
                                            fill: true,
                                            scales: {
                                                x: {
                                                    // min: '2021-11-07 00:00:00',
                                                }
                                            }
                                        }
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-5" >
                        <div class="card shadow-sm border-0 bg-white rounded">
                            <div class="card-body">
                                <div class="card-title fw-bold border-bottom pb-3">
                                    Scans by device
                                </div>
                                <div class="d-flex justify-content-center">
                                    <canvas id="myChart1" height="316"></canvas>
                                    <script>
                                    const ctx1 = document.getElementById('myChart1');
                                    var devices = JSON.parse('{!! json_encode($devices_keys) !!}');
                                    var devicesValues = JSON.parse('{!! json_encode($devices_values) !!}');

                                    // console.log(devicesValues);
                                    const myChart1 = new Chart(ctx1, {
                                        type: 'doughnut',
                                        data: {
                                            labels: devices,
                                            datasets: [{
                                                // label: '# of Votes',
                                                data: devicesValues,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132)',
                                                    'rgba(54, 162, 235)',

                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',

                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            responsive: false,
                                            scales: {
                                                
                                                // y: {
                                                //     beginAtZero: true
                                                // }
                                            }
                                        }
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" my-3 col-md-12 ">
                        <div class="card shadow-sm border-0 bg-white rounded">
                            <div class="card-body">
                                <div class="card-title fw-bold border-bottom pb-3">
                                    Scans by location
                                </div>
                                
                                <div class="my-3 row">
                                    <dir class="col-md-4 h6 my-3">
                                        1- Casablanca
                                    </dir>
                                    <div class="col-md-8 my-3">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                          </div>
                                    </div>
                                    <dir class="col-md-4 h6 my-3">
                                        2- Rabat
                                    </dir>
                                    <div class="col-md-8 my-3">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
{{-- <script type="text/javascript" src="jscript/graph.js"></script> --}}
@endsection