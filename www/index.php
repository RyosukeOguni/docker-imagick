<?php
// 画像ファイルのpath
$filePath = "./test.png";
// 画像の読み込み
$templateImg = new Imagick($filePath);

// 文字列を書き込んでくれるクラス
$draw = new ImagickDraw();
// フォントファイルのpath
$fontPath = "./meiryo.ttc";
// フォントの指定
$draw->setFont($fontPath);
// フォントサイズの指定
$draw->setFontSize(16);
// 表示する文字列
$string = "ML-NET番号";
// 文字列の幅を取得
$metrics = $templateImg->queryFontMetrics($draw, $string);

//座標を指定して描画
// $draw->annotation(0, $metrics['ascender'], $string);
$draw->annotation(220, 790, $string);
// 画像へ文字列を合成！
$templateImg->drawImage($draw);
// ファイルとして出力
$templateImg->writeImage("./result.png");

// 画像を表示
header('Content-Type: image/png');
echo $templateImg;

// お掃除
$templateImg->destroy();
