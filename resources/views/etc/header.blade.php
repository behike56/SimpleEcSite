{{-- etc.header --}}
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ページタイトル</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default" style="background-color: #FFFFFF;">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{url('/')}}">
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
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                            <li class="list-group-item">
                                <a href="{{ url('/displayCart') }}">
		                                買い物カゴ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
            </nav>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>



