@extends('../layout')
@section('slide')
@include('pages.slide')
@endsection
@section('content')
{{-- ======================SACH MOI ==================================== --}}
<style>
    a.kytu {
    text-decoration: none;
    cursor: pointer;
    padding: 5px 14px;
    color: black;
    background: aliceblue;
}
</style>
<h3 class="title_truyen">Lọc truyện theo chữ cái</h3>
@foreach(range('A','Z') as $char)

    <a class="kytu" href="{{url('/kytu/'.$char)}}">{{$char}}</a>
    
@endforeach
<div class="row">
    <div class="album py-5 bg-light">
        <div class="d-flex justify-content-between mb-2">
            <h3>Truyện mới cập nhật</h3>
            {{-- <a class="btn btn-success" href="#">Xem tất cả</a> --}}
        </div>
        <div class="container">
            {{-- <div class="d-flex justify-content-between mb-2">
                <h3>Truyện mới cập nhật</h3>
                <a class="btn btn-success" href="#">Xem tất cả</a>
            </div> --}}

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($truyen as $key => $value)
                <div class="col-md-3">
                    <div class="card shadow-sm h-100">
                        <img class="card-img-top rounded-3" width="350" height="350" src="{{asset('public/uploads/truyen/' .$value->hinhanh)}}">
                        <div class="card-body">
                            <h5>{{$value->tentruyen}}</h5>
                            <p class="card-text text-truncate">{{$value->tomtat}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{url('xem-truyen/' .$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                    <a type="button" class="btn btn-sm btn-outline-secondary"><i
                                            class="fa-solid fa-eye">565983</i></a>
                                </div>
                                <small class="text-muted">Ngày cập nhật: {{$value->updated_at->diffForHumans()}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
           
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
               {{$truyen->links('pagination::bootstrap-4')}} 
            </ul>
        </nav>
       
    </div>
    
</div>
{{-- ======================SACH HAY XEM NHIEU ==================================== --}}

@endsection
