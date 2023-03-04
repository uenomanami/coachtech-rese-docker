<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# アプリケーション名

「Rese（リーズ）」
ある企業のグループ会社の飲食店予約サービス
![トップ画面](./public/images/top.png)

## 作成した目的

外部の飲食店予約サービスは手数料を取られるので自社で予約サービスを持ちたい。

## アプリケーション URL

| URL                   | ページ一覧           |
| --------------------- | -------------------- |
| /                     | 飲食店一覧ページ     |
| /detail/{store_id}    | 店舗詳細ページ       |
| /mypage               | マイページ           |
| /register             | 会員登録ページ       |
| /login                | ログイン画面         |
| /logout               | ログアウト           |
| /administor           | 管理者画面           |
| /adiministor/mail     | 管理者メール作成画面 |
| /storemanager         | 店舗代表者ページ     |
| /storemanager/reserve | 予約情報詳細         |
| /storemanager/edit    | 店舗情報編集         |
| /payment              | 支払い画面           |
| /payment/form         | 支払い情報の入力     |
| /payment/complete     | 支払い完了画面       |

## 他のリポジトリ

## 機能一覧

-会員登録機能 -ログイン、ログアウト機能 -飲食店お気に入り機能（追加、削除） -飲食店検索機能（エリア、カテゴリー、ワード） -飲食店予約機能（追加、削除、変更） -評価機能 -決済機能
-QR コード表示機能 -店舗情報作成、編集 -メール送信機能

## 使用技術（実行環境）

-   Laravel 8.83.26

## テーブル設計

< --- 作成したテーブル設計の画像 ---- >
![テーブル設計1](./public/images/table1.png)
![テーブル設計1](./public/images/table2.png)

## ER 図

< --- 作成した ER 図の画像 ---- >
![ER図](er.drawio.png)

## 他に記載することがあれば記述する

テスト用アカウント -管理者ユーザー
email:aaa@example.com
pass:test

-店舗代表者
email:bbb@example.com
pass:test

-テストユーザー 1
email:ccc@example.com
pass:test

-テストユーザー 2
email:ddd@example.com
pass:test

-テストユーザー 3
email:eee@example.com
pass:test
