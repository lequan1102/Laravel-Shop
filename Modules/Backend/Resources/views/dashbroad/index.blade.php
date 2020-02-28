@extends('backend::master')
@section('layout')
<style>.novication{display:none!important}</style>
<div class="container-fluid" style="margin-top: 60px">
  <div class="alert__ alert_info">
    <strong>Cách sử dụng:</strong>
    <p>Bạn có thể xuất menu ở bất cứ đâu trên trang web của mình bằng cách gọi  <code>menu('admin')</code></p>
  </div>
  {{-- <canvas id="line-chart"></canvas> --}}
  <div class="row">
    <div class="col col-lg-4 col-12 mb20">
      <div class="widget text-center" style="background-image: url('{{ asset('public/backend/img/dashbroad/users.jfif') }}')">
        <div class="dimmer"></div>
        <div class="widget-content">
          <div class="cricle">
            <svg viewBox="0 0 640 512"><path fill="currentColor" d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM320 256c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm244 192h-40c-15.2 0-29.3 4.8-41.1 12.9 9.4 6.4 17.9 13.9 25.4 22.4 4.9-2.1 10.2-3.3 15.7-3.3h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm304.1 180c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM480 432c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zM157.1 268.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4z"></path></svg>
          </div>
          <h2>Khách hàng</h2>
          <p>Bạn có  khách hàng trong cơ sở dữ liệu của bạn. Nhấn vào nút bên dưới để xem tất cả khách hàng tiềm năng.</p>
          <a href="/customer" class="btn">Xem tất cả khách hàng</a>
        </div>
      </div>
    </div>
    <div class="col col-lg-4 col-12 mb20">
      <div class="widget text-center" style="background-image: url('{{ asset('public/backend/img/dashbroad/posts.jfif') }}')">
        <div class="dimmer"></div>
        <div class="widget-content">
          <div class="cricle">
            <svg viewBox="0 0 576 512"><path fill="currentColor" d="M560.83 135.96l-24.79-24.79c-20.23-20.24-53-20.26-73.26 0L384 189.72v-57.75c0-12.7-5.1-25-14.1-33.99L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99v-80.54c6.29-4.68 12.62-9.35 18.18-14.95l158.64-159.3c9.79-9.78 15.17-22.79 15.17-36.63s-5.38-26.84-15.16-36.63zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v61.53l-48.51 48.24c-30.14 29.96-47.42 71.51-47.47 114-3.93-.29-7.47-2.42-9.36-6.27-11.97-23.86-46.25-30.34-66-14.17l-13.88-41.62c-3.28-9.81-12.44-16.41-22.78-16.41s-19.5 6.59-22.78 16.41L103 376.36c-1.5 4.58-5.78 7.64-10.59 7.64H80c-8.84 0-16 7.16-16 16s7.16 16 16 16h12.41c18.62 0 35.09-11.88 40.97-29.53L144 354.58l16.81 50.48c4.54 13.51 23.14 14.83 29.5 2.08l7.66-15.33c4.01-8.07 15.8-8.59 20.22.34C225.44 406.61 239.9 415.7 256 416h32c22.05-.01 43.95-4.9 64.01-13.6v61.61zm27.48-118.05A129.012 129.012 0 0 1 288 384v-.03c0-34.35 13.7-67.29 38.06-91.51l120.55-119.87 52.8 52.8-119.92 120.57zM538.2 186.6l-21.19 21.19-52.8-52.8 21.2-21.19c7.73-7.73 20.27-7.74 28.01 0l24.79 24.79c7.72 7.73 7.72 20.27-.01 28.01z"></path></svg>
          </div>
          <h2>Bài viết</h2>
          <p>Bạn có  bài viết trong cơ sở dữ liệu của bạn. Nhấn vào nút bên dưới để xem tất cả các bài viết.</p>
          <a href="/posts" class="btn">Xem tất cả bài viết</a>
        </div>
      </div>
    </div>
    <div class="col col-lg-4 col-12 mb20">
    <div class="widget text-center" style="background-image: url('{{ asset('public/backend/img/dashbroad/admin.jpeg') }}')">
        <div class="dimmer"></div>
        <div class="widget-content">
          <div class="cricle">
            <svg viewBox="0 0 640 512"><path fill="currentColor" d="M564 288h-40c-15.18 0-29.27 4.83-41.15 12.93 9.38 6.37 17.93 13.87 25.45 22.37 4.89-2.05 10.15-3.3 15.7-3.3h40c24.25 0 44 21.53 44 48 0 8.84 7.16 16 16 16s16-7.16 16-16c0-44.11-34.09-80-76-80zm-20-32c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zM400.15 308.02c-11.88 0-23.87 1.73-35.49 5.26-14.16 4.3-29.1 6.72-44.66 6.72s-30.5-2.42-44.66-6.71a122.209 122.209 0 0 0-35.49-5.26c-36.29 0-71.58 16.18-92.28 46.93C135.21 373.3 128 395.41 128 419.2V432c0 26.51 21.49 48 48 48h288c26.51 0 48-21.49 48-48v-12.8c0-23.79-7.21-45.9-19.57-64.25-20.7-30.75-56-46.93-92.28-46.93zM480 432c0 8.82-7.18 16-16 16H176c-8.82 0-16-7.18-16-16v-12.8c0-16.63 4.88-32.67 14.11-46.38 13.83-20.54 38.4-32.8 65.74-32.8 8.9 0 17.71 1.31 26.19 3.88 17.69 5.37 35.84 8.1 53.96 8.1s36.27-2.72 53.96-8.1a89.887 89.887 0 0 1 26.19-3.88c27.34 0 51.91 12.26 65.74 32.8 9.23 13.71 14.11 29.75 14.11 46.38V432zM96 256c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zm61.15 172.93C145.27 292.83 131.18 288 116 288H76c-41.91 0-76 35.89-76 80 0 8.84 7.16 16 16 16s16-7.16 16-16c0-26.47 19.75-48 44-48h40c5.55 0 10.81 1.25 15.7 3.3 7.52-8.5 16.07-16 25.45-22.37zM320 288c61.86 0 112-50.14 112-112V32l-56 28-56-28-56 28-56-28v144c0 61.86 50.14 112 112 112zM240 83.78l24 12 56-28 56 28 24-12V128H240V83.78zm0 76.22h160v16c0 44.11-35.89 80-80 80s-80-35.89-80-80v-16z" class=""></path></svg>
          </div>
          <h2>Quản trị viên</h2>
          <p>Bạn có  số quản trị viên trong cơ sở dữ liệu của bạn. Nhấn vào nút bên dưới để xem tất cả các quản trị viên.</p>
          <a href="/admins" class="btn">Xem tất cả các quản trị viên</a>
        </div>
      </div>
    </div>
  </div>
  <!--Only Development-->
  <div class="sticky">
    <div class="sticky-label">
      <h3>Cài đặt chung</h3>
      <p>Cấu hình các thiết đặt cơ bản cần thiết cho dịch vụ của bạn</p>
    </div>
    <div class="sticky-body row">
      <div class="col col-xl-2 col-lg-3 col-md-4 col-6">
        <a href="{{ route('index.question') }}" class="items">
          <svg viewBox="0 0 384 512"><g>
            <path style="color: rgba(34, 167, 240, 0.39)" fill="currentColor" d="M182.43 373.46a69.27 69.27 0 1 0 69.28 69.27 69.28 69.28 0 0 0-69.28-69.27z"></path>
            <path style="color: #22a7f0" fill="currentColor" d="M367.92 153.6c0 116-125.27 117.77-125.27 160.63V320a24 24 0 0 1-24 24h-72.47a24 24 0 0 1-24-24v-9.79c0-61.83 46.87-86.54 82.3-106.4 30.38-17 49-28.62 49-51.17 0-29.83-38-49.63-68.82-49.63-39.12 0-57.75 18.07-82.75 49.45a24 24 0 0 1-33.26 4.15L25.51 123.9A24 24 0 0 1 20.34 91c40.59-58.3 92.28-91 172.1-91 84.88 0 175.49 66.26 175.48 153.6z"></path></g></svg>Những câu hỏi thường gặp
        </a>
      </div>
      <div class="col col-xl-2 col-lg-3 col-md-4 col-6">
        <a href="" class="items">
          <svg viewBox="0 0 384 512"><g>
            <path style="color: rgba(34, 167, 240, 0.39)" fill="currentColor" d="M182.43 373.46a69.27 69.27 0 1 0 69.28 69.27 69.28 69.28 0 0 0-69.28-69.27z"></path>
            <path style="color: #22a7f0" fill="currentColor" d="M367.92 153.6c0 116-125.27 117.77-125.27 160.63V320a24 24 0 0 1-24 24h-72.47a24 24 0 0 1-24-24v-9.79c0-61.83 46.87-86.54 82.3-106.4 30.38-17 49-28.62 49-51.17 0-29.83-38-49.63-68.82-49.63-39.12 0-57.75 18.07-82.75 49.45a24 24 0 0 1-33.26 4.15L25.51 123.9A24 24 0 0 1 20.34 91c40.59-58.3 92.28-91 172.1-91 84.88 0 175.49 66.26 175.48 153.6z"></path></g></svg>Những câu hỏi thường gặp
        </a>
      </div>
      <div class="col col-xl-2 col-lg-3 col-md-4 col-6">
        <a href="" class="items">
          <svg viewBox="0 0 384 512"><g>
            <path style="color: rgba(34, 167, 240, 0.39)" fill="currentColor" d="M182.43 373.46a69.27 69.27 0 1 0 69.28 69.27 69.28 69.28 0 0 0-69.28-69.27z"></path>
            <path style="color: #22a7f0" fill="currentColor" d="M367.92 153.6c0 116-125.27 117.77-125.27 160.63V320a24 24 0 0 1-24 24h-72.47a24 24 0 0 1-24-24v-9.79c0-61.83 46.87-86.54 82.3-106.4 30.38-17 49-28.62 49-51.17 0-29.83-38-49.63-68.82-49.63-39.12 0-57.75 18.07-82.75 49.45a24 24 0 0 1-33.26 4.15L25.51 123.9A24 24 0 0 1 20.34 91c40.59-58.3 92.28-91 172.1-91 84.88 0 175.49 66.26 175.48 153.6z"></path></g></svg>Những câu hỏi thường gặp
        </a>
      </div>
      <div class="col col-xl-2 col-lg-3 col-md-4 col-6">
        <a href="" class="items">
          <svg viewBox="0 0 384 512"><g>
            <path style="color: rgba(34, 167, 240, 0.39)" fill="currentColor" d="M182.43 373.46a69.27 69.27 0 1 0 69.28 69.27 69.28 69.28 0 0 0-69.28-69.27z"></path>
            <path style="color: #22a7f0" fill="currentColor" d="M367.92 153.6c0 116-125.27 117.77-125.27 160.63V320a24 24 0 0 1-24 24h-72.47a24 24 0 0 1-24-24v-9.79c0-61.83 46.87-86.54 82.3-106.4 30.38-17 49-28.62 49-51.17 0-29.83-38-49.63-68.82-49.63-39.12 0-57.75 18.07-82.75 49.45a24 24 0 0 1-33.26 4.15L25.51 123.9A24 24 0 0 1 20.34 91c40.59-58.3 92.28-91 172.1-91 84.88 0 175.49 66.26 175.48 153.6z"></path></g></svg>Những câu hỏi thường gặp
        </a>
      </div>
      <div class="col col-xl-2 col-lg-3 col-md-4 col-6">
        <a href="" class="items">
          <svg viewBox="0 0 384 512"><g>
            <path style="color: rgba(34, 167, 240, 0.39)" fill="currentColor" d="M182.43 373.46a69.27 69.27 0 1 0 69.28 69.27 69.28 69.28 0 0 0-69.28-69.27z"></path>
            <path style="color: #22a7f0" fill="currentColor" d="M367.92 153.6c0 116-125.27 117.77-125.27 160.63V320a24 24 0 0 1-24 24h-72.47a24 24 0 0 1-24-24v-9.79c0-61.83 46.87-86.54 82.3-106.4 30.38-17 49-28.62 49-51.17 0-29.83-38-49.63-68.82-49.63-39.12 0-57.75 18.07-82.75 49.45a24 24 0 0 1-33.26 4.15L25.51 123.9A24 24 0 0 1 20.34 91c40.59-58.3 92.28-91 172.1-91 84.88 0 175.49 66.26 175.48 153.6z"></path></g></svg>Những câu hỏi thường gặp
        </a>
      </div>
      <div class="col col-xl-2 col-lg-3 col-md-4 col-6">
        <a href="" class="items">
          <svg viewBox="0 0 384 512"><g>
            <path style="color: rgba(34, 167, 240, 0.39)" fill="currentColor" d="M182.43 373.46a69.27 69.27 0 1 0 69.28 69.27 69.28 69.28 0 0 0-69.28-69.27z"></path>
            <path style="color: #22a7f0" fill="currentColor" d="M367.92 153.6c0 116-125.27 117.77-125.27 160.63V320a24 24 0 0 1-24 24h-72.47a24 24 0 0 1-24-24v-9.79c0-61.83 46.87-86.54 82.3-106.4 30.38-17 49-28.62 49-51.17 0-29.83-38-49.63-68.82-49.63-39.12 0-57.75 18.07-82.75 49.45a24 24 0 0 1-33.26 4.15L25.51 123.9A24 24 0 0 1 20.34 91c40.59-58.3 92.28-91 172.1-91 84.88 0 175.49 66.26 175.48 153.6z"></path></g></svg>Những câu hỏi thường gặp
        </a>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col col-lg-8 col-12">
      <table class="dashboard-table">
        <thead>
          <tr>
            <th colspan="2">
              TOP 10 sản phẩm bán chạy nhất
              <p style="font-size: 13px;font-weight: 400;padding-top: 5px;">trên trang của bạn</p>
            </th>
            <th colspan="1"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="wrap_product">
                <div class="thumbnails">
                  <a href="#"><img src="{{ asset('public/backend/img/2.jpg') }}"></a>
                </div>
                <div class="content">
                  <a href="#">Đầm 2 dây cotton</a>
                  <p>Mã: MVH1002</p>
                  <div class="released">
                    <span>Giá</span>
                    <b>350.000đ</b>
                    <span>giảm</span>
                    <b>30.000</b>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <li>
                <b>12.630.000</b>
              </li>
              <li style="color: #99abb4">doanh số</li>
            </td>
            <td>
              <li><b>1042</b></li>
              <li style="color: #99abb4">đã mua</li>
            </td>
          </tr>
          <tr>
            <td>
              <div class="wrap_product">
                <div class="thumbnails">
                  <a href="#"><img src="{{ asset('public/backend/img/2.jpg') }}"></a>
                </div>
                <div class="content">
                  <a href="#">Đầm 2 dây cotton</a>
                  <p>Mã: MVH1002</p>
                  <div class="released">
                    <span>Giá</span>
                    <b>350.000đ</b>
                    <span>giảm</span>
                    <b>30.000</b>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <li>
                <b>12.630.000</b>
              </li>
              <li style="color: #99abb4">doanh số</li>
            </td>
            <td>
              <li><b>1042</b></li>
              <li style="color: #99abb4">đã mua</li>
            </td>
          </tr>
          <tr>
            <td>
              <div class="wrap_product">
                <div class="thumbnails">
                  <a href="#"><img src="{{ asset('public/backend/img/2.jpg') }}"></a>
                </div>
                <div class="content">
                  <a href="#">Đầm 2 dây cotton</a>
                  <p>Mã: MVH1002</p>
                  <div class="released">
                    <span>Giá</span>
                    <b>350.000đ</b>
                    <span>giảm</span>
                    <b>30.000</b>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <li>
                <b>12.630.000</b>
              </li>
              <li style="color: #99abb4">doanh số</li>
            </td>
            <td>
              <li><b>1042</b></li>
              <li style="color: #99abb4">đã mua</li>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col col-lg-4 col-12">
      <div class="widget__body_admin">
        <div class="title_widget">
            <h3>Đơn hàng mới nhất</h3>
            <span>Thông báo về các đơn hàng được đặt trong 5 ngày qua</span>
        </div>
        <a href="#">
          <div class="user-img">
            <img style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;" src="{{ asset('public/backend/img/2.jpg') }}" alt="name">
          </div>
          <div class="mail-content">
            <h4>dd</h4>
            <span>span</span>
          </div>
        </a>
      </div>
    </div>
  </div>

</div>
@endsection

@section('breadcrumbs')
  {{ Breadcrumbs::render('dashbroad') }}
@endsection

@section('footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
  <script type="text/javascript">
    window.onload = function () {
        Chart.defaults.global.defaultFontColor = '#000000';
        Chart.defaults.global.defaultFontFamily = 'Arial';
        var lineChart = document.getElementById('line-chart');
        var myChart = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: ["tháng 1", "tháng 2", "tháng 3", "tháng 4", "tháng 5", "tháng 6", "tháng 7", "tháng 8", "tháng 9", "tháng 10", "tháng 11", "tháng 12"],
                datasets: [
                    {
                        label: 'Sản phẩm',
                        data: [80, 30, 63, 20, 110, 3],
                        backgroundColor: 'rgba(0, 128, 128, 0.3)',
                        borderColor: 'rgba(0, 128, 128, 0.7)',
                        borderWidth: 1
                    },
                    {
                        label: 'Chuyên mục',
                        data: [12, 23, 13, 339, 139, 735],
                        backgroundColor: 'rgba(0, 128, 128, 0.7)',
                        borderColor: 'rgba(0, 128, 128, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Bài viết',
                        data: [18, 72, 10, 39, 19, 75],
                        backgroundColor: 'rgba(0, 128, 128, 0.7)',
                        borderColor: 'rgba(0, 128, 128, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
            }
        });
    };
  </script>
@endsection