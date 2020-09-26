<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // プロフールを取得
        $value = new Profile;
        // 最初の1レコードのみ取り出す
        $profile = $value->first();

        // profile/index.blade.php ファイルを渡す
        return view('profile.index', compact('profile'));
    }
}
