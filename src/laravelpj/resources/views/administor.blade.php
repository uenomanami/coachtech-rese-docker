@extends('layouts.parent')

@section('title')
管理者画面
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/administor.css') }}">
@endpush

@section('content')
<main>
  <div class="admin__mail">
    <a href="/administor/mail">メール新規作成</a>
  </div>
  <div class="admin">
    <h2 class="admin__title">店舗代表者登録</h2>
    <form action="/administor" method="POST">
      @csrf
      <table>
        <tr>
          <th><label for="name">店舗代表者：</label></th>
          <td><input type="text" name="name" value="{{ old('name') }}"></td>
        </tr>
        @if ($errors->has('name'))
        <tr>
          <th></th>
          <td class="validation__error-red">Error:{{$errors->first('name')}}</th>
        </tr>
        @endif
        <tr>
          <th><label for="email">メールアドレス：</label></th>
          <td><input type="email" name="email" value="{{ old('email') }}"></td>
        </tr>
        @if ($errors->has('email'))
        <tr>
          <th></th>
          <td class="validation__error-red">Error:{{$errors->first('email')}}</th>
        </tr>
        @endif
        <tr>
          <th><label for="password">パスワード：</label></th>
          <td><input type="password" name="password" value="{{ old('password') }}"></td>
        </tr>
        @if ($errors->has('password'))
        <tr>
          <th></th>
          <td class="validation__error-red">Error:{{$errors->first('password')}}</th>
        </tr>
        @endif
      </table>
      <button type="submit">登録する</button>
    </form>
  </div>
</main>
@endsection