@extends('layouts.parent')

@section('title')
予約詳細
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/storereserve.css') }}">
@endpush

@section('content')

<div class="reserve__detail">
  <table>
    <tr>
      <th>日にち</th>
      <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('Y-m-d') }}</td>
    </tr>
    <tr>
      <th>時間</th>
      <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('H:i') }}</td>
    </tr>
    <tr>
      <th>お名前</th>
      <td>{{ $reserve->getUsername() }}</td>
    </tr>
    <tr>
      <th>人数</th>
      <td>{{ $reserve->num_of_people }}名</td>
    </tr>
  </table>
</div>
@endsection