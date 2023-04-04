@extends('../profile/profile-layout')
@section('profile')
<h1>ĐỔI MẬT KHẨU</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{route('update-pass')}}" enctype="multipart/form-data">
    @csrf
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mật khẩu hiện tại</label>
        <input type="password" class="form-control @error('error') is-invalid @enderror" onkeyup="ChangeToSlug();"
            name="old_password" id="slug" aria-describedby="emailHelp" placeholder="Mật khẩu hiện tại">
    </div>
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">MK mới</label>
        <input type="password" class="form-control" name="new_password" id="slug" aria-describedby="emailHelp"
            placeholder="Mật khẩu mới">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Xác nhận MK</label>
        <input type="password" class="form-control" name="confirm_password" aria-describedby="emailHelp"
            placeholder="Xác nhận mật khẩu">
    </div>
    <button type="submit" name="btn_changePass" class="btn btn-primary">Cập Nhật</button>
</form>
@endsection
