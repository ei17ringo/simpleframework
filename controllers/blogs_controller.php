<?php
    class BlogsController {
        // データなどを処理する (controller)

        // プロパティ
        private $db;
        private $plural_resource;

        // マジックメソッド (引数ふたつ)
        public function __construct($db, $plural_resource) {
            $this->db = $db;
            $this->plural_resource = $plural_resource;
        }

        public function index($category_id) {
            var_dump($_GET['search']);
            // Blogクラスから$Blogインスタンス生成
            $Blog = new Blog($this->plural_resource);

            $sql = $Blog->findAll($category_id); // 'SELECT * FROM blogs'という文字列が返ってくる

            $blogs = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
            //var_dump($blogs);
            //var_dump('test');
            $Category = new Category('categories');
            $cat_sql = $Category->findAll();
            //var_dump($cat_sql);
            $categories = mysqli_query($this->db,$cat_sql) or die(mysqli_error($this->db));
            //var_dump($categories);
            $return['blogs'] = $blogs;
            $return['categories'] = $categories;

            return $return;
        }

        public function show($id) {
            $Blog = new Blog($this->plural_resource);
            $sql = $Blog->findById($id);

            $blog = mysqli_query($this->db, $sql) or die(mysqli_error($this->db));
            return $blog;
        }

        public function _new($blog) {
            // 予約語
            // プログラミング言語には、言語ごとにあらかじめ使われている変数や関数の名前があり、
            // 同じ名前を開発者が使用することができません。
            // こういった名前のことを予約語と言う。

            if (!empty($blog)) {
                $Blog = new Blog($this->plural_resource);
                $sql = $Blog->create($blog);

                mysqli_query($this->db, $sql) or die(mysqli_error($this->db));

                header("Location: index");
            }else{
                $return['categories'] = $categories;

                return $return;

            }
        }

        public function edit($id, $blog) {

            
            if (empty($blog)) {
                // ページに初めて訪れた際
                $blog_record = $this->show($id);
                $blog = mysqli_fetch_assoc($blog_record);

                return $blog;

            } elseif (!empty($blog)) {
                // 情報を編集し送信した際
                $id = array('id' => $id);
                $blog = array_merge($id, $blog);

                $Blog = new Blog($this->plural_resource);
                $sql = $Blog->update($blog);

                mysqli_query($this->db, $sql) or die(mysqli_error($this->db));

                header("Location: ../index");
            }
            
        }

        public function delete($id) {
            $Blog = new Blog($this->plural_resource);
            $sql = $Blog->destroy($id);

            mysqli_query($this->db, $sql) or die(mysqli_error($this->db));

            header("Location: ../index");
        }
    }
?>
















