# 試験環境
  - php 5.6.40
  - imagick 3.4.4
  - Apache 2.4.53

# 画像＋文字合成試験
1. dockerを起動
    ```
    docker-compose up -d
    ```
2. [http://localhost:8081/](http://localhost:8081/)  
   - テストページを開くと同時にtest.pngの任意の位置に"ML-NET番号"を合成したresult.pngファイルを生成
   - 合成後イメージをページに表示


# 導入手順
## ImageMagickのインストール
▼./setting/php/Dockerfile
```php
// ImageMagickの依存パッケージ
RUN apt-get -y install gcc pkg-config libmagickwand-dev

//ImageMagickのインストール
RUN pecl install imagick-3.4.4
```
## ImageMagickの有効化
▼./setting/php/php.ini
```php
// ImageMagickの読込
extension=imagick.so
```
## index.php
▼参照  
http://tech.aainc.co.jp/archives/4589
