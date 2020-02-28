<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Support\Facades\Input;
use Modules\Backend\Entities\Menu;
class MenuController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $data['menus'] = 'menus';
    }
    
    public function change(Request $request)
    {
        if($request->ajax()){
            $data = '';
            $data = json_decode($request->input('reponse'), true);

            $dd = array(
                'title'    => 'sdsd',
                'response' => $data
            );
    
            Menu::create($dd);

            // Nếu có menu
            // if ($data){
            //     $html = '<div class="dd"><ol class="dd-list">';

            //     foreach ($data as $item) {
            //         $html .= '<li class="dd-item" data-title="'.$item['title'].'" data-id="'.$item['id'].'">';
            //         $html .= '<div class="dd-handle">'.$item['title'].'</div>';
            //         // Nếu có mục con
            //         if (isset($item['children'])){
                        
            //             foreach ($item['children'] as $subArray) {
            //                 $html .= '<ol class="dd-list">';
            //                 $html .= '<li class="dd-item" data-titlte="'.$item['title'].'" data-id="'.$subArray['id'].'">';
            //                 $html .= '<div class="dd-handle">'.$item['title'].'</div>';
            //                 $html .= '</li>';
            //                 $html .= '</ol>';
            //             }
            //         }
            //         $html .= '</li>';
            //     }
            //     $html .= '</ol></div>';
            // } else {
            //     print_r('Không có dữ liệu');
            // }
        }
       
        
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        foreach ($data as $key => $item) {
            echo $item['id'] . '<br>';
            echo $item['title'] . '<br>';
        }
        
    }
    /**
     * Hiển thị thực đơn
     */
    public function index()
    {
        $data['change'] = '';
        $data['settings'] = 'menu';

        $data['menu'] = Menu::all();


        return view('backend::menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('backend::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('backend::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}