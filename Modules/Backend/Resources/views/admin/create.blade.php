@extends('backend::master')

@section('layout')
      
    <form action="{{ route('store.admin') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-8 col-12">
                    <div class="panel">
                        <div class="panel-title">
                            <label for="extitle">
                                <svg style="width: 20px; height: 30px" viewBox="0 0 192 512"><path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"></path></svg>
                                Thông tin cơ bản
                            </label>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="forname">Họ và tên</label>
                                <input value="{{ old('name') }}" type="text" id="forname" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Tên hoặc một định danh">    
                                <small id="emailHelp" class="form-text text-muted">Có thể là họ tên hoặc định danh của [who's that]</small>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foremail">E-mail</label>
                                <input value="{{ old('email') }}" type="email" id="foremail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Địa chỉ email của bạn">
                                <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ email của bạn với bất cứ ai</small>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="***">
                                <small class="form-text text-muted">Mật khẩu không ít hơn 5 kí tự.</small>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Nhập lại mật khẩu</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="***">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-title">
                            <label for="extitle">
                                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M496.656 285.683C506.583 272.809 512 256 512 235.468c-.001-37.674-32.073-72.571-72.727-72.571h-70.15c8.72-17.368 20.695-38.911 20.695-69.817C389.819 34.672 366.518 0 306.91 0c-29.995 0-41.126 37.918-46.829 67.228-3.407 17.511-6.626 34.052-16.525 43.951C219.986 134.75 184 192 162.382 203.625c-2.189.922-4.986 1.648-8.032 2.223C148.577 197.484 138.931 192 128 192H32c-17.673 0-32 14.327-32 32v256c0 17.673 14.327 32 32 32h96c17.673 0 32-14.327 32-32v-8.74c32.495 0 100.687 40.747 177.455 40.726 5.505.003 37.65.03 41.013 0 59.282.014 92.255-35.887 90.335-89.793 15.127-17.727 22.539-43.337 18.225-67.105 12.456-19.526 15.126-47.07 9.628-69.405zM32 480V224h96v256H32zm424.017-203.648C472 288 472 336 450.41 347.017c13.522 22.76 1.352 53.216-15.015 61.996 8.293 52.54-18.961 70.606-57.212 70.974-3.312.03-37.247 0-40.727 0-72.929 0-134.742-40.727-177.455-40.727V235.625c37.708 0 72.305-67.939 106.183-101.818 30.545-30.545 20.363-81.454 40.727-101.817 50.909 0 50.909 35.517 50.909 61.091 0 42.189-30.545 61.09-30.545 101.817h111.999c22.73 0 40.627 20.364 40.727 40.727.099 20.363-8.001 36.375-23.984 40.727zM104 432c0 13.255-10.745 24-24 24s-24-10.745-24-24 10.745-24 24-24 24 10.745 24 24z"></path></svg>
                                Mạng xã hội
                            </label>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="Facebook">Facebook</label>
                                <input type="text" class="form-control" id="Facebook" placeholder="Facebook">
                            </div>
                            <div class="form-group">
                                <label for="Twitter">Twitter</label>
                                <input type="text" class="form-control" id="Twitter" placeholder="Twitter">
                            </div>
                            <div class="form-group">
                                <label for="Youtube">Youtube</label>
                                <input type="text" class="form-control" id="Youtube" placeholder="Youtube">
    
                            </div>
                            <div class="form-group">
                                <label for="Instagram">Instagram</label>
                                <input type="text" class="form-control" id="Instagram" placeholder="Instagram">
                            </div>
                            <div class="form-group">
                                <label for="Reddit">Reddit</label>
                                <input type="text" class="form-control" id="Reddit" placeholder="Reddit">
                            </div>
                            <div class="form-group">
                                <label for="Pinterest">Pinterest</label>
                                <input type="text" class="form-control" id="Pinterest" placeholder="Pinterest">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4 col-12">
                    <div class="panel">
                        <div class="panel-title">
                            <label for="exampleInputEmail1">
                                <svg viewBox="0 0 384 512"><path fill="currentColor" d="M320 0H64C28.7 0 0 28.7 0 64v384c0 35.3 28.7 64 64 64h256c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zm32 448c0 17.6-14.4 32-32 32H64c-17.6 0-32-14.4-32-32V64c0-17.6 14.4-32 32-32h256c17.6 0 32 14.4 32 32v384zM192 288c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm46.8 144c-19.5 0-24.4 7-46.8 7s-27.3-7-46.8-7c-21.2 0-41.8 9.4-53.8 27.4C84.2 342.1 80 355 80 368.9V408c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-39.1c0-14 9-32.9 33.2-32.9 12.4 0 20.8 7 46.8 7 25.9 0 34.3-7 46.8-7 24.3 0 33.2 18.9 33.2 32.9V408c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-39.1c0-13.9-4.2-26.8-11.4-37.5-12.1-18-32.7-27.4-53.8-27.4z"></path></svg>
                                Ảnh đại diện
                            </label>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="avatar">Đăng ảnh đại diện của bạn</label>
                                <input type="text" id="image" name="avatar" class="form-control-file dropify" data-allowed-file-extensions="pdf jpg jpeg png">
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Lưu" class="btn btn-success shadown" style="padding: 6px 20px">            </div>
            </div>
        </div>
    </form>
@endsection

@section('footer')
<script>
    //Select 2
    $('#role').select2();
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
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('administration_create') }}
@endsection

@section('novication')
<div class="novi_master">
    <h2>
        <svg viewBox="0 0 640 512"><path fill="currentColor" d="M564 288h-40c-15.18 0-29.27 4.83-41.15 12.93 9.38 6.37 17.93 13.87 25.45 22.37 4.89-2.05 10.15-3.3 15.7-3.3h40c24.25 0 44 21.53 44 48 0 8.84 7.16 16 16 16s16-7.16 16-16c0-44.11-34.09-80-76-80zm-20-32c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zM400.15 308.02c-11.88 0-23.87 1.73-35.49 5.26-14.16 4.3-29.1 6.72-44.66 6.72s-30.5-2.42-44.66-6.71a122.209 122.209 0 0 0-35.49-5.26c-36.29 0-71.58 16.18-92.28 46.93C135.21 373.3 128 395.41 128 419.2V432c0 26.51 21.49 48 48 48h288c26.51 0 48-21.49 48-48v-12.8c0-23.79-7.21-45.9-19.57-64.25-20.7-30.75-56-46.93-92.28-46.93zM480 432c0 8.82-7.18 16-16 16H176c-8.82 0-16-7.18-16-16v-12.8c0-16.63 4.88-32.67 14.11-46.38 13.83-20.54 38.4-32.8 65.74-32.8 8.9 0 17.71 1.31 26.19 3.88 17.69 5.37 35.84 8.1 53.96 8.1s36.27-2.72 53.96-8.1a89.887 89.887 0 0 1 26.19-3.88c27.34 0 51.91 12.26 65.74 32.8 9.23 13.71 14.11 29.75 14.11 46.38V432zM96 256c44.18 0 80-35.82 80-80s-35.82-80-80-80-80 35.82-80 80 35.82 80 80 80zm0-128c26.47 0 48 21.53 48 48s-21.53 48-48 48-48-21.53-48-48 21.53-48 48-48zm61.15 172.93C145.27 292.83 131.18 288 116 288H76c-41.91 0-76 35.89-76 80 0 8.84 7.16 16 16 16s16-7.16 16-16c0-26.47 19.75-48 44-48h40c5.55 0 10.81 1.25 15.7 3.3 7.52-8.5 16.07-16 25.45-22.37zM320 288c61.86 0 112-50.14 112-112V32l-56 28-56-28-56 28-56-28v144c0 61.86 50.14 112 112 112zM240 83.78l24 12 56-28 56 28 24-12V128H240V83.78zm0 76.22h160v16c0 44.11-35.89 80-80 80s-80-35.89-80-80v-16z"></path></svg>
        Thêm quản trị viên
    </h2>
</div>
@endsection