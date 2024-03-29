@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm truyện</div>
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

                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" value="{{old('tendanhmuc')}}"
                                onkeyup="ChangeToSlug();" name="tentruyen" id="slug" aria-describedby="emailHelp"
                                placeholder="Tên truyện...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                            <input type="text" class="form-control" value="{{old('tukhoa')}}" name="tukhoa" id="slug" aria-describedby="emailHelp"
                                placeholder="Từ khóa...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" value="{{old('tacgia')}}" name="tacgia" aria-describedby="emailHelp"
                                placeholder="Tác giả...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" value="{{old('slug_danhmuc')}}" name="slug_truyen"
                                id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtat"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Danh mục truyện</label>
                            <select name="danhmuc" class="form-select">
                                @foreach ($danhmuc as $key => $muc)
                                <option value="{{$muc->id}}">
                                    {{$muc->tendanhmuc}}
                                </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thể loại</label><br>
                            @foreach($theloai as $key => $the)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox"  name="theloai[]" id="theloai_{{$the->id}}" value="{{$the->id}}">
                                <label class="form-check-label" for="theloai_{{$the->id}}">{{$the->tentheloai}}</label>
                            </div>
                            @endforeach
                        </div>
                    
                        {{-- <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thể loại truyện</label>
                            <select name="theloai" class="form-select">
                                @foreach ($theloai as $key => $the)
                                <option value="{{$the->id}}">
                                    {{$the->tentheloai}}
                                </option>
                                @endforeach

                            </select>
                        </div> --}}

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tình trạng</label>
                            <select name="tinhtrang" class="form-select" aria-label="Default select example">
                                <option value="0">Đang hoạt động</option>
                                <option value="1">Không hoạt động</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Truyện nổi bật/hot</label>
                            <select name="truyennoibat" class="form-select" aria-label="Default select example">
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                            <select name="kichhoat" class="form-select" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>

                        <button type="submit" name="themtruyen" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
