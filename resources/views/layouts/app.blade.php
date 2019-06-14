<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'STOCK') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css"> 
    <link rel="stylesheet" href="<?php echo asset('css/reset.css')?>" type="text/css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="menu bg-dark">
        <div class="container">
            <div class="menu-top">
                <h1><a href="{{ url('/') }}">STOCK</a></h1>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> <i class="fas fa-search"></i>
                </form>
                <div class="user">

                    @guest 
                    @else
                    <div class="block-photo-user">
                        @if (empty($user_settings->profile_picture))
                            <img src="{{ asset('images/2.png') }}" alt="">
                        @else 
                            <img style="border-radius: 50%;" src="{{ Storage::url($user_settings->profile_picture) }}" alt="">
                        @endif
                    </div>
                    <h3 class="name-user">{{ Auth::user()->name }} </h3>
                    <a  data-toggle="collapse" href="#collapse-menu" role="button" aria-expanded="false" aria-controls="collapse-menu"><i class="fas fa-sort-down"></i></a>
                    @endguest
                    <div class="navbar-nav ml-auto col-md-2">

                        <!-- Authentication Links -->
                        @guest
                            <!-- Логин -->
                            <li class="nav-item" >
                                <!-- <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                                <a style="cursor: pointer;" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal2">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <!-- <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a> -->
                                <a style="cursor: pointer;" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">{{ __('Register') }}</a>
                            </li>
                            @endif
                        @else
                            <!-- Аккаунт\Дропдаун -->
                            <ul class="collapse collapse-menu row" id="collapse-menu">
                            <li class="col-md-6"><a href="{{ url('account/' . $id . '/locker') }}" class="menu-item"><i class="icon icon-cupboard"></i>Мой шкаф</a></li>
                            <li class="col-md-6"><a href="{{ url('account/' . $id . '/favorites') }}" class="menu-item"><i class="icon icon-heart-outlin"></i>Избранное</a></li>
                            <li class="col-md-6"><a href="{{ url('account/' . $id . '/sales') }}" class="menu-item"><i class="icon icon-sales"></i>Мои продажи</a></li>
                            <li class="col-md-6"><a href="{{ url('account/' . $id . '/invites') }}" class="menu-item"><i class="icon icon-support"></i>Пригласить друзей</a></li>
                            <li class="col-md-6"><a href="{{ url('account/' . $id . '/purchases') }}" class="menu-item"><i class="icon icon-shopping-basket"></i>Мои покупки</a></li>
                            <li class="col-md-6"><a href="{{ url('account/' . $id . '/settings') }}" class="menu-item"><i class="icon icon-settings"></i>Настройки</a></li>
                            <li class="col-md-6"><a href="{{ url('account/' . $id . '/wallet') }}" class="menu-item"><i class="icon icon-bag"></i>Мой кошелек</a></li>
                            <li class="col-md-6">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="menu-item">
                                <i class="icon icon-output"></i>Выход
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        @endguest
                    </div>

                </div>
                @guest 

                @else

                <div class="right-menu">
                    <a href="{{ url('account/' . $id . '/messages') }}"><i class="far fa-envelope"></i></a>
                    <a href="{{ url('account/' . $id . '/messages') }}"><i class="fas fa-bell"></i></a>
                    <a href="{{ url('account/' . $id . '/favorites') }}"><i class="fas fa-heart"></i></a>
                    <a href="{{ url('account/' . $id . '/cart') }}"><i class="fas fa-shopping-basket"></i></a>
                </div>
                @endguest
            </div>
        </div>
    </div>
    <div id="app">

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
<!-- MODALS -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="global-subtitle"> Присоединяйтесь сейчас, чтобы получить 50 $ от вашей первой покупки *. </p>
                    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        @if (!empty($_GET["ref-id"]))
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="ref" placeholder="ID пригласившего - <?=(!empty($_GET['ref-id']))?$_GET['ref-id']:''?>" disabled >
                                <input type="hidden" name="ref_id" value="<?=(!empty($_GET['ref-id']))?$_GET['ref-id']:''?>" required>
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group row">
                            
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->

                            <?php /*if (!empty($_GET["ref-id"])) {
                                echo '<pre>'. print_r($_GET["ref-id"],true).'</pre>';
                            }*/  ?>
                            
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Имя" required autocomplete="name" autofocus>

                                @error('name')
                                    <script type="text/javascript"> localStorage.setItem('errorModal', 'true');</script>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email">

                                @error('email')
                                    <script type="text/javascript"> localStorage.setItem('errorModal', 'true');</script>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Пароль" required autocomplete="new-password">

                                @error('password')
                                    <script type="text/javascript"> localStorage.setItem('errorModal', 'true');</script>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторить пароль" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div style="text-align: center;" class="col-md-12">
                                <button id="buttonModal" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <div><span>или</span></div>
                            <!-- <button type="submit" class="btn btn-submit">Войти через Facebook</button> -->
                            <p>Уже есть аккаунт? <a href="#">Авторизоваться</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="form-group row mb-0">
                        <div style="text-align: center;" class="col-md-12">
                            <a href="{{ url('login/facebook') }}" >
                                <button class="btn btn-social-icon btn-primary">
                                    Войти через Facebook <i class="fa fa-facebook"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="global-subtitle">Войдите в свою учетную запись</p>
                    <p>У вас нет аккаунта? <a href="{{ url('/register') }}"> зарегистрироваться</a></p>
                    <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-12">
                                <input id="email" type="email" class="email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="mail@mail.com" required autocomplete="email" autofocus>

                                @error('email')
                                    <script type="text/javascript"> localStorage.setItem('errorModal2', 'true');</script>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Пароль" required autocomplete="current-password">

                                @error('password')
                                    <script type="text/javascript"> localStorage.setItem('errorModal2', 'true');</script>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div style="text-align: center;" class="col-md-12">
                                <button id="buttonModal2" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button> <br>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    <span>or</span>
                                    <a href="{{ url('login/facebook') }}" ><button type="submit" class="btn btn-social-icon btn-primary">Войти через Facebook <i class="fa fa-facebook"></i></button></a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>

<footer>
    <div class="container footer-menu">
        <ul class="menu-1">
            <li><a href="#">Refenence</a></li>
            <li><a href="#">Site</a></li>
            <li><a href="#">About Lorem</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Giving information</a></li>
            <li><a href="#">Jnits origins</a></li>
            <li><a href="#">sA well as a random lipsum</a></li>
            <li><a href="#">Generator</a></li>
        </ul>
        <ul class="menu-2">
            <li><a href="#">Refenence</a></li>
            <li><a href="#">Site</a></li>
            <li><a href="#">About Lorem</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Giving information</a></li>
            <li><a href="#">Jnits origins</a></li>
            <li><a href="#">sA well as a random lipsum</a></li>
            <li><a href="#">Generator</a></li>
        </ul>
        <ul class="menu-3">
            <li><a href="#">Refenence</a></li>
            <li><a href="#">Site</a></li>
            <li><a href="#">About Lorem</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Giving information</a></li>
            <li><a href="#">Jnits origins</a></li>
            <li><a href="#">sA well as a random lipsum</a></li>
            <li><a href="#">Generator</a></li>
        </ul>
        <ul class="menu-4">
            <li><a href="#">Refenence</a></li>
            <li><a href="#">Site</a></li>
            <li><a href="#">About Lorem</a></li>
            <li><a href="#">Ipsum</a></li>
            <li><a href="#">Giving information</a></li>
            <li><a href="#">Jnits origins</a></li>
            <li><a href="#">sA well as a random lipsum</a></li>
            <li><a href="#">Generator</a></li>
        </ul>
    </div>
</footer>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
    
    /**
    * Восстановление модального окна при ошибках
    */ 
    $('#buttonModal2').click(function (){localStorage.setItem('linkModal2', 'true');});
    $('#buttonModal').click(function (){localStorage.setItem('linkModal', 'true');});
    
    var errorModal = 'undefined';
    var errorModal2 = 'undefined';
    var linkModal = 'undefined';
    var linkModal2 = 'undefined';    
    
    $(document).ready(function (){
        
        errorModal = localStorage.getItem('errorModal');
        linkModal = localStorage.getItem('linkModal');        
        if (errorModal === 'true' && linkModal === 'true') {
            $('#exampleModal').modal('show');
            localStorage.clear();
        }
        
        errorModal2 = localStorage.getItem('errorModal2');
        linkModal2 = localStorage.getItem('linkModal2');
        if (errorModal2 === 'true' && linkModal2 === 'true') {
            $('#exampleModal2').modal('show');
            localStorage.clear();
        } 
      
    });
    /**
    *  Конец "Восстановление модального окна при ошибках"
    */

    
    /**
    *  Копирование реферальной ссылки в буфер обмена
    */
    function copyToClipboard(elem) {
          // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);
        
        // copy the selection
        var succeed;
        try {
              succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }
        
        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    } 

    function copyFunction(elem) {
        copyToClipboard(document.getElementById("ref-id"));
        $(elem).text('Ссылка скопирована!');
    }
    /**
    *  Конец "Копирование реферальной ссылки в буфер обмена"
    */
      
</script>
