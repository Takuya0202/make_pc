# make_pc

## make_pcについて　/ What is this ?
make_pcは自作pcを作る手助けをするサービスです<br>
**make_pc** is a web application designed to help users build their own custom PCs.

## 主な機能について / Features
- ✅ ユーザー認証 User registration & login
- ℹ️ パーツの情報 Pc parts infomation
- 💬 レビュー機能
- 📌 パーツをリストに追加する機能
- 🛠️ 管理者ページ

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
上を実行後.envファイルに管理者情報、データベース情報を記載<br>
Configure .env with admin credentials and database settings.<br>

.envに記載後、再び以下を実行<br>
After editing the .env file, run the following commands:<br>
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

## アプリ画面 / App screenshots
### ユーザー認証画面 / User registration & login
