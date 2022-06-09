# 試験環境
  - php 5.6.40
  - imagick 3.4.4
  - Apache 2.4.53

# 開始手順
1. dockerを起動
    ```
    docker-compose up -d
    ```
2. [http://localhost/](http://localhost/) を押下

# 1. 文字＋画像合成
   - 合成したい文字を「文字」に入力
   - 文字サイズを「フォントサイズ」に入力
   - 合成したい画像を「ファイルを選択」で選択
   - 文字位置を横位置、縦位置で指定
   - 「合成」ボタンを押下
   - /output/result.png でファイルを出力
# 2. SVG→PNG変換
   - 変換したいSVGファイルを選択して「変換」ボタンを押下
   - /output/(選択したファイル名).png で変換ファイルを出力


# 導入手順
## ImageMagickのインストール
▼./setting/php/Dockerfile
```php
// ImageMagickの依存パッケージ
RUN apt-get -y install gcc pkg-config libmagickwand-dev
# SVG変換に必要なdecode delegateをインストール
RUN apt-get -y install inkscape
//ImageMagickのインストール
RUN pecl install imagick-3.4.4
```
## SVGに使用されているMSゴシックを有効化
▼./setting/php/Dockerfile
```php
# MSゴシックフォントをLinuxで使う
COPY ./msgothic.ttc /usr/local/share/fonts/msgothic.ttc
```
## ImageMagickの有効化
▼./setting/php/php.ini
```php
// ImageMagickの読込
extension=imagick.so
```

# 作業メモ
## 1. 文字＋画像合成
▼参照  
http://tech.aainc.co.jp/archives/4589

## 2. SVG→PNG変換
### SVGファイルへの修正
下記をSVGファイルの先頭に挿入
```php
<?xml version="1.0" encoding="UTF-8" standalone="no"?>
```
▼参照  
https://stackoverflow.com/questions/18661811/why-do-i-get-nodecodedelegateforthisimageformat-when-rastering-svg-to-png-with-i

### decode delegateのインストール
▼参照  
https://stackoverflow.com/questions/32948471/imagick-svg-to-jpg-error-no-decode-delegate
