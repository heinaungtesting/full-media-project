Vue.js + Laravel Docker プロジェクト
技術スタック

    フロントエンド: Vue.js
    バックエンド: Laravel
    データベース: MySQL
    開発環境: Docker

必要条件

以下のソフトウェアがインストールされていることを確認してください:

    Docker Desktop
    Git

セットアップ手順
1. リポジトリのクローン

プロジェクトをローカル環境にクローンします:

    git clone https://github.com/heinaungtesting/full-media-project.git
    cd yourrepository
    
2. Docker起動前にやること
      cd backend
   
      composer install
     

３. Docker コンテナの起動

Docker Compose を使用して、プロジェクトを起動します:

    docker-compose up -d --build
    docker ps

    docker exec -it <backend container id> bash
    php artisan migrate
    php artisan key:generate


アクセス方法

以下の URL にアクセスして、それぞれのサービスを確認できます:

    フロントエンド: http://localhost:8080
    バックエンド: http://localhost:8000
    phpMyAdmin: http://localhost:8081
プロジェクトのフロー

このプロジェクトでは、以下の基本的なフローを実装しています:

    ユーザー管理:
        ユーザーは指定されたURLを通じてのみ、ユーザーの作成、読み取り、更新、削除（CRUD）が可能です。
        管理者は特定の管理画面にアクセスし、ユーザーリストを管理・編集できます。

    投稿とカテゴリ:
        ユーザーは投稿（Post）を作成し、各投稿にはカテゴリが関連付けられます。
        一般ユーザーは投稿を閲覧することができますが、投稿の作成や編集はできません。
        投稿はリスト形式で表示され、詳細ページで内容を確認できます。

    コメント機能:
        一般ユーザーは投稿に対してコメントを残すことができます。
        コメントは投稿詳細ページに表示され、リアルタイムで追加されます。
        コメントの作成、更新、削除は、コメントの管理者または投稿者によってのみ可能です。

プロジェクトの向上
1. オンラインチャット (WebSocket)

    使用技術: Laravel Echo, Pusher, Vue.js
    実装内容:
        WebSocketを利用してリアルタイムなチャット機能を追加。
        チャットメッセージが即時にフロントエンドに反映されるようにする。
        グループチャットや個別チャット機能を実装。

2. 認証と認可 (Authorization and Authentication)

    使用技術: Laravel Passport, Laravel Breeze, JWT
    実装内容:
        ユーザーの登録、ログイン、パスワードリセット機能を実装。
        API認証機能を設定し、JWTなどでセッション管理を行う。
        ユーザー権限の管理（例えば、管理者と一般ユーザーの役割分担）を実装。

3. 決済機能 (Payment)

    使用技術: Stripe, PayPal
    実装内容:
        サブスクリプション機能や単発決済機能を追加。
        決済後の確認ページや領収書の発行。
        支払い履歴の管理機能を作成。

4. セキュリティの強化 (Security Improvements)

    実装内容:
        HTTPSを使用し、SSL証明書を設定して通信を暗号化。
        XSS、CSRF、SQLインジェクション対策を実装。
        ユーザーのパスワードを安全に保存するために、bcryptなどのハッシュ化を使用。
        管理者のダッシュボードに対して、アクセス制限（ロールベースのアクセス制御）を追加。
注意事項

    Firefoxの使用を避けてください: CORSエラーが発生しやすく、読み込み時間が非常に遅くなることがあります。
    読み取る時間も遅いです。
