@extends('layouts.app')

@section('page_title')
    categories Section
@endsection
@section('page_sup_title')
    categories
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">categories Data</h3>
                    <div class="text-right">
                        <a href="{{ route('add_category') }}" class="btn btn-primary">add category</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                                <tr style="text-align: center">
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->created_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('category.delete', $cat->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this Category?')"
                                                style="border: none; background: none; padding: 0; margin-right: 10px;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('category.edit', $cat->id) }}" class="fa fa-edit"
                                            style="color: darkcyan;"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-right">
                        {{ $categories->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    </div>
    </div>
    </section>
@endsection
