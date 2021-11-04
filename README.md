## setup
```
$ cp .env.example .env

$ docker-compose build
$ docker-compose up -d
$ docker-compose exec app composer install
$ docker-compose exec app npm install
$ docker-compose exec app npm run dev

$ docker-compose exec app php artisan key:generate
$ docker-compose exec app php artisan migrate:refresh --seed

$ docker-compose exec app chmod -R 777 storage
$ docker-compose exec app chmod -R 777 bootstrap/cache
```
## 開発時 コマンド
```
// 環境立ち上げ
$ docker-compose up

// sass js 監視
$ docker-compose exec app npm run watch

// サーバー設定変更時
$ docker-compose build
$ docker-compose up

// 各種ライブラリ変更時
$ docker-compose exec app composer install
$ docker-compose exec app npm install

```

## 運用時
task-definition で定義する環境変数をgithub secret に格納してください
```
AWS_ACCESS_KEY_ID
AWS_ACCOUNT_ID     => AWS console login > username(右上) > マイアカウント: account id
AWS_SECRET_ACCESS_KEY
LOKI_ID
LOKI_SECRET
SECURITY_GROUPS
SUBNETS
```
ECS > クラスター > 選択 > 詳細 から確認

## アーキテクチャ
laravel default の構成に一部クリーンアーキテクチャの思想を導入
Layer 毎に分離しその中でDomainで分離している
```
app/
│ 
├── Http/Controllers
│   ├── { DomainName } // 扱う事業領域名
│   │   ├── Controller // 各種controllerの責務を持った処理
│   │   └── ...
│   ├── { DomainName }
│   ├── { DomainName }
│   ├── ...
│   ...
├── Http/Requests
│   ├── { DomainName } // 扱う事業領域名
│   │   ├── request // 各種validationの責務を持った処理
│   │   └── ...
│   ├── { DomainName }
│   ├── { DomainName }
│   ├── ...
│   ...
├── Models
│   ├── { db_Name } // db定義
│   ├── { db_name }
│   ├── ...
│   ...
├── Service
│   ├── { DomainName } // 扱う事業領域名
│   │   ├── Service // 各種controllerの責務を持った処理
│   │   └── ...
│   ├── { DomainName }
│   ├── UtilityService // どのアプリケーションでも使える処理
│   ├── ...
│   ...
├── Repository
│   ├── { DomainName } // 扱う事業領域名
│   │   ├── repository // 各種controllerの責務を持った処理
│   │   └── ...
│   ├── { DomainName }
│   ├── { DomainName }
│   ├── ...
│   ...
```

責務
```
Controller  : 入力(httpリクエスト)を受け取り、適切な処理系に値を渡し、レスポンスを返す
Request     : バリデーション
Service     : 中核的なロジック
repository  : Eloquent Model は極力ココでのみ使用
```

## 課題
```
・現状の構成のままではマイクロサービスに対応できない。
・中規模のアプリケーションまでなら対応可能
・Eloquent Model 依存の設計
・大規模化した際の命名問題
・〇〇の肥大化と数百行に渡った際の複数人の作業リスク増加
・UtilityService のルールがないため、文化を浸透させないとくちゃくちゃになる
・認可処理を切り出していない( Laravel Policy)
```

俗に言う技術駆動パッケージング(or Package by Layer )