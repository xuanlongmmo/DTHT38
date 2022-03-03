<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://thuvienvector.com/upload/images/items/vector-hoa-van-hoa-tiet-trong-dong-viet-nam-72.webp" type="image/x-icon">
    <title>Di Tích HT</title>
	<base href="{{ asset('') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fe/libs/pagination/simplePagination.css">
    <link rel="stylesheet" href="assets/fe/css/root.css">
    @yield('style')
</head>
<body>
    <div class="root grid">
        <!-- header  -->
        @include('frontend.layout.menu')
        <!-- header  -->
        <div class="root__body">
            <!-- sidebar  -->
            @include('frontend.layout.sidebar')
            <!-- sidebar  -->
            <div id="root__content-block" class="root__content-block">
                <div id="root__content" class="root__content">
                    <!-- content page  -->
                    @yield('content')
                    <!-- content page  -->
                    <!-- footer  -->
                    <div class="root__footer">
                        Hệ thống quản lý di tích được vận hành bởi sở Văn Hóa - Thể Thao - Du Lịch tỉnh Hà Tĩnh
                    </div>
                    <!-- footer  -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="assets/fe/libs/pagination/jquery.simplePagination.js"></script>
<script src="assets/fe/js/root.js"></script>
@yield('js')
</html>