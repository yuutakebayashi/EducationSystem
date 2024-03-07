<!DOCTYPE html>
<html lang="en">
<style>
    .navbar-custom {
        background-color:#fd7e14;
    }
    .nav_item-custom {
        background-color:#0dcaf0;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Top page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom pt-4 pb-4 mb-5">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item nav_item-custom ms-5 ps-3 pe-3 rounded">
                                                                                    <!--仮↓-->
                        <a class="nav-link text-light" aria-current="page" href="{{ route('delivery.show') }}">時間割</a>
                    </li>
                    <li class="nav-item nav_item-custom ms-3 ps-3 pe-3 rounded">
                                                                <!--仮↓-->
                        <a class="nav-link text-light" href="{{ route('delivery.show') }}">授業進捗</a>
                    </li>
                    <li class="nav-item nav_item-custom ms-3 ps-3 pe-3 rounded">
                                                                <!--仮↓-->
                        <a class="nav-link text-light" href="{{ route('delivery.show') }}">プロフィール設定</a>
                    </li>
                </ul>
            </div>
            @if (Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link nav-link me-5">{{ __('ログアウト') }}</button>
            </form>
            @else
            <a class="nav-link me-5" href="{{ route('login') }}">{{ __('ログイン') }}</a>
            @endif
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>