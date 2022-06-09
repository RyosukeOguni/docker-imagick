<?php
/* Smarty version 3.1.44, created on 2022-05-11 15:56:55
  from '/work/application/views/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.44',
  'unifunc' => 'content_627b5e376fa2f4_48156903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ebe016984bb83e43b21d579677645349f1a3b46' => 
    array (
      0 => '/work/application/views/templates/index.tpl',
      1 => 1652252186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_627b5e376fa2f4_48156903 (Smarty_Internal_Template $_smarty_tpl) {
?><html>

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
<?php }
}
