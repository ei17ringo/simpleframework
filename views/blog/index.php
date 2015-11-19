<?php
    // BlogsControllerのindexを呼び出す
    $BlogsController = new BlogsController($db, $plural_resource);
    $blogs = $BlogsController->index();
    //var_dump($blogs);
?>

<h2>記事一覧</h2>
<div>
  <!-- <a href="new">記事作成</a> -->
  <?php echo link_to('new', '記事作成'); ?>
</div>
<div class="row">
  <div class="col-md-6">
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
  <div class="col-md-6">
    <ul>
      <li>
        カテゴリー１
      </li>
      <li>
        カテゴリー２
      </li>
      <li>
        カテゴリー３
      </li>
      <li>
        カテゴリー４
      </li>
      <li>
        カテゴリー５
      </li>
    </ul>
  </div>
</div>