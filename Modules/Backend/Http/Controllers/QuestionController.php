<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App, DateTime;
use Modules\Backend\Entities\Question;
use Modules\Backend\Entities\Category;
use Modules\Backend\Entities\QuestionTranslation;
class QuestionController extends BaseController
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
        // $data['question'] = Posts::withTranslation()->paginate(12);
        $data['question'] = Question::translated()->paginate(12);
        // Thao tác với các trường ['delete', 'public', 'sleep']
        $action = $request->action;
        $checkbox = $request->input('checkbox',[]);
        
        if ($action){
            \DB::beginTransaction();
            if ($action == 'delete'){
                $result = \DB::table('posts')->whereIn("id",$checkbox)->delete();
                if ($result){
                    \DB::commit();
                    return redirect()->back()->with('success', 'Làm việc, Xóa thành công!');
                } else {
                    \DB::rollBack();
                    return redirect()->back()->with('error', 'Lỗi, Xóa không thành công!');
                }
            }
            elseif ($action == 'public') {
                $result = \DB::table('posts')->whereIn("id",$checkbox)->update(array('status'=> 1 ));
                if ($result){
                    \DB::commit();
                    return redirect()->back()->with('success', 'Làm việc, Xuất bản thành công!');
                } else {
                    \DB::rollBack();
                    return redirect()->back()->with('error', 'Lỗi, Xuất bản không thành công!');
                }
            } elseif ($action == 'sleep') {
                $result = \DB::table('posts')->whereIn("id",$checkbox)->update(array('status'=> 0 ));
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
        return view('backend::question.index', $data);
    }

    public function create()
    {
        $data['list_category'] = Category::all();
        return view('backend::question.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            \DB::beginTransaction();
            $data = array(
                'vi' => [
                    'name'              => $request->input('vi_name'),
                    'slug'              => str_slug($request->vi_title,'-'),
                    'body'              => $request->input('vi_body'),
                    'excerpt'           => $request->input('vi_excerpt')
                ],
                'en' => [
                    'name'              => $request->input('en_name'),
                    'slug'              => str_slug($request->en_title,'-'),
                    'body'              => $request->input('en_body'),
                    'excerpt'           => $request->input('en_excerpt'),
                ],
                'status'            => $request->input('status'),
                'author_id'         => Auth::user()->id,
                'created_at'        => new DateTime()
            );
            if (Question::create($data)){
                \DB::commit();
                return redirect()->route('index.question')->with('success', 'Nó đã làm việc, Tạo mới thành công!');
            } else {
                \DB::rollBack();
                return redirect()->route('index.question')->with('error', 'Đã có lỗi sảy ra, Tạo mới không thành công!');
            }
        }
    }

    public function show($id)
    {
        $id = (int)$id;
        $data['show'] = Question::find($id);
        if (!$data){
            return redirect()->back()->with('error','Không tìm thấy câu hỏi!.');
        }
        return view('backend::question.show', $data);
    }

    public function edit($id)
    {

        $data['edit'] = Question::where('id',$id)->first();
        return view('backend::question.edit', $data);
    }

    public function update(Request $request, $id)
    {
        //
        $id = (int)$id;
        $result = Question::find($id);

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

    public function destroy($id)
    {
        //
        $id = (int)$id;
        $result = Question::find($id);

        if (is_numeric($id) && $result){
            $result_translations = QuestionTranslation::where('question_id',$id);
            
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
