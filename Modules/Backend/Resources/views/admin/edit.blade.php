@extends('backend::master')

@section('layout')
    <form action="{{ route('update.admin', ['id' => $edit->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid" id="frontend-admin">
            <div class="row">
                <div class="col col-md-8 col-12">
                    <div class="admin-head">
                        <div class="box-thumbnail bg-admin">
                            <div class="thumbnail-lazy">
                                <input type="text" value="{{ $edit->background }}" id="background-admin" name="background" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png" 
                                @if ($edit->background != null)
                                    data-default-file="{{ $edit->background }}"
                                    @else
                                    data-default-file="{{ asset('public/backend/img/admin.jpg') }}"
                                @endif>
                            </div>
                        </div>
                        <div class="wrapper-info">
                            <div class="avatar">
                                <input type="text" value="{{ $edit->avatar }}" id="avatar-admin" name="avatar" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png" data-show-remove="false" 
                                @if ($edit->background != null)
                                data-default-file="{{ $edit->avatar }}"
                                @else
                                data-default-file="{{ asset('public/backend/img/avatar.jpg') }}"
                            @endif>
                            </div>
                            <span class="admin-name">{{ $edit->name }}</span>
                            <p class="admin-roles">Administration</p>
                        </div>
                    </div>
                    <div class="panel mt30">
                        <div class="panel-title">
                            <label for="extitle">
                                <svg style="width: 20px; height: 30px" viewBox="0 0 192 512"><path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"></path></svg>
                                Thông tin cơ bản
                            </label>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="forname">Họ và tên</label>
                                <input value="{{ $edit->name }}" type="text" id="forname" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tên hoặc một định danh">    
                                <small id="emailHelp" class="form-text text-muted">Có thể là họ tên hoặc định danh của [who's that]</small>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foremail">E-mail</label>
                                <input disabled value="{{ $edit->email }}" type="email" id="foremail" name="email" class="form-control" placeholder="Địa chỉ email của bạn">
                                <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất cứ ai</small>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-12">
                                    <label for="gender">Lựa chọn giới tính của bạn</label>
                                    <select class="form-control" id="gender">
                                      <option value="man">Nam</option>
                                      <option value="woman">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6 col-12">
                                    <label for="role">Vai trò</label>
                                    <select id="role" name="roles[]" class="form-control @error('role') is-invalid @enderror" multiple>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->display_name }}</option>
                                        @endforeach
                                    </select>   
                                    {{-- @if ($item->) selected @endif --}}
                                    {{-- {{ $item->roles->id }} --}}
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Cập nhật" class="btn btn-success shadown" style="padding: 6px 20px">
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
    $('.dropify').dropify({
        messages: {
            'default': 'Kéo thả tập tin ở đây hoặc nhấn chuột',
            'replace': 'Kéo thả hoặc nhấn để thay thế',
            'remove':  'xóa bỏ',
            'error':   'Ooops, Có gì đó không ổn.'
        }
    });
</script>
<script>
    //Select 2
    $('#role').select2();
    //xử lý riêng cho 2 phần background và avatar
    /*CKFINDER 3   Background admin*/
    var upload_bg_admin = document.getElementById( 'background-admin' );
    if (upload_bg_admin != null){
        upload_bg_admin.onclick = function() {
          selectFileWithCKFinder( 'background-admin' );
        };
        function selectFileWithCKFinder( elementId ) {
          CKFinder.popup({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    output.value = file.getUrl();

                    var linknode = document.createElement("img");
                        linknode.setAttribute("src", file.getUrl());
                    document.querySelector('.bg-admin .dropify-wrapper').classList.add('has-preview');
                    var dropifyPreview  = document.querySelector(".bg-admin .dropify-preview");
                        dropifyPreview.style.display = 'block';
                    var dropify  = document.querySelector(".bg-admin .dropify-render");
                        dropify.appendChild(linknode);
                    var img_fropify = document.querySelectorAll(".bg-admin .dropify-render img");
                    for (var i = 1; i < img_fropify.length ; i++) {
                        img_fropify[0].remove();
                    }
                });
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                });
            }
          });
        }
    }
    /*CKFINDER 3   Avatar admin*/
    var upload_avatar_admin = document.getElementById( 'avatar-admin' );
    if (upload_avatar_admin != null){
        upload_avatar_admin.onclick = function() {
          selectFileWithCKFinder( 'avatar-admin' );
        };
        function selectFileWithCKFinder( elementId ) {
          CKFinder.popup({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    output.value = file.getUrl();

                    var linknode = document.createElement("img");
                        linknode.setAttribute("src", file.getUrl());
                    document.querySelector('.avatar .dropify-wrapper').classList.add('has-preview');
                    var dropifyPreview  = document.querySelector(".avatar .dropify-preview");
                        dropifyPreview.style.display = 'block';
                    var dropify  = document.querySelector(".avatar .dropify-render");
                        dropify.appendChild(linknode);
                    var img_fropify = document.querySelectorAll(".avatar .dropify-render img");
                    for (var i = 1; i < img_fropify.length ; i++) {
                        img_fropify[0].remove();
                    }
                });
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                });
            }
          });
        }
    }
</script>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('administration_create') }}
@endsection

@section('novication')
<div class="novi_master">
    <h2>
        <svg viewBox="0 0 640 512"><path fill="currentColor" d="M564 288h-40c-15.18 0-29.27 4.83-41.15 12.93 9.38 6.37 17.93 13.87 25.45 22.37 4.89-2.05 10.15-3.3 15.7-3.3h40c24.25 0 44 21.53 44 48 0 8.84 7.16 16 16 16s16-7.16 16-16c0-44.11-34.09-80-76-80zm-20-32c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zM400.15 308.02c-11.88 0-23.87 1.73-35.49 5.26-14.16 4.3-29.1 6.72-44.66 6.72s-30.5-2.42-44.66-6.71a122.209 122.209 0 0 0-35.49-5.26c-36.29 0-71.58 16.18-92.28 46.93C135.21 373.3 128 395.41 128 419.2V432c0 26.51 21.49 48 48 48h288c26.51 0 48-21.49 48-48v-12.8c0-23.79-7.21-45.9-19.57-64.25-20.7-30.75-56-46.93-92.28-46.93zM480 432c0 8.82-7.18 16-16 16H176c-8.82 0-16-7.18-16-16v-12.8c0-16.63 4.88-32.67 14.11-46.38 13.83-20.54 38.4-32.8 65.74-32.8 8.9 0 17.71 1.31 26.19 3.88 17.69 5.37 35.84 8.1 53.96 8.1s36.27-2.72 53.96-8.1a89.887 89.887 0 0 1 26.19-3.88c27.34 0 51.91 12.26 65.74 32.8 9.23 13.71 14.11 29.75 14.11 46.38V432zM96 256c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zm61.15 172.93C145.27 292.83 131.18 288 116 288H76c-41.91 0-76 35.89-76 80 0 8.84 7.16 16 16 16s16-7.16 16-16c0-26.47 19.75-48 44-48h40c5.55 0 10.81 1.25 15.7 3.3 7.52-8.5 16.07-16 25.45-22.37zM320 288c61.86 0 112-50.14 112-112V32l-56 28-56-28-56 28-56-28v144c0 61.86 50.14 112 112 112zM240 83.78l24 12 56-28 56 28 24-12V128H240V83.78zm0 76.22h160v16c0 44.11-35.89 80-80 80s-80-35.89-80-80v-16z"></path></svg>
        Chỉnh sửa
    </h2>
</div>
@endsection