<?php
    // BlogsControllerのindexを呼び出す
    $BlogsController = new BlogsController($db, $plural_resource);
    if(!isset($id)){
      $id = null;
    }
    $blogs = $BlogsController->index($id);

    header('Location:/blog/blog/index');
?>