<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Không gian tên này được áp dụng cho các tuyến điều khiển của bạn.
     *
     * Ngoài ra, nó được đặt làm không gian tên gốc của trình tạo URL.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Đường dẫn đến tuyến đường "nhà" cho ứng dụng của bạn.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Xác định các ràng buộc mô hình tuyến đường, bộ lọc mẫu, v.v.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Xác định các tuyến đường cho ứng dụng.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */


    //Route Frontend
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    //Route Backend
    protected function mapAdminRoutes()
    {
       Route::prefix('admin')
           ->middleware('web')
           ->namespace($this->namespace)
           ->group(base_path('modules/backend/routes/web.php'));
    }
}
