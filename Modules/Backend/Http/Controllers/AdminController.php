<?php
namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use DateTime;
use Modules\Backend\Http\Requests\AdminRequest;
use Modules\Backend\Entities\Admin;
use Modules\Backend\Entities\Roles;
class AdminController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }
    /**
     * Hiển thị một danh sách các tài nguyên.
     * @return Response
     */
    public function index()
    {
        $data['admin'] = Admin::paginate(12);

        $data['users'] = 'admin';
        return view('backend::admin.index', $data);
    }

    /**
     * Hiển thị biểu mẫu để tạo một tài nguyên mới.
     * @return Response
     */
    public function create()
    {
        $data['roles'] = Roles::all();
        return view('backend::admin.create', $data);
    }

    /**
     * Lưu trữ một tài nguyên mới được tạo trong lưu trữ.
     * @param Request $request
     * @return Response
     */
    public function store(AdminRequest $request)
    {
        if ($request->isMethod('post')) {
            try {
                \DB::beginTransaction();
                $roles = $request->input('roles',[]);
                $data = array(
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'password'      => encrypt($request->password),
                    'avatar'        => $request->avatar,
                    'background'    => $request->background,
                    'status'        => $request->status,
                    'created_at'    => new DateTime(),
                );
                $admin_create = Admin::create($data);
                // $admin_create->roles()->attach($request->roles);
                if ($admin_create){
                    foreach ($roles as $role) {
                        \DB::table('role_admin')->insert(array(
                            'admin_id' => $admin_create->id,
                            'role_id'  => $role
                        ));
                    }
                }
                \DB::commit();
                return redirect()->route('index.admin')->with('success', 'Nó đã làm việc, Tạo mới quản trị thành công!');
            } catch (\Exception $e) {
                \DB::rollBack();
                return redirect()->route('index.admin')->with('error', 'Đã có lỗi sảy ra, Tạo mới quản trị không thành công!');
            }
        }
    }

    /**
     * Hiển thị tài nguyên được chỉ định.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('backend::show');
    }

    /**
     * Hiển thị biểu mẫu để chỉnh sửa tài nguyên đã chỉ định.
     * @param int $id
     * @return Response
     * Trong trường hợp findOrFail(), nó sẽ ném ra 1 Eloquent exception có tên là ModelNotFoundException, lúc này controller đã thay đổi:
     */
    public function edit($id)
    {
        $id = (int)$id;
        if (is_numeric($id) && Admin::find($id)) {
            $data['roles'] = Roles::all();
            $data['edit'] = Admin::findOrFail($id);
            return view('backend::admin.edit', $data);
        } else {
            return redirect()->route('index.admin')->with('error','bạn đang cố tìm kiếm '. $id .' không tồn tại dữ liệu');
        }
    }

    /**
     * Cập nhật tài nguyên được chỉ định trong lưu trữ.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $id = (int)$id;
        if ($request->isMethod('post')) {
            if (is_numeric($id) && Admin::find($id)) {
                $admin_update = Admin::find($id);
                \DB::beginTransaction();
                $data = array(
                    'name'          => $request->name,
                    'avatar'        => $request->avatar,
                    'background'    => $request->background,
                    'status'        => $request->status,
                    'updated_at'    => new DateTime(),
                );
                if ($admin_update->update($data)){
                    \DB::commit();
                    return redirect()->route('index.admin')->with('success', 'Làm việc, Cập nhập thành công!');
                } else {
                    \DB::rollBack();
                    return redirect()->route('index.admin')->with('error', 'Đã có lỗi sảy ra, Cập nhập thông tin không thành công!');
                }
            } else {
                return redirect()->route('index.admin')->with('error','đang cố cập nhật '. $id .' không tồn tại dữ liệu');
            }
        }
    }

    /**
     * Loại bỏ tài nguyên được chỉ định khỏi lưu trữ.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = (int)$id;
        $result = Admin::find($id);

        if (is_numeric($id) && $result){
            \DB::beginTransaction();
            if ($result){
                foreach ($roles as $role) {
                    \DB::table('role_admin')->delete(array(
                        'admin_id' => $admin_create->id,
                        'role_id'  => $role
                    ));
                }
            }
            if ($result->delete()){
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
