<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App;
use DateTime;
use Modules\Backend\Entities\Settings;

class SettingsController extends BaseController
{
    public function __construct(){
        parent::__construct();
        // $data['settings'] = 'settings';
    }

    
    public function index()
    {
        $data['a'] = 'a';
        // $data['settings'] = 'settings';

        // $this->basic();

        // $this->advanced();

        // $this->developers();

        return view('backend::settings.index', $data);
    }

    public function basic(Request $request)
    {
        
    }
    public function store_basic(Request $request)
    {
        if ($request->isMethod('post')) {
            \DB::beginTransaction();
            $basic = array(
                // Cơ bản
                'logo'                  => $request->input('logo'),
                'title_web'             => $request->input('title_web'),
                'email'                 => $request->input('email'),
                'phone'                 => $request->input('phone'),
                'location'              => $request->input('location'),
    
                // Mạng xã hội
                'facebook'              => $request->input('facebook'),
                'twitter'               => $request->input('twitter'),
                'instargam'             => $request->input('instargam'),
                'youtube'               => $request->input('youtube'),
    
                // Các trường tùy chỉnh
            );
            $result_basic = json_encode($basic);

            if (Settings::create($basic)){
                \DB::commit();
                return redirect()->route('index.settings')->with('success', 'Nó đã làm việc!');
            } else {
                \DB::rollBack();
                return redirect()->route('index.settings')->with('error', 'Đã có lỗi sảy ra!');
            }
        }
    }
    public function advanced()
    {

    }
    public function developers()
    {

    }
}
