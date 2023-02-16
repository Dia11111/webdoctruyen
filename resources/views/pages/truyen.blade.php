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
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3">
                <img class="card-img-top" src="{{asset('public/uploads/truyen/03520.jpg')}}">1</img>
            </div>
            <div class="col-md-9">
                <style type=".infotruyen{
                list-style: none;
            }"></style>
                <ul class="list-unstyled ml-4 ps-3">
                    <li>Tác giả: Yokoshima</li>
                    <li>Thể loại: trinh thám, cổ tích</li>
                    <li>Số chapter: 200</li>
                    <li>Số lượt xem: 2000</li>
                    <li><a href="#">Xem mục lục</a></li>
                    <li><a href="#" class="btn btn-primary">Đọc online</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-12">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, vero dolorem error eos nisi esse voluptatum
                reprehenderit voluptas, nesciunt impedit quae autem magnam eaque voluptates recusandae ut eum, iusto
                exercitationem architecto fuga maxime? Dolorem odit ex inventore voluptatem suscipit vel perspiciatis,
                nostrum corrupti soluta deserunt rerum aperiam omnis. Eligendi impedit quia facilis qui accusantium
                voluptates, iure consectetur provident eveniet ducimus tempore et quasi dicta molestias quam suscipit
                nobis dignissimos natus nesciunt, nam asperiores, cum ipsa iusto autem? Unde perspiciatis ut odio
                architecto mollitia corrupti laudantium dolore. Distinctio labore consectetur optio esse voluptatibus in
                pariatur numquam nemo voluptatum deserunt eligendi consequatur aliquid nobis maiores a repudiandae
                exercitationem earum repellat modi est obcaecati, debitis fuga eveniet aliquam! Fugit magni impedit
                exercitationem architecto earum saepe placeat asperiores dolorem explicabo iure quisquam aut deleniti
                dolores laboriosam, libero at est iste atque adipisci? Autem placeat quo enim quis, quidem, explicabo
                nulla nihil labore quod cum quam ex commodi consectetur consequuntur ipsum officia quae alias dolor sit
                maiores. Excepturi saepe, sit iste tempora nobis libero perspiciatis maxime ducimus voluptas laborum!
                Quo modi maxime quaerat, architecto tempore earum id exercitationem odit perspiciatis. Atque quae
                recusandae tempore dolor facilis expedita autem dolores impedit quaerat? Voluptatum quas eos nulla.</p>
        </div>
        <hr>
        <h4>Mục lục</h4>
        <ul class="mucluctruyen">
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
            <li><a href="">Phần thứ nhất - CHƯƠNG MỘT</a></li>
        </ul>

        <h4>Sách cùng mục</h4>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img class="card-img-top" src="{{asset('public/uploads/truyen/01034.jpg')}}"></img>
                    <div class="card-body">
                        <h5 class="card-text">This is a wider card with supporting text below as a natural
                            lead-in to additional content. This content is a little bit longer.</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                <a type="button" class="btn btn-sm btn-outline-secondary"><i
                                        class="fa-solid fa-eye">565983</i></a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img class="card-img-top" src="{{asset('public/uploads/truyen/01034.jpg')}}"></img>
                    <div class="card-body">
                        <h5 class="card-text">This is a wider card with supporting text below as a natural
                            lead-in to additional content. This content is a little bit longer.</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                <a type="button" class="btn btn-sm btn-outline-secondary"><i
                                        class="fa-solid fa-eye">565983</i></a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img class="card-img-top" src="{{asset('public/uploads/truyen/01034.jpg')}}"></img>
                    <div class="card-body">
                        <h5 class="card-text">This is a wider card with supporting text below as a natural
                            lead-in to additional content. This content is a little bit longer.</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                <a type="button" class="btn btn-sm btn-outline-secondary"><i
                                        class="fa-solid fa-eye">565983</i></a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <h3>Sách hay xem nhiều</h3>
    </div>
</div>
@endsection
