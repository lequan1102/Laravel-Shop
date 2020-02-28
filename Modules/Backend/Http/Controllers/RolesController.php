<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\Backend\Entities\Roles;
use Modules\Backend\Entities\Permissions;
use App, DateTime;
class RolesController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $data['roles'] = Roles::paginate(12);

        $action = $request->action;
        $checkbox = $request->input('checkbox',[]);
        
        if ($action){
            \DB::beginTransaction();
            if ($action == 'delete'){
                $result = \DB::table('roles')->whereIn("id",$checkbox)->delete();
                if ($result){
                    \DB::commit();
                    return redirect()->back()->with('success', 'Làm việc, Xóa thành công!');
                } else {
                    \DB::rollBack();
                    return redirect()->back()->with('error', 'Lỗi, Xóa không thành công!');
                }
            }
            elseif ($action == 'public') {
                $result = \DB::table('roles')->whereIn("id",$checkbox)->update(array('status'=> 1 ));
                if ($result){
                    \DB::commit();
                    return redirect()->back()->with('success', 'Làm việc, Xuất bản thành công!');
                } else {
                    \DB::rollBack();
                    return redirect()->back()->with('error', 'Lỗi, Xuất bản không thành công!');
                }
            } elseif ($action == 'sleep') {
                $result = \DB::table('roles')->whereIn("id",$checkbox)->update(array('status'=> 0 ));
                if ($result){
                    \DB::commit();
                    return redirect()->back()->with('success', 'Làm việc, Ẩn thành công!');
                } else {
                    \DB::rollBack();
                    return redirect()->back()->with('error', 'Lỗi, Ẩn không thành công!');
                }
            } else {
                return redirect()->back()->with('warning', 'Hãy chọn một hành động để thực hiện công việc!');
            }
        }
        return view('backend::roles.index', $data);
    }

    /**
     * Hiển thị biểu mẫu để tạo một tài nguyên mới.
     * @return Response
     */
    public function create()
    {
        $data['roles']          = 'Roles';
        $data['permissions']    = Permissions::all();
        return view('backend::roles.create', $data);
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
                'name'          => $request->name,
                'display_name'  => $request->display_name
            );
            if (Roles::create($data)){
                \DB::commit();
                return redirect()->route('index.posts')->with('success', 'Nó đã làm việc, Đăng bài thành công!');
            } else {
                \DB::rollBack();
                return redirect()->route('index.posts')->with('error', 'Đã có lỗi sảy ra, Đăng bài không thành công!');
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
        $data['roles']          = 'Roles';

        $data['permissions']    = Permissions::all();
        $data['edit']           = Roles::where('id',$id)->first();
        return view('backend::roles.edit', $data);
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
        $result = Posts::find($id);

        if (is_numeric($id) && $result){
            $data = array(
                'vi' => [
                    'title'             => $request->input('vi_title'),
                    'slug'              => str_slug($request->vi_title,'-'),
                    'body'              => $request->input('vi_body'),
                    'excerpt'           => $request->input('vi_excerpt'),
                    'seo_title'         => $request->input('vi_seo_title'),
                    'meta_keywords'     => $request->input('vi_meta_keywords'),
                    'meta_description'  => $request->input('vi_meta_description')
                ],
                'en' => [
                    'title'             => $request->input('en_title'),
                    'slug'              => str_slug($request->en_title,'-'),
                    'body'              => $request->input('en_body'),
                    'excerpt'           => $request->input('en_excerpt'),
                    'seo_title'         => $request->input('en_seo_title'),
                    'meta_keywords'     => $request->input('en_meta_keywords'),
                    'meta_description'  => $request->input('en_meta_description')
                ],
                'category_id'       => $request->category_id,
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
        //
        $id = (int)$id;
        $result = Posts::find($id);

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
