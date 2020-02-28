@extends('backend::master')

@section('layout')
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
            <form action="" method="POST">
                <div class="panel">
                    <div class="panel-title">
                        @if(count($products) > 0)
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
                                    <th>Tiêu đề</th>
                                    <th class="text-center">Chuyên mục</th>
                                    <th>Mã giảm giá</th>
                                    <th>Ngày bán</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td>
                                        <label class="selection cursor-pointer">
                                            <input type="checkbox" name="checkbox[]" value="{{ $item->id }}">
                                            <div class="wrap_checkbox">
                                                <div class="checkbox"></div>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                      <div class="wrap_product">
                                        <div class="thumbnails">
                                            <img style="width: 104px" src="{{ $item->thumbnail }}" alt="">
                                        </div>
                                        <div class="content">
                                          <a href="{{ route('edit.products', ['id' => $item->id ]) }}">{{ $item->name }}</a>
                                          <p>Mã: code</p>
                                          <div class="released">
                                            <span>Giảm:</span>
                                            <b>price đ</b>
                                            <span>%</span>
                                            <b>-discount_price đ</b>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                    <td class="text-center">
                                      Đầm
                                    </td>
                                    <td>#9021382904</td>
                                    <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <span class="badge badge-success">hiển thị</span>
                                        <span class="badge badge-danger">ẩn</span>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdowntable" type="button" id="dropdownMenuButton2"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M304 256c0 26.5-21.5 48-48 48s-48-21.5-48-48 21.5-48 48-48 48 21.5 48 48zm120-48c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48zm-336 0c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48z"></path></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" x-placement="bottom-start" style="position: absolute; transform: translate3d(-2px, 13px, 0px); top: 0px; left: 0px; will-change: transform;">sửa</a>
                                                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#del"><i class="bx bxs-trash mr-2"></i> Thùng rác</a>
                                            </div>
                                        </div>
                                        <!-- Modal Confirm Deletel -->
                                        <div class="modal fade" id="del" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="border-bottom: none">
                                                        <h5 class="modal-title" id="exampleModalLabel">Di chuyển bài viết này tới thùng rác?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body"></div>
                                                    <div class="modal-footer" style="border-top: none">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        <a href="product/action"><button type="button" class="btn btn-danger">Có, chắc chắn</button></a>
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
                                <nav class="pagination">
                                    <ul class="clear">

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        @else
                            Hiện tại chưa có dữ liệu
                        @endif
                    </div>
                </div>
                @if(count($products) > 0)
                <div class="tool">
                    <select name="action" class="form-control">
                        <option value="">Chọn hành động</option>
                        <option value="sleep">Ẩn đi</option>
                        <option value="public">Hiển thị</option>
                        <option value="delete">Xóa vĩnh viễn</option>
                    </select>
                    <button type="submit" formaction="" class="btn btn-secondary">Thực hiện</button>
                </div>
                @endif
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
    {{ Breadcrumbs::render('products') }}
@endsection
@section('novication')
    <div class="novi_master">
        <h2>
            <svg viewBox="0 0 448 512"><path fill="currentColor" d="M352 128C352 57.421 294.579 0 224 0 153.42 0 96 57.421 96 128H0v304c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V128h-96zM224 32c52.935 0 96 43.065 96 96H128c0-52.935 43.065-96 96-96zm192 400c0 26.467-21.533 48-48 48H80c-26.467 0-48-21.533-48-48V160h64v48c0 8.837 7.164 16 16 16s16-7.163 16-16v-48h192v48c0 8.837 7.163 16 16 16s16-7.163 16-16v-48h64v272z"></path></svg>
            Sản phẩm
        </h2>
        <a href="{{ route('create.products') }}" class="btn btn-add" title="Thêm mới bài viết của bạn">
            <svg style="width: 15px" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            Thêm mới
        </a>
    </div>
@endsection
