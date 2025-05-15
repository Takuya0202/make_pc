# make_pc
<p align="center">
    <img src="readme-images/logo.jpeg"  height="200"><img>
</p>

## make_pcについて / What is this ?
make_pcは自作pcを作る手助けをするサービスです<br>
**make_pc** is a web application designed to help users build their own custom PCs.

## 主な機能について / Features
- ✅ ユーザー認証 <br> User registration & login
- ℹ️ パーツの情報 <br>Pc parts infomation
- 💬 レビュー機能 <br> Review system
- 📌 パーツをリストに追加する機能 <br> Add parts to your lists
- 🛠️ 管理者ページ <br> Admin dashboard and management pages

## 技術スタック / tech stack
<img src="https://img.shields.io/badge/Laravel-red?logo=laravel&logoColor=white" style="width:100px ; height:30px"></img>
<img src="https://img.shields.io/badge/Tailwindcss-0769ad?logo=tailwindcss&logoColor=white" style="width:100px ; height:30px"></img>
<img src="https://img.shields.io/badge/Mysql-lightgrey?logo=mysql&logoColor=white" style="width:100px ; height:30px"></img>
<img src="https://img.shields.io/badge/Docker-blue?logo=Docker&logoColor=white" style="width:100px ; height:30px"></img>

## セットアップ方法 / set up
まずは以下を実行<br>
Start by running the following commands<br>
```bash
git clone https://github.com/Takuya0202/make_pc.git
cp .env.docker .env
cd app
cp .env.example .env
```
上を実行後 `.env` ファイルに管理者情報、データベース情報を記載<br>
Configure `.env` with admin credentials and database settings.<br>

`.env` に記載後、再び以下を実行<br>
After editing the `.env` file, run the following commands:<br>
```bash
docker-compose build
docker-compose run back bash
composer install
php artisan key:generate
php artisan config:clear
php artisan config:cache
php artisan migrate --seed
mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache
php artisan storage:link
```
その後、http://localhost:8880 にアクセス<br>
then,you can access http://localhost:8880 <br>

## アプリ画面 / App Page
### ユーザー認証画面 / User registration & login
<p float="left">
    <img src="readme-images/auth/register.png" width="400"></img>
    <img src="readme-images/auth/login.png" width="400"></img>
</p>
ユーザー認証に成功すると、 http://localhost:8880/app/home にリダイレクトされます<br>
 Once authenticated, users are redirected to http://localhost:8880/app/home<br>
ユーザーはアイコン、ユーザー名、email、passwordを決めることができ、予めseederで5人のユーザーと1人の管理者ユーザーが設定されています<br>
Users can set their icon, username, email, and password. The database includes 5 users and 1 admin by default via seeder.<br>

### パーツページ / Parts pages
#### 一覧ページ / index
<p float="left">
    <img src="readme-images/app/parts/index.png" width="400"></img>
    <img src="readme-images/app/parts/search.png" width="400"></img>
</p>
ここではパーツの一覧ビュー、絞り込み機能があり、予めseederで6件のパーツがセットされます<br>
This view shows a list of parts with a filter function. Six sample parts are pre-registered via seeder.<br>

##### 詳細ページ / Detail
<p float="left">
    <img src="readme-images/app/parts/show-1.png" width="400"></img>
    <img src="readme-images/app/parts/show-2.png" width="400"></img>
</p>
パーツ詳細情報ではユーザーレビューや商品のリンク、リスト追加機能などがあります<br>
Part detail pages include user reviews, product links, and the ability to add items to a list.<br>

### レビューページ / Reviews page
<p float="left">
    <img src="readme-images/app/review/review-1.png" width="400"></img>
    <img src="readme-images/app/review/review-2.png" width="400"></img>
</p>
ユーザーは5段階評価とパーツについてのレビューが記載できます。予めseederで各パーツに3件のレビューがセットされます<br>
Users can leave 5-star ratings and reviews on parts. Each part comes with 3 sample reviews from the seeder.<br>

### ユーザープロフィール / User profile
<p float="left">
    <img src="readme-images/app/user/user-1.png" width="400"></img>
    <img src="readme-images/app/user/user-2.png" width="400"></img>
</p>
ユーザープロフィールではアイコン、ユーザー名、emailが変更できます。<br>
Users can edit their profile image, username, and email.<br>

### listページ / List page
<p float="left">
    <img src="readme-images/app/list/list-1.png" width="400"></img>
    <img src="readme-images/app/list/liat-2.png" width="400"></img>
</p>
リストページではユーザーが追加した商品と合計金額を見ることができます。各ユーザーは5つのリストを持っています<br>
On the list page, users can see their selected parts and the total price. Each user can have up to five custom lists.<br>

## 管理者画面 / Admin Page
### ダッシュボード / Dashboard
<img src="readme-images/admin/dashbord.png"></img>
管理者ユーザーは http://localhost:8880/admin にログインすることができます。<br>
Admin users can log in at http://localhost:8880/admin<br>
統計や直近に追加されたレビューやパーツが見れます<br>
They can view statistics and recently added reviews and parts.<br>

### パーツ管理 / Part Management
#### 一覧ページ / Index
<p float="left">
    <img src="readme-images/admin/parts/index.png" width="400"></img>
    <img src="readme-images/admin/parts/search.png" width="400"></img>
</p>
パーツ管理ページでも同様に検索機能、並び替え機能があります<br>

#### 追加ページ / Create
<p float="left">
    <img src="readme-images/admin/parts/create-1.png" width="400"></img>
    <img src="readme-images/admin/parts/create-2.jpeg" width="400"></img>
</p>
パーツ情報を入力後、作成すると以下のように追加できます<br>
After entering the information, parts can be added as shown below:<br>
カテゴリーやメーカーは新しく作成もできます。<br>
New categories and manufacturers can also be created.<br>
作成すると以下のように登録されます<br>
Once created, the part will be registered as shown below.<br>
<p float="left">
    <img src="readme-images/admin/parts/store-1.png" width="400"></img>
    <img src="readme-images/admin/parts/store-2.png" width="400"></img>
</p>

#### 詳細ページ / Detail
<p float="left">
    <img src="readme-images/admin/parts/show-1.png" width="400"></img>
    <img src="readme-images/admin/parts/show-2.png" width="400"></img>
</p>

#### 編集・削除ページ / Edit & Delete page
<p float="left">
    <img src="readme-images/admin/parts/update.png" width="400"></img>
    <img src="readme-images/admin/parts/delete.png" width="400"></img>
</p>
登録したパーツの情報更新、削除ができます<br>
You can update or delete registered part information.<br>

### レビュー管理 / Review Management
#### 一覧ページ / Index
<p float="left">
    <img src="readme-images/admin/reviews/index.png" width="400"></img>
    <img src="readme-images/admin/reviews/search.png" width="400"></img>
</p>

#### 特定のユーザー,パーツのレビュー / Reviews by user or part
<p float="left">
    <img src="readme-images/admin/reviews/user.png" width="400"></img>
    <img src="readme-images/admin/reviews/part.png" width="400"></img>
</p>
特定のユーザーやパーツについてのレビューも見ることができます。<br>
You can view reviews for specific users or parts.<br>

#### レビューの詳細情報 / Detail
<p float="left">
    <img src="readme-images/admin/reviews/detail-1.png" width="400"></img>
    <img src="readme-images/admin/reviews/detail-2.png" width="400"></img>
</p>
レビューの本文をクリックすることでレビューの詳細情報を見ることができます<br>
Clicking on the review content will display detailed information about the review.<br>

### ユーザー管理 / User Management
<p float="left">
    <img src="readme-images/admin/users/index.png" width="400"></img>
    <img src="readme-images/admin/users/search.png" width="400"></img>
</p>
ユーザーの名前や管理者権限を持っているもののみなど検索、絞り込みができます<br>
You can search and filter users by name, admin privileges, and more.<br>


### カテゴリー管理 / Category Management
<p float="left">
    <img src="readme-images/admin/categories/index.png" width="400"></img>
    <img src="readme-images/admin/categories/create.png" width="400"></img>
</p>
パーツが所属しているカテゴリーの件数、作成、削除ができます。<br>
You can view the number of parts per category, create new categories, or delete them.<br>

### メーカー管理 / Manufacturer Management
<p float="left">
    <img src="readme-images/admin/parts/update.png" width="400"></img>
    <img src="readme-images/admin/parts/delete.png" width="400"></img>
</p>
カテゴリー同様、所属しているパーツの件数、作成、削除が行えます<br>
 Similar to categories, you can create, delete, and view the number of parts for each manufacturer.<br>

## 開発者 / Developer
<a href="https://github.com/Takuya0202">Takuya0202 (Design & Programing)</a>

## 今後の展望 / Future Outlook
- ユーザーの通報機能、レビューのいいね機能 <br>
User reporting feature and like feature for reviews  
- パスワード変更時のメール設定<br>
Email notification when changing password  
- モバイルのレスポンス対応<br>
Responsive design for mobile support

## 開発に至って 
3月からlaravelに関して本格的に学び、そのアウトプットとして自作pcを作るサイトを作りました。<br>
今回のアプリケーションでは自作pcを作ること以外にも、seeder,factoryの利用や多対多のリレーションやコンポーネントの利用、ミドルウェアなど学んだ知識を活用して開発に取り掛かりました<br>
bladeのみで作っているのでwebアプリケーションとしての完成度はまだまだですが、価格帯の検索バーやレビューの星評価などdom操作を用いたjsも少し使ってこだわってみました<br>
今後はフロントエンドを学習してapiとしてlaravelを利用したり、デプロイについても学習していきたいです!<br>
価格帯のレンジバーについてはまとめてあるのでみてくださると嬉しいです<br>
https://zenn.dev/amethyst/articles/52b06dd5ee69ab