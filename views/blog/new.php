<?php
    $BlogsController = new BlogsController($db, $plural_resource);
    $BlogsController->_new($_POST);
?>

<div class="col-md-4">
  <form action="" method="post">
    <div class="form-group">
      <h4>タイトル</h4>
      <input type="text" name="title" class="form-control" placeholder="タイトルを入力して下さい">
    </div>
    <div>
      <h4>内容</h4>
      <textarea name="body"></textarea>
    </div>
    <div>
      <input type="submit" value="記事投稿">
    </div>
  </form>
</div>
