<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Models\Admin;
    use App\Http\Resources\Admin as AdminResource;
    use Illuminate\Http\Request;

    class AdminController extends Controller
    {
        // 查询全部数据
        public function index()
        {
            return response()->json([
                'status' => true,
                'code'   => 200,
                'msg'    => 'success',
                'data'   => Admin::all()
            ]);
        }

        // 查询单个数据
        public function show($id)
        {
            return response()->json([
                'status' => true,
                'code'   => 200,
                'msg'    => 'success',
                'data'   => new AdminResource(Admin::find($id))
            ]);
        }

        // 添加数据
        public function add(Request $request)
        {
            $data = $request->all();
            $result = Admin::create($data);
            if ($result) {
                return response()->json([
                    'status' => true,
                    'code'   => 201,
                    'msg'    => '添加成功',
                    'data'   => new AdminResource($result)
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'Code'   => 400,
                    'msg'    => '添加失败',
                    'data'   => new AdminResource($result)
                ]);
            }
        }

        // 登录验证
        public function login(Request $request)
        {
$data = $request->all();
            return response()->json([
                'status' => true,
                'code'   => 200,
                'msg'    => 'success',
                'data'   => Admin::all()
            ]);
        }

        // 修改数据
        public function update(Request $request, $id)
        {
            $data = $request->all();
            $result = Admin::find($id)->update($data);
            if ($result) {
                return response()->json([
                    'status' => true,
                    'code'   => 200,
                    'msg'    => '修改成功',
                    'data'   => new AdminResource(Admin::find($id))
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'code'   => 400,
                    'msg'    => '请求错误',
                    'data'   => new AdminResource(Admin::find($id))
                ]);
            }
        }

        // 删除数据
        public function delete($id)
        {
            $result = Admin::find($id)->delete();
            if ($result) {
                return response()->json([
                    'status' => true,
                    'code'   => 204,
                    'msg'    => '删除成功'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'code'   => 400,
                    'msg'    => '删除失败'
                ]);
            }
        }

//        public function login(Request $request){
//            $name = Admin::select(['username'])->get();
//            $pass = Admin::select(['password'])->get();
//            $username = $request->input('username');
//            $password = $request->input('password');
//            if($username == '' || $password == ''){
//                return response()->json([
//                   'status' => false,
//                    'code' => 404,
//                    'msg' => '用户名或密码为空'
//                ]);
//            }elseif ($username == $name.username && $password == $pass.password){
//                return response()->json([
//                    'status' => true,
//                    'code' => 200,
//                    'msg' => '登录成功'
//                ]);
//            }else{
//                return response()->json([
//                    'status' => false,
//                    'code' => 400,
//                    'msg' => '用户名或密码错误',
//                    'name' => $name,
//                    'pass' => $pass
//                ]);
//            }
//        }
    }
