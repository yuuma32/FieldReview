# ポートフォリオの概要
Laravelを使用して作成したサバイバルゲームフィールドのレビューサイトです。<br>
ユーザー登録、ログインすることで、各フィールドのレビューを投稿することができます。<br>
レスポンシブ対応しているのでスマホからも使用いただけます。<br>
会員登録せずに使用する場合は以下のユーザー情報をご使用ください。<br>
メールアドレス : guest@example.com<br>
パスワード : password
<img width="1470" alt="サイトイメージ" src="https://github.com/yuuma32/FieldReview/assets/169751715/3ff24674-24d1-4e93-b82d-ebcba186d427">

# サイトURL
http://field-review.com/

# 機能一覧
- ユーザー登録、ログイン機能(Laravel Breezeで作成)
- 管理者によるフィールドの編集機能
    - 管理者権限を持つユーザーのみがフィールドの編集可能。（管理者は後から設定も可能）
- レビュー機能
    - 同じフィールドに対して同一人物が複数のレビューを投稿できないように設計。
- 検索機能
    - フィールド名または都道府県で検索することが可能。  

# AWS構成図
![AWS構成図](https://github.com/yuuma32/FieldReview/assets/169751715/2305b6eb-7453-4160-91f9-757d3e97b282)

# 使用した技術
- HTML
- CSS
    - tailwindcss
- PHP8.1
    - Laravel10
- javascript
- Docker
- AWS
    - EC2
    - S3
