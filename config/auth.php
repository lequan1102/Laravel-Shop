<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mặc định xác thực
    | ------------------------------------------------- -------------------------
    |
    | Tùy chọn này kiểm soát "bảo vệ" và mật khẩu mặc định
    | thiết lập lại tùy chọn cho ứng dụng của bạn. Bạn có thể thay đổi các mặc định này
    | theo yêu cầu, nhưng chúng là một khởi đầu hoàn hảo cho hầu hết các ứng dụng.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Bảo vệ xác thực
    | ------------------------------------------------- -------------------------
    |
    | Tiếp theo, bạn có thể xác định mọi bảo vệ xác thực cho ứng dụng của mình.
    | Tất nhiên, một cấu hình mặc định tuyệt vời đã được xác định cho bạn
    | ở đây sử dụng lưu trữ phiên và nhà cung cấp người dùng Eloquent.
    |
    | Tất cả các trình điều khiển xác thực có một nhà cung cấp người dùng. Điều này định nghĩa như thế nào
    | Người dùng thực sự được lấy ra khỏi cơ sở dữ liệu của bạn hoặc bộ lưu trữ khác
    | các cơ chế được sử dụng bởi ứng dụng này để duy trì dữ liệu người dùng của bạn.
    |
    | Được hỗ trợ: "session", "token"
    |
    */
    // Multiple authenticate Users & Admin
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
            'hash' => false,
        ],

        'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],

        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admin',
        ],
    ],

    /*
    | --------------------------------------------------------------------------
    | Nhà cung cấp người dùng
    | --------------------------------------------------------------------------
    |
    | Tất cả các trình điều khiển xác thực có một nhà cung cấp người dùng. Điều này định nghĩa như thế nào
    | Người dùng thực sự được lấy ra khỏi cơ sở dữ liệu của bạn hoặc bộ lưu trữ khác
    | các cơ chế được sử dụng bởi ứng dụng này để duy trì dữ liệu người dùng của bạn.
    |
    | Nếu bạn có nhiều bảng hoặc mô hình người dùng, bạn có thể định cấu hình nhiều bảng
    | nguồn đại diện cho mỗi model / table. Những nguồn này sau đó có thể
    | được chỉ định cho bất kỳ bảo vệ xác thực bổ sung mà bạn đã xác định.
    |
    | Được hỗ trợ: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => Modules\Backend\Entities\Admin::class,
        ],
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Đặt lại mật khẩu
    |--------------------------------------------------------------------------
    |
    | Bạn có thể chỉ định nhiều cấu hình đặt lại mật khẩu nếu bạn có nhiều hơn
    | hơn một bảng người dùng hoặc mô hình trong ứng dụng và bạn muốn có
    | cài đặt đặt lại mật khẩu riêng dựa trên các loại người dùng cụ thể.
    |
    | Thời gian hết hạn là số phút mà mã thông báo đặt lại phải là
    | coi là hợp lệ. Tính năng bảo mật này giúp mã thông báo tồn tại trong thời gian ngắn
    | họ có ít thời gian hơn để đoán. Bạn có thể thay đổi điều này khi cần thiết.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,     //hết hiệu lực
            'throttle' => 60,   //van tiết lưu
        ],
        'admin' => [
            'provider' => 'admin',
            'table' => 'password_resets',
            'expire' => 60,    //hết hiệu lực
            'throttle' => 60,  //van tiết lưu
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Hết giờ xác nhận mật khẩu
    | ------------------------------------------------- -------------------------
    |
    | Tại đây bạn có thể xác định số giây trước khi xác nhận mật khẩu
    | hết thời gian và người dùng được nhắc nhập lại mật khẩu của họ thông qua
    | màn hình xác nhận. Theo mặc định, thời gian chờ kéo dài trong ba giờ.
    |
    */

    'password_timeout' => 10800,
    // 10800 seconds 180 minutes
];
