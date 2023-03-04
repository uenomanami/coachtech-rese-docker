@extends('layouts.parent')

@section('title')
メール作成
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@endpush

@section('content')
<main class="mail__main">
  <form action="/administor/mail" method="POST">
    @csrf
    <label for="user">宛先：</label>
    <select name="user">
      @foreach ($users as $user)
      <option value="{{ $user->id }}">{{ $user->id }}:{{
        $user->name }}</option>
      @endforeach
    </select>
    @if ($errors->has('user'))
    <p class="validation__error-red">Error:{{$errors->first('user')}}</p>
    @endif

    <label for="title">タイトル</label>
    <input type="text" name="title">
    @if ($errors->has('title'))
    <p class="validation__error-red">Error:{{$errors->first('title')}}</p>
    @endif

    <label for="user">本文：</label>
    <textarea name="content" cols="30" rows="10"></textarea>
    @if ($errors->has('content'))
    <p class="validation__error-red">Error:{{$errors->first('content')}}</p>
    @endif

    <button>送信</button>
  </form>
</main>
@endsection