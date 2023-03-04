@extends('layouts.parent')

@section('title')
決済完了
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endpush

@section('content')
<div class="done__box">
  <p class="text-center mt-5">決済が完了しました！</p>
  <p>ご予約ありがとうございます</p>
  <a href="/">戻る</a>
</div>
@endsection