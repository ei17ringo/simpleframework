<?php
    // htmlのaタグを生成する関数link_to
    function link_to($path, $str) {
        $a_tag = sprintf('<a href="%s">%s</a>',
            $path,
            $str
        );

        return $a_tag;
    }


    //ページ番号と、総データ数を渡して、ページングに必要なデータを返す関数
    //引数　$page:現在のページ番号 $total_data_number:総データ数
    function pager($page,$total_data_number){

    	//1ページに表示する件数
    	$data_number_per_page = 5;

    	if ($page == ''){
	      $page =1;
	    }

	    $page = max($page,1);

	    $maxPage = ceil($total_data_number / $data_number_per_page);
	    $page = min($page, $maxPage);

	    $start = ($page - 1) * $data_number_per_page;
	    $start = max(0, $start);
	    $end = $start+$data_number_per_page;

	    $return['page'] = $page;
	    $return['maxPage'] = $maxPage;
	    $return['start'] = $start;
	    $return['end'] = $end;

	    return $return;
    }
?>
