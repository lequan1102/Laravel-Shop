@extends('backend::master')

@section('layout')
<form action="{{ route('update.posts',['id' => $edit->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-lg-8 col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="tieude">
                                    <svg viewBox="0 0 576 512"><g><path fill="currentColor" d="M304 96h-98.94A13.06 13.06 0 0 0 192 109.06v37.88A13.06 13.06 0 0 0 205.06 160H224v64H96v-64h18.94A13.06 13.06 0 0 0 128 146.94V112a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v34.94A13.06 13.06 0 0 0 13.06 160H32v192H13.06A13.06 13.06 0 0 0 0 365.06V400a16 16 0 0 0 16 16h98.94A13.06 13.06 0 0 0 128 402.94v-37.88A13.06 13.06 0 0 0 114.94 352H96v-64h128v64h-18.94A13.06 13.06 0 0 0 192 365.06V400a16 16 0 0 0 16 16h96a16 16 0 0 0 16-16v-34.94A13.06 13.06 0 0 0 306.94 352H288V160h18.94A13.06 13.06 0 0 0 320 146.94V112a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M560 352H440.79c17-42.95 135.21-66.57 135.21-159.62C576 132.55 528.33 96 469.14 96c-43.83 0-81.41 21.38-103.42 57a15.66 15.66 0 0 0 4.75 21.4l28.26 18.6a16.15 16.15 0 0 0 21.86-3.83c10.77-14.86 24.94-26 43.85-26s38.22 10.46 38.22 33.84c0 52.18-142.1 73.21-142.1 184.56a155.06 155.06 0 0 0 1.71 20.66A15.94 15.94 0 0 0 378.14 416H560a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" class="fa-primary"></path></g></svg>
                                    Tiêu đề bài
                                </label>
                                <svg class="slug__" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            </div>
                            <div class="panel-body">
                            <input type="text" placeholder="Tiêu đề" name="vi_title" value="{{ $edit->title }}" class="form-control @error('title') is-invalid @enderror">
                            @error('vi_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="panel-body input_slug" style="display: none">
                                <label>Liên kết bài viết tùy chỉnh</label>
                                <input type="text" id="slug" class="form-control" placeholder="-" oninput="ChangeToSlug()">
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label>
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M304 224H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-16h56v128H96a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-24V288h56v16a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M624 32H272a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-32h88v304h-40a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-40V112h88v32a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></g></svg>
                                    Nội dung bài viết
                                </label>
                            </div>
                            <div class="panel-body">
                                <textarea id="editor" name="vi_body" cols="30" rows="10" style="visibility: hidden; display: none;">{{ $edit->body }}</textarea>
                                @error('vi_body')
                                    <style>.cke_chrome{border: 1px solid #dc3545}</style>
                                @enderror
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="excerpt">
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M624 160h-32a16 16 0 0 0-16 16v1.81c-18.9-11-40.58-17.81-64-17.81a128.14 128.14 0 0 0-128 128v32a128.14 128.14 0 0 0 128 128c23.42 0 45.1-6.78 64-17.81V432a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V176a16 16 0 0 0-16-16zm-64 160a48 48 0 0 1-96 0v-32a48 48 0 0 1 96 0z"></path><path fill="currentColor" d="M229.88 85.69A32 32 0 0 0 199.58 64h-47.16a32 32 0 0 0-30.3 21.69L.85 426.89A16 16 0 0 0 16 448h50.62a16 16 0 0 0 15.16-10.89L100.85 384h150.3l19.07 53.11A16 16 0 0 0 285.38 448H336a16 16 0 0 0 15.16-21.11zM129.58 304L176 174.74 222.42 304z"></path></g></svg>
                                    Đoạn trích
                                </label>
                            </div>
                            <div class="panel-body">
                                <input type="text" placeholder="Mô tả ngắn" name="vi_excerpt" class="form-control" value="{{ $edit->excerpt }}">
                            </div>
                        </div>

                    </div>
                    <div class="col col-lg-4 col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="exampleInputEmail1">
                                    <svg style="width: 20px" viewBox="0 0 448 512"><g><path fill="currentColor" d="M368 96v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V96z"></path><path fill="currentColor" d="M432 48v32a16 16 0 0 1-16 16H272v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V352h-32a160 160 0 0 1 0-320h240a16 16 0 0 1 16 16z"></path></g></svg>
                                    Chi tiết bài viết
                                </label>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="category">Bài viết thuộc chuyên mục</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">Chọn chuyên mục</option>
                                        @foreach ($list_category as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái bài đăng</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Ẩn đi</option>
                                    </select>
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
                                <input type="text" id="image" value="{{ old('image') }}" name="image" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png" data-default-file="">
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="seo">
                                    <svg style="width: 20px" viewBox="0 0 488 512" class="svg-inline--fa fa-google fa-w-16 fa-7x"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                                    SEO
                                </label>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="meta_description">Mô tả Meta</label>
                                    <input type="text" value="{{ old('vi_meta_description') }}" name="vi_meta_description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="keywordmeta">Từ khóa Meta</label>
                                    <input type="text" value="{{ old('vi_meta_keywords') }}" name="vi_meta_keywords" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="seotitle">Tiêu đề SEO</label>
                                    <input type="text" value="{{ old('vi_seo_title') }}" name="vi_seo_title" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Đăng ngay" class="btn btn-success shadown" style="padding: 6px 20px">
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
                                    <svg viewBox="0 0 576 512"><g><path fill="currentColor" d="M304 96h-98.94A13.06 13.06 0 0 0 192 109.06v37.88A13.06 13.06 0 0 0 205.06 160H224v64H96v-64h18.94A13.06 13.06 0 0 0 128 146.94V112a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v34.94A13.06 13.06 0 0 0 13.06 160H32v192H13.06A13.06 13.06 0 0 0 0 365.06V400a16 16 0 0 0 16 16h98.94A13.06 13.06 0 0 0 128 402.94v-37.88A13.06 13.06 0 0 0 114.94 352H96v-64h128v64h-18.94A13.06 13.06 0 0 0 192 365.06V400a16 16 0 0 0 16 16h96a16 16 0 0 0 16-16v-34.94A13.06 13.06 0 0 0 306.94 352H288V160h18.94A13.06 13.06 0 0 0 320 146.94V112a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M560 352H440.79c17-42.95 135.21-66.57 135.21-159.62C576 132.55 528.33 96 469.14 96c-43.83 0-81.41 21.38-103.42 57a15.66 15.66 0 0 0 4.75 21.4l28.26 18.6a16.15 16.15 0 0 0 21.86-3.83c10.77-14.86 24.94-26 43.85-26s38.22 10.46 38.22 33.84c0 52.18-142.1 73.21-142.1 184.56a155.06 155.06 0 0 0 1.71 20.66A15.94 15.94 0 0 0 378.14 416H560a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" class="fa-primary"></path></g></svg>
                                    Tiêu đề bài
                                </label>
                                <svg class="slug__" viewBox="0 0 448 512"><path fill="currentColor" d="M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z"></path></svg>
                            </div>
                            <div class="panel-body">
                            <input type="text" placeholder="Tiêu đề" name="en_title" value="{{ $edit->title }}" class="form-control @error('title') is-invalid @enderror">
                            @error('en_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="panel-body input_slug" style="display: none">
                                <label>Liên kết bài viết tùy chỉnh</label>
                                <input type="text" id="slug" class="form-control" placeholder="-" oninput="ChangeToSlug()">
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label>
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M304 224H16a16 16 0 0 0-16 16v64a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-16h56v128H96a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-24V288h56v16a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-64a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M624 32H272a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16v-32h88v304h-40a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16h-40V112h88v32a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></g></svg>
                                    Nội dung bài viết
                                </label>
                            </div>
                            <div class="panel-body">
                                <textarea id="editor2" name="en_body" cols="30" rows="10" style="visibility: hidden; display: none;">{{ $edit->body }}</textarea>
                                @error('en_body')
                                    <style>.cke_chrome{border: 1px solid #dc3545}</style>
                                @enderror
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="excerpt">
                                    <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M624 160h-32a16 16 0 0 0-16 16v1.81c-18.9-11-40.58-17.81-64-17.81a128.14 128.14 0 0 0-128 128v32a128.14 128.14 0 0 0 128 128c23.42 0 45.1-6.78 64-17.81V432a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V176a16 16 0 0 0-16-16zm-64 160a48 48 0 0 1-96 0v-32a48 48 0 0 1 96 0z"></path><path fill="currentColor" d="M229.88 85.69A32 32 0 0 0 199.58 64h-47.16a32 32 0 0 0-30.3 21.69L.85 426.89A16 16 0 0 0 16 448h50.62a16 16 0 0 0 15.16-10.89L100.85 384h150.3l19.07 53.11A16 16 0 0 0 285.38 448H336a16 16 0 0 0 15.16-21.11zM129.58 304L176 174.74 222.42 304z"></path></g></svg>
                                    Đoạn trích
                                </label>
                            </div>
                            <div class="panel-body">
                                <input type="text" placeholder="Mô tả ngắn" name="en_excerpt" class="form-control" value="{{ old('excerpt') }}">
                            </div>
                        </div>

                    </div>
                    <div class="col col-lg-4 col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="exampleInputEmail1">
                                    <svg style="width: 20px" viewBox="0 0 448 512"><g><path fill="currentColor" d="M368 96v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V96z"></path><path fill="currentColor" d="M432 48v32a16 16 0 0 1-16 16H272v368a16 16 0 0 1-16 16h-32a16 16 0 0 1-16-16V352h-32a160 160 0 0 1 0-320h240a16 16 0 0 1 16 16z"></path></g></svg>
                                    Chi tiết bài viết
                                </label>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="category">Bài viết thuộc chuyên mục</label>
                                    <select name="category_id" id="category" class="form-control">
                                        <option value="">Chọn chuyên mục</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái bài đăng</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="1" selected>Hiển thị</option>
                                        <option value="0">Ẩn đi</option>
                                    </select>
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
                                <input type="text" id="image" value="{{ old('image') }}" name="image" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png" data-default-file="">
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-title">
                                <label for="seo">
                                    <svg style="width: 20px" viewBox="0 0 488 512" class="svg-inline--fa fa-google fa-w-16 fa-7x"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                                    SEO
                                </label>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="meta_description">Mô tả Meta</label>
                                    <input type="text" id="meta_description" value="{{ old('en_meta_description') }}" name="en_meta_description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="keywordmeta">Từ khóa Meta</label>
                                    <input type="text" id="keywordmeta" value="{{ old('en_meta_keywords') }}" name="en_meta_keywords" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="seotitle">Tiêu đề SEO</label>
                                    <input type="text" id="seotitle" value="{{ old('en_seo_title') }}" name="en_seo_title" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Đăng ngay" class="btn btn-success shadown" style="padding: 6px 20px">
                    </div>
                </div>
            </div>
        </div>   
    </div>
</form>
@endsection

@section('footer')
<script>
    CKEDITOR.replace( 'editor', {
        extraPlugins: 'easyimage',
        extraPlugins: 'cloudservices',
        filebrowserBrowseUrl: '{{ asset('public/backend/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('public/backend/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('public/backend/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('public/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('public/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('public/backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
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
    {{ Breadcrumbs::render('posts_edit', $edit) }}
@endsection

@section('novication')
<div class="novi_master">
    <h2>
        <svg viewBox="0 0 576 512"><path fill="currentColor" d="M560.83 135.96l-24.79-24.79c-20.23-20.24-53-20.26-73.26 0L384 189.72v-57.75c0-12.7-5.1-25-14.1-33.99L286.02 14.1c-9-9-21.2-14.1-33.89-14.1H47.99C21.5.1 0 21.6 0 48.09v415.92C0 490.5 21.5 512 47.99 512h288.02c26.49 0 47.99-21.5 47.99-47.99v-80.54c6.29-4.68 12.62-9.35 18.18-14.95l158.64-159.3c9.79-9.78 15.17-22.79 15.17-36.63s-5.38-26.84-15.16-36.63zM256.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zm95.98 431.42c0 8.8-7.2 16-16 16H47.99c-8.8 0-16-7.2-16-16V48.09c0-8.8 7.2-16.09 16-16.09h176.04v104.07c0 13.3 10.7 23.93 24 23.93h103.98v61.53l-48.51 48.24c-30.14 29.96-47.42 71.51-47.47 114-3.93-.29-7.47-2.42-9.36-6.27-11.97-23.86-46.25-30.34-66-14.17l-13.88-41.62c-3.28-9.81-12.44-16.41-22.78-16.41s-19.5 6.59-22.78 16.41L103 376.36c-1.5 4.58-5.78 7.64-10.59 7.64H80c-8.84 0-16 7.16-16 16s7.16 16 16 16h12.41c18.62 0 35.09-11.88 40.97-29.53L144 354.58l16.81 50.48c4.54 13.51 23.14 14.83 29.5 2.08l7.66-15.33c4.01-8.07 15.8-8.59 20.22.34C225.44 406.61 239.9 415.7 256 416h32c22.05-.01 43.95-4.9 64.01-13.6v61.61zm27.48-118.05A129.012 129.012 0 0 1 288 384v-.03c0-34.35 13.7-67.29 38.06-91.51l120.55-119.87 52.8 52.8-119.92 120.57zM538.2 186.6l-21.19 21.19-52.8-52.8 21.2-21.19c7.73-7.73 20.27-7.74 28.01 0l24.79 24.79c7.72 7.73 7.72 20.27-.01 28.01z"></path></svg>
        @lang('seeders.data_types.post.edit')
    </h2>
</div>
@endsection