@extends('layouts.app')

@section('page_title')
    Admins Section
@endsection

@section('content')
    <!-- داخل الـ content-wrapper -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admins Data</h3>
                </div>
                <!-- /.card-header -->
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
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->admin_name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->admin_image }}</td>
                                    <td>
                                        @if ($admin->role === 'super_admin')
                                            <span class="badge badge-danger">Super Admin</span>
                                        @elseif($admin->role === 'admin')
                                            <span class="badge badge-primary">Admin</span>
                                        @elseif($admin->role === 'editor')
                                            <span class="badge badge-success">Editor</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $admin->role }}</span>
                                            <!-- افتراضي لأي قيمة غير معروفة -->
                                        @endif
                                    </td>
                                    <td>Action</td>
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
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </section>

    <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
@endsection
