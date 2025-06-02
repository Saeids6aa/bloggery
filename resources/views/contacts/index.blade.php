@extends('layouts.app')

@section('page_title')
    Messages
@endsection
@section('page_sup_title')
    Messages
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Messages</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>subject</th>
                                <th>message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr style="text-align: center">
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ Str::limit($contact->message, 30) }}</td>
                                    <td>
                                        <form action="{{ route('contact.delete', $contact->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="border: none; background: none; padding: 0; margin-right: 10px;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-right">
                        {{ $contacts->links('pagination::bootstrap-4') }}
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
