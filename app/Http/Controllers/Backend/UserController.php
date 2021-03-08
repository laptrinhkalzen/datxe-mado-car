<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Repositories\UserRepository;
use Repositories\RoleRepository;
use DB;

class UserController extends Controller {

    public function __construct(UserRepository $userRepo, RoleRepository $roleRepo) {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $records = $this->userRepo->getAllUser();
        return view('backend/user/index', compact('records'));
    }

    public function create() {
        $roles = $this->roleRepo->getAllRole();
        $role_html = \App\Helpers\StringHelper::getSelectRoleOptions($roles);
        return view('backend/user/create', compact('role_html'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->userRepo->validateCreate());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $password = $request->get('password');
        $input['password'] = bcrypt($password);
        if (isset($input['status'])) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }
        $this->userRepo->create($input);

        return redirect()->route('admin.user.index');
    }

    public function edit($id) {
        $record = $this->userRepo->find($id);
        $roles = $this->roleRepo->getAllRole();
        $role_html = \App\Helpers\StringHelper::getSelectRoleOptions($roles, $record->role_id);
        return view('backend/user/update', compact('record', 'role_html'));
    }

    public function editProfile($id) {
        $record = $this->userRepo->find($id);
        return view('backend/profile/edit', compact('record'));
    }
     public function updateProfile(Request $request, $id) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->userRepo->validateUpdate($id,$input['password']));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!$input['password']){
            unset($input['password']);
        }else{
            $password = $request->get('password');
            $input['password'] = bcrypt($password);
        }
        $input['status'] = 1;
        $this->userRepo->update($input, $id);
        return redirect()->route('admin.user.index_profile', $id)->with('success', 'Update thành công');
    }
    public function update(Request $request, $id) {
        $input = $request->all();
        $validator = \Validator::make($input, $this->userRepo->validateUpdate($id));
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (!$input['password'])
            unset($input['password']);
        if (isset($input['status'])) {
            $input['status'] = 1;
        } else {
            $input['status'] = 0;
        }
        $this->userRepo->update($input, $id);
        return redirect()->route('admin.user.edit', $id)->with('success', 'Update thành công');
    }
    public function resetPassword($id) {
        $data = array();
        $data['password'] = bcrypt('123456a@');
        // $user=DB::table('user')->where('id',$id)->first();
        // $user->password='123456a@';
        DB::table('user')->where('id',$id)->update($data);
        return redirect()->route('admin.user.index')->with('success', 'Reset mật khẩu thành công');
    }

    public function destroy($id) {
        $this->userRepo->delete($id);
        return redirect()->back();
    }

}
