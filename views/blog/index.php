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

    $title = '記事一覧';

    foreach ($categories as $cat_each) {
      if ($cat_each['id'] == $id){
        $title = $cat_each['title'].'の記事一覧';
        break;
      }
    }


    // //ページ番号を取得する
    // $page = $_REQUEST['page'];
    // if ($page == ''){
    //   $page =1;
    // }

    // $page = max($page,1);

    // 最終ページ番号を取得する
    //カテゴリーデータを全て配列に保存しておく
    $cnt = 0;
    while ($blog_each = mysqli_fetch_assoc($blogs['blogs'])): 
      //配列として1データずつ追加保存
      $blog_array[]=$blog_each;
      $cnt++;
    endwhile;

    //ページング
    $pager=pager($_REQUEST['page'],$cnt);
    $page = $pager['page'];
    $maxPage = $pager['maxPage'];
    $start = $pager['start'];
    $end = $pager['end'];

    // $maxPage = ceil($cnt / 5);
    // $page = min($page, $maxPage);

    // $start = ($page - 1) * 5;
    // $start = max(0, $start);

    $blog_for_display = array();
    //表示したいブログ記事だけを抽出
    // $end = $start+5;
    for ($i=$start; $i < $end; $i++) { 
      $blog_for_display[]=$blog_array[$i];
    }
?>

<h2><?php echo $title; ?></h2>
<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" onclick="location.href='/blog/blog/index?search='+document.getElementById('search_text').value;">Go!</button>
      </span>
      <input type="text" id="search_text" class="form-control" placeholder="Search for...">
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>
<div>
  <!-- <a href="new">記事作成</a> -->
  <?php echo link_to('new', '記事作成'); ?>
</div>
<div class="row">
  <div class="col-xs-6">
    <?php foreach ($blog_for_display as $blog_each) { ?>
        <ul>
          <li>
            <?php echo $blog_each['title']; ?> : 
            【<?php echo link_to('/blog/blog/show/' . $blog_each['id'], '詳細'); ?>】/
            【<?php echo link_to('/blog/blog/edit/' . $blog_each['id'], '編集'); ?>】/
            【<?php echo link_to('/blog/blog/delete/' . $blog_each['id'], '削除'); ?>】
          </li>
        </ul>
    <?php } ?>
    <div>
      <ul class="pager">
        <li>
          <?php if ($page > 1){ ?>
            <a href="/blog/blog/index/?page=<?php echo $page-1; ?>">前のページ</a>
          <?php }else{ ?>  
            前のページ
          <?php } ?>
        </li>
        <li>
          <?php if ($page < $maxPage){ ?>
            <a href="/blog/blog/index/?page=<?php echo $page+1; ?>">次のページ</a>
          <?php }else{ ?>  
            次のページ
          <?php } ?>  
        </li>
      </ul>
    </div>
  </div>
  <div class="col-xs-6">
    <ul>
      <?php foreach ($categories as $cat_each) { ?>
      <li>
        <?php echo link_to('/blog/blog/index/'.$cat_each['id'] ,$cat_each['title']); ?>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>