@extends('backend::master')

@section('layout')
<form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="tab-content">
        <div class="container-fluid tab-pane active" id="vi">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="tieude">
                                    <svg viewBox="0 0 576 512"><g><path fill="currentColor" d="M304 96h-98.94A13.06 13.06 0 0 0 192 109.06v37.88A13.06 13.06 0 0 0 205.06 160H224v64H96v-64h18.94A13.06 13.06 0 0 0 128 146.94V112a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v34.94A13.06 13.06 0 0 0 13.06 160H32v192H13.06A13.06 13.06 0 0 0 0 365.06V400a16 16 0 0 0 16 16h98.94A13.06 13.06 0 0 0 128 402.94v-37.88A13.06 13.06 0 0 0 114.94 352H96v-64h128v64h-18.94A13.06 13.06 0 0 0 192 365.06V400a16 16 0 0 0 16 16h96a16 16 0 0 0 16-16v-34.94A13.06 13.06 0 0 0 306.94 352H288V160h18.94A13.06 13.06 0 0 0 320 146.94V112a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M560 352H440.79c17-42.95 135.21-66.57 135.21-159.62C576 132.55 528.33 96 469.14 96c-43.83 0-81.41 21.38-103.42 57a15.66 15.66 0 0 0 4.75 21.4l28.26 18.6a16.15 16.15 0 0 0 21.86-3.83c10.77-14.86 24.94-26 43.85-26s38.22 10.46 38.22 33.84c0 52.18-142.1 73.21-142.1 184.56a155.06 155.06 0 0 0 1.71 20.66A15.94 15.94 0 0 0 378.14 416H560a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></g></svg>
                                    Thông tin cơ bản
                                </label>
                            </div>
                            <div class="panel-body">
                                <label for="tieude">Tên cho chuyên mục</label>
                                <input type="text" id="tieude" name="vi_name" class="form-control" placeholder="Tiêu đề">
                                <small class="form-text invalid-feedback"></small>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="category">Chọn danh mục cha</label>
                                    <select id="category" name="parent_id" class="form-control">
                                        <option value="0">Uncategory</option>
                                        <option value="2">Tin tức</option>
                                        <option value="3">Dịch vụ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col col-lg-8 col-12">
                                <div class="panel">
                                    <div class="panel-title">
                                        <label for="excerpt">
                                            <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M624 160h-32a16 16 0 0 0-16 16v1.81c-18.9-11-40.58-17.81-64-17.81a128.14 128.14 0 0 0-128 128v32a128.14 128.14 0 0 0 128 128c23.42 0 45.1-6.78 64-17.81V432a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V176a16 16 0 0 0-16-16zm-64 160a48 48 0 0 1-96 0v-32a48 48 0 0 1 96 0z"></path><path fill="currentColor" d="M229.88 85.69A32 32 0 0 0 199.58 64h-47.16a32 32 0 0 0-30.3 21.69L.85 426.89A16 16 0 0 0 16 448h50.62a16 16 0 0 0 15.16-10.89L100.85 384h150.3l19.07 53.11A16 16 0 0 0 285.38 448H336a16 16 0 0 0 15.16-21.11zM129.58 304L176 174.74 222.42 304z"></path></g></svg>
                                            Mô tả ngắn
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <textarea id="excerpt" name="vi_excerpt" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-title">
                                        <label>
                                            <svg style="width: 20px" viewBox="0 0 488 512" class="svg-inline--fa fa-google fa-w-16 fa-7x"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                                            SEO
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="meta_description">Mô tả Meta</label>
                                            <input id="meta_description" type="text" value="{{ old('vi_meta_description') }}" name="vi_meta_description" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="keyword_meta">Từ khóa Meta</label>
                                            <input id="keyword_meta" type="text" value="{{ old('vi_meta_keywords') }}" name="vi_meta_keywords" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_name">Tiêu đề SEO</label>
                                            <input id="seo_name" type="text" value="{{ old('vi_seo_name') }}" name="vi_seo_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-12">
                                <div class="panel">
                                    <div class="panel-title">
                                        <label for="icon">
                                            <svg viewBox="0 0 448 512"><path fill="currentColor" d="M397.8 32H50.2C22.7 32 0 54.7 0 82.2v347.6C0 457.3 22.7 480 50.2 480h347.6c27.5 0 50.2-22.7 50.2-50.2V82.2c0-27.5-22.7-50.2-50.2-50.2zm-45.4 284.3c0 4.2-3.6 6-7.8 7.8-16.7 7.2-34.6 13.7-53.8 13.7-26.9 0-39.4-16.7-71.7-16.7-23.3 0-47.8 8.4-67.5 17.3-1.2.6-2.4.6-3.6 1.2V385c0 1.8 0 3.6-.6 4.8v1.2c-2.4 8.4-10.2 14.3-19.1 14.3-11.3 0-20.3-9-20.3-20.3V166.4c-7.8-6-13.1-15.5-13.1-26.3 0-18.5 14.9-33.5 33.5-33.5 18.5 0 33.5 14.9 33.5 33.5 0 10.8-4.8 20.3-13.1 26.3v18.5c1.8-.6 3.6-1.2 5.4-2.4 18.5-7.8 40.6-14.3 61.5-14.3 22.7 0 40.6 6 60.9 13.7 4.2 1.8 8.4 2.4 13.1 2.4 22.7 0 47.8-16.1 53.8-16.1 4.8 0 9 3.6 9 7.8v140.3z"></path></svg>
                                            Biểu tượng
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" name="icon" id="icon" placeholder="fa fa-home" class="form-control">
                                        <small id="emailHelp" class="form-text text-muted">Sử dụng biểu tượng và các ký hiệu ở đây <a href="https://fontawesome.com/icons?d=gallery">font-awesome</a></small>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-title">
                                        <label for="image">
                                            <svg viewBox="0 0 512 512"><g><path fill="currentColor" d="M448 384H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z" class="fa-secondary"></path><path fill="currentColor" d="M464 64H48a48 48 0 0 0-48 48v288a48 48 0 0 0 48 48h416a48 48 0 0 0 48-48V112a48 48 0 0 0-48-48zm-352 56a56 56 0 1 1-56 56 56 56 0 0 1 56-56zm336 264H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z"></path></g></svg>
                                            Ảnh đại diện
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" id="image" name="thumbnail" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Tạo mới" class="btn btn-success shadown" style="padding: 6px 20px">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid tab-pane" id="en">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-12">
                        <div class="panel">
                            <div class="panel-title">
                                <label for="tieude">
                                    <svg viewBox="0 0 576 512"><g><path fill="currentColor" d="M304 96h-98.94A13.06 13.06 0 0 0 192 109.06v37.88A13.06 13.06 0 0 0 205.06 160H224v64H96v-64h18.94A13.06 13.06 0 0 0 128 146.94V112a16 16 0 0 0-16-16H16a16 16 0 0 0-16 16v34.94A13.06 13.06 0 0 0 13.06 160H32v192H13.06A13.06 13.06 0 0 0 0 365.06V400a16 16 0 0 0 16 16h98.94A13.06 13.06 0 0 0 128 402.94v-37.88A13.06 13.06 0 0 0 114.94 352H96v-64h128v64h-18.94A13.06 13.06 0 0 0 192 365.06V400a16 16 0 0 0 16 16h96a16 16 0 0 0 16-16v-34.94A13.06 13.06 0 0 0 306.94 352H288V160h18.94A13.06 13.06 0 0 0 320 146.94V112a16 16 0 0 0-16-16z"></path><path fill="currentColor" d="M560 352H440.79c17-42.95 135.21-66.57 135.21-159.62C576 132.55 528.33 96 469.14 96c-43.83 0-81.41 21.38-103.42 57a15.66 15.66 0 0 0 4.75 21.4l28.26 18.6a16.15 16.15 0 0 0 21.86-3.83c10.77-14.86 24.94-26 43.85-26s38.22 10.46 38.22 33.84c0 52.18-142.1 73.21-142.1 184.56a155.06 155.06 0 0 0 1.71 20.66A15.94 15.94 0 0 0 378.14 416H560a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></g></svg>
                                    Thông tin cơ bản
                                </label>
                            </div>
                            <div class="panel-body">
                                <label for="tieude">Tên cho chuyên mục</label>
                                <input type="text" id="tieude" name="en_name" class="form-control" placeholder="Tiêu đề">
                                <small class="form-text invalid-feedback"></small>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="category">Chọn danh mục cha</label>
                                    <select id="category" name="parent_id" class="form-control">
                                        <option value="0">Uncategory</option>
                                        <option value="2">Tin tức</option>
                                        <option value="3">Dịch vụ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col col-lg-8 col-12">
                                <div class="panel">
                                    <div class="panel-title">
                                        <label for="excerpt">
                                            <svg viewBox="0 0 640 512"><g><path fill="currentColor" d="M624 160h-32a16 16 0 0 0-16 16v1.81c-18.9-11-40.58-17.81-64-17.81a128.14 128.14 0 0 0-128 128v32a128.14 128.14 0 0 0 128 128c23.42 0 45.1-6.78 64-17.81V432a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V176a16 16 0 0 0-16-16zm-64 160a48 48 0 0 1-96 0v-32a48 48 0 0 1 96 0z"></path><path fill="currentColor" d="M229.88 85.69A32 32 0 0 0 199.58 64h-47.16a32 32 0 0 0-30.3 21.69L.85 426.89A16 16 0 0 0 16 448h50.62a16 16 0 0 0 15.16-10.89L100.85 384h150.3l19.07 53.11A16 16 0 0 0 285.38 448H336a16 16 0 0 0 15.16-21.11zM129.58 304L176 174.74 222.42 304z"></path></g></svg>
                                            Mô tả ngắn
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <textarea id="excerpt" name="en_excerpt" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-title">
                                        <label>
                                            <svg style="width: 20px" viewBox="0 0 488 512" class="svg-inline--fa fa-google fa-w-16 fa-7x"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                                            SEO
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="meta_description">Mô tả Meta</label>
                                            <input id="meta_description" type="text" value="{{ old('en_meta_description') }}" name="en_meta_description" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="keyword_meta">Từ khóa Meta</label>
                                            <input id="keyword_meta" type="text" value="{{ old('en_meta_keywords') }}" name="en_meta_keywords" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_name">Tiêu đề SEO</label>
                                            <input id="seo_name" type="text" value="{{ old('en_seo_name') }}" name="en_seo_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-4 col-12">
                                <div class="panel">
                                    <div class="panel-title">
                                        <label for="icon">
                                            <svg viewBox="0 0 448 512"><path fill="currentColor" d="M397.8 32H50.2C22.7 32 0 54.7 0 82.2v347.6C0 457.3 22.7 480 50.2 480h347.6c27.5 0 50.2-22.7 50.2-50.2V82.2c0-27.5-22.7-50.2-50.2-50.2zm-45.4 284.3c0 4.2-3.6 6-7.8 7.8-16.7 7.2-34.6 13.7-53.8 13.7-26.9 0-39.4-16.7-71.7-16.7-23.3 0-47.8 8.4-67.5 17.3-1.2.6-2.4.6-3.6 1.2V385c0 1.8 0 3.6-.6 4.8v1.2c-2.4 8.4-10.2 14.3-19.1 14.3-11.3 0-20.3-9-20.3-20.3V166.4c-7.8-6-13.1-15.5-13.1-26.3 0-18.5 14.9-33.5 33.5-33.5 18.5 0 33.5 14.9 33.5 33.5 0 10.8-4.8 20.3-13.1 26.3v18.5c1.8-.6 3.6-1.2 5.4-2.4 18.5-7.8 40.6-14.3 61.5-14.3 22.7 0 40.6 6 60.9 13.7 4.2 1.8 8.4 2.4 13.1 2.4 22.7 0 47.8-16.1 53.8-16.1 4.8 0 9 3.6 9 7.8v140.3z"></path></svg>
                                            Biểu tượng
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" name="icon" id="icon" placeholder="fa fa-home" class="form-control">
                                        <small id="emailHelp" class="form-text text-muted">Sử dụng biểu tượng và các ký hiệu ở đây <a href="https://fontawesome.com/icons?d=gallery">font-awesome</a></small>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-title">
                                        <label for="image">
                                            <svg viewBox="0 0 512 512"><g><path fill="currentColor" d="M448 384H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z" class="fa-secondary"></path><path fill="currentColor" d="M464 64H48a48 48 0 0 0-48 48v288a48 48 0 0 0 48 48h416a48 48 0 0 0 48-48V112a48 48 0 0 0-48-48zm-352 56a56 56 0 1 1-56 56 56 56 0 0 1 56-56zm336 264H64v-48l71.51-71.52a12 12 0 0 1 17 0L208 320l135.51-135.52a12 12 0 0 1 17 0L448 272z"></path></g></svg>
                                            Ảnh đại diện
                                        </label>
                                    </div>
                                    <div class="panel-body">
                                        <input type="text" id="image" name="thumbnail" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Tạo mới" class="btn btn-success shadown" style="padding: 6px 20px">
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
    {{ Breadcrumbs::render('category_create') }}
@endsection

@section('novication')
<div class="novi_master">
    <h2>
        <svg viewBox="0 0 512 512"><path fill="currentColor" d="M464 0H144c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h320c26.51 0 48-21.49 48-48v-48h48c26.51 0 48-21.49 48-48V48c0-26.51-21.49-48-48-48zm-80 464c0 8.82-7.18 16-16 16H48c-8.82 0-16-7.18-16-16V144c0-8.82 7.18-16 16-16h48v240c0 26.51 21.49 48 48 48h240v48zm96-96c0 8.82-7.18 16-16 16H144c-8.82 0-16-7.18-16-16V48c0-8.82 7.18-16 16-16h320c8.82 0 16 7.18 16 16v320z"></path></svg>
        @lang('seeders.data_label.add_new')
    </h2>
</div>
@endsection