{{-- Dashboard Boxes + Table --}}

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ \App\Models\Category::count() }}</h3>
                <p>Categories</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('categories') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ \App\Models\User::count() }}</h3>
                <p>Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('users') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ \App\Models\Contact::count() }}</h3>
                <p>Bloggy Messages</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('contacts') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{App\Models\Post::count()}}</h3>
                <p>Posts</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('posts')}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Latest Messages</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-hover text-center mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th style="width:  10px;">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->email }} </td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->subject }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>

        </div>



        <div class="row pt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Comments</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-hover text-center mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>id</th>
                                    <th>User Name</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }} </td>
                                        <td><a href="{{ route('posts.comment', $item->post->id) }}#comment"
                                                title="View The Comment ">{{ Str::limit($item->comment, 50) }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>


            </div>
        </div>
