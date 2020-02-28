<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

//use Model
use Modules\Backend\Entities\Roles;
use Modules\Backend\Entities\Settings;



class BaseController extends Controller
{
    public function __construct()
    {
        // Đặt ngôn ngữ cho website
        // app()->setLocale('vi');
        //Check Authenlicate
        $this->middleware('auth:admin');

        
        // $this->check_role();
    }
    private function check_role()
    {

    }
}