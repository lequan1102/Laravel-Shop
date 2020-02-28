@extends('backend::master')
@section('head')
<style>
    .dropify-wrapper .dropify-preview .dropify-infos {
        overflow: hidden;
        border-radius: 50%;
    }
    .element {
        display: none;
    }
    .none {
        display: none !important;
    }
    </style>
    {{-- <php
        // $currentUrl = url()->current();
        //lấy url hiện tại
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    ?>     --}}
@endsection

@section('layout')
    <div class="container-fluid tab-pane active Settings" id="vi">
        <div class="alert__ alert_info">
            <strong>Cách sử dụng:</strong>
            <p>Bạn có thể xuất các cài đặt cấu hình ở bất cứ đâu trên trang web của mình bằng cách gọi  <code>setting('key.value')</code></p>
        </div>
        <div class="row">
            <div class="col col-xl-8 col-12">
                <div class="row clear__">
                    <div class="col-12 panel v2">
                        <!--Tabs Settings content-->
                        <ol class="tabs-js clear">
                            <li class="tablinks" onclick="openTabsSettings(event, 'basic')"><span>Cơ bản</span></li>
                            <li class="tablinks" onclick="openTabsSettings(event, 'advanced')"><span>Nâng cao</span></li>
                            <li class="tablinks active" onclick="openTabsSettings(event, 'developers')"><span>Nhà phát triển</span></li>
                        </ol>
                        <!--Tabs Settings content-->
                        <div class="row">
                            <!--Basic-->
                            <div class="col col-12 tab-settings" id="basic">
                                <div class="row">
                                    <div class="col col-sm-12">
                                        <div class="text-center">
                                            <h6><svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm120 16c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z"></path></svg>Thông tin cơ bản</h6>
                                        </div>
                                    </div>
                                    <!--Logo-->
                                    <div class="col col-sm-3 logo_site">
                                        <input type="text" id="image" name="logo" class="form-control-file dropify" data-show-remove="false" data-allowed-file-extensions="pdf jpg jpeg png" data-default-file="/public/uploads/images/logo.png">
                                    </div>
                                    <!--Basic Information-->
                                    <div class="col col-sm-9">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="title_web">Tên trang web *<code class="ml10">site.title_web</code></label>
                                                    <input type="text" id="title_web" name="title_web" class="form-control" placeholder="Tên website của bạn" value="Fondk - Trang tin tức công nghệ dành cho giới trẻ">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Email*<code class="ml10">site.email</code></label>
                                                    <input type="text" id="title" name="email" class="form-control" placeholder="Company@gmail.com" value="quan@vtechcom.org">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="sdt">Số điện thoại*<code class="ml10">site.phone</code></label>
                                                    <input type="text" id="sdt" name="sdt" class="form-control" placeholder="(+84) 34.456.789" value="0365768965">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="email">Email*<code class="ml10">site.email</code></label>
                                                    <input type="text" id="title" name="email" class="form-control" placeholder="Company@gmail.com" value="quan@vtechcom.org">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="sdt">Địa chỉ*<code class="ml10">site.location</code></label>
                                                    <input type="text" id="sdt" name="sdt" class="form-control" placeholder="Địa chỉ" value="Tầng 36, Khu E6 Đô thị mới Cầu Giấy, Phạm Hùng, Mễ Trì, Nam Từ Liêm, Hà Nội">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Social-->
                                    <div class="col col-12">
                                        <div class="text-center">
                                            <h6><svg viewBox="0 0 448 512"><path fill="currentColor" d="M352 320c-28.6 0-54.2 12.5-71.8 32.3l-95.5-59.7c9.6-23.4 9.7-49.8 0-73.2l95.5-59.7c17.6 19.8 43.2 32.3 71.8 32.3 53 0 96-43 96-96S405 0 352 0s-96 43-96 96c0 13 2.6 25.3 7.2 36.6l-95.5 59.7C150.2 172.5 124.6 160 96 160c-53 0-96 43-96 96s43 96 96 96c28.6 0 54.2-12.5 71.8-32.3l95.5 59.7c-4.7 11.3-7.2 23.6-7.2 36.6 0 53 43 96 96 96s96-43 96-96c-.1-53-43.1-96-96.1-96zm0-288c35.3 0 64 28.7 64 64s-28.7 64-64 64-64-28.7-64-64 28.7-64 64-64zM96 320c-35.3 0-64-28.7-64-64s28.7-64 64-64 64 28.7 64 64-28.7 64-64 64zm256 160c-35.3 0-64-28.7-64-64s28.7-64 64-64 64 28.7 64 64-28.7 64-64 64z"></path></svg>Mạng xã hội</h6>
                                        </div>
                                        <div class="row">
                                            <div class="col col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="FACEBOOK">Facebook</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg style="width: 10px;" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price" id="FACEBOOK" placeholder="facebook">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="TWITTER">Twitter</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg style="width: 15px;" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price" id="TWITTER" placeholder="twitter">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="INSTARGAM">Instargam</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg style="width: 15px;" viewBox="0 0 448 512"><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price" id="INSTARGAM" placeholder="Instargam">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="YOUTUBE">Youtube</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg style="width: 17px;" viewBox="0 0 576 512"><path fill="currentColor" d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price" id="YOUTUBE" placeholder="Youtube">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="LINKEDIN">Linkedin</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg style="width: 15px" viewBox="0 0 448 512"><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price" id="LINKEDIN" placeholder="Linkedin">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-lg-4 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="GOOGLE">Google</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <svg style="width: 19px" viewBox="0 0 640 512"><path fill="currentColor" d="M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599-65.484 0-118.92 54.221-118.92 121.277 0 67.056 53.436 121.277 118.92 121.277 75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z"></path></svg>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="price" id="GOOGLE" placeholder="Google">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Custom field-->
                                    <div class="col col-12">
                                        <div class="text-center">
                                            <h6><svg viewBox="0 0 448 512"><path fill="currentColor" d="M367.31 300.78c-26.29-14.84-47.14-61.41-67.17-97.83C284.41 174.31 254.21 160 224 160s-60.41 14.31-76.15 42.95c-20.29 36.96-40.12 82.56-67.17 97.83C51.63 317.18 32 348.18 32 383.95c0 53.01 42.98 95.98 96 95.98 1.31.04 2.6.07 3.87.07 48.88 0 68.92-32.06 92.13-32.06S267.25 480 316.13 480c1.27 0 2.56-.02 3.87-.07 53.02 0 96-42.97 96-95.98 0-35.77-19.63-66.77-48.69-83.17zm-48.39 147.17l-2.79.05c-20.12 0-33.04-7.72-46.73-15.89-12.71-7.58-27.1-16.17-45.39-16.17s-32.69 8.59-45.39 16.17C164.93 440.28 152 448 131.88 448l-3.87-.07c-35.29 0-64-28.7-64-63.98 0-22.82 12.42-44.02 32.42-55.31 30.46-17.2 50.03-54.48 68.96-90.53 3.52-6.71 7.02-13.37 10.52-19.75C184.97 201.85 202.95 192 224 192s39.03 9.85 48.1 26.36c3.31 6.02 6.64 12.32 10.02 18.71 19.4 36.69 39.46 74.63 69.46 91.57 20 11.29 32.42 32.49 32.42 55.31 0 35.28-28.71 63.98-65.08 64zM112 200c0-30.93-25.07-56-56-56S0 169.07 0 200s25.07 56 56 56 56-25.07 56-56zm-80 0c0-13.23 10.77-24 24-24s24 10.77 24 24-10.77 24-24 24-24-10.77-24-24zm360-56c-30.93 0-56 25.07-56 56s25.07 56 56 56 56-25.07 56-56-25.07-56-56-56zm0 80c-13.23 0-24-10.77-24-24s10.77-24 24-24 24 10.77 24 24-10.77 24-24 24zm-96-80c30.93 0 56-25.07 56-56s-25.07-56-56-56-56 25.07-56 56 25.07 56 56 56zm0-80c13.23 0 24 10.77 24 24s-10.77 24-24 24-24-10.77-24-24 10.77-24 24-24zm-144 80c30.93 0 56-25.07 56-56s-25.07-56-56-56-56 25.07-56 56 25.07 56 56 56zm0-80c13.23 0 24 10.77 24 24s-10.77 24-24 24-24-10.77-24-24 10.77-24 24-24z"></path></svg>Các trường tùy chỉnh</h6>
                                        </div>
                                        <div class="row" id="custom_field">
                                                
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Advanced-->
                            <div class="col col-12 tab-settings" id="advanced">
                                <div class="row">
                                    <div class="col col-sm-12">
                                        <h6><svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm120 16c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z"></path></svg>Google Analytics</h6>
                                    </div>
                                    <div class="col col-sm-12">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12">
                                        <h6><svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm120 16c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z"></path></svg>Cấu hình gửi email</h6>
                                    </div>
                                    <div class="col col-sm-12">
                                        
                                    </div>
                                </div>
                            </div>
                            <!--Developers-->
                            <div class="col col-12 tab-settings" id="developers" style="display: block">
                                <div class="row">
                                    <div class="col col-sm-12">
                                        <h6><svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm120 16c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z"></path></svg>Tùy chỉnh kích thước nén của ảnh</h6>
                                    </div>
                                    <div class="col col-sm-12">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-sm-12">
                                        <h6><svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm120 16c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z"></path></svg>Tùy chỉnh kích thước nén của ảnh</h6>
                                    </div>
                                    <div class="col col-sm-12">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Tips settings-->
            <div class="col col-xl-4 col-12">
                <div class="row">
                    <div class="col col-12">
                        <div class="panel">
                            <div class="text-center">
                                <h6 class="pt40"><svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm120 16c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z"></path></svg>Tuỳ chỉnh tương tác người dùng</h6>
                            </div>
                            <div class="p15">
                                <div class="form-group">  
                                    <span class="switch switch-sm">
                                        <input type="checkbox" class="switch" id="switch-tips-developer">
                                        <label for="switch-tips-developer">Lời khuyên dành cho nhà phát triển</label>
                                        <a href="javascript:void(0)"><svg tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="setting('key.value')" data-content="Gửi cho bạn những gợi ý code trong khi phát triển ứng dụng web" class="tips tips-dev" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg></a>
                                    </span>
                                </div>
                                <div class="form-group">  
                                    <span class="switch switch-sm">
                                        <input type="checkbox" class="switch" id="switch-sm">
                                        <label for="switch-sm">Tips developer</label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--CreateSettings-->
        <form action="/settings/create_field" method="POST"></form>
            <div class="row panel clear__ create_items">
                <div class="col col-12 text-center">
                    <h6><svg viewBox="0 0 512 512"><path fill="currentColor" d="M384 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm120 16c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-48 0c0-110.5-89.5-200-200-200S56 145.5 56 256s89.5 200 200 200 200-89.5 200-200z"></path></svg>Cài đặt mới</h6>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="label">Tên *</label>
                        <input type="text" id="label" name="label" class="form-control" placeholder="label: Điện thoại">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="key">Khoá *</label>
                        <input type="text" id="key" name="key" class="form-control" placeholder="name: phone">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="value">Giá trị *</label>
                        <input type="text" id="value" name="value" class="form-control" placeholder="value: 0123.456.789">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="title_web">Loại *</label>
                        <select name="type" id="type" class="form-control" required="required">
                            <option value="">Chọn loại</option>
                            <option value="text">Hộp văn bản</option>
                            <option value="textArea">Vùng văn bản</option>
                            <option value="richTextBox">Hộp văn bản phong phú</option>
                            <option value="codeEditor">Trình chỉnh sửa mã</option>
                            <option value="checkbox">Hộp kiểm</option>
                            <option value="radio">Nút radio</option>
                            <option value="selectDropdown">Chọn thả xuống</option>
                            <option value="file">Tập tin</option>
                            <option value="image">Đơn hình ảnh</option>
                            <option value="multiImage">Nhiều hình ảnh</option>
                        </select>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 element">
                    <div class="form-group">
                        <label for="title_web">Nhóm *</label>
                        <select name="group_by" class="form-control" id="group_by" required="required">
                            <option value="basic">Cơ bản</option>
                            <option value="advanced">Nâng cao</option>
                            <option value="developer">Nhà phát triển</option>
                        </select>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 element">
                    <div class="form-group">
                        <label for="element_class">Class</label>
                        <input type="text" value="col col-lg-4 col-md-6 col-12" id="element_class" name="element_class" class="form-control" placeholder="Element class">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 element placeholder">
                    <div class="form-group">
                        <label for="element_placeholder">Placeholder</label>
                        <input type="text" id="element_placeholder" name="element_placeholder" class="form-control" placeholder="Văn bản giữ chỗ">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 element">
                    <div class="form-group">
                        <label for="element_note">Ghi chú</label>
                        <input type="text" id="element_note" name="element_note" class="form-control" placeholder="Chú thích trường này">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 element border_ none">
                    <div class="form-group">
                        <label for="element_radius">Độ bo cạnh</label>
                        <input type="number" id="element_radius" name="element_radius" class="form-control" placeholder="Thiết lập độ mịn của đường cong (px)">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 element width none">
                    <div class="form-group">
                        <label for="element_width">Chiều rộng</label>
                        <input type="number" id="element_width" name="element_width" class="form-control" placeholder="Thiết lập chiều rộng (px)">
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-12 element height none">
                    <div class="form-group">
                        <label for="element_height">Chiều cao</label>
                        <input type="number" id="element_height" name="element_height" class="form-control" placeholder="Thiết lập chiều cao (px)">
                    </div>
                </div>
                <div class="col col-12 text-right">
                    <button type="submit" id="submit" class="btn btn-primary mb15">Thêm cài đặt mới</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script>
        /*Create field*/
        $('#submit').on('click', function(){
            $.ajax({
                type: "POST",
                url: "",
                data: {
                    label: $('#label').val(),
                    key:   $('#key').val(),
                    value: $('#value').val(),
                    type:  $('#type').val(),
                    group_by:  $('#group_by').val(),
                    element_class:  $('#element_class').val(),
                    element_id:  $('#element_id').val(),
                    element_width:  $('#element_width').val(),
                    element_height:  $('#element_height').val(),
                    element_radius:  $('#element_radius').val(),
                    element_placeholder:  $('#element_placeholder').val(),
                },
                success: function (response) {
                    console.log('success');
                    $('#custom_field').append(response);
                },
                error: function(){
                    console.log('error')
                }
            });
        });
        /*Validate onchange*/
        $('#type').on('change', function(){
            if ($(this).val() == 'text') {
                $('.element').removeClass('element');
                $('.placeholder').removeClass('none');
                $('.height').addClass('none');
            }
            if ($(this).val() == 'textArea') {
                $('.element').removeClass('element');
                $('.placeholder').addClass('none');
                $('.height').removeClass('none');
            }
            if ($(this).val() == 'image' || $(this).val() == 'multiImage') {
                $('.element').removeClass('element');
                $('.placeholder').addClass('none');
                $('.height').removeClass('none');
                $('.border_').removeClass('none');
                $('.width').removeClass('none');
            } else {
                $('.border_').addClass('none');
                $('.width').addClass('none');
            }
        });
        $('.delete_field').on('click', function(){
            $.ajax({
                type: "POST",
                url: "",
                data: {
                    id: $(this).val()
                },
                success: function (response) {
                    console.log('okie');
                    $('.modal').removeClass('show');
                    $('.modal-backdrop').removeClass("show");
                },
                error: function(response){
                    console.log('loi roi')
                }
            });
        });
    </script>
    <script>
        function openTabsSettings(evt, settingsName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-settings");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(settingsName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    </script>
    <script>
        CKEDITOR.replace( 'editor', {
            extraPlugins: 'easyimage',
            extraPlugins: 'cloudservices',
            filebrowserBrowseUrl: '/public/templates/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '/public/templates/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl: '/public/templates/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl: '/public/templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/uploads/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl: '/public/templates/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        } );
        $('.dropify').dropify({
            messages: {
                'default': 'Kéo thả tập tin ở đây hoặc nhấn chuột',
                'replace': 'Kéo thả hoặc nhấn để thay thế',
                'remove':  'xóa bỏ',
                'error':   'Ooops, Có gì đó không ổn.'
            }
        });
        $('.tips-dev').popover({
            trigger: 'focus'
        });
    </script>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('settings') }}
@endsection

@section('novication')
    <div class="novi_master">
        <h2>
            <svg viewBox="0 0 512 512"><path fill="currentColor" d="M482.696 299.276l-32.61-18.827a195.168 195.168 0 0 0 0-48.899l32.61-18.827c9.576-5.528 14.195-16.902 11.046-27.501-11.214-37.749-31.175-71.728-57.535-99.595-7.634-8.07-19.817-9.836-29.437-4.282l-32.562 18.798a194.125 194.125 0 0 0-42.339-24.48V38.049c0-11.13-7.652-20.804-18.484-23.367-37.644-8.909-77.118-8.91-114.77 0-10.831 2.563-18.484 12.236-18.484 23.367v37.614a194.101 194.101 0 0 0-42.339 24.48L105.23 81.345c-9.621-5.554-21.804-3.788-29.437 4.282-26.36 27.867-46.321 61.847-57.535 99.595-3.149 10.599 1.47 21.972 11.046 27.501l32.61 18.827a195.168 195.168 0 0 0 0 48.899l-32.61 18.827c-9.576 5.528-14.195 16.902-11.046 27.501 11.214 37.748 31.175 71.728 57.535 99.595 7.634 8.07 19.817 9.836 29.437 4.283l32.562-18.798a194.08 194.08 0 0 0 42.339 24.479v37.614c0 11.13 7.652 20.804 18.484 23.367 37.645 8.909 77.118 8.91 114.77 0 10.831-2.563 18.484-12.236 18.484-23.367v-37.614a194.138 194.138 0 0 0 42.339-24.479l32.562 18.798c9.62 5.554 21.803 3.788 29.437-4.283 26.36-27.867 46.321-61.847 57.535-99.595 3.149-10.599-1.47-21.972-11.046-27.501zm-65.479 100.461l-46.309-26.74c-26.988 23.071-36.559 28.876-71.039 41.059v53.479a217.145 217.145 0 0 1-87.738 0v-53.479c-33.621-11.879-43.355-17.395-71.039-41.059l-46.309 26.74c-19.71-22.09-34.689-47.989-43.929-75.958l46.329-26.74c-6.535-35.417-6.538-46.644 0-82.079l-46.329-26.74c9.24-27.969 24.22-53.869 43.929-75.969l46.309 26.76c27.377-23.434 37.063-29.065 71.039-41.069V44.464a216.79 216.79 0 0 1 87.738 0v53.479c33.978 12.005 43.665 17.637 71.039 41.069l46.309-26.76c19.709 22.099 34.689 47.999 43.929 75.969l-46.329 26.74c6.536 35.426 6.538 46.644 0 82.079l46.329 26.74c-9.24 27.968-24.219 53.868-43.929 75.957zM256 160c-52.935 0-96 43.065-96 96s43.065 96 96 96 96-43.065 96-96-43.065-96-96-96zm0 160c-35.29 0-64-28.71-64-64s28.71-64 64-64 64 28.71 64 64-28.71 64-64 64z"></path></svg>
            Cấu hình
        </h2>
    </div>
@endsection
