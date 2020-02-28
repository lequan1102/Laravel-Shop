@extends('backend::master')

@section('layout')
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
            <form action="">
                <div class="panel">
                    <div class="panel-title">
                        @if(count($category) > 0)
                        <div class="show_items">
                            @lang('seeders.data_label.display')
                            <select name="number" id="js_display_item">
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
                                    <th style="max-width: 600px">@lang('seeders.data_rows.name')</th>
                                    <th>@lang('seeders.data_rows.parent')</th>
                                    <th>@lang('seeders.data_rows.excerpt')</th>
                                    <th>@lang('seeders.data_rows.icon')</th>
                                    <th>@lang('seeders.data_rows.avatar')</th>
                                    <th>@lang('seeders.data_rows.author')</th>
                                    <th>@lang('seeders.data_rows.created_at')</th>
                                    <th>@lang('generic.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                <tr>
                                    <td>
                                        <label class="selection cursor-pointer">
                                            <input type="checkbox" name="checkbox[]" value="{{ $item->id }}">
                                            <div class="wrap_checkbox">
                                                <div class="checkbox"></div>
                                            </div>
                                        </label>
                                    </td>
                                    <td><a href="{{ route('edit.category',['id' => $item->id]) }}">{{ $item->translate()->name }}</a></td>
                                    <td>
                                        {{ $item->parent_id }}
                                    </td>
                                    <td>{!! $item->translate()->excerpt !!}
                                    </td>
                                    <td>
                                        @if ($item->icon != '')
                                        <span class="badge badge-success">có icon</span>
                                            @else
                                            <span class="badge badge-danger">-</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span><img style="width: 100px" src="{{ $item->thumbnails }}"></span></td>
                                    <td>{{ $item->author->name }}</td>
                                    <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</td>
                                    <!--Action-->
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
                                                        bài viết <code>{{ $item->title }}</code>
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
                @if(count($category) > 0)
                
                <div class="tool">
                    <select name="action" class="form-control">
                        <option value="">Chọn hành động</option>
                        <option value="sleep">Ẩn đi</option>
                        <option value="public">Hiển thị</option>
                        <option value="delete">Xóa vĩnh viễn</option>
                    </select>
                    <button type="submit" formaction="" class="btn btn-secondary">@lang('seeders.data_label.perform')</button>
                </div>
                
                @endif
            </form>
        </div>
        <div class="container-fluid tab-pane" id="en">
            <form action="">
                <div class="panel">
                    <div class="panel-title">
                        @if(count($category) > 0)
                        <div class="show_items">
                            @lang('generic.display')
                            <select name="number" id="js_display_item">
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
                                    <th style="max-width: 600px">@lang('seeders.data_rows.name')</th>
                                    <th>@lang('seeders.data_rows.parent')</th>
                                    <th>@lang('seeders.data_rows.excerpt')</th>
                                    <th>@lang('seeders.data_rows.icon')</th>
                                    <th>@lang('seeders.data_rows.avatar')</th>
                                    <th>@lang('seeders.data_rows.author')</th>
                                    <th>@lang('seeders.data_rows.created_at')</th>
                                    <th>@lang('generic.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                <tr>
                                    <td>
                                        <label class="selection cursor-pointer">
                                            <input type="checkbox" name="checkbox[]" value="{{ $item->id }}">
                                            <div class="wrap_checkbox">
                                                <div class="checkbox"></div>
                                            </div>
                                        </label>
                                    </td>
                                    <td><a href="{{ route('edit.posts',['id' => $item->id]) }}">{{ $item->translate()->name }}</a></td>
                                    <td class="text-center">
                                        <span><img style="width: 100px" src="{{ $item->thumbnails }}"></span>
                                    </td>
                                    <td>{!! $item->translate()->body !!}
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                        <span class="badge badge-success">hiển thị</span>
                                            @else
                                            <span class="badge badge-danger">Ngủ</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->author_id }}</td>
                                    <td>
                                        <span class="badge badge-success">nổi bật</span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</td>
                                    <!--Action-->
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
                                                        bài viết <code>{{ $item->title }}</code>
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
                @if(count($category) > 0)
                
                <div class="tool">
                    <select name="action" class="form-control">
                        <option value="">Chọn hành động</option>
                        <option value="sleep">Ẩn đi</option>
                        <option value="public">Hiển thị</option>
                        <option value="delete">Xóa vĩnh viễn</option>
                    </select>
                    <button type="submit" formaction="" class="btn btn-secondary">@lang('generic.perform')</button>
                </div>
                
                @endif
            </form>
        </div>
    </div>
@endsection

@section('footer')

@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('category') }}
@endsection

@section('novication')
    <div class="novi_master">
        <h2>
            <svg viewBox="0 0 576 512"><path fill="currentColor" d="M560.83 135.96l-24.79-24.79c-20.23-20.24-53-20.26-73.26 0L384 189.72v-57.75c0-12.7-5.1-25-14.1-33.99L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99v-80.54c6.29-4.68 12.62-9.35 18.18-14.95l158.64-159.3c9.79-9.78 15.17-22.79 15.17-36.63s-5.38-26.84-15.16-36.63zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v61.53l-48.51 48.24c-30.14 29.96-47.42 71.51-47.47 114-3.93-.29-7.47-2.42-9.36-6.27-11.97-23.86-46.25-30.34-66-14.17l-13.88-41.62c-3.28-9.81-12.44-16.41-22.78-16.41s-19.5 6.59-22.78 16.41L103 376.36c-1.5 4.58-5.78 7.64-10.59 7.64H80c-8.84 0-16 7.16-16 16s7.16 16 16 16h12.41c18.62 0 35.09-11.88 40.97-29.53L144 354.58l16.81 50.48c4.54 13.51 23.14 14.83 29.5 2.08l7.66-15.33c4.01-8.07 15.8-8.59 20.22.34C225.44 406.61 239.9 415.7 256 416h32c22.05-.01 43.95-4.9 64.01-13.6v61.61zm27.48-118.05A129.012 129.012 0 0 1 288 384v-.03c0-34.35 13.7-67.29 38.06-91.51l120.55-119.87 52.8 52.8-119.92 120.57zM538.2 186.6l-21.19 21.19-52.8-52.8 21.2-21.19c7.73-7.73 20.27-7.74 28.01 0l24.79 24.79c7.72 7.73 7.72 20.27-.01 28.01z"></path></svg>
            @lang('seeders.data_types.category.singular')
        </h2>
        <a href="{{ route('create.category') }}" class="btn btn-add" title="Thêm mới bài viết của bạn">
            <svg style="width: 15px" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            @lang('seeders.data_label.add_new')
        </a>
    </div>
@endsection
