@extends('layouts.parent')

@section('title')
Rese店舗管理画面
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/storemanager.css') }}">
@endpush

@section('content')

<main class="storemanager__main">
  {{-- 店舗情報未登録の場合 --}}
  @if(empty($store))
  <form action="storemanager/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="storemanager__create-item">
      <label for="image_url">イメージ画像：</label>
      <input type="file" name="image_url">
      @if ($errors->has('image_url'))
      <p class="validation__error-red">Error:{{$errors->first('image_url')}}</p>
      @endif

      <label for="name">店名：</label>
      <input type="text" name='name'>
      @if ($errors->has('name'))
      <p class="validation__error-red">Error:{{$errors->first('name')}}</p>
      @endif

      <label for="area">エリア：</label>
      <select name="area" class="storemanager__create-item">
        @foreach ($areas as $area)
        <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endforeach
      </select>
      @if ($errors->has('area'))
      <p class="validation__error-red">Error:{{$errors->first('area')}}</p>
      @endif

      <label for="category">カテゴリー</label>
      <select name="category" class="storemanager__create-item">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{$category->name }}</option>
        @endforeach
      </select>
      @if ($errors->has('category'))
      <p class="validation__error-red">Error:{{$errors->first('category')}}</p>
      @endif

      <label for="description">紹介文：</label>
      <textarea class="storemanager__create-description" name="description" id="" cols="30" rows="10"></textarea>
      @if ($errors->has('description'))
      <p class="validation__error-red">Error:{{$errors->first('description')}}</p>
      @endif
      <button type="submit">店舗情報を作成する</button>
    </div>
  </form>

  @else {{-- 店舗情報登録済みの場合 --}}
  <h1>{{ $store->name }}</h1>
  <div class="storemanager__info">
    <h2>店舗情報</h2>
    <div class="storemanager__info-img">
      <img src="{{ $store->image_url }}" alt="">
    </div>
    <div class="storemanager__info-item">
      <p class="storemanager__info-area">{{ $store->getArea() }}</p>
      <p class="dstoremanager__info-category">{{ $store->getCategory() }}</p>
      <p class="storemanager__info-description">{{ $store->description }}</p>
      <form action="/storemanager/edit" method="GET">
        <button type="submit" name="store_id" value="{{ $store->id }}">店舗情報を変更する</button>
      </form>
    </div>
  </div>

  <div class="storemanager__reserve">
    <h2>予約一覧</h2>
    <table>
      <tr>
        <th>日にち</th>
        <th>時間</th>
        <th>お名前</th>
        <th>人数</th>
        <th></th>
      </tr>
      @foreach($reserves as $reserve)
      <tr>
        <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('Y-m-d') }}</td>
        <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('H:i') }}</td>
        <td>{{ $reserve->getUsername() }}</td>
        <td>{{ $reserve->num_of_people }}名</td>
        <form action="{{ route('storemanager.reserve')}}" method="get">
          @csrf
          <td><button name="reserve_id" value="{{ $reserve->id }}">詳細</button></td>
        </form>
      </tr>
      @endforeach
    </table>
  </div>
  @endif
</main>
@endsection