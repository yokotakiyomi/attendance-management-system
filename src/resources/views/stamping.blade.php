@extends('layouts.general')

@section('css')
<link rel="stylesheet" href="{{asset('css/stamping.css') }}">
@endsection

@section('content')
<form class="stamping__main" action="/stamping" method="POST">
    @csrf

    <div class="stamping-form__heading">
        <h2>{{ Auth::user()->name }}さんお疲れ様です！</h2>
    </div>
    <div class="stamping-form__submit">
        <button type="submit" name="type" value="work_start">勤務開始</button>
        <button type="submit" name="type" value="work_end">勤務終了</button>
        <button type="submit" name="type" value="rest_start">休憩開始</button>
        <button type="submit" name="type" value="rest_end">休憩終了</button>
    </div>
</form>
@endsection