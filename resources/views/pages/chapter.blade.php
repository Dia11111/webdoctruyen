@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12">
        <h4>{{$chapter->truyen->tentruyen}}</h4>
        <p>Chương hiện tại: {{$chapter->tieude}}</p>
        <p>Tóm tắt: {{$chapter->tomtat}}</p>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Chọn chương</label>
                <select name="select-chapter" class="form-select select-chapter" aria-label="Default select example">
                    @foreach($all_chapter as $key => $chap)
                    <option value="{{url('xem-chapter/' .$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="noidungchuong">
            {!! $chapter->noidung !!}

            
        </div>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Chọn chương</label>
                <select name="select-chapter" class="form-select select-chapter" aria-label="Default select example">
                    @foreach($all_chapter as $key => $chap)
                    <option value="{{url('xem-chapter/' .$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <h3>Lưu và chia sẻ truyện: </h3>
                <a><i class="fab fa-facebook-f"></i></a>
    </div>
</div>
@endsection