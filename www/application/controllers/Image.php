<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Image extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view('index.tpl');
    }

    /* 文字＋画像合成 */
    public function do_upload()
    {
        // 画像ファイルのpath
        $filePath = $_FILES['image']['tmp_name'];
        // 画像の読み込み
        $templateImg = new Imagick($filePath);

        // 文字列を書き込んでくれるクラス
        $draw = new ImagickDraw();
        // フォントファイルのpath
        $fontPath = dirname(BASEPATH) . '/common/font/meiryo.ttc';
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
        $templateImg->writeImage(dirname(BASEPATH) . '/output/' . 'result.png');

        // 画像をDL
        $dl = file_get_contents(dirname(BASEPATH) . '/output/' . 'result.png');
        force_download("result.png", $dl);


        // お掃除
        $templateImg->destroy();

        $this->index();
    }

    /* SVG→PNG変換 */
    public function do_convert()
    {
        $filePath = $_FILES['image']['tmp_name']; //svgファイルを読み込む
        $fileName = pathinfo($_FILES['image']['name']); //svgファイル名を取得
        if (file_exists($filePath)) {
            $text  = file_get_contents($filePath);
            // 先頭行にXML宣言を挿入
            $text = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>\n" . $text;
            // svgファイルを上書き
            file_put_contents($filePath, $text);
        }

        $img = new Imagick(); //新規画像データを作成
        // $img->setBackgroundColor(new ImagickPixel('transparent')); //透過処理を有効に
        $img->readImage($filePath); //svgファイルを読み込む
        $img->writeImage(dirname(BASEPATH) . '/output/' . $fileName['filename'] . '.png'); //pngファイルを書き出す
        $img->clear(); //画像データを破棄
        $img->destroy(); //画像データを破棄

        // 画像をDL
        $dl = file_get_contents(dirname(BASEPATH) . '/output/' . $fileName['filename'] . '.png');
        force_download($fileName['filename'] . '.png', $dl);

        $this->index();
    }
}
