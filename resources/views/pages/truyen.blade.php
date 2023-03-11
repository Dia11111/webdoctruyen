@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        @foreach($truyen->thuocnhieutheloaitruyen as $key => $breadcrumb_the)
        <li class="breadcrumb-item"><a href="{{url('the-loai/' .$breadcrumb_the->slug_theloai)}}">{{$breadcrumb_the->tentheloai}}</a></li>
        @endforeach
        <li class="breadcrumb-item"><a href="{{url('danh-muc/' .$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img class="card-img-top" src="{{asset('public/uploads/truyen/' .$truyen->hinhanh)}}">
            </div>
            <div class="col-md-9">
                <style type="text/css">
                .infotruyen{
                    list-style: none;
                }
                </style>
                <ul class="list-unstyled ml-4 ps-3">
                    <div class="fb-share-button" data-href="{{\URL::current()}}" data-layout="button" data-size="small"><a target="_blank" 
                        href="{{\URL::current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                    </div>

                    <!--Lay bien wishlist-->
                    <input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title">
                    <input type="hidden" value="{{\URL::current()}}" class="wishlist_url">
                    <input type="hidden" value="{{$truyen->id}}" class="wishlist_id">
                    <!--End lay bien wishlist-->
                    <li>Tên truyện: {{$truyen->tentruyen}}</li>
                    <li>Tác giả: {{$truyen->tacgia}}</li>
                    <li>Danh mục truyện: <a href="{{url('danh-muc/' .$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                    <li>Thể loại truyện: 
                        @foreach($truyen->thuocnhieutheloaitruyen as $thuocloai)
                        <a href="{{url('the-loai/' .$thuocloai->slug_theloai)}}">{{$thuocloai->tentheloai}}</a>
                        @endforeach
                    </li>
                    <li>Số chapter: 200</li>
                    <li>Số lượt xem: 2000</li>
                    <li><a class="xemmucluc" style="cursor: pointer;">Xem mục lục</a></li>
                    
                    @if($chapter_dau)
                    <li>
                        <a href="{{url('xem-chapter/' .$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc từ đầu</a>
                        <a href="{{url('xem-chapter/' .$chapter_cuoi->slug_chapter)}}" class="btn btn-primary">Đọc mới nhất</a>
                        
                    </li>

                    <li><button class="btn btn-danger mt-2 btn-thich_truyen"><i class="fa fa-heart" aria-hidden="true"></i>Thích truyện</button></li>
                    @else
                    <li><a class="btn btn-danger">Chưa có chương để đọc</a></li>
                    @endif  
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p>{!! $truyen->tomtat !!}</p>
        </div>
        <hr>
        <style type="text/css">
                .tagcloud06 ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .tagcloud06 ul li {
                display: inline-block;
                margin: 0 0 .3em 1em;
                padding: 0;
            }
            .tagcloud06 ul li a {
                position: relative;
                display: inline-block;
                height: 30px;
                line-height: 30px;
                padding: 0 1em 0 .75em;
                background-color: #3498db;
                border-radius: 0 3px 3px 0;
                color: #fff;
                font-size: 13px;
                text-decoration: none;
                -webkit-transition: .2s;
                transition: .2s;
            }
            .tagcloud06 ul li a::before {
                position: absolute;
                top: 0;
                left: -15px;
                z-index: -1;
                content: '';
                width: 30px;
                height: 30px;
                background-color: #3498db;
                border-radius: 50%;
                -webkit-transition: .2s;
                transition: .2s;
            }
            .tagcloud06 ul li a::after {
                position: absolute;
                top: 50%;
                left: -6px;
                z-index: 2;
                display: block;
                content: '';
                width: 6px;
                height: 6px;
                margin-top: -3px;
                background-color: #fff;
                border-radius: 100%;
            }
            .tagcloud06 ul li span {
                display: block;
                max-width: 100px;
                white-space: nowrap;
                text-overflow: ellipsis;
                overflow: hidden;
            }
            .tagcloud06 ul li a:hover {
                background-color: #555;
                color: #fff;
            }
            .tagcloud06 ul li a:hover::before {
                background-color: #555;
            }
            ul.mucluctruyen li a{
                color: #000;
            }
            .card-header{
                background: darkgray !important;
            }
            .breadcrumb{
                /* background: gray; */
            }
        </style>
        <p>Từ khóa tìm kiếm:
            @php
                $tukhoa = explode(",",$truyen->tukhoa);
            @endphp
            <div class="tagcloud06">
                <ul>
                    @foreach($tukhoa as $key => $tu)
                    <li><a href="{{url('tag/'.\Str::slug($tu) )}}"><span>{{$tu}}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </p>
        <h4>Mục lục</h4>
        <ul class="mucluctruyen">
            @php
                $mucluc = count($chapter);
            @endphp
            @if($mucluc > 0)
                @foreach($chapter as $key => $chap)
                <li>
                    <a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a>
                    <div class="chaster-time">{{$chap->created_at->diffForHumans()}}</div>                  
                </li>
                @endforeach
                
            @else
                <li>Đang cập nhật...</li>    
            @endif
                
        </ul>
        
        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="10"></div>
        <h4 class="card-header">Sách cùng mục</h4>
        <div class="row">
            @foreach($cungdanhmuc as $key => $value)
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top" src="{{asset('public/uploads/truyen/' .$value->hinhanh)}}">
                        <div class="card-body">
                            <h5>{{$value->tentruyen}}</h5>
                            <p class="card-text">{{$value->tomtat}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{url('xem-truyen/' .$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                    <a type="button" class="btn btn-sm btn-outline-secondary"><i
                                            class="fa-solid fa-eye">565983</i></a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            
            
        </div>
    </div>
    <div class="col-md-3">
        <h3 class="card-header">Truyện nổi bật</h3>
        @foreach($truyennoibat as $key => $noibat)
        <div class="row-mt-2">
            <div class="col-md-5">
                <img class="img img-responsive" height="150" weight="150" with="100%" class="card-img-top" src="{{asset('public/uploads/truyen/'.$noibat->hinhanh)}}" alt="{{$noibat->tentruyen}}">
            </div>
                <div class="col-md-7 sidebar">
                    <a href="{{url('xem-truyen/'.$noibat->slug_truyen)}}">
                        <p style="color:#666">{{$noibat->tentruyen}}</p>    
                    </a>
                </div>
        </div>
        @endforeach

        <h3 class="card-header">Truyện xem nhiều</h3>
        @foreach($truyenxemnhieu as $key => $xemnhieu)
        <div class="row-mt-2">
            <div class="col-md-5"><img class="img img-responsive" height="150" weight="150" with="100%" class="card-img-top" src="{{asset('public/uploads/truyen/'.$xemnhieu->hinhanh)}}" alt="{{$xemnhieu->tentruyen}}"></div>
                <div class="col-md-7 sidebar">
                    <a href="{{url('xem-truyen/'.$xemnhieu->slug_truyen)}}">
                        <p style="color:#666">{{$xemnhieu->tentruyen}}</p>    
                    </a>
                </div>
        </div>
        @endforeach
        
        <h3 class="card-header title_truyen">Truyện yêu thích</h3>
        <div id="yeuthich">
                
        </div>
    </div>
    
    
</div>
@endsection
