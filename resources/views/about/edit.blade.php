@extends('layouts.app')

@section('page_title')
    edit_About
@endsection

@section('page_sup_title')
    edit_About
@endsection
@section('style')
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
            pediting: 6px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">edit About</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="email">about descrption</label>
                                <textarea name="descrption" id="" cols="30" rows="10" class="form-control">{{$about->descrption}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <div id="thumb-output">
                            </div>
                            @if ($about->image)
                                <img src="{{ asset('images/about/' . $about->image) }}" width="200px"
                                    height="150px" style="border-radius: 5px">
                            @endif
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
