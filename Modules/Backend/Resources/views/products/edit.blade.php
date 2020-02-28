@extends('backend::master')

@section('layout')
<form action="{{ route('update.products', ['id' => $edit->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-lg-8 col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="tieude">
                                    <svg viewBox="0 0 576 512"><g><path fill="currentColor" d="M304 96h-98.94A13.06 13.06 0 0 0 192 109.06v37.88A13.06 13.06 0 0 0 205.06 160H224v64H96v-64h18.94A13.06 13.06 0 0 0 128 146.94V112a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v34.94A13.06 13.06 0 0 0 13.06 160H32v192H13.06A13.06 13.06 0 0 0 0 365.06V400a16 16 0 0 0 16 16h98.94A13.06 13.06 0 0 0 128 402.94v-37.88A13.06 13.06 0 0 0 114.94 352H96v-64h128v64h-18.94A13.06 13.06 0 0 0 192 365.06V400a16 16 0 0 0 16 16h96a16 16 0 0 0 16-16v-34.94A13.06 13.06 0 0 0 306.94 352H288V160h18.94A13.06 13.06 0 0 0 320 146.94V112a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M560 352H440.79c17-42.95 135.21-66.57 135.21-159.62C576 132.55 528.33 96 469.14 96c-43.83 0-81.41 21.38-103.42 57a15.66 15.66 0 0 0 4.75 21.4l28.26 18.6a16.15 16.15 0 0 0 21.86-3.83c10.77-14.86 24.94-26 43.85-26s38.22 10.46 38.22 33.84c0 52.18-142.1 73.21-142.1 184.56a155.06 155.06 0 0 0 1.71 20.66A15.94 15.94 0 0 0 378.14 416H560a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></g></svg>
                                    Tiêu đề sản phẩm
                                </label>
                                <svg class="slug__ dropdown_slug" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            </div>
                            <div class="panel-body">
                                <input type="text" id="tieude" name="vi_name" class="form-control" placeholder="Tên sản phẩm" value="{{ $edit->translate('vi')->name }}">
                                <small class="form-text invalid-feedback"></small>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label>
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M304 224H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-16h56v128H96a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-24V288h56v16a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M624 32H272a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-32h88v304h-40a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-40V112h88v32a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></g></svg>
                                    Nội dung chi tiết
                                </label>
                            </div>
                            <div class="panel-body">
                                <textarea id="editor" name="vi_body" cols="30" rows="10" style="visibility: hidden; display: none;">{{ $edit->body }}</textarea>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="excerpt">
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M624 160h-32a16 16 0 0 0-16 16v1.81c-18.9-11-40.58-17.81-64-17.81a128.14 128.14 0 0 0-128 128v32a128.14 128.14 0 0 0 128 128c23.42 0 45.1-6.78 64-17.81V432a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V176a16 16 0 0 0-16-16zm-64 160a48 48 0 0 1-96 0v-32a48 48 0 0 1 96 0z"></path><path fill="currentColor" d="M229.88 85.69A32 32 0 0 0 199.58 64h-47.16a32 32 0 0 0-30.3 21.69L.85 426.89A16 16 0 0 0 16 448h50.62a16 16 0 0 0 15.16-10.89L100.85 384h150.3l19.07 53.11A16 16 0 0 0 285.38 448H336a16 16 0 0 0 15.16-21.11zM129.58 304L176 174.74 222.42 304z"></path></g></svg>
                                    Mô tả ngắn
                                </label>
                            </div>
                            <div class="panel-body">
                                <textarea id="excerpt" name="vi_excerpt" class="form-control" rows="2" value="{{ $edit->excerpt }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="exampleInputEmail1">
                                    <svg style="width: 20px" viewBox="0 0 448 512"><g><path fill="currentColor" d="M368 96v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V96z"></path><path fill="currentColor" d="M432 48v32a16 16 0 0 1-16 16H272v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V352h-32a160 160 0 0 1 0-320h240a16 16 0 0 1 16 16z"></path></g></svg>
                                    Chi tiết sản phẩm
                                </label>
                            </div>
                            <div class="panel-body price">
                                <div class="form-group">
                                    <label for="category">Chuyên mục sản phẩm</label>
                                    <select class="form-control" id="category" name="category_id">
                                        <option value="1">Áo thu đông</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái hiển thị</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg style="width: 9px;"  viewBox="0 0 256 512"><path fill="currentColor" d="M191.9 259.3L73.7 222.2C49.2 214.5 32 189 32 160.3 32 124.8 57.6 96 89 96h73.8c22.2 0 43.3 8.6 60.1 24.5 3.1 2.9 7.8 3.2 11 .3l11.9-10.8c3.4-3.1 3.6-8.4.4-11.6-22.8-22-52.7-34.5-83.3-34.5H144V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v56H89c-49.1 0-89 43.2-89 96.3 0 42.6 26.4 80.6 64.1 92.4l118.2 37.1c24.6 7.7 41.7 33.2 41.7 61.9 0 35.4-25.6 64.3-57 64.3H93.2c-22.2 0-43.3-8.6-60.1-24.5-3.1-2.9-7.8-3.2-11-.3L10.3 402c-3.3 3-3.6 8.4-.3 11.5 22.8 22 52.7 34.5 83.3 34.5H112v56c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-56h23c49.1 0 89-43.2 89-96.3 0-42.5-26.4-80.5-64.1-92.4z"></path></svg></span>
                                        </div>
                                        <input type="text" id="price" name="price" class="form-control" placeholder="200.000 vnđ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="code">Mã sản phẩm</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg style="width: 20px"  viewBox="0 0 640 512"><path fill="currentColor" d="M152 0H8C3.6 0 0 3.6 0 8v152c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V32h120c4.4 0 8-3.6 8-8V8c0-4.4-3.6-8-8-8zm0 480H32V352c0-4.4-3.6-8-8-8H8c-4.4 0-8 3.6-8 8v152c0 4.4 3.6 8 8 8h144c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM632 0H488c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h120v128c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V8c0-4.4-3.6-8-8-8zm0 344h-16c-4.4 0-8 3.6-8 8v128H488c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h144c4.4 0 8-3.6 8-8V352c0-4.4-3.6-8-8-8zM152 96h-48c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8zm336 320h48c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8zM408 96h-48c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8zm-192 0h-16c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8zm64 0h-16c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8z" class=""></path></svg>
                                            </span>
                                        </div>
                                        <input type="text" id="code" name="code" class="form-control" placeholder="MVH10F35">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">Giảm giá</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg style="width: 12px"  viewBox="0 0 320 512"><path fill="currentColor" d="M317.66 132.28c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L296.5 153.44l21.16-21.16zM64 224c16.38 0 32.76-6.25 45.25-18.74 24.99-24.99 24.99-65.52 0-90.51C96.76 102.25 80.38 96 64 96s-32.76 6.25-45.26 18.75c-24.99 24.99-24.99 65.52 0 90.51C31.24 217.75 47.62 224 64 224zm-22.62-86.63C47.42 131.33 55.45 128 64 128s16.58 3.33 22.63 9.37c12.48 12.48 12.47 32.78 0 45.25C80.59 188.67 72.55 192 64 192c-8.55 0-16.58-3.33-22.62-9.37-12.48-12.48-12.48-32.78 0-45.26zM256 288c-16.38 0-32.76 6.25-45.26 18.75-24.99 24.99-24.99 65.52 0 90.51C223.24 409.75 239.62 416 256 416s32.76-6.25 45.25-18.74c24.99-24.99 24.99-65.52 0-90.51C288.76 294.25 272.38 288 256 288zm22.63 86.63c-6.04 6.04-14.08 9.37-22.63 9.37-8.55 0-16.58-3.33-22.62-9.37-12.48-12.48-12.48-32.78 0-45.26 6.04-6.04 14.08-9.37 22.62-9.37 8.55 0 16.58 3.33 22.63 9.37 12.48 12.48 12.47 32.78 0 45.26z" class=""></path></svg>
                                            </span>
                                        </div>
                                        <input type="text" id="discount_price" name="discount_price" class="form-control" placeholder="-30.000 vnđ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="image">
                                    <svg style="width: 20px" viewBox="0 0 512 512"><g><path fill="currentColor" d="M448 384H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z"></path><path fill="currentColor" d="M464 64H48a48 48 0 0 0-48 48v288a48 48 0 0 0 48 48h416a48 48 0 0 0 48-48V112a48 48 0 0 0-48-48zm-352 56a56 56 0 1 1-56 56 56 56 0 0 1 56-56zm336 264H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z"></path></g></svg>
                                    Ảnh đại diện
                                </label>
                            </div>
                            <div class="panel-body">
                                @if ( $edit->thumbnail != '')
                                    <input type="text" id="image" name="thumbnail" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png" data-default-file="{{ $edit->thumbnail }}">
                                    @else
                                        <input type="text" id="image" name="thumbnail" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png">
                                @endif
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="seo">
                                    <svg style="width: 20px" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                                    SEO
                                </label>
                                <svg class="slug__ dropdown_seo" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            </div>
                            <div class="panel-body body_seo" style="display: none;">
                                <div class="form-group">
                                    <label for="meta_description">Mô tả Meta</label>
                                    <textarea id="keywordmeta" name="vi_meta_description" class="form-control" rows="2">{{ $edit->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywordmeta">Từ khóa Meta</label>
                                    <textarea id="keywordmeta" name="vi_meta_keywords" class="form-control" rows="2">{{ $edit->meta_keywords }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="seotitle">Tiêu đề SEO</label>
                                    <input type="text" id="seotitle" name="vi_seo_title" class="form-control" placeholder="Tiêu đề SEO" value="{{ $edit->seo_title }}">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Lưu" class="btn btn-success shadown" style="padding: 6px 20px">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid tab-pane" id="en">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-lg-8 col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="tieude">
                                    <svg viewBox="0 0 576 512"><g><path fill="currentColor" d="M304 96h-98.94A13.06 13.06 0 0 0 192 109.06v37.88A13.06 13.06 0 0 0 205.06 160H224v64H96v-64h18.94A13.06 13.06 0 0 0 128 146.94V112a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v34.94A13.06 13.06 0 0 0 13.06 160H32v192H13.06A13.06 13.06 0 0 0 0 365.06V400a16 16 0 0 0 16 16h98.94A13.06 13.06 0 0 0 128 402.94v-37.88A13.06 13.06 0 0 0 114.94 352H96v-64h128v64h-18.94A13.06 13.06 0 0 0 192 365.06V400a16 16 0 0 0 16 16h96a16 16 0 0 0 16-16v-34.94A13.06 13.06 0 0 0 306.94 352H288V160h18.94A13.06 13.06 0 0 0 320 146.94V112a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M560 352H440.79c17-42.95 135.21-66.57 135.21-159.62C576 132.55 528.33 96 469.14 96c-43.83 0-81.41 21.38-103.42 57a15.66 15.66 0 0 0 4.75 21.4l28.26 18.6a16.15 16.15 0 0 0 21.86-3.83c10.77-14.86 24.94-26 43.85-26s38.22 10.46 38.22 33.84c0 52.18-142.1 73.21-142.1 184.56a155.06 155.06 0 0 0 1.71 20.66A15.94 15.94 0 0 0 378.14 416H560a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></g></svg>
                                    Tiêu đề sản phẩm
                                </label>
                                <svg class="slug__ dropdown_slug" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            </div>
                            <div class="panel-body">
                            <input type="text" id="tieude" name="en_name" class="form-control" placeholder="Tên sản phẩm" value="{{ $edit->translate('en')->name }}">
                                <small class="form-text invalid-feedback"></small>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label>
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M304 224H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-16h56v128H96a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-24V288h56v16a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M624 32H272a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-32h88v304h-40a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-40V112h88v32a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></g></svg>
                                    Nội dung chi tiết
                                </label>
                            </div>
                            <div class="panel-body">
                                <textarea id="editor2" name="en_body" cols="30" rows="10" style="visibility: hidden; display: none;">{{ $edit->translate('en')->body }}</textarea>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="excerpt">
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M624 160h-32a16 16 0 0 0-16 16v1.81c-18.9-11-40.58-17.81-64-17.81a128.14 128.14 0 0 0-128 128v32a128.14 128.14 0 0 0 128 128c23.42 0 45.1-6.78 64-17.81V432a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V176a16 16 0 0 0-16-16zm-64 160a48 48 0 0 1-96 0v-32a48 48 0 0 1 96 0z"></path><path fill="currentColor" d="M229.88 85.69A32 32 0 0 0 199.58 64h-47.16a32 32 0 0 0-30.3 21.69L.85 426.89A16 16 0 0 0 16 448h50.62a16 16 0 0 0 15.16-10.89L100.85 384h150.3l19.07 53.11A16 16 0 0 0 285.38 448H336a16 16 0 0 0 15.16-21.11zM129.58 304L176 174.74 222.42 304z"></path></g></svg>
                                    Mô tả ngắn
                                </label>
                            </div>
                            <div class="panel-body">
                                <textarea id="excerpt" name="en_excerpt" class="form-control" rows="2">{{ $edit->excerpt }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="exampleInputEmail1">
                                    <svg style="width: 20px" viewBox="0 0 448 512"><g><path fill="currentColor" d="M368 96v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V96z"></path><path fill="currentColor" d="M432 48v32a16 16 0 0 1-16 16H272v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V352h-32a160 160 0 0 1 0-320h240a16 16 0 0 1 16 16z"></path></g></svg>
                                    Chi tiết sản phẩm
                                </label>
                            </div>
                            <div class="panel-body price">
                                <div class="form-group">
                                    <label for="category">Chuyên mục sản phẩm</label>
                                    <select class="form-control" id="category" name="category_id">
                                        <option value="1">Áo thu đông</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái hiển thị</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><svg style="width: 9px;"  viewBox="0 0 256 512"><path fill="currentColor" d="M191.9 259.3L73.7 222.2C49.2 214.5 32 189 32 160.3 32 124.8 57.6 96 89 96h73.8c22.2 0 43.3 8.6 60.1 24.5 3.1 2.9 7.8 3.2 11 .3l11.9-10.8c3.4-3.1 3.6-8.4.4-11.6-22.8-22-52.7-34.5-83.3-34.5H144V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v56H89c-49.1 0-89 43.2-89 96.3 0 42.6 26.4 80.6 64.1 92.4l118.2 37.1c24.6 7.7 41.7 33.2 41.7 61.9 0 35.4-25.6 64.3-57 64.3H93.2c-22.2 0-43.3-8.6-60.1-24.5-3.1-2.9-7.8-3.2-11-.3L10.3 402c-3.3 3-3.6 8.4-.3 11.5 22.8 22 52.7 34.5 83.3 34.5H112v56c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-56h23c49.1 0 89-43.2 89-96.3 0-42.5-26.4-80.5-64.1-92.4z"></path></svg></span>
                                        </div>
                                        <input type="text" id="price" name="price" class="form-control" placeholder="200.000 vnđ" value="{{ $edit->price }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="code">Mã sản phẩm</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg style="width: 20px"  viewBox="0 0 640 512"><path fill="currentColor" d="M152 0H8C3.6 0 0 3.6 0 8v152c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V32h120c4.4 0 8-3.6 8-8V8c0-4.4-3.6-8-8-8zm0 480H32V352c0-4.4-3.6-8-8-8H8c-4.4 0-8 3.6-8 8v152c0 4.4 3.6 8 8 8h144c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zM632 0H488c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h120v128c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V8c0-4.4-3.6-8-8-8zm0 344h-16c-4.4 0-8 3.6-8 8v128H488c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h144c4.4 0 8-3.6 8-8V352c0-4.4-3.6-8-8-8zM152 96h-48c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8zm336 320h48c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8zM408 96h-48c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8zm-192 0h-16c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8zm64 0h-16c-4.4 0-8 3.6-8 8v304c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V104c0-4.4-3.6-8-8-8z" class=""></path></svg>
                                            </span>
                                        </div>
                                        <input type="text" id="code" name="code" class="form-control" placeholder="MVH10F35">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="discount_price">Giảm giá</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg style="width: 12px"  viewBox="0 0 320 512"><path fill="currentColor" d="M317.66 132.28c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L296.5 153.44l21.16-21.16zM64 224c16.38 0 32.76-6.25 45.25-18.74 24.99-24.99 24.99-65.52 0-90.51C96.76 102.25 80.38 96 64 96s-32.76 6.25-45.26 18.75c-24.99 24.99-24.99 65.52 0 90.51C31.24 217.75 47.62 224 64 224zm-22.62-86.63C47.42 131.33 55.45 128 64 128s16.58 3.33 22.63 9.37c12.48 12.48 12.47 32.78 0 45.25C80.59 188.67 72.55 192 64 192c-8.55 0-16.58-3.33-22.62-9.37-12.48-12.48-12.48-32.78 0-45.26zM256 288c-16.38 0-32.76 6.25-45.26 18.75-24.99 24.99-24.99 65.52 0 90.51C223.24 409.75 239.62 416 256 416s32.76-6.25 45.25-18.74c24.99-24.99 24.99-65.52 0-90.51C288.76 294.25 272.38 288 256 288zm22.63 86.63c-6.04 6.04-14.08 9.37-22.63 9.37-8.55 0-16.58-3.33-22.62-9.37-12.48-12.48-12.48-32.78 0-45.26 6.04-6.04 14.08-9.37 22.62-9.37 8.55 0 16.58 3.33 22.63 9.37 12.48 12.48 12.47 32.78 0 45.26z" class=""></path></svg>
                                            </span>
                                        </div>
                                        <input type="text" id="discount_price" name="discount_price" class="form-control" placeholder="-30.000 vnđ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="image">
                                    <svg style="width: 20px" viewBox="0 0 512 512"><g><path fill="currentColor" d="M448 384H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z"></path><path fill="currentColor" d="M464 64H48a48 48 0 0 0-48 48v288a48 48 0 0 0 48 48h416a48 48 0 0 0 48-48V112a48 48 0 0 0-48-48zm-352 56a56 56 0 1 1-56 56 56 56 0 0 1 56-56zm336 264H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z"></path></g></svg>
                                    Ảnh đại diện
                                </label>
                            </div>
                            <div class="panel-body">
                               
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="seo">
                                    <svg style="width: 20px" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                                    SEO
                                </label>
                                <svg class="slug__ dropdown_seo" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            </div>
                            <div class="panel-body body_seo" style="display: none;">
                                <div class="form-group">
                                    <label for="meta_description">Mô tả Meta</label>
                                    <textarea id="keywordmeta" name="en_meta_description" class="form-control" rows="2">{{ $edit->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keywordmeta">Từ khóa Meta</label>
                                    <textarea id="keywordmeta" name="en_meta_keywords" class="form-control" rows="2">{{ $edit->meta_keywords }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="seotitle">Tiêu đề SEO</label>
                                    <input type="text" id="seotitle" name="en_seo_title" class="form-control" placeholder="Tiêu đề SEO" value="{{ $edit->seo_title }}">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Lưu" class="btn btn-success shadown" style="padding: 6px 20px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('footer')
<script src="{{ asset('/public/backend/js/jquery.masknumber.min.js') }}"></script>
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
    CKEDITOR.replace( 'editor2', {
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
</script>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('create_products') }}
@endsection

@section('novication')
<div class="novi_master">
    <h2>
        <svg viewBox="0 0 448 512"><path fill="currentColor" d="M352 128C352 57.421 294.579 0 224 0 153.42 0 96 57.421 96 128H0v304c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V128h-96zM224 32c52.935 0 96 43.065 96 96H128c0-52.935 43.065-96 96-96zm192 400c0 26.467-21.533 48-48 48H80c-26.467 0-48-21.533-48-48V160h64v48c0 8.837 7.164 16 16 16s16-7.163 16-16v-48h192v48c0 8.837 7.163 16 16 16s16-7.163 16-16v-48h64v272z"></path></svg>
        Thêm mới
    </h2>
</div>
@endsection