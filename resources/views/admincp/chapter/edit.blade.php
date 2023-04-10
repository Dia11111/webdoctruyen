@extends('layouts.app')

@section('content')

@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật chapter truyện</div>
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

                    <form method="POST" action="{{route('chapter.update',[$chapter->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->tieude}}"
                                onkeyup="ChangeToSlug();" name="tieude" id="slug" aria-describedby="emailHelp"
                                placeholder="Tên chapter...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Slug chapter</label>
                            <input type="text" class="form-control" value="{{$chapter->slug_chapter}}"
                                name="slug_chapter" id="convert_slug" aria-describedby="emailHelp"
                                placeholder="Slug chapter...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">tóm tắt chapter</label>
                            <textarea name="tomtat" class="form-control" rows="5" style="resize: none">
                                {{$chapter->tomtat}}
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nội dung chapter</label>
                            <textarea name="noidung" id="noidung_chapter" class="form-control" rows="5" style="resize: none">
                            {{$chapter->noidung}}
                        </textarea>

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thuộc truyện</label>
                            <select name="truyen_id" class="form-select">
                                @foreach ($truyen as $key => $item)
                                <option {{$item-> id == $chapter->truyen_id ? 'selected' : ''}} value="{{$item->id}}">
                                    {{$item->tentruyen}}
                                </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                            <select name="kichhoat" class="form-select" aria-label="Default select example">
                                @if($chapter->kichhoat==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>

                        <button type="submit" name="themchapter" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
