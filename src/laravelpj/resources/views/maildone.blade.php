@extends('layouts.parent')

@section('title')
メール送信完了
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endpush

@section('content')
<div class="done__box">
  <p>メールを送信しました</p>
  <a href="/administor">戻る</a>
</div>

@endsection