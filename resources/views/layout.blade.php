<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>sách truyện</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        .switch_color {
            background: #181818;
            color: #fff;
        }
        .switch_color_light {
            background: #181818 !important;
            color: #fff;
        }
        .noidung_color{
            color: #fff;
        }
    </style>    

</head>


<body>
   
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{url('/')}}">Truyenmanga.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Trang chủ</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Danh mục truyện
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($danhmuc as $key => $danh)
                                <a class="dropdown-item" href="{{url('danh-muc/' .$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Thể Loại
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($theloai as $key => $the)
                                <a class="dropdown-item" href="{{url('the-loai/' .$the->slug_theloai)}}">{{$the->tentheloai}}</a>
                                @endforeach
                            </div>
                        </li>
                        
                    </ul>
                        <form autocomplete="off" class="d-flex position-relative" action="{{url('tim-kiem')}}" method="POST">
                            @csrf
                            <input class="form-control me-2" type="search" id="keywords" name="tukhoa" placeholder="Tìm kiếm..." aria-label="Search">
                            <div id="search_ajax" class=" position-absolute top-100 mt-2 w-100"></div>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    <select class="custom-select mr-sm-2" id="switch_color">
                        <option value="xam">Xám</option>
                        <option value="den">Đen</option>
                    </select>
                </div>
            </div>
        </nav>
        @yield('slide')
        @yield('content')
        <footer class="text-muted py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1"> Cổng Light Novel - Đọc Light Novel</p>
                <p class="mb-0">@Copyright ManhuaTeam.</p>
            </div>
        </footer>
    </div>
   
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){

            if(localStorage.getItem('switch_color')!==null){
                const data = localStorage.getItem('switch_color');
                const data_obj = JSON.parse(data);
                $(document.body).addClass(data_obj.class_1);
                $('.album').addClass(data_obj.class_2);
                $('.card-body').addClass(data_obj.class_1);
                $('ul.mucluctruyen > li > a').css('color','#fff');
                $('.sidebar > a').css('color','#000');

                $("select option[value = 'den']").attr("selected","selected");
            }
        

            $("#switch_color").change(function(){
                $(document.body).toggleClass('switch_color');
                $('.album').toggleClass('switch_color_light');
                $('.card-body').toggleClass('switch_color');
                $('.noidungchuong').toggleClass('noidung_color');
                $('ul.mucluctruyen > li > a').css('color','#fff');
                $('.sidebar > a').css('color','#000');
                if($(this).val()=='den'){
                    var item = {
                        'class_1':'switch_color',
                        'class_2':'switch_color_light'
                    }
                    localStorage.setItem('switch_color', JSON.stringify(item));
                }else if($(this).val()=='xam'){ 
                    localStorage.removeItem('switch_color');
                    $('ul.mucluctruyen > li > a').css('color','#000');
                }    
                });
        });
        
    </script>

    <script type="text/javascript">
        $('#keywords').keyup( function() {
            var keywords = $(this).val();
            
                if(keywords !='')
                {
                    var _token = $('input[name="_token"]').val();

                    $.ajax({
                        url:"{{url('/timkiem-ajax')}}",
                        method:"POST",
                        data:{keywords:keywords, _token:_token},
                        success:function(data){
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);
                        }
                    });
                }else{
                    $('#search_ajax').fadeOut();
                }
        });

        $(document).on('click','.li_search_ajax', function(){
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });

    </script>

    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            dot: true,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>
    <script type="text/javascript">
        $('.select-chapter').on('change',function(){
            var url = $(this).val();
            if(url){
                window.location = url;
            }
            return false;
        });

        current_chapter();

        function current_chapter(){
            var url = window.location.href;
            $('.select-chapter').find('option[value="'+url+'"]').attr("selected", true);
        }
    </script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v16.0" nonce="pxTPSUAM">
    </script>
</body>

</html>