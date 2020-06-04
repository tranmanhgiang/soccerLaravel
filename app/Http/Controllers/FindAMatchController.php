<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\findAmatch;

class FindAMatchController extends Controller
{
    public function getAll()
    {
        $clubs = findAmatch::paginate(7);
        return view('admin.pending.index',['clubs'=>$clubs]);
    }
    public function allow($id)
    {
        $find = findAmatch::find($id);
        $find->allow = 1;
        $find->save();
        return redirect('admin/findamatch/pending');
    }
}
