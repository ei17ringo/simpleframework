<?php
    // BlogsControllerのindexを呼び出す
    $BlogsController = new BlogsController($db, $plural_resource);
    if(!isset($id)){
      $id = null;
    }
    $blogs = $BlogsController->index($id);
    //var_dump($blogs);

    //カテゴリーデータを全て配列に保存しておく
    while ($category = mysqli_fetch_assoc($blogs['categories'])): 
      //配列として1データずつ追加保存
      $categories[]=$category;
    endwhile;

    foreach ($categories as $cat_each) {
      if ($cat_each['id'] == $id){
        $title = $cat_each['title'].'の記事一覧';
      }
    }
?>

<h2>記事一覧</h2>
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" placeholder="Search for...">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>
<div>
  <!-- <a href="new">記事作成</a> -->
  <?php echo link_to('new', '記事作成'); ?>
</div>
<div class="row">
  <div class="col-xs-6">
    <?php while ($blog = mysqli_fetch_assoc($blogs['blogs'])): ?>
        <ul>
          <li>
            <?php echo $blog['title']; ?> : 
            【<?php echo link_to('show/' . $blog['id'], '詳細'); ?>】/
            【<?php echo link_to('edit/' . $blog['id'], '編集'); ?>】/
            【<?php echo link_to('delete/' . $blog['id'], '削除'); ?>】
          </li>
        </ul>
    <?php endwhile; ?>
  </div>
  <div class="col-xs-6">
    <ul>
      <?php while ($category = mysqli_fetch_assoc($blogs['categories'])): ?>
      <li>
        <?php echo link_to('/blog/blog/index/'.$category['id'] ,$category['title']); ?>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
</div>