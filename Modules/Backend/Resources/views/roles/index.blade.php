@extends('backend::master')

@section('layout')
    <div class="tab-content">
        @if (count($roles) > 0)
            @foreach ($roles as $item)
                @if ($loop->first)
                <div class="container-fluid tab-pane active" id="vi">
                    <form action="">
                        <div class="panel">
                            <div class="panel-title">
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
                                            <th style="max-width: 600px">@lang('backend::seeders.data_label.permissions')</th>
                                            <th>@lang('backend::seeders.data_label.name')</th>
                                            <th>@lang('backend::seeders.data_rows.member')</th>
                                            <th>@lang('backend::seeders.data_label.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @endif
                                        <tr>
                                            <td>
                                                <label class="selection cursor-pointer">
                                                    <input type="checkbox" name="checkbox[]" value="{{ $item->id }}">
                                                    <div class="wrap_checkbox">
                                                        <div class="checkbox"></div>
                                                    </div>
                                                </label>
                                            </td>
                                            <td><a href="{{ route('edit.roles',['id' => $item->id]) }}">{{ $item->name }}</a></td>
                                            <td>{{ $item->display_name }}</td>
                                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}</td>
                                            <!--Action-->
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn dropdowntable" type="button" id="dropdownMenuButton{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <svg viewBox="0 0 512 512"><path fill="currentColor" d="M304 256c0 26.5-21.5 48-48 48s-48-21.5-48-48 21.5-48 48-48 48 21.5 48 48zm120-48c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48zm-336 0c-26.5 0-48 21.5-48 48s21.5 48 48 48 48-21.5 48-48-21.5-48-48-48z"></path></svg>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $item->id }}"
                                                            x-placement="bottom-start" style="position: absolute; transform: translate3d(-2px, 13px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item" href="{{ route('edit.posts',['id'=>$item->id]) }}"><i class="bx bxs-pencil mr-2"></i> Chỉnh sửa</a>
                                                        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#del{{ $item->id }}"><i class="bx bxs-trash mr-2"></i>Xoá</a>
                                                    </div>
                                                </div>
                                                <!-- Modal Confirm Deletel -->
                                                <div class="modal fade" id="del{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">@lang('backend::seeders.data_label.are_you_sure_ac_delete')</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="text-align: left">
                                                                @lang('backend::seeders.data_label.name') <code>{{ $item->title }}</code>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('backend::seeders.data_label.no')</button>
                                                                <a href="{{ route('destroy.posts', ['id' => $item->id]) }}"><button type="button" class="btn btn-primary">@lang('backend::seeders.data_label.delete_confirm')</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @if ($loop->last)
                                    </tbody>
                                </table>
                                <div class="d-flex flex-between flex-align-center mt20">
                                    <div class="of-page">
                                        Bạn đang xem trang {{ $loop->iteration }} của {{ $loop->count }}
                                    </div>
                                    <div class="paigna">
                                        <nav class="pagination">
                                            <ul class="clear">

                                            </ul>
                                        </nav>
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
                            <button type="submit" formaction="" class="btn btn-secondary">@lang('backend::seeders.data_label.perform')</button>
                        </div>
                        
                    </form>
                </div>
                <div class="container-fluid tab-pane" id="en">
                
                </div>
                @endif
            @endforeach
            @else
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-title">
                        @lang('backend::seeders.data_label.no_data')
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('footer')

@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('roles') }}
@endsection

@section('novication')
    <div class="novi_master">
        <h2>
          <svg viewBox="0 0 512 512"><path fill="currentColor" d="M329.37 137.37c-12.49 12.5-12.49 32.76 0 45.26 12.5 12.5 32.76 12.5 45.26 0 12.49-12.5 12.49-32.76 0-45.26-12.5-12.49-32.76-12.49-45.26 0zm64-64c-12.49 12.5-12.49 32.76 0 45.26 12.5 12.5 32.76 12.5 45.26 0s12.5-32.76 0-45.26c-12.5-12.49-32.76-12.49-45.26 0zM448 0H320c-35.35 0-64 28.65-64 64v128c0 11.85 3.44 22.8 9.05 32.32L2.34 487.03c-3.12 3.12-3.12 8.19 0 11.31l11.31 11.31c3.12 3.12 8.19 3.12 11.31 0l48.7-48.7 46.4 46.4c6.16 6.16 16.2 6.22 22.43 0l44.86-44.86c6.19-6.19 6.19-16.23 0-22.43l-46.4-46.4 28.71-28.72 46.4 46.4c6.16 6.16 16.2 6.22 22.43 0l44.86-44.86c6.19-6.19 6.19-16.23 0-22.43l-46.4-46.4 50.72-50.72c9.52 5.61 20.47 9.05 32.32 9.05h128c35.35 0 64-28.65 64-64V64C512 28.65 483.35 0 448 0zM153.71 451.28l-22.43 22.43-35.18-35.18 22.43-22.43 35.18 35.18zm96-96l-22.43 22.43-35.19-35.19 22.43-22.43 35.19 35.19zM480 192c0 17.64-14.36 32-32 32H320c-17.64 0-32-14.36-32-32V64c0-17.64 14.36-32 32-32h128c17.64 0 32 14.36 32 32v128z"></path></svg>
            @lang('backend::seeders.data_types.role.singular')
        </h2>
        <a href="{{ route('create.roles') }}" class="btn btn-add" title="Thêm mới bài viết của bạn">
            <svg style="width: 15px" viewBox="0 0 384 512"><path fill="currentColor" d="M376 232H216V72c0-4.42-3.58-8-8-8h-32c-4.42 0-8 3.58-8 8v160H8c-4.42 0-8 3.58-8 8v32c0 4.42 3.58 8 8 8h160v160c0 4.42 3.58 8 8 8h32c4.42 0 8-3.58 8-8V280h160c4.42 0 8-3.58 8-8v-32c0-4.42-3.58-8-8-8z"></path></svg>
            @lang('backend::seeders.data_label.add_new')
        </a>
    </div>
@endsection
