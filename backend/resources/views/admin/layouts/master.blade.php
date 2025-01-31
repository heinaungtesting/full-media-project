

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>素晴らしいブログ</title>
    @include('sweetalert::alert')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">

            <span class="brand-text font-weight-light">私のメディアアプリ</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="fas fa-user-circle"></i>
                            <p>
                                私のプロフィール
                            </p>
                        </a>
                    </li>

                   

                    <li class="nav-item">
                        <a href="{{route('category')}}" class="nav-link">
                            <i class="fas fa-pizza-slice ms-5"></i>
                            <p>
                                カテゴリー
                            </p>
                        </a>
                    </li>

                 <li class="nav-item">
                        <a href="{{route('post')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                            <p>
                                投稿
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('trend')}}" class="nav-link">
                            <i class="fas fa-book"></i>
                            <p>
                                トレンド投稿
                            </p>
                        </a>
                    </li>



                    <li class="nav-item">

                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="btn bg-danger w-100"><i class="fas fa-sign-out-alt"></i>

                                            ログアウト
                                        </button>
                            </form>

                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@yield('script')
</body>
</html>
