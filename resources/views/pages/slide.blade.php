
<div class="album py-3 bg-light">
    <div class="container">
        <h3>TRUYỆN NỔI BẬT</h3>
        <div class="owl-carousel owl-theme mt-3">
            @foreach($truyen as $key => $value)
            <div class="owl-stage-outer">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                    <img class="card-img-top rounded-3" width="250" height="250" src="{{asset('public/uploads/truyen/' .$value->hinhanh)}}"><br>                 
                        <h4>{{$value->tentruyen}}</h4>
                        <p><i class="fa-solid fa-eye"></i>12345</p>
                        <a class="btn btn-danger btn-sm" href="{{url('xem-truyen/' .$value->slug_truyen)}}">Đọc ngay</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>       
    </div>    
</div>
