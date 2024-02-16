<!DOCTYPE html>
<html lang="en">
<style>
    .navbar-custom {
        background-color:#fd7e14;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom pt-4 pb-4 mb-5">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('delivery.show') }}">時間割</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('top.index') }}">授業進捗</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('top.index') }}">プロフィール設定</a>
                    </li>
                </ul>
            </div>
            @if (Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link nav-link">{{ __('ログアウト') }}</button>
            </form>
            @else
            <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
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