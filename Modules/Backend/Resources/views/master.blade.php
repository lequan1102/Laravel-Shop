<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Backend</title>
        <link rel="shortcut icon" href="{{ asset('public/backend/img/logoicon.png') }}" />
        <!--====================================Bootstrap 4.0.0========================================-->
        <link rel="stylesheet" href="{{ asset('public/backend/bs/bootstrap.min.css') }}">
        <!--====================================Fontawesome 5.1.0.1====================================-->
        <link rel="stylesheet" href="{{ asset('public/backend/fa/css/all.min.css') }}">
        <!--====================================CSS====================================================-->
        <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/plugin.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/style.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/stylesheets/page.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/libs/dropify/css/dropify.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/libs/datatable/datatables.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/libs/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/backend/libs/select2/select2.min.css') }}">
        <!--====================================Fonts==================================================-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i&display=swap">
        <!--====================================Plugin=================================================-->
        @yield('head')
    </head>
    <body>
        <div class="vipper-fluid">
            <div class="vipper-wapper">
                <?php $segment = Request::segment(3) ?>
                <!--Thực đơn thanh bên-->
                <nav class="sidebar-menu">
                    <div class="panel widget sidebar" style="background-image:url('{{ Auth::user()->background }}')">
                        <div class="dimmer"></div>
                        <div class="panel-content">
                            <img class="avatar" src="{{ Auth::user()->avatar }}">
                            {{-- {{ Auth::user()->avatar }} --}}
                            <h2 class="viewa">{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!--Sidebar-->
                    <ul class="list-treeview">
                        <li class="treeview @if (isset($dashbroad))) color_sidebar @endif">
                            <a href="{{ route('index.dashbroad')  }}" class="viewa" data-show="Widgets" title="Nơi hiển thị thông tin bao quát về website của bạn">
                            <svg viewBox="0 0 576 512"><path fill="currentColor" d="M120 320c0 13.26-10.74 24-24 24s-24-10.74-24-24 10.74-24 24-24 24 10.74 24 24zm168-168c13.26 0 24-10.74 24-24s-10.74-24-24-24-24 10.74-24 24 10.74 24 24 24zm-136 8c-13.26 0-24 10.74-24 24s10.74 24 24 24 24-10.74 24-24-10.74-24-24-24zm282.06 11.56c6.88 5.56 7.94 15.64 2.38 22.5l-97.14 120C347.18 324.7 352 337.74 352 352c0 35.35-28.65 64-64 64s-64-28.65-64-64 28.65-64 64-64c9.47 0 18.38 2.18 26.47 5.88l97.09-119.94c5.56-6.88 15.6-7.92 22.5-2.38zM320 352c0-17.67-14.33-32-32-32s-32 14.33-32 32 14.33 32 32 32 32-14.33 32-32zm160-56c-13.26 0-24 10.74-24 24s10.74 24 24 24 24-10.74 24-24-10.74-24-24-24zm96 24c0 52.8-14.25 102.26-39.06 144.8-5.61 9.62-16.3 15.2-27.44 15.2h-443c-11.14 0-21.83-5.58-27.44-15.2C14.25 422.26 0 372.8 0 320 0 160.94 128.94 32 288 32s288 128.94 288 288zm-32 0c0-141.16-114.84-256-256-256S32 178.84 32 320c0 45.26 12 89.75 34.7 128.68l442.8-.68C532 409.75 544 365.26 544 320z"></path></svg>
                            Bảng điều khiển</a>
                        </li>
                        <li class="treeview @if (isset($category))) color_sidebar @endif">
                            <a href="{{ route('index.category') }}" class="viewa" data-show="Category" title="Các chuyên mục của bạn nằm ở đây">
                            <svg viewBox="0 0 512 512"><path fill="currentColor" d="M464 0H144c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h320c26.51 0 48-21.49 48-48v-48h48c26.51 0 48-21.49 48-48V48c0-26.51-21.49-48-48-48zm-80 464c0 8.82-7.18 16-16 16H48c-8.82 0-16-7.18-16-16V144c0-8.82 7.18-16 16-16h48v240c0 26.51 21.49 48 48 48h240v48zm96-96c0 8.82-7.18 16-16 16H144c-8.82 0-16-7.18-16-16V48c0-8.82 7.18-16 16-16h320c8.82 0 16 7.18 16 16v320z"></path></svg>
                            Danh mục</a>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="{{ route('index.category') }}">Danh mục</a></li>
                            </ul>
                        </li>
                        <li class="treeview @if (isset($page))) color_sidebar @endif">
                            <a href="/pages" class="viewa" data-show="Page" title="Nơi bạn thêm các trang con đơn lẻ">
                            <svg viewBox="0 0 384 512"><path fill="currentColor" d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zm-22.6 22.7c2.1 2.1 3.5 4.6 4.2 7.4H256V32.5c2.8.7 5.3 2.1 7.4 4.2l83.9 83.9zM336 480H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h176v104c0 13.3 10.7 24 24 24h104v304c0 8.8-7.2 16-16 16zm-48-244v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm0 64v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm0 64v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12z"></path></svg>
                            Trang đơn</a>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="/page">Trang đơn</a></li>
                            </ul>
                        </li>
                        <li class="treeview @if (isset($posts)) color_sidebar @endif">
                            <a class="viewa" data-show="Posts" title="Nơi bạn thêm bài viết tin tức">
                            <svg viewBox="0 0 576 512"><path fill="currentColor" d="M560.83 135.96l-24.79-24.79c-20.23-20.24-53-20.26-73.26 0L384 189.72v-57.75c0-12.7-5.1-25-14.1-33.99L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99v-80.54c6.29-4.68 12.62-9.35 18.18-14.95l158.64-159.3c9.79-9.78 15.17-22.79 15.17-36.63s-5.38-26.84-15.16-36.63zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v61.53l-48.51 48.24c-30.14 29.96-47.42 71.51-47.47 114-3.93-.29-7.47-2.42-9.36-6.27-11.97-23.86-46.25-30.34-66-14.17l-13.88-41.62c-3.28-9.81-12.44-16.41-22.78-16.41s-19.5 6.59-22.78 16.41L103 376.36c-1.5 4.58-5.78 7.64-10.59 7.64H80c-8.84 0-16 7.16-16 16s7.16 16 16 16h12.41c18.62 0 35.09-11.88 40.97-29.53L144 354.58l16.81 50.48c4.54 13.51 23.14 14.83 29.5 2.08l7.66-15.33c4.01-8.07 15.8-8.59 20.22.34C225.44 406.61 239.9 415.7 256 416h32c22.05-.01 43.95-4.9 64.01-13.6v61.61zm27.48-118.05A129.012 129.012 0 0 1 288 384v-.03c0-34.35 13.7-67.29 38.06-91.51l120.55-119.87 52.8 52.8-119.92 120.57zM538.2 186.6l-21.19 21.19-52.8-52.8 21.2-21.19c7.73-7.73 20.27-7.74 28.01 0l24.79 24.79c7.72 7.73 7.72 20.27-.01 28.01z"></path></svg>
                            Bài viết</a>
                            <svg class="viewa" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            <ul class="treeview-menu @if (isset($posts))) menu-open @endif" id="Posts">
                                <li><a href="{{ route('index.posts') }}" title="Các bài viết về tin tức">Tin tức</a>
                                <li><a href="#" title="Các bài viết về dự án">Dự án</a>
                                <li><a href="#" title="Các bài viết về vâu hỏi về sản phẩm">FAQ</a>
                            </ul>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="{{ route('index.posts') }}" title="Các bài viết về tin tức">Tin tức</a>
                                <li><a href="#" title="Các bài viết về dự án">Dự án</a>
                                <li><a href="#" title="Các bài viết về vâu hỏi về sản phẩm">FAQ</a>
                            </ul>
                        </li>
                        <li class="treeview @if (isset($product))) color_sidebar @endif">
                            <a class="viewa" data-show="Product" title="Tổng hợp các mục về bán hàng nơi bạn quản lí các sản phẩm của mình">
                            <svg viewBox="0 0 448 512"><path fill="currentColor" d="M352 128C352 57.421 294.579 0 224 0 153.42 0 96 57.421 96 128H0v304c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V128h-96zM224 32c52.935 0 96 43.065 96 96H128c0-52.935 43.065-96 96-96zm192 400c0 26.467-21.533 48-48 48H80c-26.467 0-48-21.533-48-48V160h64v48c0 8.837 7.164 16 16 16s16-7.163 16-16v-48h192v48c0 8.837 7.163 16 16 16s16-7.163 16-16v-48h64v272z"></path></svg>
                            Bán hàng</a>
                            <svg class="viewa" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            <ul class="treeview-menu @if (isset($product))) menu-open @endif" id="Product">
                                <li><a href="{{ route('index.products') }}" title="Quản lí các sản phẩm bạn đang bán">Sản phẩm</a>
                                <li><a href="#" title="Kiểm tra tình trạng các đơn hàng">Đơn hàng</a>
                                <li><a href="#" title="Mã giảm giá cho sản phẩm">Mã giảm giá</a>
                                <li><a href="#" title="Kho hàng của bạn">Kho hàng</a></li>
                            </ul>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="{{ route('index.products') }}">Sản phẩm</a></li>
                                <li><a href="#">Đơn hàng</a></li>
                                <li><a href="#">Mã giảm giá</a></li>
                                <li><a href="#">Kho hàng</a></li>
                            </ul>
                        </li>
                        <li class="treeview @if (isset($contact)) color_sidebar @endif">
                            <a href="{{ route('index.contact') }}" class="viewa" data-show="Mailbox" title="Nơi kiểm tra những khách hàng đã liên hệ với bạn qua website">
                            <svg viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z"></path></svg>
                            Liên hệ</a>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="{{ route('index.contact') }}">Liên hệ</a></li>
                            </ul>
                        </li>
                        <li class="treeview @if (isset($themes)) color_sidebar @endif">
                            <a class="viewa" data-show="Themes" title="Nơi bạn chỉnh sửa giao diện trên website của mình"><svg viewBox="0 0 448 512"><path fill="currentColor" d="M352 64H241.12c3.32-14.4 9.75-27.88 19.46-39.28 2.77-3.25 2.81-7.98-.21-11L249.04 2.39c-3.22-3.22-8.62-3.23-11.62.2-15.38 17.51-25.27 38.67-29.1 61.41H96c-53.02 0-96 42.98-96 96v32c0 17.67 14.33 32 32 32v32c0 98.06 55.4 187.7 143.11 231.55L224 512l48.89-24.45C360.6 443.7 416 354.06 416 256v-32c17.67 0 32-14.33 32-32v-32c0-53.02-42.98-96-96-96zm32 192c0 86.49-48.06 164.25-125.42 202.93L224 476.22l-34.58-17.29C112.06 420.25 64 342.49 64 256v-32h320v32zm32-64H32v-32c0-35.29 28.71-64 64-64h256c35.29 0 64 28.71 64 64v32z"></path></svg>
                            Chỉnh sửa giao diện</a>
                            <svg class="viewa" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            <ul class="treeview-menu @if (isset($themes))) menu-open @endif" id="Themes">
                                <li><a href="/banner" title="Chỉnh sửa hình ảnh banner của bạn">Banner</a>
                                <li><a href="/banner" title="Chỉnh sửa mục giải pháp của bạn">Giải pháp</a></li>
                                <li><a href="/banner" title="Chỉnh sửa mục mô hình của bạn">Mô hình</a></li>
                                <li><a href="/camket" title="Chỉnh sửa mục cam kết của bạn">Cam kết</a></li>
                            </ul>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="/banner">Banner</a></li>
                                <li><a href="/banner">Giải pháp</a></li>
                                <li><a href="/banner">Mô hình</a></li>
                                <li><a href="/camket">Cam kết</a></li>
                            </ul>
                        </li>
                        <li class="treeview @if (isset($users)) color_sidebar @endif">
                            <a class="viewa" data-show="Users" title="Nơi quản lí người dùng trong website">
                            <svg viewBox="0 0 640 512"><path fill="currentColor" d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM320 256c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm244 192h-40c-15.2 0-29.3 4.8-41.1 12.9 9.4 6.4 17.9 13.9 25.4 22.4 4.9-2.1 10.2-3.3 15.7-3.3h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm304.1 180c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM480 432c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zM157.1 268.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4z"></path></svg>
                            Người dùng</a>
                            <svg class="viewa" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            <ul class="treeview-menu @if (isset($users))) menu-open @endif" id="Users">
                                <li><a href="{{ route('index.users') }}" title="Tài khoản khách hàng đã đăng ký">Khách hàng</a>
                                <li><a href="{{ route('index.admin') }}" title="Tài khoản quản trị quản lý website hiện tại">Quản trị</a>
                            </ul>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="{{ route('index.users') }}">Người dùng</a></li>
                                <li><a href="{{ route('index.admin') }}">Quản trị</a></li>
                            </ul>
                        </li>
                       
                        <li class="treeview @if ( $segment == 'settings') color_sidebar @endif">
                            <a class="viewa" data-show="Settings">
                            <svg viewBox="0 0 512 512"><path fill="currentColor" d="M482.696 299.276l-32.61-18.827a195.168 195.168 0 0 0 0-48.899l32.61-18.827c9.576-5.528 14.195-16.902 11.046-27.501-11.214-37.749-31.175-71.728-57.535-99.595-7.634-8.07-19.817-9.836-29.437-4.282l-32.562 18.798a194.125 194.125 0 0 0-42.339-24.48V38.049c0-11.13-7.652-20.804-18.484-23.367-37.644-8.909-77.118-8.91-114.77 0-10.831 2.563-18.484 12.236-18.484 23.367v37.614a194.101 194.101 0 0 0-42.339 24.48L105.23 81.345c-9.621-5.554-21.804-3.788-29.437 4.282-26.36 27.867-46.321 61.847-57.535 99.595-3.149 10.599 1.47 21.972 11.046 27.501l32.61 18.827a195.168 195.168 0 0 0 0 48.899l-32.61 18.827c-9.576 5.528-14.195 16.902-11.046 27.501 11.214 37.748 31.175 71.728 57.535 99.595 7.634 8.07 19.817 9.836 29.437 4.283l32.562-18.798a194.08 194.08 0 0 0 42.339 24.479v37.614c0 11.13 7.652 20.804 18.484 23.367 37.645 8.909 77.118 8.91 114.77 0 10.831-2.563 18.484-12.236 18.484-23.367v-37.614a194.138 194.138 0 0 0 42.339-24.479l32.562 18.798c9.62 5.554 21.803 3.788 29.437-4.283 26.36-27.867 46.321-61.847 57.535-99.595 3.149-10.599-1.47-21.972-11.046-27.501zm-65.479 100.461l-46.309-26.74c-26.988 23.071-36.559 28.876-71.039 41.059v53.479a217.145 217.145 0 0 1-87.738 0v-53.479c-33.621-11.879-43.355-17.395-71.039-41.059l-46.309 26.74c-19.71-22.09-34.689-47.989-43.929-75.958l46.329-26.74c-6.535-35.417-6.538-46.644 0-82.079l-46.329-26.74c9.24-27.969 24.22-53.869 43.929-75.969l46.309 26.76c27.377-23.434 37.063-29.065 71.039-41.069V44.464a216.79 216.79 0 0 1 87.738 0v53.479c33.978 12.005 43.665 17.637 71.039 41.069l46.309-26.76c19.709 22.099 34.689 47.999 43.929 75.969l-46.329 26.74c6.536 35.426 6.538 46.644 0 82.079l46.329 26.74c-9.24 27.968-24.219 53.868-43.929 75.957zM256 160c-52.935 0-96 43.065-96 96s43.065 96 96 96 96-43.065 96-96-43.065-96-96-96zm0 160c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64z"></path></svg>
                            Cài đặt </a>
                            <svg class="viewa" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            <ul class="treeview-menu  @if ( $segment == 'settings') menu-open @endif" id="Settings">
                                <li><a href="{{ route('index.menu') }}">Menus</a>
                                <li><a href="{{ route('index.roles') }}">Roles</a></li>
                                <li><a href="/sidebar">Sidebar</a></li>
                                <li><a href="{{ route('index.settings') }}">Settings</a></li>
                            </ul>
                            <!--Treeview Mobie-->
                            <ul class="treeview-mobie">
                                <li><a href="{{ route('index.menu') }}">Menus</a></li>
                                <li><a href="{{ route('index.roles') }}">Roles</a></li>
                                <li><a href="/sidebar">Sidebar</a></li>
                                <li><a href="{{ route('index.settings') }}">Settings</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <main class="content-wapper">
                    <header>
                        <div class="wrapbread">
                            <div class="svg" id="button_repon">
                                <svg id="reponmb" class="display" viewBox="0 0 448 512"><path fill="currentColor" d="M229.9 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L94.569 282H436c6.627 0 12-5.373 12-12v-28c0-6.627-5.373-12-12-12H94.569l155.13-155.13c4.686-4.686 4.686-12.284 0-16.971L229.9 38.101c-4.686-4.686-12.284-4.686-16.971 0L3.515 247.515c-4.686 4.686-4.686 12.284 0 16.971L212.929 473.9c4.686 4.686 12.284 4.686 16.971-.001z"></path></svg>

                                <svg id="reponpc" viewBox="0 0 512 512"><path fill="currentColor" d="M464 256H48a48 48 0 0 0 0 96h416a48 48 0 0 0 0-96zm16 128H32a16 16 0 0 0-16 16v16a64 64 0 0 0 64 64h352a64 64 0 0 0 64-64v-16a16 16 0 0 0-16-16zM58.64 224h394.72c34.57 0 54.62-43.9 34.82-75.88C448 83.2 359.55 32.1 256 32c-103.54.1-192 51.2-232.18 116.11C4 180.09 24.07 224 58.64 224zM384 112a16 16 0 1 1-16 16 16 16 0 0 1 16-16zM256 80a16 16 0 1 1-16 16 16 16 0 0 1 16-16zm-128 32a16 16 0 1 1-16 16 16 16 0 0 1 16-16z"></path></svg>
                            </div>
                            <!--Breadcrumb-->
                            @yield('breadcrumbs')
                        </div>
                        <div class="custom-menu">
                            <!--Notifications-->
                            <div class="dropdown notifications">
                                <div class="btn-group">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg viewBox="0 0 448 512"><g><path fill="currentColor" d="M448 384c-.1 16.4-13 32-32.1 32H32.08C13 416 .09 400.4 0 384a31.25 31.25 0 0 1 8.61-21.71c19.32-20.76 55.47-52 55.47-154.29 0-77.7 54.48-139.9 127.94-155.16V32a32 32 0 1 1 64 0v20.84C329.42 68.1 383.9 130.3 383.9 208c0 102.3 36.15 133.53 55.47 154.29A31.27 31.27 0 0 1 448 384z"></path><path fill="currentColor" d="M160 448h128a64 64 0 0 1-128 0z"></path></g></svg>
                                    </button>
                                    <div class="dropdown-menu">
                                    notifications
                                    notifications
                                    notifications
                                    notifications
                                    notifications
                                    notifications
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown fresh-chat">
                                <div class="btn-group">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg viewBox="0 0 512 512"><g><path fill="currentColor" d="M448 0H64A64.06 64.06 0 0 0 0 64v288a64.06 64.06 0 0 0 64 64h96v84a12 12 0 0 0 19.1 9.7L304 416h144a64.06 64.06 0 0 0 64-64V64a64.06 64.06 0 0 0-64-64zM288 264a8 8 0 0 1-8 8H136a8 8 0 0 1-8-8v-16a8 8 0 0 1 8-8h144a8 8 0 0 1 8 8zm96-96a8 8 0 0 1-8 8H136a8 8 0 0 1-8-8v-16a8 8 0 0 1 8-8h240a8 8 0 0 1 8 8z"></path><path fill="currentColor" d="M280 240H136a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h144a8 8 0 0 0 8-8v-16a8 8 0 0 0-8-8zm96-96H136a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h240a8 8 0 0 0 8-8v-16a8 8 0 0 0-8-8z" class="fa-primary"></path></g></svg>
                                    </button>
                                    <div class="dropdown-menu">
                                    fresh chat
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown question">
                                <div class="btn-group">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg viewBox="0 0 512 512"><g><path fill="currentColor" d="M256 8C119 8 8 119.08 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 422a46 46 0 1 1 46-46 46.05 46.05 0 0 1-46 46zm40-131.33V300a12 12 0 0 1-12 12h-56a12 12 0 0 1-12-12v-4c0-41.06 31.13-57.47 54.65-70.66 20.17-11.31 32.54-19 32.54-34 0-19.82-25.27-33-45.7-33-27.19 0-39.44 13.14-57.3 35.79a12 12 0 0 1-16.67 2.13L148.82 170a12 12 0 0 1-2.71-16.26C173.4 113 208.16 90 262.66 90c56.34 0 116.53 44 116.53 102 0 77-83.19 78.21-83.19 106.67z"></path><path fill="currentColor" d="M256 338a46 46 0 1 0 46 46 46 46 0 0 0-46-46zm6.66-248c-54.5 0-89.26 23-116.55 63.76a12 12 0 0 0 2.71 16.24l34.7 26.31a12 12 0 0 0 16.67-2.13c17.86-22.65 30.11-35.79 57.3-35.79 20.43 0 45.7 13.14 45.7 33 0 15-12.37 22.66-32.54 34C247.13 238.53 216 254.94 216 296v4a12 12 0 0 0 12 12h56a12 12 0 0 0 12-12v-1.33c0-28.46 83.19-29.67 83.19-106.67 0-58-60.19-102-116.53-102z"></path></g></svg>
                                    </button>
                                    <div class="dropdown-menu" style="width: 400px">
                                        <span class="question-label">Các câu hỏi thường gặp</span>
                                        <div class="search_question">
                                            <svg viewBox="0 0 512 512"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z"></path></svg>
                                            <input type="text" id="js_seach_question" name="search_question" placeholder="Tìm kiếm các câu hỏi">
                                        </div>
                                        <div class="list-question">
                                            @foreach ($question as $item)
                                                <a href="{{ route('show.question',['id' => $item->id]) }}" class="items">
                                                    <svg viewBox="0 0 384 512"><path fill="currentColor" d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zm-22.6 22.7c2.1 2.1 3.5 4.6 4.2 7.4H256V32.5c2.8.7 5.3 2.1 7.4 4.2l83.9 83.9zM336 480H48c-8.8 0-16-7.2-16-16V48c0-8.8 7.2-16 16-16h176v104c0 13.3 10.7 24 24 24h104v304c0 8.8-7.2 16-16 16zm-48-244v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm0 64v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm0 64v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12z"></path></svg>
                                                    <span>{{ $item->name }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="block-compartment"></span>
                            <div class="dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="avatar" src="{{ Auth::user()->avatar }}">
                                </button>
                                <div class="dropdown-menu">
                                    <div class="menu-label">{{ Auth::user()->name }}</div>
                                    <a class="items" href="/" target="_blank">Nhà</a>
                                    <a class="items" href="">Thiết đặt hồ sơ</a>
                                    <a class="items" href="/">Thay đổi mật khẩu</a>
                                    <a class="items" href="{{ route('logout.admin') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                                    <form id="logout-form" action="{{ route('logout.admin') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="novication">
                        @yield('novication')
                        <ul class="nav nav-tabs custom_tabs">
                            <li class="nav-item">
                                <!--{ url('locale/vi') }}-->
                                <a href="#vi" class="active" data-toggle="tab">VI</a>
                            </li>
                            <li class="nav-item">
                                <a href="#en" data-toggle="tab">EN</a>
                            </li>
                        </ul>
                    </div>
                    <section class="content-custom">

                        {{-- @if (count($errors) > 0)    //hiển thị tất cả các lỗi
                          <ul class="error_msg">
                            @foreach ($errors->all() as $item)
                                <div class="alert alert-danger" role="alert">
                                    {{$item}}
                                </div>
                            @endforeach
                          </ul>
                        @endif --}}
                        <div class="content-wrap">
                            @yield('layout')
                        </div>
                    </section>
                </main>
            </div>
        </div>

        <footer class="text-right">
            Created with
            <svg viewBox="0 0 512 512"><g><path style="color: #fbe0bc" fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm123.5 272.3L268.9 394.5a17.88 17.88 0 0 1-25.9 0L132.5 280.3c-32.1-33.2-30.2-88.2 5.7-118.8 31.3-26.7 77.9-21.9 106.6 7.7l11.3 11.6 11.3-11.6c28.7-29.6 75.3-34.4 106.6-7.7 35.8 30.6 37.7 85.6 5.5 118.8z"></path><path style="color: #ffba5f" fill="currentColor" d="M379.5 280.3L268.9 394.5a17.88 17.88 0 0 1-25.9 0L132.5 280.3c-32.1-33.2-30.2-88.2 5.7-118.8 31.3-26.7 77.9-21.9 106.6 7.7l11.3 11.6 11.3-11.6c28.7-29.6 75.3-34.4 106.6-7.7 35.8 30.6 37.7 85.6 5.5 118.8z"></path></g></svg>
            of the Premium development team by &nbsp;<a href="https://premium.fondk.vn"> Fondk</a>
        </footer>




        {{-- <div class="wrapper_spinner active">
            <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66">
                <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
            </svg>
        </div> --}}
        <!--====================================PLUGIN STICKER====================================-->
        <!--===============Jquery===============-->
        <script src="{{ asset('public/backend/js/jquery-3.3.1.min.js') }}"></script>
        <!--===============Bootstrap JS===============-->
        <script src="{{ asset('public/backend/bs/popper.min.js') }}"></script>
        <script src="{{ asset('public/backend/bs/bootstrap.min.js') }}"></script>
        <!--===============Libs================-->
        <script src="{{ asset('public/backend/js/datatable.js') }}"></script>
        <script src="{{ asset('public/backend/libs/dropify/js/dropify.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('public/backend/libs/ckfinder/ckfinder.js') }}"></script>
        <script src="{{ asset('public/backend/libs/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('public/backend/libs/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('public/backend/js/cookie.js') }}"></script>
        <!--===============MY STYLE JS================-->
        <script>
            @if(session()->has('success'))
                toastr.success('{!! session()->get('success') !!}');
                @elseif (session()->has('warning'))
                    toastr.warning('{!! session()->get('warning') !!}');
                @elseif (session()->has('error'))
                    toastr.error('{!! session()->get('error') !!}');
            @endif
        </script>
        <script src="{{ asset('public/backend/js/style.js') }}"></script>
        <!--===============Footer================-->
        @yield('footer')
    </body>
</html>
