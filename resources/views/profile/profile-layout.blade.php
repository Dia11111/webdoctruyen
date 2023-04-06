@extends('../layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <section class="user-sidebar clearfix bg-info text-white text-center fs-4">
                <div class="userinfo clearfix">
                    <div class="title">Tài khoản của</div>
                    <div class="user-name">
                        {{ Auth::user()->name }}
                    </div>
                </div>
            </section>
            <nav class="user-sidelink clearfix">
                <ul class="list-group">
                    <li class="list-group-item {{(request()->route()->getName() == 'info-user') ? 'active list-group-item-info' : ''}}">
                        <a href="{{route('info-user')}}" class="text-decoration-none text-black"><i
                                class="fa fa-tachometer"></i> Thông tin
                            chung</a>
                    </li>
                    <li class="list-group-item {{(request()->route()->getName() == 'change-pass') ? 'active' : ''}}">
                        <a href="{{route('change-pass')}}" class="text-decoration-none text-black"><i
                                class="fa fa-lock"></i>
                            Đổi
                            mật khẩu</a>
                    </li>
                    <li class="list-group-item">
                        <a class="text-decoration-none text-black" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Thoát
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-8">
            @yield('profile')
        </div>

    </div>
    @endsection
