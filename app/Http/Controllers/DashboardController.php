<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Clubs;
use App\findAmatch;

class DashboardController extends Controller
{
    public function overview()
    {
        $users = User::count();
        $clubs = Clubs::count();
        $find = findAmatch::where('allow','0')->count();
        return view('admin.dashboard.index',['users'=>$users,'clubs'=>$clubs,'find'=>$find]);
    }
}
