<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Clubs;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //admin
    public function getAll()
    {
        $user = User::orderBy('id','desc')->paginate(7);
        return view('admin.users.list',['users' => $user]);
    }

    public function addUser()
    {
        return view('admin.users.add');
    }

    public function postUser(Request $request)
    {
        $this->validate($request,
        [
            'lastname' => 'required|min:2|max:20',
            'firstname' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'confpass' => 'required|same:password',
            'thunbar' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ],
        [
            'lastname.required' => 'bạn chưa nhập tên',
            'lastname.min' => 'Họ phải chứa ít nhất 3 kí tự',
            'lastname.max' => 'Họ chỉ chứa tối đa 20 kí tự',
            'firstname.required' => 'bạn chưa nhập tên',
            'firstname.min' => 'Họ phải chứa ít nhất 3 kí tự',
            'firstname.max' => 'Họ chỉ chứa tối đa 20 kí tự',
            'email.required' => 'bạn chưa nhập email',
            'email.email' => 'bạn chưa nhập đúng định dạng email',
            'email.unique' => 'email đã tồn tại',
            'password.required' => 'bạn chưa nhập password',
            'password.min' => 'mật khẩu phải chứa ít nhất 3 kí tự',
            'password.max' => 'mật khẩu chỉ chứa nhiều nhất 32 kí tự',
            'confpass.required' => 'bạn chưa nhập lại mật khẩu',
            'confpass.same' => 'mật khẩu không trùng khớp',
            'thunbar.required' => 'bạn chưa chọn ảnh',
            'thunbar.mimes' => 'Mời bạn chọn file có định dạng : jpeg,png,jpg,gif,svg'
        ]);

        $user = new User;
        $user->lastName = $request->lastname;
        $user->firstName = $request->firstname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $avt = Str::random(10).$request->file('thunbar')->getClientOriginalName();
        $request->file('thunbar')->move('admin_image',$avt);
        $user->thunbar = $avt;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->save();
        return redirect('admin/users/list')->with('success','Thêm thành công!');

    }

    public function formEditUser($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',['user'=> $user]);
    }
    public function editUser(Request $request , $id) 
    {
        $this->validate($request,
        [
            'lastname' => 'required|min:2|max:20',
            'firstname' => 'required|min:2|max:20',
        ],
        [
            'lastname.required' => 'bạn chưa nhập tên',
            'lastname.min' => 'Họ phải chứa ít nhất 3 kí tự',
            'lastname.max' => 'Họ chỉ chứa tối đa 20 kí tự',
            'firstname.required' => 'bạn chưa nhập tên',
            'firstname.min' => 'Họ phải chứa ít nhất 3 kí tự',
            'firstname.max' => 'Họ chỉ chứa tối đa 20 kí tự',
        ]);

        $user = User::find($id);
        $user->lastName = $request->lastname;
        $user->firstName = $request->firstname;
        $user->role = $request->role;
        
        $user->phone = $request->phone;
        $user->description = $request->description;

        if($request->hasFile('thunbar'))
        {
            $this->validate($request,
            [
                'thunbar' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ],
            [
                'thunbar.mimes' => 'Mời bạn chọn file có định dạng : jpeg,png,jpg,gif,svg'
            ]);
            $avt = Str::random(10).$request->file('thunbar')->getClientOriginalName();
            $request->file('thunbar')->move('admin_image',$avt);
            $user->thunbar = $avt;
        }
        if($request->changePassword == 'on'){
            $this->validate($request,
        [
            'password' => 'required|min:3|max:32',
            'confpass' => 'required|same:password',
        ],
        [
            'password.required' => 'bạn chưa nhập password',
            'password.min' => 'mật khẩu phải chứa ít nhất 3 kí tự',
            'password.max' => 'mật khẩu chỉ chứa nhiều nhất 32 kí tự',
            'confpass.required' => 'bạn chưa nhập lại mật khẩu',
            'confpass.same' => 'mật khẩu không trùng khớp',
        ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('admin/users/list')->with('success','Sửa thành công!');
    }

    public function FormLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required',
            'pass' => 'required|min:3|max:32'
        ],
        [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 3 kí tự',
            'password.max' => 'Mật khẩu chỉ chứa nhiều nhất 32 kí tự',
        ]);
        $data = ['email' => $request->email,'password'=>$request->pass];
        if(Auth::attempt($data)){
            return redirect('admin/dashboard/index')->with('success','Đăng nhập thành công!');
        } else {
            return redirect('admin')->with('success','Email hoặc mật khẩu không chính xác');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin');
    }

    //front
    public function userLogin(Request $request)
    {
        $active = 1;
        $this->validate($request,
        [
            'email' => 'required',
            'password' => 'required|min:3|max:32'
        ],
        [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 3 kí tự',
            'password.max' => 'Mật khẩu chỉ chứa nhiều nhất 32 kí tự',
        ]);
        $data = ['email' => $request->email,'password'=>$request->password];
        if(Auth::attempt($data)){
            return redirect('front')->with('success','Đăng nhập thành công!');
        } else {
            return redirect('front/login')->with('fail','Email hoặc mật khẩu không chính xác');
        }
    }
    public function userLogout()
    {
        Auth::logout();
        return redirect('front');
    }

    public function userRegist(Request $request)
    {
        $this->validate($request,
        [
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|min:3|max:32',
            'confpass' => 'required|same:password',
            'thunbar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required'
        ],
        [
            'lastname.required' => 'bạn chưa nhập họ',
            'lastname.min' => 'Họ phải chứa ít nhất 3 kí tự',
            'lastname.max' => 'Họ chỉ chứa tối đa 20 kí tự',
            'firstname.required' => 'bạn chưa nhập tên',
            'firstname.min' => 'Tên phải chứa ít nhất 3 kí tự',
            'firstname.max' => 'Tên chỉ chứa tối đa 20 kí tự',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'phone.numeric' => 'Bạn chưa nhập đúng định dạng số điện thoại',
            'email.required' => 'bạn chưa nhập email',
            'email.email' => 'bạn chưa nhập đúng định dạng email',
            'email.unique' => 'email đã tồn tại',
            'password.required' => 'bạn chưa nhập password',
            'password.min' => 'mật khẩu phải chứa ít nhất 3 kí tự',
            'password.max' => 'mật khẩu chỉ chứa nhiều nhất 32 kí tự',
            'confpass.required' => 'bạn chưa nhập lại mật khẩu',
            'confpass.same' => 'mật khẩu không trùng khớp',
            'thunbar.required' => 'bạn chưa chọn ảnh',
            'thunbar.mimes' => 'Mời bạn chọn file có định dạng : jpeg,png,jpg,gif,svg',
            'description.required' => 'Mời bạn nhập mô tả về bản thân'
        ]);

        $user = new User;
        $user->lastName = $request->lastname;
        $user->firstName = $request->firstname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $avt = Str::random(10).$request->file('thunbar')->getClientOriginalName();
        $request->file('thunbar')->move('admin_image',$avt);
        $user->thunbar = $avt;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->save();
        return redirect('front/login')->with('success','Đăng ký thành công, mời bạn đăng nhập');
    }

    public function getProfile($id)
    {
        $user = User::find($id);
        return view('front.user.profile',['user'=>$user]);
    }
}

