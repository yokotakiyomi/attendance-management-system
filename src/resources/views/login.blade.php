@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<form class="login-form__main" action="/login" method="POST">
    @csrf

    <div class="login-form__content">

        <div class="login-form__heading">
            <h2>ログイン</h2>
        </div>
        <div class=login-form__input>
            <div class=login-form__input-list>
                <input type="email" name="email" placeholder="  メールアドレス" value="{{ old('email') }}">
                    <div class="text-red-500">
                    @error('email')
                        <div>{{ $message }}</div>
                    @enderror
                    </div>
            </div>
            <div class="login-form__input-list">
                <input type="password" name="password" placeholder="パスワード" value="{{ old('password') }}">
                <div class="text-red-500">
                    @error('password')
                    <div>{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="login-form__submit">
            <div class="login-form__button">
                <button type="submit">
                    ログイン </button>
            </div>
            <div class="register-form__registered">
                <a>アカウントをお持ちでない方はこちらから</a><br>
                <a href="/register">会員登録</a>
            </div>
        </div>
</form>
</div>
@endsection