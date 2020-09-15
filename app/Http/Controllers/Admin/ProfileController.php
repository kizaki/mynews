<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // Actionを作成する
    public function add(){
        return view ('admin.profile.create');
    }
    
    // 20200914追記：木崎
    public function create(Request $request){
        // admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
    public function edit(){
        return view('admin.profile.edit');
    }
    
    public function update(Request $request){
        // admin/profile/updateにリダイレクトする
        return redirect('admin/profile/edit');
    }
    
}
