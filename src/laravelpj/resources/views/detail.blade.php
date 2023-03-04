@extends('layouts.parent')

@section('title')
{{ $store->name }}
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('content')
<main class="detail__main">
  {{-- 店舗詳細画面 --}}
  <div class="detail__store">
    <div class="detail__store-name">
      <div>
        <a href="/" class="back__button">&lt;</a>
        <h2>{{ $store->name }}</h2>
      </div>
      @auth
      @if (!Auth::user()->is_favorite($store->id))
      <form action="{{ route('favorite', ['store_id' => $store->id ])}}" method="post">
        @csrf
        <button type="submit" class="favorite__btn">
          <img src="{{ asset('images/heart-border.png') }}" alt="">
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

    <img src="{{ $store->image_url }}" alt="">
    <div class="detail__store-item">
      <p class="detail__store-area">{{ $store->getArea() }}</p>
      <p class="detail__store-category">{{ $store->getCategory() }}</p>
    </div>
    <p class="detail__store-description">{{ $store->description }}</p>

    <div class="detail__store-course">
      <h3>コース</h3>
      <p>3,000円：5品、飲み放題</p>
      <p>5,000円：7品、飲み放題</p>
    </div>

    <div class="detail__closed-date">
      <h3>定休日</h3>
      @if(isset($closeddates[0]))
      <div class="closed-date__wrap">
        <p class="closed-date__month">{{ \Carbon\Carbon::now()->format("n月") }}</p>
        <div class="closed-date__date">
          @foreach($closeddates as $closeddate)
          <p>{{ \Carbon\Carbon::createFromDate($closeddate->date)->format("j日") }}</p>
          @endforeach
        </div>
      </div>
      @endif

      @if(isset($closeddates_lastmonth[0]))
      <div class="closed-date__wrap">
        <p class="closed-date__month">{{ \Carbon\Carbon::now()->addMonth()->format("n月") }}</p>
        <div class="closed-date__date">
          @foreach($closeddates_lastmonth as $closeddate_lastmonth)
          <p>{{ \Carbon\Carbon::createFromDate($closeddate_lastmonth->date)->format("j日") }}</p>
          @endforeach
        </div>
      </div>
      @endif

      @if(isset($closeddates_monthafternext[0]))
      <div class="closed-date__wrap">
        <p class="closed-date__month">{{ \Carbon\Carbon::now()->addMonth(+2)->format("n月") }}</p>
        <div class="closed-date__date">
          @foreach($closeddates_monthafternext as $closeddate_monthafternext)
          <p>{{ \Carbon\Carbon::createFromDate($closeddate_monthafternext->date)->format("j日") }}
          </p>
          @endforeach
        </div>
      </div>
      @endif
    </div>
  </div>

  {{-- 予約画面 --}}
  @auth
  <div class="detail__reserve">
    <form action="{{ route('reserve', ['store_id' => $store->id ])}}" method="post">
      @csrf
      <div class="detail__reserve-wrap">
        <p class="reserve__title">予約</p>

        <input type="date" class="reserve__date" name="date">
        @if ($errors->has('date'))
        <p class="validation__error-red">Error:{{$errors->first('date')}}</p>
        @endif
        @if(session()->has('message'))
        <p class="validation__error-red">{{session('message')}}</p>
        @endif

        <select name="start_at">
          <option value="17:00">17:00</option>
          <option value="17:30">17:30</option>
          <option value="18:00">18:00</option>
          <option value="18:30">18:30</option>
          <option value="19:00">19:00</option>
          <option value="19:30">19:30</option>
          <option value="20:00">20:00</option>
          <option value="20:30">20:30</option>
          <option value="21:00">21:00</option>
        </select>
        @if ($errors->has('start_at'))
        <p class="validation__error-red">Error:{{$errors->first('start_at')}}</p>
        @endif

        <select name="num_of_people">
          <option value="1">1人</option>
          <option value="2">2人</option>
          <option value="3">3人</option>
          <option value="4">4人</option>
          <option value="5">5人</option>
          <option value="6">6人</option>
          <option value="7">7人</option>
          <option value="8">8人</option>
        </select>
        @if ($errors->has('num_of_people'))
        <p class="validation__error-red">Error:{{$errors->first('num_of_people')}}</p>
        @endif

        <select name="amount">
          <option value="">コースを選択しない</option>
          <option value="3000">3000円</option>
          <option value="5000">5000円</option>
        </select>
        @if ($errors->has('amount'))
        <p class="validation__error-red">Error:{{$errors->first('amount')}}</p>
        @endif
        <p class="detail__course-note">※コースは前払い制となっているため、「予約する」ボタンを押すと決済画面へ遷移します。</p>

        <div class="overflow-scroll">
          @if (Auth::user()->is_reserve($store->id))
          @foreach($reserves as $reserve)
          <div class="detail__reserve-card">
            <table>
              <tr>
                <th>Shop</th>
                <td>{{ $reserve->getStorename() }}</td>
              </tr>
              <tr>
                <th>Date</th>
                <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('Y-m-d') }}</td>
              </tr>
              <tr>
                <th>Time</th>
                <td>{{ \Carbon\Carbon::createFromTimeString($reserve->start_at)->format('H:i') }}</td>
              </tr>
              <tr>
                <th>Number</th>
                <td>{{ $reserve->num_of_people }}人</td>
              </tr>
              @if( !empty($reserve->course_amount))
              <tr>
                <th>Course</th>
                <td>{{ $reserve->course_amount }}円</td>
              </tr>
              @endif
            </table>
          </div>
          @endforeach
          @endif
        </div>
      </div>

      <button class="reserve__submit" type="submit" name="store_id" value="{{ $store->id }}">予約する</button>
    </form>
  </div>
  @endauth
</main>

{{-- レビュー --}}
<div class="detail__store-comment">
  <h2 class="detail__store-comment">レビュー</h2>

  {{-- 評価機能の表示の有無の判定 --}}
  @if ($store->is_reserve($store->id, $user_id) != null && !$store->is_userComment($store->id, $user_id))
  <div class="store-comment__wrap">
    <form action=" {{ route('comment', ['store_id'=> $store->id ])}}" method="post">
      @csrf
      <div class="store-comment__star">
        <input id="star5" type="radio" name="star" value="5">
        <label for="star5">★</label>
        <input id="star4" type="radio" name="star" value="4">
        <label for="star4">★</label>
        <input id="star3" type="radio" name="star" value="3">
        <label for="star3">★</label>
        <input id="star2" type="radio" name="star" value="2">
        <label for="star2">★</label>
        <input id="star1" type="radio" name="star" value="1">
        <label for="star1">★</label>
      </div>
      @if ($errors->has('star'))
      <p class="validation__error-red">Error:{{$errors->first('star')}}</p>
      @endif
      <textarea class="store-comment__comment" name="comment" rows="3"></textarea>
      @if ($errors->has('comment'))
      <p class="validation__error-red">Error:{{$errors->first('comment')}}</p>
      @endif
      <button type="submit">投稿する</button>
    </form>
  </div>
  @endif

  {{-- レビューの有無の判定 --}}
  @if($store->is_comments($store->id) != null)
  @foreach($comments as $comment)
  <div class="detail__comment-item">
    <div class="detail__comment-wrap">
      <div class="detail__comment-star">
        @for($i = 1; $i < 6; $i++) @if($i <=$comment->star)
          <span class="detail__comment-star--yellow">★</span>
          @else
          <span class="detail__comment-star--gray">★</span>
          @endif
          @endfor
      </div>
      <p class="detail__comment-date">{{ \Carbon\Carbon::createFromTimeString($comment->created_at)->format('Y-m-d')
        }}</p>
    </div>
    <p class="detail__comment-name">{{ $comment->getUsername() }}</p>
    <p class="detail__comment-comment">{{ $comment->comment }}</p>
  </div>
  @endforeach
  @else
  <p>まだレビューはありません</p>
  @endif
</div>
@endsection