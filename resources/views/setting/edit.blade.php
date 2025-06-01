@extends('layouts.app')

@section('page_title')
    edit_Setting
@endsection

@section('page_sup_title')
    edit_Setting
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
                        <h3 class="card-title">edit Setting</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="facebook">Facebook Url</label>
                                <input class="form-control" type="text" name="url_facebook"
                                    value="{{ $setting->url_facebook }}">
                            </div>

                            <div class="form-group">
                                <label for="twitter">twitter Url</label>
                                <input class="form-control" type="text" name="url_twitter"
                                    value="{{ $setting->url_twitter }}">
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">whatsapp Url</label>
                                <input class="form-control" type="text" name="url_whatsapp"
                                    value="{{ $setting->url_whatsapp }}">
                            </div>

                            <div class="form-group">
                                <label for="email">email</label>
                                <input class="form-control" type="text" name="email" value="{{ $setting->email }}">
                            </div>


                            <div class="form-group">
                                <label for="address">address</label>
                                <input class="form-control" type="text" name="address" value="{{ $setting->address }}">
                            </div>

                            <div class="form-group">
                                <label for="phone">phone</label>
                                <input class="form-control" type="text" name="phone" value="{{ $setting->phone }}">
                            </div>


                            <div class="form-group">
                                <label for="avatar">Upload icon</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="icon">
                                    <label class="custom-file-label" for="icon">Choose file</label>
                                </div>
                            </div>
                            <div id="thumb-output">
                            </div>
                            @if ($setting->icon)
                                <img src="{{ asset('images/setting/' . $setting->icon) }}" width="200px" height="150px"
                                    style="border-radius: 5px">
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
