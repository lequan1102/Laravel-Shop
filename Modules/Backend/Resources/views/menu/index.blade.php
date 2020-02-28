@extends('backend::master')

@section('head')
  <link rel="stylesheet" href="{{ asset('/public/backend/libs/nestable2/jquery.nestable.min.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('layout')
<div class="content-wrap">
  <div class="tab-content">
    <div class="container-fluid tab-pane active" id="vi">
      <div class="alert__ alert_info">
        <strong>Cách sử dụng:</strong>
        <p>Bạn có thể xuất menu ở bất cứ đâu trên trang web của mình bằng cách gọi  <code>menu('admin')</code></p>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <p class="panel-title" style="color:#777">Kéo và thả menu Mục bên dưới để sắp xếp lại chúng. Hoặc thêm mới tại đây</p>
        </div>
        <div class="panel-title">
          <div class="dd">
            <ol class="dd-list">
                <li class="dd-item" data-title="Bảng điều khiển" data-id="1">
                    <div class="pull-right item_actions">
                        <div class="btn btn-sm btn-danger pull-right delete" data-id="0">
                            <i class="voyager-trash"></i> Xóa
                        </div>
                        <div class="btn btn-sm btn-primary pull-right edit" data-id="0" data-title="Tin game" data-url="Tin-Game" data-target="_self" data-icon_class="" data-color="#000000" data-route="" data-parameters="null">
                            <i class="voyager-edit"></i> Chỉnh sửa
                        </div>
                    </div>
                    <div class="dd-handle">Bảng điều khiển</div>
                </li>
                <li class="dd-item" data-title="Bài viết" data-id="2">
                      <div class="pull-right item_actions">
                        <div class="btn btn-sm btn-danger pull-right delete" data-id="0">
                            <i class="voyager-trash"></i> Xóa
                        </div>
                        <div class="btn btn-sm btn-primary pull-right edit" data-id="0" data-title="Tin game" data-url="Tin-Game" data-target="_self" data-icon_class="" data-color="#000000" data-route="" data-parameters="null">
                            <i class="voyager-edit"></i> Chỉnh sửa
                        </div>
                    </div>
                    <div class="dd-handle">Bài viết</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-title="Tin tức" data-id="3">
                              <div class="pull-right item_actions">
                                <div class="btn btn-sm btn-danger pull-right delete" data-id="0">
                                    <i class="voyager-trash"></i> Xóa
                                </div>
                                <div class="btn btn-sm btn-primary pull-right edit" data-id="0" data-title="Tin game" data-url="Tin-Game" data-target="_self" data-icon_class="" data-color="#000000" data-route="" data-parameters="null">
                                    <i class="voyager-edit"></i> Chỉnh sửa
                                </div>
                            </div>
                            <div class="dd-handle">Tin tức</div>
                        </li>
                        <li class="dd-item" data-title="Dự án" data-id="4">
                            <div class="pull-right item_actions">
                                <div class="btn btn-sm btn-danger pull-right delete" data-id="0">
                                    <i class="voyager-trash"></i> Xóa
                                </div>
                                <div class="btn btn-sm btn-primary pull-right edit" data-id="0" data-title="Tin game" data-url="Tin-Game" data-target="_self" data-icon_class="" data-color="#000000" data-route="" data-parameters="null">
                                    <i class="voyager-edit"></i> Chỉnh sửa
                                </div>
                            </div>
                            <div class="dd-handle">Dự án</div>
                        </li>
                        <li class="dd-item" data-title="Tuyển dụng" data-id="5">
                            <div class="pull-right item_actions">
                                <div class="btn btn-sm btn-danger pull-right delete" data-id="0">
                                    <i class="voyager-trash"></i> Xóa
                                </div>
                                <div class="btn btn-sm btn-primary pull-right edit" data-id="0" data-title="Tin game" data-url="Tin-Game" data-target="_self" data-icon_class="" data-color="#000000" data-route="" data-parameters="null">
                                    <i class="voyager-edit"></i> Chỉnh sửa
                                </div>
                            </div>
                            <div class="dd-handle">Tuyển dụng</div>
                        </li>
                    </ol>
                </li>
                {{-- <li class="dd-item" data-id="6">
                    <div class="dd-handle">Trang đơn</div>
                </li>
                <li class="dd-item" data-id="7">
                    <div class="dd-handle">Bán hàng</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="8">
                            <div class="dd-handle">Sản phẩm</div>
                        </li>
                        <li class="dd-item" data-id="9" data-foo="bar" data-ddd="dsdsdds">
                            <div class="dd-handle">Đơn hàng</div>
                        </li>
                        <li class="dd-item" data-id="10" data-foo="bar" data-ddd="dsdsdds">
                            <div class="dd-handle">Mã giảm giá</div>
                        </li>
                        <li class="dd-item" data-id="11" data-foo="bar" data-ddd="dsdsdds">
                            <div class="dd-handle">Kho hàng</div>
                        </li>
                    </ol>
                </li>
                <li class="dd-item" data-id="12">
                    <div class="dd-handle">Chuyên mục</div>
                </li>
                <li class="dd-item" data-id="13">
                    <div class="dd-handle">Liên hệ</div>
                </li>
                <li class="dd-item" data-id="14">
                    <div class="dd-handle">Chỉnh sửa giao diện</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="15">
                            <div class="dd-handle">Banner</div>
                        </li>
                        <li class="dd-item" data-id="16" data-foo="bar" data-ddd="dsdsdds">
                            <div class="dd-handle">Giải pháp</div>
                        </li>
                        <li class="dd-item" data-id="17" data-foo="bar" data-ddd="dsdsdds">
                            <div class="dd-handle">Mô hình</div>
                        </li>
                        <li class="dd-item" data-id="18" data-foo="bar" data-ddd="dsdsdds">
                            <div class="dd-handle">Cam kết</div>
                        </li>
                    </ol>
                </li>
                <li class="dd-item" data-id="19">
                    <div class="dd-handle">Người dùng</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="20">
                            <div class="dd-handle">Khách hàng</div>
                        </li>
                        <li class="dd-item" data-id="21" data-foo="bar" data-ddd="dsdsdds">
                            <div class="dd-handle">Quản trị</div>
                        </li>
                    </ol>
                </li>
                <li class="dd-item" data-id="22">
                  <div class="dd-handle">Cài đặt</div>
                  <ol class="dd-list">
                      <li class="dd-item" data-id="23">
                          <div class="dd-handle">Thực đơn</div>
                      </li>
                      <li class="dd-item" data-id="24" data-foo="bar" data-ddd="dsdsdds">
                          <div class="dd-handle">Quyền</div>
                      </li>
                      <li class="dd-item" data-id="25" data-foo="bar" data-ddd="dsdsdds">
                          <div class="dd-handle">Sidebar</div>
                      </li>
                      <li class="dd-item" data-id="26" data-foo="bar" data-ddd="dsdsdds">
                          <div class="dd-handle">Cấu hình</div>
                      </li>
                  </ol>
                </li> --}}
            </ol>
          </div>
          <div class="ool clear"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal add menu item -->
<div class="modal fade success" id="add_item_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="">Tạo một mục menu mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body" style="text-align: left">
            <form>
                <div class="form-group">
                    <label for="input1">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" id="input1" placeholder="Tên mục menu">
                </div>
                <div class="form-group">
                    <label for="input4">Mở ra</label>
                    <select name="target" class="custom-select" id="input4">
                        <option value="_self" selected>Cùng một tab / cửa sổ hiện tại</option>
                        <option value="_blank">Một tab mới / cửa sổ mới</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="input3">Loại liên kết</label>
                    <input type="text" name="slug" class="form-control" placeholder="URL Tĩnh | Route">
                </div>
                <div class="form-group">
                    <label for="input5">Biểu tượng cho mục menu ( sử dụng<code><a target="_blank" href="https://fontawesome.com/icons">fontawesome</a></code>)</label>
                    <input type="text" class="form-control" id="input5" placeholder="fab fa-adobe">
                </div>
                <div class="form-group">
                    <label for="input2">Hình ảnh</label>
                    <input type="file" class="form-control" id="input2" placeholder="">
                </div>
                <textarea rows="3" name="des" class="form-control" placeholder="Mô tả ngắn"></textarea>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
            <a href="/posts/delete/"></a><button type="button" class="btn btn-primary">Có! chắc chắn</button></a>
        </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
  <script src="{{ asset('/public/backend/libs/nestable2/jquery.nestable.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      
        $('.dd').nestable();
        $('.dd').on('change', function() {
            var data = $('.dd').nestable('serialize');
            var datastring = JSON.stringify(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            $.ajax({
                type : "POST",
                url : '{{ route('index.changemenu') }}',
                data: {
                    reponse: datastring,
                },
                beforeSend: function(){

                },
                success: function(data) {
                    $('.ool').html(data);
                },
                error: function(data){
                    console.log('error');
                }
            });
        });

    //   $('.dd').nestable('remove', 1, function(){
    //       console.log('Item deleted');
    //   });
    });
    </script>
    <script>
        $(document).ready(function(){
            var obj = $data;
            var output = '';
            function buildItem(item) {

                var html = "<li class='dd-item' data-id='" + item.id + "'>";
                html += "<div class='dd-handle'>" + item.id + "</div>";

                if (item.children) {

                    html += "<ol class='dd-list'>";
                    $.each(item.children, function (index, sub) {
                        html += buildItem(sub);
                    });
                    html += "</ol>";

                }

                html += "</li>";

                return html;
            }

            $.each(JSON.parse(obj), function (index, item) {

                output += buildItem(item);

            });

            $('#dd-empty-placeholder').html(output);
            $('#nestable3').nestable();
        });
    </script>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('menu') }}
@endsection

@section('novication')
    <div class="novi_master">
        <h2>
            <svg viewBox="0 0 576 512"><path fill="currentColor" d="M560.83 135.96l-24.79-24.79c-20.23-20.24-53-20.26-73.26 0L384 189.72v-57.75c0-12.7-5.1-25-14.1-33.99L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99v-80.54c6.29-4.68 12.62-9.35 18.18-14.95l158.64-159.3c9.79-9.78 15.17-22.79 15.17-36.63s-5.38-26.84-15.16-36.63zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v61.53l-48.51 48.24c-30.14 29.96-47.42 71.51-47.47 114-3.93-.29-7.47-2.42-9.36-6.27-11.97-23.86-46.25-30.34-66-14.17l-13.88-41.62c-3.28-9.81-12.44-16.41-22.78-16.41s-19.5 6.59-22.78 16.41L103 376.36c-1.5 4.58-5.78 7.64-10.59 7.64H80c-8.84 0-16 7.16-16 16s7.16 16 16 16h12.41c18.62 0 35.09-11.88 40.97-29.53L144 354.58l16.81 50.48c4.54 13.51 23.14 14.83 29.5 2.08l7.66-15.33c4.01-8.07 15.8-8.59 20.22.34C225.44 406.61 239.9 415.7 256 416h32c22.05-.01 43.95-4.9 64.01-13.6v61.61zm27.48-118.05A129.012 129.012 0 0 1 288 384v-.03c0-34.35 13.7-67.29 38.06-91.51l120.55-119.87 52.8 52.8-119.92 120.57zM538.2 186.6l-21.19 21.19-52.8-52.8 21.2-21.19c7.73-7.73 20.27-7.74 28.01 0l24.79 24.79c7.72 7.73 7.72 20.27-.01 28.01z"></path></svg>
            Thực đơn
        </h2>
        <a href="{{ route('create.posts') }}" class="btn btn-add" title="Thêm mới mục menu của bạn" data-toggle="modal" data-target="#add_item_menu">
            <svg style="width: 15px" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            Thêm mục menu mới
        </a>
    </div>
@endsection
