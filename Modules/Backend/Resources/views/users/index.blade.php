@extends('backend::master')

@section('layout')
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
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
                                @foreach ($users as $item)
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
                                            <button class="btn dropdowntable" type="button" id="dropdownMenuButton{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M304 256c0 26.5-21.5 48-48 48s-48-21.5-48-48 21.5-48 48-48 48 21.5 48 48zm120-48c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48zm-336 0c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48z"></path></svg>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}"
                                                 x-placement="bottom-start" style="position: absolute; transform: translate3d(-2px, 13px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('edit.admin',['id'=>$item->id]) }}"><i class="bx bxs-pencil mr-2"></i> Chỉnh sửa</a>
                                                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#del{{ $item->id }}"><i class="bx bxs-trash mr-2"></i>Xoá</a>
                                            </div>
                                        </div>
                                        <!-- Modal Confirm Deletel -->
                                        <div class="modal fade" id="del{{ $item->id }}" tabindex="-1" role="dialog"
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
                                                        người quản trị <code>{{ $item->name }}</code>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Không</button>
                                                        <a href="/admin/delete/"></a><button type="button" class="btn btn-primary">Có! chắc chắn</button></a>
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
                                {{ $users->links('vendor.pagination.backend') }}
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
@endsection

@section('breadcrumbs')
    {{-- {{ Breadcrumbs::render('customer') }} --}}
@endsection

@section('novication')
    <div class="novi_master">
        <h2>
            <svg viewBox="0 0 640 512"><path fill="currentColor" d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM320 256c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm244 192h-40c-15.2 0-29.3 4.8-41.1 12.9 9.4 6.4 17.9 13.9 25.4 22.4 4.9-2.1 10.2-3.3 15.7-3.3h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm304.1 180c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM480 432c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zM157.1 268.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4z"></path></svg>
            Khách hàng
        </h2>
        <a href="/posts/create" class="btn btn-add" title="Thêm mới bài viết của bạn">
            <svg style="width: 15px" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            Thêm mới
        </a>
    </div>
@endsection
