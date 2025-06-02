                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item search">

                                    <form id="search_form" name="gs" method="GET" action="{{ route('app') }}">
                                        <input type="text" name="q" class="searchText"
                                            placeholder="type to search..." autocomplete="on"
                                            value="{{ $q ?? '' }}">
                                    </form>


                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>Recent Posts</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($recentPosts as $recentPost)
                                                <li><a href="{{ route('post_details', $recentPost->id) }}">
                                                        <h5>{{ $recentPost->title }}
                                                        </h5>
                                                        <span>{{ $recentPost->created_at->format('F d, Y') }}</span>
                                                    </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Categories</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($categories as $cate)
                                                <li><a href="{{ route('categories_posts', $cate->id) }}">-
                                                        {{ $cate->name }}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item tags">
                                    <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($tags as $tag)
                                                <li><a href="{{ route('tags_posts', $tag->id) }}">{{ $tag->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
