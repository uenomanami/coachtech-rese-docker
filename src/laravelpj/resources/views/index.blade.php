@extends('layouts.parent')

@section('title')
Rese
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@section('content')
<form action="/search" method="get">
  <table class="shop__search">
    <tr>
      <td>
        <div class="select-wrap">
          <select name="area" onchange="submit(this.form)">
            <option value="">All&nbsp;area</option>
            @foreach($areas as $area)
            <option value="{{ $area->id }}" @if(isset($input_area)) @if( $area->id == $input_area) selected @endif
              @endif>{{ $area->name }}</option>
            @endforeach
          </select>
        </div>
      </td>
      <td>
        <div class="select-wrap">
          <select name="category" onchange="submit(this.form)">
            <option value="">All&nbsp;genre</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if(isset($input_category)) @if( $category->id == $input_category)
              selected @endif @endif>{{$category->name }}</option>
            @endforeach
          </select>
        </div>
      </td>
      <td>
        <div class="search_box">
          <input type="text" name="store_name" placeholder="Search..."
            value="@if (isset($input_content)) {{ $input_content }} @endif">
        </div>
      </td>
    </tr>
  </table>
  <input type="submit" class="search__submit">
</form>

<main class="shop__main">
  @foreach ($stores as $store)
  <div class=" shop__card">
    <div class="shop__card-img">
      <img src="{{ $store->image_url }}" alt="">
    </div>
    <div class="shop__card-content">
      <h2 class="card-content__name">{{ $store->name }}</h2>
      <p class="card-content__area">{{ $store->getArea() }}</p>
      <p class="card-content__category">{{ $store->getCategory() }}</p>
      <div class="card-content__item">
        <form action="/detail/" method="get">
          <button class="to-detail__button" name="store_id" value="{{ $store->id }}" type="submit">詳しくみる</button>
        </form>

        @auth
        @if (!Auth::user()->is_favorite($store->id))
        <form action="{{ route('favorite', ['store_id' => $store->id ])}}" method="post">
          @csrf
          <button type="submit" class="favorite__btn">
            <img src="{{ asset('images/heart-gray.png') }}" alt="">
          </button>
        </form>
        @else
        <form action="{{ route('favorite.delete', ['store_id' => $store->id ])}}" method="post">
          @csrf
          <button type="submit" class="favorite__btn">
            <img src="{{ asset('images/heart-red.png') }}" alt="">
          </button>
        </form>
        @endif
        @endauth

      </div>
    </div>
  </div>
  @endforeach
</main>
@endsection