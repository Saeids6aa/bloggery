@extends('layouts.app')

@section('title', 'No Permission')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center" style="min-height: calc(100vh - 100px);">
            <div class="col-md-6">
                <div class="card border-danger text-center">
                    <div class="card-header bg-danger text-white">
                        <h3><i class="fas fa-ban mr-2"></i>Access Denied</h3>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('back_end/505.png') }}" alt="No Permission" class="mb-4"
                            style="max-width: 250px;">
                        <p class="h5 mb-3">Sorry you don't have any Permission.</p>
                        <p> Please Call The Adminstrator .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
