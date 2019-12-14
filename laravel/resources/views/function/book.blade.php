<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/JiSlider.css') }}" rel="stylesheet"> 
    <!-- light-box -->
    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">
    <!-- Owl-carousel-CSS -->
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/datsan.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome-icons -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/b1d9add112.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"> <br>
            <a href="{{ route('san.index', $id) }}" class="btn btn-link">
                <span class="fas fa-angle-double-left"></span>Quay lại
            </a>
            <h2 style="text-align: center;"> ĐẶT SÂN </h2> <br>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Cảnh báo!</strong> Đã xảy ra một số lỗi khi bạn nhập. <br> <br>
                    <ul>
                        @foreach ($errors -> all() as $er)
                            <li>{{  $er }}</li>
                        @endforeach
                    </ul>                   
                </div> 
            @endif 

            <form action="{{ route('book') }} " class="form-horizontal" method="POST">
                
                <input type="hidden" name="_token" value="{{  csrf_token()  }}">
                
                <div class="form-group">
                    <label for="san" class="form-label">Sân: </label>
                    <input class="form-control" type="text" disabled value="{{$name}}">
                    <input class="form-control" type="hidden" name="san" id="san" value="{{$id}} ">
                </div>
            
                <div class="form-group">
                    <label for="date" class="form-label">Ngày đặt: </label>
                    <input class="form-control" type="text"  name="date" id="date" value="{{$date}}" readonly>
                </div>
            
                <div class="form-group">
                    <label for="time" class="form-label">Giờ đặt: </label>
                    <input class="form-control" type="text"  name="time" id="time" value="{{$time}}" readonly>

                </div>
                
                <div class="form-group">
                    <label for="time" class="form-label">Tên liên hệ: </label>
                    <input class="form-control" type="text" name="tenKH" id="tenKH" required placeholder="Nhập tên liên hệ">
                </div>
                
                <div class="form-group">
                    <label for="time" class="form-label">Số điện thoại: </label>
                    <input class="form-control" type="text" name="sdt" id="sdt" required placeholder="Nhập số điện thoại liên hệ">
                </div>
                
                <div class="form-group">
                    <label for="time" class="form-label">Ghi chú: </label>
                    <textarea class="form-control" type="text" name="note" id="note"  placeholder="Nhập ghi chú( Nếu có)" rows="7"></textarea>
                </div>
            
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Đặt Sân</button>
                </div>
            </form>
        </div>
        <div class="col-sm-4"></div>  
    </div>
</body>
</html>

