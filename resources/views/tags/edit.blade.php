@extends('layouts.app')

@section('page_title')
    Add_Category
@endsection

@section('page_sup_title')
    Add
@endsection
@section('style')
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
            padding: 6px 12px;
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
                        <h3 class="card-title">updete tags</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tags.update',$tags->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">tags Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter tags name" value="{{ $tags->name}}">
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endsection
