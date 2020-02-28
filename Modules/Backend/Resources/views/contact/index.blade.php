@extends('backend::master')

@section('layout')
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
            <div class="alert__ alert_info">
                <strong>Khách hàng liên hệ với bạn:</strong>
                <p>Dưới đây là danh sách các khách hàng đã để lại thông tin cho bạn <code>contact.email</code></p>
            </div>
            <form action="" method="POST">
                <div class="panel">
                    <div class="panel-title">
                        <div class="show_items">
                            hiển thị
                            <select name="number" id="show_page_number">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="80">80</option>
                            </select>
                        </div>
                        <table id="example" style="width:100%">
                            <thead>
                            <tr>
                                <th>
                                    <label class="selection cursor-pointer">
                                        <input type="checkbox" id="checkAll">
                                        <div class="wrap_checkbox">
                                            <div class="checkbox"></div>
                                        </div>
                                    </label>
                                </th>
                                <th style="max-width: 600px">Tiêu đề</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th></th>
                                <th>Nổi bật</th>
                                <th>Ngày đăng</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $item)
                                <tr>
                                    <td>
                                        <label class="selection cursor-pointer">
                                            <input type="checkbox" name="checkbox[]" value="{{ $item->id }}">
                                            <div class="wrap_checkbox">
                                                <div class="checkbox"></div>
                                            </div>
                                        </label>
                                    </td>
                                    <td><a href="/customer/edit/{{ $item->id }}">{{ $item->name }}</a></td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->status == Null)
                                            <span class="badge badge-success">hiển thị</span>
                                        @else
                                            <span class="badge badge-danger">Ngủ</span>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td>
                                        
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdowntable" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M304 256c0 26.5-21.5 48-48 48s-48-21.5-48-48 21.5-48 48-48 48 21.5 48 48zm120-48c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48zm-336 0c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48z"></path></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2"
                                                 x-placement="bottom-start" style="position: absolute; transform: translate3d(-2px, 13px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="categories/edit/"><i class="bx bxs-pencil mr-2"></i> Chỉnh sửa</a>
                                                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#del"><i class="bx bxs-trash mr-2"></i>Xoá</a>
                                            </div>
                                        </div>
                                        <!-- Modal Confirm Deletel -->
                                        <div class="modal fade" id="del" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="">Bạn đang có hành động xóa?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: left">
                                                        tên <code></code>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                        <a href="/posts/delete/"></a><button type="button" class="btn btn-primary">Có! chắc chắn</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex flex-between flex-align-center mt20">
                            <div class="of-page">
                                Bạn đang xem trang 1 của 2
                            </div>
                            
                            <div class="paigna">
                                {{ $contact->links('vendor.pagination.backend') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tool">
                    <select name="action" class="form-control">
                        <option value="">Chọn hành động</option>
                        <option value="sleep">Ẩn đi</option>
                        <option value="public">Hiển thị</option>
                        <option value="delete">Xóa vĩnh viễn</option>
                    </select>
                    <button type="submit" formaction="" class="btn btn-secondary">Thực hiện</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(document).ready(function(){
            $('#show_page_number').on('change', function() {
                var number = $(this).val();
                $.ajax({
                    url: '/posts',
                    type: 'POST',
                    data: {number : number},
                })
                    .done(function(data) {
                        console.log(number);
                        // location.reload();
                        // $('#example').html(data);
                        // location.reload();
                    })
                    .fail(function() {
                        console.log("error");
                    })
            });
        });
    </script>
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('contact') }}
@endsection
@section('novication')
    <div class="novi_master">
        <h2>
            <svg viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z"></path></svg>
            Liên hệ
        </h2>
        <a href="/posts/create" class="btn btn-add" title="Thêm mới bài viết của bạn">
            <svg style="width: 15px" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            Thêm mới
        </a>
    </div>
@endsection