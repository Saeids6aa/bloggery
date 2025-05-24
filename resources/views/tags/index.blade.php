@extends('layouts.app')

@section('page_title')
    tags Section
@endsection
@section('page_sup_title')
    tags
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">tags Data</h3>
                    <div class="text-right">
                        <a href="{{ route('add_tags') }}" class="btn btn-primary">add tags</a>
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
                            @foreach ($tags as $tag)
                                <tr style="text-align: center">
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->created_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('tags.delete', $tag->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="border: none; background: none; padding: 0; margin-right: 10px;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('tags.edit', $tag->id) }}" class="fa fa-edit"
                                            style="color: darkcyan;"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-right">
                        {{ $tags->links('pagination::bootstrap-4') }}
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
