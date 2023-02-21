@extends('../layout')
@section('slide')
@include('pages.slide')
@endsection
@section('content')
{{-- ======================SACH MOI ==================================== --}}

<div class="row">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between mb-2">
                <h3>Truyện mới cập nhật</h3> 
                <a class="btn btn-success" href="">Xem tất cả</a>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($truyen as $key => $value)
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <img class="card-img-top rounded-3" width="350" height="350" src="{{asset('public/uploads/truyen/' .$value->hinhanh)}}">
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
    </div>
</div>
{{-- ======================SACH HAY XEM NHIEU ==================================== --}}

@endsection
