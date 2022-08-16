@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <div class="card-body">
                    <h2 class="card-title">Create a new compaign</h2>
                    <form action="/dashboard/compaigns/new" method="post">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Compaign Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="New Fibre Optique">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Compaign Objective</label>
                                    <input type="text" id="objective" name="objective" class="form-control" placeholder="Lead Generation">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-2">Save compaign</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection