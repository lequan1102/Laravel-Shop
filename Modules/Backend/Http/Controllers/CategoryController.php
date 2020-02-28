<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App;
use DateTime;
use Modules\Backend\Entities\Category;
use Modules\Backend\Entities\CategoryTranslation;
class CategoryController extends BaseController
{
    public function __construct(){
        parent::__construct();
        $data['category'] = 'category';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['category'] = Category::all();
        return view('backend::category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            \DB::beginTransaction();
            $data = array(
                'vi' => [
                    'name'              => $request->input('vi_name'),
                    'slug'              => str_slug($request->vi_name,'-'),
                    'excerpt'           => $request->input('en_excerpt'),
                    'seo_title'         => $request->input('en_seo_name') != '' ? $request->input('en_seo_name') : $request->input('en_name'),
                    'meta_keywords'     => $request->input('en_meta_keywords'),
                    'meta_description'  => $request->input('en_meta_description') != '' ? $request->input('en_meta_description') : $request->input('en_excerpt')
                ],
                'en' => [
                    'name'              => $request->input('en_name'),
                    'slug'              => str_slug($request->en_name,'-'),
                    'excerpt'           => $request->input('en_excerpt'),
                    'seo_title'         => $request->input('en_seo_name') != '' ? $request->input('en_seo_name') : $request->input('en_name'),
                    'meta_keywords'     => $request->input('en_meta_keywords'),
                    'meta_description'  => $request->input('en_meta_description') != '' ? $request->input('en_meta_description') : $request->input('en_excerpt')
                ],
                'icon'                  => $request->input('icon'),
                'thumbnail'             => $request->input('thumbnail'),
                'author_id'             => Auth::user()->id,
                'created_at'            => new DateTime()
            );
            if (Category::create($data)){
                \DB::commit();
                return redirect()->route('index.category')->with('success', 'Nó đã làm việc, Tạo danh mục thành công!');
            } else {
                \DB::rollBack();
                return redirect()->route('index.category')->with('error', 'Đã có lỗi sảy ra, Tạo danh mục không thành công!');
            }
        }
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
        $data['edit'] = Category::where('id',$id)->first();
        return view('backend::category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $id = (int)$id;
        $result = Category::find($id);

        if (is_numeric($id) && $result){
            $data = array(
                'vi' => [
                    'name'              => $request->input('vi_name'),
                    'slug'              => str_slug($request->vi_name,'-'),
                    'excerpt'           => $request->input('en_excerpt'),
                    'seo_title'         => $request->input('en_seo_name') != '' ? $request->input('en_seo_name') : $request->input('en_name'),
                    'meta_keywords'     => $request->input('en_meta_keywords'),
                    'meta_description'  => $request->input('en_meta_description') != '' ? $request->input('en_meta_description') : $request->input('en_excerpt')
                ],
                'en' => [
                    'name'              => $request->input('en_name'),
                    'slug'              => str_slug($request->en_name,'-'),
                    'excerpt'           => $request->input('en_excerpt'),
                    'seo_title'         => $request->input('en_seo_name') != '' ? $request->input('en_seo_name') : $request->input('en_name'),
                    'meta_keywords'     => $request->input('en_meta_keywords'),
                    'meta_description'  => $request->input('en_meta_description') != '' ? $request->input('en_meta_description') : $request->input('en_excerpt')
                ],
                'icon'                  => $request->input('icon'),
                'thumbnail'             => $request->input('thumbnail'),
                'author_id'             => Auth::user()->id,
                'updated_at'            => new DateTime()
            );
            if ($result->update($data)){
                \DB::commit();
                return redirect()->back()->with('success','Cập nhật thành công.');
            } else {
                \DB::rollBack();
                return redirect()->back()->with('error','Cập nhật thất bại.');
            }
        } else {
            return redirect()->back()->with('error','Không tìm thấy chuyên mục cần cập nhật.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $id = (int)$id;
        $result = Category::find($id);

        if (is_numeric($id) && $result){
            $result_translations = CategoryTranslation::where('category_id',$id);
            
            if ($result->delete() && $result_translations->delete()){
                \DB::commit();
                return redirect()->back()->with('success','Xóa thành công.');
            } else {
                \DB::rollBack();
                return redirect()->back()->with('error','Xóa thất bại.');
            }
        } else {
            return redirect()->back()->with('error','Không tìm thấy chuyen muc cần xóa.');
        }
    }
}
