@extends('backend::master')

@section('layout')
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
            <form action="" method="POST">
                <div class="panel">
                    <div class="panel-title">
                        @if(count($admin) > 0)
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
                                    <th style="max-width: 600px">Họ và tên</th>
                                    <th>Quyền</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tham gia</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $item)
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
                                        <div class="info-admin">
                                            @if ($item->avatar == null)
                                                <img src="{{ asset('public/backend/img/2.jpg') }}">
                                                @else
                                                <img src="{{ $item->avatar }}">
                                            @endif
                                            <div class="block">
                                                <a href="{{ route('edit.admin',['id'=>$item->id]) }}">{{ $item->name }}</a>
                                                <p>{{ $item->email }}</p>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td>sss</td>
                                    <td>
                                        @if ($item->status == 1)
                                        <span class="badge badge-success">hoạt động</span>
                                            @else
                                            <span class="badge badge-danger">ngừng hoạt động</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</td>
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
                @if(count($admin) > 0)
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

@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('administration') }}
@endsection

@section('novication')
    <div class="novi_master">
        <h2>
            <svg viewBox="0 0 640 512"><path fill="currentColor" d="M564 288h-40c-15.18 0-29.27 4.83-41.15 12.93 9.38 6.37 17.93 13.87 25.45 22.37 4.89-2.05 10.15-3.3 15.7-3.3h40c24.25 0 44 21.53 44 48 0 8.84 7.16 16 16 16s16-7.16 16-16c0-44.11-34.09-80-76-80zm-20-32c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zM400.15 308.02c-11.88 0-23.87 1.73-35.49 5.26-14.16 4.3-29.1 6.72-44.66 6.72s-30.5-2.42-44.66-6.71a122.209 122.209 0 0 0-35.49-5.26c-36.29 0-71.58 16.18-92.28 46.93C135.21 373.3 128 395.41 128 419.2V432c0 26.51 21.49 48 48 48h288c26.51 0 48-21.49 48-48v-12.8c0-23.79-7.21-45.9-19.57-64.25-20.7-30.75-56-46.93-92.28-46.93zM480 432c0 8.82-7.18 16-16 16H176c-8.82 0-16-7.18-16-16v-12.8c0-16.63 4.88-32.67 14.11-46.38 13.83-20.54 38.4-32.8 65.74-32.8 8.9 0 17.71 1.31 26.19 3.88 17.69 5.37 35.84 8.1 53.96 8.1s36.27-2.72 53.96-8.1a89.887 89.887 0 0 1 26.19-3.88c27.34 0 51.91 12.26 65.74 32.8 9.23 13.71 14.11 29.75 14.11 46.38V432zM96 256c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zm61.15 172.93C145.27 292.83 131.18 288 116 288H76c-41.91 0-76 35.89-76 80 0 8.84 7.16 16 16 16s16-7.16 16-16c0-26.47 19.75-48 44-48h40c5.55 0 10.81 1.25 15.7 3.3 7.52-8.5 16.07-16 25.45-22.37zM320 288c61.86 0 112-50.14 112-112V32l-56 28-56-28-56 28-56-28v144c0 61.86 50.14 112 112 112zM240 83.78l24 12 56-28 56 28 24-12V128H240V83.78zm0 76.22h160v16c0 44.11-35.89 80-80 80s-80-35.89-80-80v-16z"></path></svg>
            Quản trị
        </h2>
        <a href="{{ route('create.admin') }}" class="btn btn-add" title="Thêm mới bài viết của bạn">
            <svg style="width: 15px" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            Thêm mới
        </a>
    </div>
@endsection
