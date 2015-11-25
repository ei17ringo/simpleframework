<?php
    $BlogsController = new BlogsController($db, $plural_resource);
    $blog = $BlogsController->edit($id, $_POST);
    var_dump($_POST);
?>

<div>
  <form action="" method="post">
    <div>
      <input type="text" name="title" value="<?php echo $blog['title']; ?>">
    </div>
    <div class="form-group">
      <h4>カテゴリー</h4>
      <select name="category_id">
          <option value="1" <?php if($blog['category_id']==1){echo 'selected';} ?>>恋愛</option>
          <option value="2" <?php if($blog['category_id']==2){echo 'selected';} ?>>料理</option>
          <option value="3" <?php if($blog['category_id']==3){echo 'selected';} ?>>生活・ライフスタイル</option>
          <option value="4" <?php if($blog['category_id']==4){echo 'selected';} ?>>スマホ・携帯</option>
      </select>
    </div>
    <div>
      <textarea name="body"><?php echo $blog['body']; ?></textarea>
    </div>

    <div>
      <input type="submit" value="編集完了">
    </div>
  </form>
</div>



















