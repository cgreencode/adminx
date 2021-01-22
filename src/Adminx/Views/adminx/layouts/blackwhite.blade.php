<?php
$username = $core->get_userinfo()['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $core->get_title() }} - @yield('adminx_title')</title>
        <link href="{{ url('/adminx-public/blackwhile/styles.css') }}" rel="stylesheet" />
        <link href="{{ url('/adminx-public/blackwhite/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
        <link href="{{ url('/adminx-public/default/select2/select2.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ $core->url('/') }}">{{ $core->get_title() }}</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ $core->url('/model/AdminxLog?filter_user=' . auth()->id()) }}">{{ $core->get_word('user.btn.log', 'Activity History') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ $core->get_logout() }}">{{ $core->get_word('logout.btn', 'Logout') }}</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{ $core->url('/') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                {{ $core->get_word('menu.dashboard', 'Dashboard') }}
                            </a>
                            @foreach($core->get_menu() as $item)
                                @if($item['type'] === 'link')
                                        <a class="nav-link" href="{{ $item['link'] }}" target="{{ $item['target'] }}">
                                            <div class="sb-nav-link-icon"><i class="{{ $item['icon'] }}"></i></div>
                                            {{ $item['title'] }}
                                        </a>
                                @else
                                    @if($item['type'] === 'page' && $item['slug'] !== '.')
                                        <a class="nav-link" href="{{ $core->url('page/' . $item['slug']) }}" target="{{ $item['target'] }}">
                                            <div class="sb-nav-link-icon"><i class="{{ $item['icon'] }}"></i></div>
                                            {{ $item['title'] }}
                                        </a>
                                    @else
                                        @if($item['type'] === 'model')
                                            <a class="nav-link" href="{{ $core->url('model/' . $item['config']['slug']) }}" target="{{ $item['config']['target'] }}">
                                                <div class="sb-nav-link-icon"><i class="{{ $item['config']['icon'] }}"></i></div>
                                                {{ $item['config']['title'] }}
                                            </a>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ $username }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container" style="padding-top: 20px;">
                        @yield('adminx_content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">{{ $core->get_copyright() }}</div>
                            <div>
                                <a href="https://github.com/parsampsh/adminx">Powered By Adminx</a>
                                &middot;
                                <a href="https://startbootstrap.com/template/sb-admin">Theme by startbootstrap</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ url('/adminx-public/blackwhite/jquery-3.5.1.slim.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('/adminx-public/blackwhite/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('/adminx-public/blackwhite/scripts.js') }}"></script>
        <script src="{{ url('/adminx-public/blackwhite/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('/adminx-public/blackwhite/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ url('/adminx-public/default/select2/select2.full.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                $('.select2-box').select2();
            });
        </script>
    </body>
</html>