@extends('profile.profile-layout')

@section('profile')
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
                <input type="text" class="form-control" value="{{Auth::user()->name}}" onkeyup="ChangeToSlug();"
                    name="name" id="slug" aria-describedby="emailHelp" disabled placeholder="Tên truyện...">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled name="email" id="slug"
                    aria-describedby="emailHelp" placeholder="Từ khóa...">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ngày tạo tài khoản</label>
                <input type="text" class="form-control" value="{{Auth::user()->created_at}}" disabled name="date"
                    aria-describedby="emailHelp" placeholder="Ngày tạo tài khoản">
            </div>
        </form>
    </div>
</div>
@endsection
