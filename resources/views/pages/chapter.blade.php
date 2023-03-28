@extends('../layout')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        @foreach($truyen_breadcrumb->thuocnhieutheloaitruyen as $key => $breadcrumb_the)
        <li class="breadcrumb-item"><a href="{{url('the-loai/' .$breadcrumb_the->slug_theloai)}}">{{$breadcrumb_the->tentheloai}}</a></li>
        @endforeach
        <li class="breadcrumb-item"><a
                href="{{url('danh-muc/' .$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a>
        </li>
        <li class="breadcrumb-item"><a
                href="{{url('xem-truyen/' .$chapter->truyen->slug_truyen)}}">{{$chapter->truyen->tentruyen}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$chapter->tieude}}</li>
    </ol>
</nav>
<form action="{{ route('text-to-speech.convert') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <h4>{{$chapter->truyen->tentruyen}}</h4>
            <p>Chương hiện tại: {{$chapter->tieude}}</p>
            <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button" data-size="small"><a
                    target="_blank" href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia
                    sẻ</a>
            </div>
            <p>Tóm tắt: {{$chapter->tomtat}}</p>
            <div class="col-md-5">
                <style type="text/css">
                    .isDisabled {
                        color: currentColor;
                        pointer-events: none;
                        opacity: 0.5;
                        text-decoration: none;
                    }
                </style>
                <p class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Chọn chương</label>

                <p><a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}"
                        href="{{url('xem-chapter/' .$chapter->truyen->slug_truyen.'/'.$previous_chapter)}}">Tập trước</a></p>

                <select name="select-chapter" class="form-select select-chapter" aria-label="Default select example">
                    @foreach($all_chapter as $key => $chap)
                    <option value="{{url('xem-chapter/' .$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                    @endforeach
                </select>

                <p class="mt-3"><a class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}"
                        href="{{url('xem-chapter/' .$chapter->truyen->slug_truyen.'/'.$next_chapter)}}">Tập sau</a></p>

            </div>
        </div>

        <div class="noidungchuong">
            <input type="hidden" name="text" value="{{$chapter->noidung}}">
            @if (session('audioContent'))
            <audio controls="controls" autoplay="autoplay">
                <source src={{ session('audioContent') }} type="audio/mpeg">
            </audio>
            @endif
            <button type="submit" class="{{ session('audioContent') ? 'd-none' : '' }}" name="convert">Đọc</button>
            <hr>
            {!! $chapter->noidung !!}

        </div>
        <div class="col-md-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Chọn chương</label>
                <select name="select-chapter" class="form-select select-chapter" aria-label="Default select example">
                    @foreach($all_chapter as $key => $chap)
                    <option value="{{url('xem-chapter/' .$chap->truyen->slug_truyen.'/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <h3>Lưu và chia sẻ truyện: </h3>
        <a><i class="fab fa-facebook-f"></i></a>
        <div class="row">
            <div class="col-md-12">
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                    data-width="100%" data-numposts="10"></div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
