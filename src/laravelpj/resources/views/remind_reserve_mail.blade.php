<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>予約確認メール</title>
</head>

<body>

  <p>{{ $name }}様</p>

  <p>本日が予約日となりました。</p>
  <p>{{ $store_name }}</p>
  <p>{{ $reserve_date }}&nbsp;{{ $reserve_time }}〜</p>
  <p>遅れる場合や、ご都合が悪くなった際には<br>
    お店に直接ご連絡ください。</p>

  <p>ご来店の際にQRコードをご提示ください</p>
  {!! QrCode::size(200)->generate(route('storemanager.reserve', ['reserve_id' => $reserve_id] )) !!}

</body>