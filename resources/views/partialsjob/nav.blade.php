<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->


  <div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
      <div class="site-navbar bg-light">
        <div class="py-1">
          <div class="row align-items-center">
            <div class="col-2">
              <h2 class="mb-0 site-logo"><a href="/">Ажил<strong class="font-weight-bold"> Хайгч</strong> </a></h2>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Нэвтрэх') }}</a> --}}
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                    Нэвтрэх
                                  </button>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('employer.create') }}">{{ __('Ажил олгогч') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Ажил хайгч') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->user_type === 'employer')
                                        {{ Auth::user()->company->cname }}
                                    @else
                                        {{ Auth::user()->name }}
                                    @endif
                                    <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->user_type === 'employer')
                                        <a class="dropdown-item" href="{{ route('company.create') }}">{{ __('Компаны мэдээлэл') }}</a>
                                        <a class="dropdown-item" href="{{ route('jobs.create') }}">{{ __('Ажлын байр үүсгэх') }}</a>
                                        <a class="dropdown-item" href="{{ route('myjob') }}">{{ __('Ажлын байрны жагсаалт') }}</a>
                                        <a class="dropdown-item" href="{{ route('applicants') }}">{{ __('Ажилд орох хүсэлтүүд харах') }}</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">Профайл</a>

                                        <a class="dropdown-item" href="{{ route('home') }}">Ажлын байрны жагсаалт</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    {{-- <li><a href="categories.html">For Candidates</a></li>
                    <li class="has-children">
                      <a href="category.html">For Employees</a>
                      <ul class="dropdown arrow-top">
                        <li><a href="category.html">Category</a></li>
                        <li><a href="#">Browse Candidates</a></li>
                        <li><a href="new-post.html">Post a Job</a></li>
                        <li><a href="#">Employeer Profile</a></li>
                        <li class="has-children">
                          <a href="#">More Links</a>
                          <ul class="dropdown">
                            <li><a href="#">Browse Candidates</a></li>
                            <li><a href="#">Post a Job</a></li>
                            <li><a href="#">Employeer Profile</a></li>
                          </ul>
                        </li>

                      </ul>
                    </li>

                    <li><a href="contact.html">Contact</a></li> --}}
                    {{-- <li><a href="new-post.html"><span class="bg-primary text-white py-3 px-4 rounded"><span class="icon-plus mr-3"></span>Post New Job</span></a></li> --}}
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Нэвтрэх</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="modal-body">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                {{-- <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Болих</button>
              <button type="submit" class="btn btn-primary">Нэвтрэх</button>
            </div>
        </form>
      </div>
    </div>
  </div>