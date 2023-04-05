@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê bảng người dùng</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên người dùng</th>
                                <th scope="col">Email người dùng</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_user as $key => $user)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td class="{{$user->role == 1 ? " text-danger" : "" }}">{{$user->role == 1 ? "Admin" :
                                    "User"}}</td>
                                <td>
                                    <a href="{{route('user.edit',[$user->id])}}" class="btn btn-primary">Edit</a>

                                    <form action="{{route('user.destroy',[$user->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn muốn xóa user này không?');"
                                            class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
