<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでProfile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    // Actionを作成する
    public function add()
    {
        return view('admin.profile.create');
    }
    
    // 20200914追記：木崎
    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Profile::$rules);
        $profiles = new Profile;
        $form = $request->all();
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $profiles->fill($form);
        $profiles->save();
        return redirect('admin/profile/create');
    }
    public function edit(Request $request)
    {
        // Profile Modelからデータを取得する
        $profiles = Profile::find($request->id);
        return view('admin.profile.edit', ['profiles_form' => $profiles]);
        //return view('admin.profile.edit');
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // リクエストされたidに該当するレコードを取得する
        $profiles = Profile::find($request->id);
        // モデルのallメソッドで$requestから全てのプロパティを呼び出しprofile_formに代入する
        $profiles_form = $request->all();
        // _tokenプロパティは必要ないのでモデルのunsetメソッドで削除する
        unset($profiles_form['_token']);
        // モデルfillメソッドで$profilesのプロパティを$profiles_formの内容に指定する
        // モデルのsaveメソッドを実行し、内容をデータベースに書き込む
        $profiles->fill($profiles_form)->save();
        // admin/profile/updateにリダイレクトする
        //return redirect('admin/profile/edit');
        //return redirect('/');
        // とりあえずviewを再描画
        return view('admin.profile.edit', ['profiles_form' => $profiles]);
    }
}
