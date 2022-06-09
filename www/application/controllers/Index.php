<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->view('index.tpl');
  }
  
  public function do_upload()
  {
    // 画像ファイルのpath
    $filePath = $_FILES['image']['tmp_name'];
    // 画像の読み込み
    $templateImg = new Imagick($filePath);

    // 文字列を書き込んでくれるクラス
    $draw = new ImagickDraw();
    // フォントファイルのpath
    $fontPath = dirname(BASEPATH) . "/common/font/meiryo.ttc";
    // フォントの指定
    $draw->setFont($fontPath);
    // フォントサイズの指定
    $draw->setFontSize($_POST['f-size']);
    // 表示する文字列
    $string = $_POST['text'];
    // 文字列の幅を取得
    $metrics = $templateImg->queryFontMetrics($draw, $string);

    //座標を指定して描画
    // $draw->annotation(0, $metrics['ascender'], $string);
    $draw->annotation($_POST['x'], $_POST['y'], $string);
    // 画像へ文字列を合成！
    $templateImg->drawImage($draw);
    // ファイルとして出力
    $templateImg->writeImage("./result.png");

    // 画像を表示
    header('Content-Type: image/png');
    echo $templateImg;

    // お掃除
    $templateImg->destroy();

    $this->view('index.tpl');
  }
}
