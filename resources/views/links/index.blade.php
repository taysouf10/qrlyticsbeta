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
                        <div class=" mb-3 col-sm-12">
                            <div class="card shadow-sm border-0 bg-white rounded">
                            <div class="card-body">
                               <div class="row ">
                                    <div class="col-5 ">
                                        <div>
                                            <div class="mb-3">
                                                <span class="badge rounded-pill bg-info text-dark px-3">URL</span>
                                            </div>
                                            <div class="fw-bolder h5">
                                                {{$link->name}}
                                            </div>
                                            <div class="row mt-3">
                                                <div class="text-xs ">
                                                    <span class="">Created: {{ $link->created_at }}</span>
                                                    <span class="ms-4">
                                                        <img width="20" class="mb-1" src = "{{ asset('/images/folder_compaign.svg') }}" />
                                                        {{ $compaign->name }}
                                                    </span>
                                                </div>
                                                {{-- <div class="mt-3">
                                                    <div class="d-flex align-items-center">
                                                        <span>{{ $link->visits_count }} Scans</span>
                                                        <span class="ms-3">
                                                                <a href="/dashboard/compaigns/{{ $compaign->id }}/links/{{ $link->id }}/details" class="link-unstyled">
                                                                    <i class="fs-2 bi bi-arrow-right mt-5"></i>
                                                                </a>
                                                        </span>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-md-4 text-center ">
                                                <div class="col ">
                                                    <div class="h3">
                                                        {{ $link->visits_count }}
                                                    </div>
                                                    <div class="">
                                                        Scans
                                                    </div>
                                                    <div class="mt-3 ">
                                                        <a href="/dashboard/compaigns/{{ $compaign->id }}/links/{{ $link->id }}/details" class="">
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                <div>Details</div>
                                                                <div class="ms-2"><i class="fs-2 bi bi-arrow-right"></i></div>
                                                            </div>
                                                        {{-- details --}}
                                                            {{-- <i class="fs-2 bi bi-arrow-right"></i> --}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center qr-container " >
                                                <div class="text-center qr-code">
                                                    {!! QrCode::size(120)->color(0, 0, 0)->generate('https://taysoufcrypto.com/visit/'.$compaign->id.'/'.$link->id) !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-center ">
                                                <button class="btn btn-secondary">
                                                    Download
                                                </button>
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