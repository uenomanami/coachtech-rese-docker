@extends('layouts.parent')

@section('title')
店舗情報編集
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/storeinfo.css') }}">
@endpush

@section('content')
<main class="storeinfo__main">

  <h1>{{ $store->name }}</h1>
  <div class="storeinfo__edit">
    <form action="{{ route('storeinfo.update', ['store_id' => $store->id, 'store_name' => $store->name]) }}"
      method="POST" enctype="multipart/form-data">
      @csrf
      <table>
        <tr>
          <th><label for="image_url">画像ファイル：</label></th>
          <td><input type="file" name="image_url" class="storeinfo__edit-image"></td>
        </tr>
        <tr>
          <th><label for="area">エリア：</label></th>
          <td>
            <select name="area">
              @foreach ($areas as $area)
              <option value="{{ $area->id }}" @if( $store->area_id == $area->id ) selected @endif>{{ $area->name }}
              </option>
              @endforeach
            </select>
          </td>
        </tr>
        @if ($errors->has('area'))
        <tr>
          <th></th>
          <td>
            <p class="validation__error-red">Error:{{$errors->first('area')}}</p>
          </td>
        </tr>
        @endif
        </tr>

        <tr>
          <th><label for="category">カテゴリー：</label></th>
          <td>
            <select name="category">
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" @if( $store->category_id == $category->id ) selected @endif>{{
                $category->name }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        @if ($errors->has('category'))
        <tr>
          <th></th>
          <td>
            <p class="validation__error-red">Error:{{$errors->first('category')}}</p>
          </td>
        </tr>
        @endif

        <tr>
          <th class="textarea-title"><label for="description">店舗紹介：</label></th>
          <td><textarea class="storeinfo__edit-description" name="description" id="" cols="30"
              rows="10">{{ $store->description }}</textarea></td>
        </tr>
        @if ($errors->has('description'))
        <tr>
          <th></th>
          <td>
            <p class="validation__error-red">Error:{{$errors->first('description')}}</p>
          </td>
        </tr>
        @endif

        <tr>
          <th colspan="2"><button type="submit" name="store_id" value="{{ $store->id }}">店舗情報を変更する</button></th>
        </tr>

      </table>
    </form>
  </div>

  <div class="storeinfo__closed-date">
    <h2>定休日</h2>
    <div>
      @if(isset($closeddates[0]))
      <div class="closed-date__wrap">
        <p class="closed-date__month">{{ \Carbon\Carbon::now()->format("n月") }}</p>
        <div class="closed-date__date">
          @foreach($closeddates as $closeddate)
          <form action="{{ route('storedate.delete', ['closeddate_id' => $closeddate->id ])}}" method="POST">
            @csrf
            <button type="sumbit" onclick='return confirm("定休日の登録を取り消しますか？")'>
              {{ \Carbon\Carbon::createFromDate($closeddate->date)->format("j日") }}
            </button>
          </form>
          @endforeach
        </div>
      </div>
      @endif

      @if(isset($closeddates_lastmonth[0]))
      <div class="closed-date__wrap">
        <p class="closed-date__month">{{ \Carbon\Carbon::now()->addMonth()->format("n月") }}</p>
        <div class="closed-date__date">
          @foreach($closeddates_lastmonth as $closeddate_lastmonth)
          <form action="{{ route('storedate.delete', ['closeddate_id' => $closeddate_lastmonth->id ])}}" method="POST">
            @csrf
            <button type="sumbit" onclick='return confirm("定休日の登録を取り消しますか？")'>
              {{ \Carbon\Carbon::createFromDate($closeddate_lastmonth->date)->format("j日") }}
            </button>
          </form>
          @endforeach
        </div>
      </div>
      @endif

      @if(isset($closeddates_monthafternext[0]))
      <div class="closed-date__wrap">
        <p class="closed-date__month">{{ \Carbon\Carbon::now()->addMonth(+2)->format("n月") }}</p>
        <div class="closed-date__date">
          @foreach($closeddates_monthafternext as $closeddate_monthafternext)
          <form action="{{ route('storedate.delete', ['closeddate_id' => $closeddate_monthafternext->id ])}}"
            method="POST">
            @csrf
            <button type="sumbit" onclick='return confirm("定休日の登録を取り消しますか？")'>
              {{ \Carbon\Carbon::createFromDate($closeddate_monthafternext->date)->format("j日") }}
            </button>
          </form>
          @endforeach
        </div>
      </div>
      @endif
      <p class="storeinfo__delete-comment">※日付をクリックすると定休日の登録を取り消しできます</p>
    </div>

    <div class="storeinfo__closed-create">
      <h2>休業日登録</h2>
      <form action="{{ route('storedate.create', ['store_id' => $store->id]) }}" method="post">
        @csrf
        <input type="date" name="date">

        <button>登録</button>
      </form>
    </div>
  </div>
</main>
@endsection