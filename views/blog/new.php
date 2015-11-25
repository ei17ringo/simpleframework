<?php
    $BlogsController = new BlogsController($db, $plural_resource);
    $blog=$BlogsController->_new($_POST);
?>

<div class="col-md-4">
  <form action="" method="post">
    <div class="form-group">
      <h4>タイトル</h4>
      <input type="text" name="title" class="form-control" placeholder="タイトルを入力して下さい">
    </div>
    <div class="form-group">
      <h4>カテゴリー</h4>
      <select name="category_id">
          <option value="1">恋愛</option>
          <option value="2">料理</option>
          <option value="3">生活・ライフスタイル</option>
          <option value="4">スマホ・携帯</option>
      </select>
    </div>
    <div>
      <h4>内容</h4>
      <textarea name="body" class="form-control" rows="3"></textarea>
    </div>
    <div>
      <input type="submit" value="記事投稿">
    </div>
  </form>
</div>
