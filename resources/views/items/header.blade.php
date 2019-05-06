{{-- items.header --}}
<header>
    <div class="container">
        <nav class="navbar navbar-default" style="background-color: #FFFFFF;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="{{url('/')}}">
                        <h1>Simple Garden</h1>
                    </a>
                </div>
                <div style="float:right;">
                    <ul class="navbar-nav ml-auto list-group">
                        @guest
                        <li class="list-group-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            @else
                        <li class="nav-item dropdown list-group-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                    <button class="btn btn-default" style="margin-left:15px">
                        <a href="{{ url('/displayCart') }}">
		                        買い物カゴ
                        </a>
                    </button>
                </div>
            </div>
        </nav>
    </div>
</header>
