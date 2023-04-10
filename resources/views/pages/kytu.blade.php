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
        <div class="container">
            <div class="d-flex justify-content-between mb-2">
                <h3>Truyện mới cập nhật</h3>
                <a class="btn btn-success" href="#">Xem tất cả</a>
            </div>

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên Truyện</th>
                    <th scope="col">Hình ảnh</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($truyen as $key => $tr)
                  <tr>
                    <th scope="row">{{$key}}</th>
                    <td ><a href="{{url('xem-truyen/' .$tr->slug_truyen)}}">{{$tr->tentruyen}}</a></td>
                    <td><img class="rounded-3" width="100" height="100" src="{{asset('public/uploads/truyen/' .$tr->hinhanh)}}"></td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            
        </div>
    </div>
</div>
{{-- ======================SACH HAY XEM NHIEU ==================================== --}}

@endsection
