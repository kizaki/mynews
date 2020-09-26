{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')

{{-- profile.blade.phpの@yield('title')に'プロフィールの編集'を埋め込む --}}
@section('title', 'プロフィールの表示')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィールの表示</h2><br /><br />
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            {{ $profile['name'] }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            @if(($profile['gender']) == "man")
                                男
                            @else
                                女
                            @endif
                        </div>
                    </div>                    
                
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            {{ $profile['hobby'] }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            {{ $profile['introduction'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection