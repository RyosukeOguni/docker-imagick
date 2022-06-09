<html>

    <head>
        <title>Upload Form</title>
    </head>

    <body>

        <h3>1.文字＋画像合成</h3>
        <form action="do_upload" method="post" name="form_detail" enctype="multipart/form-data">
            <table class="tbl">
                <tbody>
                    <tr>
                        <th>文字</th>
                        <td>
                            <input type="text" name="text" class="text-input" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>フォントサイズ</th>
                        <td>
                            <input type="number" name="f-size" class="text-input" value="0">
                        </td>
                    </tr>
                    <tr>
                        <th>画像</th>
                        <td>
                            <label>
                                <input type="file" value="" class="image-uploader" name="image">
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th>横位置(px)</th>
                        <td>
                            <input type="number" name="x" class="text-input" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>縦位置(px)</th>
                        <td>
                            <input type="number" name="y" class="text-input" value="">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">合成</button>
        </form>
        
        <h3>2.SVG→PNG変換</h3>
        <form action="do_convert" method="post" name="form_detail" enctype="multipart/form-data">
            <table class="tbl">
                <tbody>
                    <tr>
                        <td>
                            <label>
                                <input type="file" value="" class="image-uploader" name="image">
                            </label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">変換</button>
        </form>
    </body>

</html>
