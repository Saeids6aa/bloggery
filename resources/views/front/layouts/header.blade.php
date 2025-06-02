      <nav class="navbar navbar-expand-lg">
          <div class="container">
              <a class="navbar-brand" href="{{route('app')}}">
                  <h2>
                      @if (!empty($setting->title))
                              {{ $setting->title }}
                      @endif
                      <em>.</em>
                  </h2>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item {{ request()->routeIs('app') ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('app') }}">Home
                              <span class="sr-only">(current)</span>
                          </a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('about_us') ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('about_us') }}">About Us</a>
                      </li>
                      <li class="nav-item {{ request()->routeIs('all_posts') ? 'active' : '' }}">
                          <a class="nav-link" href="{{ route('all_posts') }}">All Posts</a>
                      </li>

                      <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                          <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                      </li>
                      @if (auth('web')->check())
                          <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      {{ auth('web')->user()->name }}
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                      <a class="dropdown-item" href="{{ route('user.logout') }}"
                                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>
                                  </div>
                                  <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                      style="display: none;">
                                      @csrf
                                  </form>
                              </li>
                          </ul>
                      @else
                          <li class="nav-item ">
                              <a class="nav-link" href="{{ route('register') }}">Join Us</a>
                          </li>
                      @endif


                  </ul>
              </div>
          </div>
      </nav>
