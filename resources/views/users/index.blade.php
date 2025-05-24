@extends('layouts.app')

@section('page_title')
    users Section
@endsection
@section('page_sup_title')
    users
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">users Data</h3>
                    <div class="text-right">
                        <a href="{{ route('add_users') }}" class="btn btn-primary">add user</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr style="text-align: center">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><img src="{{ asset('images/user/user_image/' . $user->user_image) }}"
                                            width="50px" style="border-radius: 5px"></td>
                               
                                    <td>
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="border: none; background: none; padding: 0; margin-right: 10px;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                            </button>
                                        </form>
                                        <a href="{{route('users.edit',$user->id)}}" class="fa fa-edit" style="color: darkcyan;"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-right">
                        {{ $users->links('pagination::bootstrap-4') }}
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
