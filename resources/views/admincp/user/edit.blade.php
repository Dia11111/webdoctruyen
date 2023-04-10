@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật thể người dùng</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{route('user.update',[$user->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
                            <input disabled type="text" class="form-control" value="{{$user->name}}"
                                onkeyup="ChangeToSlug();" name="username" id="slug" aria-describedby="emailHelp"
                                placeholder="Tên thể loại...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input disabled type="email" class="form-control" value="{{$user->email}}"
                                onkeyup="ChangeToSlug();" name="email" id="slug" aria-describedby="emailHelp"
                                placeholder="Tên thể loại...">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Quyền người dùng</label>
                            <select name="role" class="form-select" aria-label="Default select example">
                                @if($user->role==1)
                                <option selected value="1">Admin</option>
                                <option value="0">User</option>
                                @else
                                <option value="1">Admin</option>
                                <option selected value="0">User</option>
                                @endif
                            </select>
                        </div>

                        <button type="submit" name="themtheloai" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
