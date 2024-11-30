@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css') }}">
@endsection

@section('content')
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form__main">
    <form action="/register" method="POST">
        @csrf

        <div class="register-form__content">
            <div class="register-form__heading">
                <h2>会員登録</h2>
            </div>

            <div class="register-form__input">
                <div class="register-form__input-list">
                    <input type="text" name="name" placeholder="名前" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-form__input-list">
                    <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-form__input-list">
                    <input type="password" name="password" placeholder="パスワード">
                    @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="register-form__input-list">
                    <input type="password" name="password_confirmation" placeholder="確認用パスワード">
                    @error('password')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="register-form__submit">
                <button type="submit" class="register-form__button">会員登録</button>
                <div class="register-form__registered">
                    <p>アカウントをお持ちの方はこちらから</p>
                    <a href="/login">ログイン</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection