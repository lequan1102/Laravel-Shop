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

    
    'validate' => [
        'failed'            => 'These credentials do not match our records.',
        'throttle'          => 'Too many login attempts. Please try again in :seconds seconds.',
    ],
    'form' => [
        'login'             => 'Login',
        'logout'            => 'Logout',
        'register'          => 'Register',
        'email_address'     => 'E-Mail Address',
        'password'          => 'Password',
        'forgot_password'   => 'Forgot Your Password?',
        'remember_me'       => 'Remember Me',
    ]
];
