<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App, DateTime;
use Modules\Backend\Entities\Products;
class ProductsController extends BaseController
{
    static $products;
    public function __construct(){
        parent::__construct();
        $data['products'] = 'products';
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['products'] = Products::paginate(12);
        return view('backend::products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('backend::products.create');
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
                    'body'              => $request->input('vi_body'),
                    'excerpt'           => $request->input('vi_excerpt'),
                    'seo_title'         => $request->input('vi_seo_title') != '' ? $request->input('vi_seo_title') : $request->input('vi_name'),
                    'meta_keywords'     => $request->input('vi_meta_keywords'),
                    'meta_description'  => $request->input('vi_meta_description')
                ],
                'en' => [
                    'name'              => $request->input('en_name'),
                    'slug'              => str_slug($request->en_name,'-'),
                    'body'              => $request->input('en_body'),
                    'excerpt'           => $request->input('en_excerpt'),
                    'seo_title'         => $request->input('en_seo_title') != '' ? $request->input('en_seo_title') : $request->input('en_name'),
                    'meta_keywords'     => $request->input('en_meta_keywords'),
                    'meta_description'  => $request->input('en_meta_description') != '' ? $request->input('en_meta_description') : $request->input('en_excerpt')
                ],
                'thumbnail'         => $request->input('thumbnail'),
                'category_id'       => $request->input('category_id'),
                'author_id'         => Auth::user()->id,
                'created_at'        => new DateTime()
            );
            if (Products::create($data)){
                \DB::commit();
                return redirect()->route('index.products')->with('success', 'Nó đã làm việc, Đăng sản phẩm thành công!');
            } else {
                \DB::rollBack();
                return redirect()->route('index.products')->with('error', 'Đã có lỗi sảy ra, Đăng sản phẩm không thành công!');
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
        $data['edit'] = Products::where('id',$id)->first();
        return view('backend::products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $id = (int)$id;
        $result = Products::find($id);

        if (is_numeric($id) && $result){
            $data = array(
                'vi' => [
                    'name'              => $request->input('vi_name'),
                    'slug'              => str_slug($request->vi_name,'-'),
                    'body'              => $request->input('vi_body'),
                    'excerpt'           => $request->input('vi_excerpt'),
                    'seo_title'         => $request->input('vi_seo_title') != '' ? $request->input('vi_seo_title') : $request->input('vi_name'),
                    'meta_keywords'     => $request->input('vi_meta_keywords'),
                    'meta_description'  => $request->input('vi_meta_description')
                ],
                'en' => [
                    'name'              => $request->input('en_name'),
                    'slug'              => str_slug($request->en_name,'-'),
                    'body'              => $request->input('en_body'),
                    'excerpt'           => $request->input('en_excerpt'),
                    'seo_title'         => $request->input('en_seo_title') != '' ? $request->input('en_seo_title') : $request->input('en_name'),
                    'meta_keywords'     => $request->input('en_meta_keywords'),
                    'meta_description'  => $request->input('en_meta_description') != '' ? $request->input('en_meta_description') : $request->input('en_excerpt')
                ],
                'thumbnail'         => $request->input('thumbnail'),
                'category_id'       => $request->input('category_id'),
                'author_id'         => Auth::user()->id,
                'updated_at'        => new DateTime()
            );
            if ($result->update($data)){
                \DB::commit();
                return redirect()->back()->with('success','Cập nhật thành công.');
            } else {
                \DB::rollBack();
                return redirect()->back()->with('error','Cập nhật thất bại.');
            }
        } else {
            return redirect()->back()->with('error','Không tìm thấy bài viết cần cập nhật.');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = (int)$id;
        $result = Products::find($id);

        if (is_numeric($id) && $result){
            $result_translations = PostsTranslation::where('posts_id',$id);
            
            if ($result->delete() && $result_translations->delete()){
                \DB::commit();
                return redirect()->back()->with('success','Xóa thành công.');
            } else {
                \DB::rollBack();
                return redirect()->back()->with('error','Xóa thất bại.');
            }
        } else {
            return redirect()->back()->with('error','Không tìm thấy bài viết cần xóa.');
        }
    }
}
