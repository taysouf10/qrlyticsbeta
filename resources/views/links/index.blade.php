@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="">
                    <div class="d-flex justify-content-between ">
                        <div><h2 class="card-title">{{ $compaign->name }}</h2></div>
                        <div>
                            <a href="/dashboard/compaigns/{{ $compaign->id }}/links/new" class="btn btn-primary">Create Link</a>
                        </div>
                    </div>
                    <div class="my-4 row">
                        @foreach($links as $link)
                        <div class=" mb-3 col-md-6 col-sm-12">
                            <div class="card shadow-sm border-0 bg-white rounded">
                            <div class="card-body">
                                <div class="row">
                                    <div class=" col-md-3">
                                        <div class="text-center">
                                            {!! QrCode::size(130)->color(0, 87, 163)->generate('http://192.168.3.157:8000/visit/'.$compaign->id.'/'.$link->id) !!}
                                        </div>
                                        <div class="text-center bg-success mt-2 rounded text-white">
                                            Scan me 
                                        </div>
                                    </div>
                                    {{-- <div class="bg-primary col-md-4">test1</div> --}}
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <span class="badge rounded-pill bg-info text-dark px-3">URL</span>
                                        </div>
                                        <div class="fw-bolder h5">
                                            {{$link->name}}
                                        </div>
                                        <div class="row">
                                            <div class="text-xs ">
                                                <span class="">Created: {{ $link->created_at }}</span>
                                                <span class="ms-4">
                                                    <img width="20" class="mb-1" src = "{{ asset('/images/folder_compaign.svg') }}" />
                                                    {{ $compaign->name }}
                                                </span>
                                            </div>
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center">
                                                    <span>{{ $link->visits_count }} Scans</span>
                                                    <span class="ms-3">
                                                            <a href="/dashboard/compaigns/{{ $compaign->id }}/links/{{ $link->id }}/details" class="link-unstyled">
                                                                <i class="fs-2 bi bi-arrow-right mt-5"></i>
                                                            </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> 
                        @endforeach
                    </div>
                    {{-- <h2 class="card-title">Your links</h2> --}}
                    {{-- <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Url</th>
                                <th scope="col">Visits</th>
                                <th scope="col">Last Visit</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($links as $link)
                                <tr>
                                    <td> <a href="/dashboard/compaigns/{{ $compaign->id }}/links/{{ $link->id }}/details">{{ $link->name }}</a></td>                          </td>
                                    <td>{{ $link->link }}</td>
                                    <td>{{ $link->visits_count }}</td>
                                    <td>{{ $link->latest_visit ? $link->latest_visit->created_at->format('M j Y - H:ia') : 'N/A' }}</td>
                                    <td><a href="/dashboard/links/{{ $link->id }}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                    {{-- <a href="/dashboard/compaigns/{{ $compaign->id }}/links/new" class="btn btn-primary">Add Link</a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection