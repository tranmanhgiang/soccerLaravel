<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Clubs;
use App\User;
use App\findAmatch;

class ClubController extends Controller
{
    //admin
    public function getAll()
    {
        $clubs = Clubs::paginate(7);
        return view('admin.clubs.list',['clubs'=>$clubs]);
    }

    public function addClub()
    {
        $user = User::all();
        return view('admin.clubs.add',['captain'=>$user]);
    }
    public function postClub(Request $request)
    {
        $this->validate($request,
        [
            'clubname' => 'required|min:3|max:20',
            'captain' => 'required',
            'homeStadium' => 'required',
            'youngest' => 'required|numeric|min:15|max:50',
            'oldest' => 'required|numeric|min:15|max:50',
            'description' => 'required',
            'thunbar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        [
            'clubname.required' => 'bạn chưa nhập tên đội bóng',
            'captain.required' => 'Bạn cần thêm thông tin đội trưởng trước khi thêm đội bóng',
            'homeStadium.required' => 'bạn chưa nhập sân bóng',
            'clubname.min' => 'Tên đội bóng phải chứa ít nhất 3 kí tự',
            'clubname.max' => 'Tên đội bóng chỉ chứa tối đa 20 kí tự',
            'youngest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'youngest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'youngest.min' => 'Tuổi phải lớn hơn 15',
            'yougest.max' => 'Tuổi phải nhỏ hơn 50',
            'oldest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'oldest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'oldest.min' => 'Tuổi phải lớn hơn 15',
            'oldest.max' => 'Tuổi phải nhỏ hơn 50',
            'description.required' => 'Bạn chưa nhập mô tả về đội bóng',
            'thunbar.required' => 'bạn chưa chọn ảnh',
            'thunbar.mimes' => 'Mời bạn chọn file có định dạng : jpeg,png,jpg,gif,svg'
        ]);

        $club = new Clubs;
        $club->clubName = $request->clubname;
        $club->level = $request->level;
        $club->timeOften = $request->timeOften;
        $club->homeStadium = $request->homeStadium;
        $club->address = $request->address;
        $club->youngest = $request->youngest;
        $club->oldest = $request->oldest;
        $club->description = $request->description;
        $club->u_id = $request->captain;
        $avt = Str::random(10).$request->file('thunbar')->getClientOriginalName();
        $request->file('thunbar')->move('admin_image',$avt);
        $club->logo = $avt;
        
        $club->save();
        return redirect('admin/clubs/list')->with('success','Thêm thành công!');
    }

    public function formEditClub($id)
    {
        $club = Clubs::find($id);
        $user = User::where('id',$club->u_id)->get();
        return view('admin.clubs.edit',['club'=>$club,'captain'=>$user]);
    }
    public function editClub(Request $request, $id)
    {
        $this->validate($request,
        [
            'clubname' => 'required|min:3|max:20',
            'homeStadium' => 'required',
            'youngest' => 'required|numeric|min:15|max:50',
            'oldest' => 'required|numeric|min:15|max:50',
            'description' => 'required',
        ],
        [
            'clubname.required' => 'bạn chưa nhập tên đội bóng',
            'homeStadium.required' => 'bạn chưa nhập sân bóng',
            'clubname.min' => 'Tên đội bóng phải chứa ít nhất 3 kí tự',
            'clubname.max' => 'Tên đội bóng chỉ chứa tối đa 20 kí tự',
            'youngest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'youngest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'youngest.min' => 'Tuổi phải lớn hơn 15',
            'yougest.max' => 'Tuổi phải nhỏ hơn 50',
            'oldest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'oldest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'oldest.min' => 'Tuổi phải lớn hơn 15',
            'oldest.max' => 'Tuổi phải nhỏ hơn 50',
            'description.required' => 'Bạn chưa nhập mô tả về đội bóng'
        ]);

        $club = Clubs::find($id);
        $club->clubName = $request->clubname;
        $club->level = $request->level;
        $club->timeOften = $request->timeOften;
        $club->homeStadium = $request->homeStadium;
        $club->address = $request->address;
        $club->youngest = $request->youngest;
        $club->oldest = $request->oldest;
        $club->description = $request->description;

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
            $club->logo = $avt;
        }

        $club->save();
        return redirect('admin/clubs/list')->with('success','Sửa thành công!');
    }

    public function deleteClub($id)
    {
        $club = Clubs::find($id);
        $club->delete();
        return redirect('admin/clubs/list')->with('success','Xóa thành công!');
    }

    //front
    public function getInfo($id)
    {
        $myclub = Clubs::find($id);   
        
        if(isset($myclub)){
            return view("front.myclub.info",['myclub'=>$myclub]);
        } else {
            return view('front.myclub.create');
        }
    }
    public function waitingClub()
    {
        $clubs = findAmatch::where('allow','1')->paginate(3);
        return view('front.findamatch.waitingClub',['clubs'=>$clubs]);
    }

    public function clubsList()
    {
        $clubs = findAmatch::where([
            ['status', '0'],
            ['allow', '1'],
        ])->paginate(3);
        return view('front.findamatch.clubslist',['clubs'=>$clubs]);
    }
    public function frontEditClub($id)
    {
        $club = Clubs::find($id);
        return view('front.myclub.edit',['club'=>$club]);
        
    }

    public function editmyclub(Request $request, $id)
    {
        $this->validate($request,
        [
            'clubname' => 'required|min:3|max:20',
            'homeStadium' => 'required',
            'youngest' => 'required|numeric|min:15|max:50',
            'oldest' => 'required|numeric|min:15|max:50',
            'description' => 'required',
        ],
        [
            'clubname.required' => 'bạn chưa nhập tên đội bóng',
            'homeStadium.required' => 'bạn chưa nhập sân bóng',
            'clubname.min' => 'Tên đội bóng phải chứa ít nhất 3 kí tự',
            'clubname.max' => 'Tên đội bóng chỉ chứa tối đa 20 kí tự',
            'youngest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'youngest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'youngest.min' => 'Tuổi phải lớn hơn 15',
            'yougest.max' => 'Tuổi phải nhỏ hơn 50',
            'oldest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'oldest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'oldest.min' => 'Tuổi phải lớn hơn 15',
            'oldest.max' => 'Tuổi phải nhỏ hơn 50',
            'description.required' => 'Bạn chưa nhập mô tả về đội bóng'
        ]);

        $club = Clubs::find($id);
        $club->clubName = $request->clubname;
        $club->level = $request->level;
        $club->timeOften = $request->timeOften;
        $club->homeStadium = $request->homeStadium;
        $club->address = $request->address;
        $club->youngest = $request->youngest;
        $club->oldest = $request->oldest;
        $club->description = $request->description;

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
            $club->logo = $avt;
        }

        $club->save();
        return redirect('front/myclub/info/' . $club->id)->with('success','Sửa thành công!');
    }

    public function formCreateClub()
    {
        return view('front.myclub.create');
    }

    public function createClub(Request $request)
    {
        $this->validate($request,
        [
            'clubname' => 'required|min:3|max:20',
            'stadium' => 'required',
            'youngest' => 'required|numeric|min:15|max:50',
            'oldest' => 'required|numeric|min:15|max:50',
            'description' => 'required',
            'thunbar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ],
        [
            'clubname.required' => 'bạn chưa nhập tên đội bóng',
            'clubname.min' => 'Tên đội bóng phải chứa ít nhất 3 kí tự',
            'clubname.max' => 'Tên đội bóng chỉ chứa tối đa 20 kí tự',
            'stadium.required' => 'bạn chưa nhập sân bóng',
            'youngest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'youngest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'youngest.min' => 'Tuổi phải lớn hơn 15',
            'yougest.max' => 'Tuổi phải nhỏ hơn 50',
            'oldest.required' => 'Bạn chưa nhập độ tuổi nhỏ nhất',
            'oldest.numeric' => 'Bạn chưa nhập đúng định dạng tuổi',
            'oldest.min' => 'Tuổi phải lớn hơn 15',
            'oldest.max' => 'Tuổi phải nhỏ hơn 50',
            'description.required' => 'Bạn chưa nhập mô tả về đội bóng',
            'thunbar.required' => 'bạn chưa chọn ảnh',
            'thunbar.mimes' => 'Mời bạn chọn file có định dạng : jpeg,png,jpg,gif,svg'
        ]);

        $club = new Clubs;
        $club->clubName = $request->clubname;
        $club->level = $request->level;
        $club->timeOften = $request->timeoften;
        $club->homeStadium = $request->stadium;
        $club->address = $request->address;
        $club->youngest = $request->youngest;
        $club->oldest = $request->oldest;
        $club->description = $request->description;
        $club->u_id = Auth::user()->id;
        $avt = Str::random(10).$request->file('thunbar')->getClientOriginalName();
        $request->file('thunbar')->move('admin_image',$avt);
        $club->logo = $avt;
        
        $club->save();

        return redirect('front/myclub/info/'.$club->id)->with('success','Tạo đội thành công!');    
    }

    public function newPost(Request $request)
    {
        $this->validate($request,
        [
            'date' => 'required|after:today',
            'time' => 'required',
            'lease'=> 'required'
        ],
        [
            'date.required' => 'Bạn chưa chọn ngày',
            'date.date_format' => 'Bạn chưa chọn đúng định dạng ngày',
            'date.after' => 'Bạn chỉ được phép chọn ngày sau ngày hôm nay',
            'time.required' => 'Bạn chưa chọn giờ',
            'lease.required' => 'Bạn chưa nhập kèo đấu'
        ]);

        $newPost = new findAmatch;
        $newPost->date = $request->date;
        $newPost->time = $request->time;
        $newPost->lease = $request->lease;
        $newPost->stadium = $request->stadium;
        $newPost->address = $request->address;    
        $newPost->c_id = Auth::user()->clubs->id;

        $newPost->save();
        return redirect('front.myclub.create')->with('success','Đăng ký thành công, vui lòng tạo đội bóng của bạn');
    }
}
