@extends('layouts.app')

@section('page_title')
    Admins Section
@endsection
@section('page_sup_title')
    Admins
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admins Data</h3>
                    <div class="text-right">
                        <a href="{{ route('add_admin') }}" class="btn btn-primary">add Admin</a>
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
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr style="text-align: center">
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->admin_name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td><img src="{{ asset('images/admin/admin_image/' . $admin->admin_image) }}"
                                            width="50px" style="border-radius: 5px"></td>
                                    <td>
                                        @if ($admin->role === 'super_admin')
                                            <span class="badge badge-danger">Super Admin</span>
                                        @elseif($admin->role === 'admin')
                                            <span class="badge badge-primary">Admin</span>
                                        @elseif($admin->role === 'editor')
                                            <span class="badge badge-success">Editor</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $admin->role }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.delete', $admin->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this Admin?')"
                                                style="border: none; background: none; padding: 0; margin-right: 10px;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                            </button>
                                        </form>
                                       
                                        <a href="{{route('admin.edit',$admin->id)}}" class="fa fa-edit" style="color: darkcyan; "></a>

                                        <a href="{{ route('show', $admin->id) }}" class="fa fa-user" style="color: darkcyan; "></a>
                                  </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-right">
                        {{ $admins->links('pagination::bootstrap-4') }}
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
