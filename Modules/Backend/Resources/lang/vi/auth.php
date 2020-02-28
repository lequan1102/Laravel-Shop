<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dòng ngôn ngữ xác thực
    |--------------------------------------------------------------------------
    |
    | Các dòng ngôn ngữ sau được sử dụng trong quá trình xác thực cho nhiều loại
    | tin nhắn mà chúng ta cần hiển thị cho người dùng. Bạn được tự do sửa đổi
    | những dòng ngôn ngữ này theo yêu cầu của ứng dụng của bạn.
    |
    */

    // Các loại kiểm hộp đầu vào
    'validate' => [
        'failed'            => 'These credentials do not match our records.',
        'throttle'          => 'Too many login attempts. Please try again in :seconds seconds.',
    ],
    // Các bản dịch liên quan đến form
    'form' => [
        'login'             => 'Đăng nhập',
        'logout'            => 'Đăng xuất',
        'register'          => 'Đăng ký',
        'email_address'     => 'Địa chỉ E-Mail',
        'password'          => 'Mật khẩu',
        'forgot_password'   => 'Quên mật khẩu?',
        'remember_me'       => 'Nhớ tôi',
    ]
];
