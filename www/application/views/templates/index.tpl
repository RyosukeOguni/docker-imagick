<html>

  <head>
    <title>Upload Form</title>
  </head>

  <body>

    <h3>文字＋画像合成</h3>

    <form action="/index/do_upload" method="post" name="form_detail" enctype="multipart/form-data">
      <table class="tbl">
        <tbody>
          <tr>
            <th>文字</th>
            <td>
              <input type="text" name="text" class="text-input" value="">
              <input type="number" name="f-size" class="text-input" value="">
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
            <th>位置</th>
            <td>
              <input type="number" name="x" class="text-input" value="">
              <input type="number" name="y" class="text-input" value="">
            </td>
          </tr>
        </tbody>
      </table>
      <button type="submit">合成</button>
    </form>
  </body>

</html>
