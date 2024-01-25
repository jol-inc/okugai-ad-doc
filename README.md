

# ダウンロード
git clone  https://github.com/jol-inc/okugai-ad-doc.git  

※docker の場合は任意の場所でコマンドを打つ。 打った階層に okugai-ad-doc というフォルダが作成されます。  
※XAMPP の場合は任意の場所にダウンロードしてから okugai-ad-doc/src/okugai-ad フォルダを htdocs に入れて下さい。  
<br><br><br>




# （docker のみ） ・コンテナ起動 ・別タブでコンテナ進入
cd okugai-ad-doc  
docker-compose up -d --build  
docker-compose exec -it app bash
<br><br><br>



# .env
▼以下の場所にある .env.example をコピーして同じ階層に .envと言う名前で保存し編集。  
※ docker ではホスト側の src/okugai-ad/.env.example   
※ xampp では  okugai-ad/.env.example  
 
 ▼DB_〇〇 の部分の修正  
 docker はそのままでもＯＫ。  
 xamppは1か所修正  

 ▼APP_URL= は使う場合変更
<br><br><br>



# （docker のみ） 画面遷移時間問題解消に伴う作業 ※ymlでマウント方法変更した為   

▼コンテナIDの確認  
docker ps  

▼ホストの vendor、  storage を コンテナID：〇〇番の var/html/アプリ名 にコピーするコマンド  
※ホスト側の okugai-ad-doc/src/okugai-ad で作業 

appコンテナ用  
docker cp ./vendor/ appコンテナのID:/var/www/html/okugai-ad  
docker cp ./storage/ appコンテナのID:/var/www/html/okugai-ad  

webコンテナ用   （こちらは不要かもしれません）  
docker cp ./vendor/ webコンテナのID:/var/www/html/okugai-ad  
docker cp ./storage/ webコンテナのID:/var/www/html/okugai-ad  
<br>

▼権限変更  
※appコンテナで作業（ララベルのトップ）  
chmod -R 777 storage bootstrap/cache  
<br><br><br>



# コンパイル等
※appコンテナで作業（ララベルのトップ）  
※xampp topフォルダ（okugai-ad）  

composer install  （不要かも）  
npm install  （不要かも）    
npm run dev  （不要かも）    
<br><br><br>



# .env の APP_KEYキーを生成
※appコンテナで作業（ララベルのトップ）    
php artisan key:generate 
<br><br><br>




# 表示確認（仮・TOPページのみ）

docker時  
http://localhost:8000  
xampp時  
http://localhost/okugai-ad  
<br><br><br>



# DB
▼DB作成  

・docker時  
 docker-compose.ymlで自動生成済
<br><br>

・xampp時  
phpmyadminでDB作成（DB名 ユーザー名 パスワード  は .envと同じ値にする。 必須 ）
<br><br>

▼テーブル作成とダミーデータの追加  
※appコンテナで作業（ララベルのトップ ）  
php artisan migrate:fresh --seed
<br><br><br>




# 画像設定  

▼テスト画像配置  
※ホスト側で作業可  
public/test_images フォルダをコピーして  
storage/app/public/images として配置  
<br>

▼画像フォルダのリンク  
※appコンテナで作業（ララベルのトップ ）  
php artisan storage:link
<br><br><br>




# 表示確認
▼サイト  
docker時  
http://localhost:8000  
xampp時  
http://localhost/okugai-ad  


  
▼phpmyadmin  
docker時  
http://localhost:8081  
xampp時  
http://localhost/phpmyadmin  
<br><br><br>



# アプリ名に応じて変更するファイル
▼docker-compose.yml  数か所  
▼Dockerfile  
▼default.conf  
▼.env（xamppはこれだけ）
<br><br><br>




# エラー対応

▼mysql  中に入れない時（dockerのみ）  
docker-compose config で確認
永続化したボリュームごと初期化する。  
docker-compose down -v --rmi local  
  
※コンテナ起動、画面遷移時間問題解消に伴う作業 等やり直し
<br><br><br><br>



# アカウント登録時の メール認証機能（テスト環境では無くても良い）

▼ .envファイル編集  （mailtrap 使用例）  
※メール認証はテスト環境として mailtrap に登録してアカウント情報を.envに記載する。  

MAIL_MAILER=smtp  
MAIL_HOST=sandbox.smtp.mailtrap.io  
MAIL_PORT=2525  
MAIL_USERNAME=必須  
MAIL_PASSWORD=必須  ※ここはクオーテーションの有無でエラーになる事アリ。    
MAIL_ENCRYPTION=tls  
※以下は ここで設定してもよいし、他のcinfigファイルで設定しても良い。  
MAIL_FROM_ADDRESS=何でも良いが必須  
MAIL_FROM_NAME=必須   
<br><br>


▼app/Models/Advertiser.php  
※ファイル内の説明通り編集
※一応このファイルのみメール認証切替出来ます。

▼routes/web.php  
※ファイル内の説明通り編集