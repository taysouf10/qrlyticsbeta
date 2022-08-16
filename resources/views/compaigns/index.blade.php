@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="/dashboard/compaigns/new" class="btn btn-primary float-right mb-3">Add compaign</a>
        <div class="row">
            @foreach ($compaigns as $compaign)
                <div class=" mb-3 col-md-3">
                    <div class="card shadow-sm border-0 bg-white rounded">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="">
                                {{-- <i class="bi bi-megaphone"> {{$compaign->objective}} </i> --}}
                                <div class="">
                                </div>
                                <div class="col">
                                    <img width="40" src = "{{ asset('/images/folder_compaign.svg') }}" />
                                    <div><span class=""><a href="/dashboard/compaigns/{{ $compaign->id }}/links" class="stretched-link link-unstyled">{{$compaign->name}}</a></span></div>
                                    <div><i class="text-secondary text-xs">2 minutes ago</i></div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 d-flex justify-content-around">
                                <div class="col text-center">
                                    <div>Links</div>
                                    <div>{{$compaign->links->count()}}</div>
                                </div>
                                <div class="col text-center">
                                    <div>Scans</div>
                                    <div >{{ $compaign->scans->count() }}</div>
                                </div>
                                <div class="row align-items-center">
                                   A: 
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
            
        </div>
    </div>
@endsection