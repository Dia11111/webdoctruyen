@extends('../layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <section class="user-sidebar clearfix bg-success text-white text-center fs-4">
                <div class="userinfo clearfix">
                    <div class="title">Tài khoản của</div>
                    <div class="user-name">{{Auth::user()->name}}</div>
                </div>
            </section>
            <nav class="user-sidelink clearfix">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <a href="" class="text-decoration-none text-white"><i class="fa fa-tachometer"></i> Thông tin
                            chung</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('doimk')}}" class="text-decoration-none text-black"><i class="fa fa-lock"></i>
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
            <div class="card">
                <div class="card-header">Thông tin người dùng</div>
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                <div class="card-body">
                    {{-- @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif --}}

                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}"
                                onkeyup="ChangeToSlug();" name="name" id="slug" aria-describedby="emailHelp" disabled
                                placeholder="Tên truyện...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled
                                name="email" id="slug" aria-describedby="emailHelp" placeholder="Từ khóa...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ngày tạo tài khoản</label>
                            <input type="text" class="form-control" value="{{Auth::user()->created_at}}" disabled
                                name="date" aria-describedby="emailHelp" placeholder="Ngày tạo tài khoản">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
