@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
    </ol>
</nav>
<div class="row">
    <div class="album py-3 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between mb-2">
                <h3>Bạn đang tìm kiếm với từ khóa: {{$tukhoa}}</h3> 
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @php
                    $count =count($truyen);
                @endphp
                @if($count == 0)
                    <div class="col-md-12">
                        <div class="card mb-12 box-shadow">

                            <div class="card-body">
                                <p>Không tìm thấy truyện...</p>
                            </div>
                        </div>
                    </div>
                @else

                        @foreach($truyen as $key => $value)
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
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
