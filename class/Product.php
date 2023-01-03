<?php
    include_once 'inc/Database.php';
    include_once 'help/Format.php';

    class Product{
        private $db;
        private $format;
        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }
        public function addProduct($data, $file){
            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $content = mysqli_real_escape_string($this->db->link, $data['content']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
        
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($title == '' || $category == '' || $brand == '' || $content == '' || $price == '' || $type == ''){
                $Empty = '<h5 class="text-danger">Product Field must not be Empty !!</h5>';
                return $Empty;
            }
            elseif ($file_size >99048567) {
                $Empty = '<h5 class="text-danger">Image Size should be less then 5MB!</h5>';
                    return $Empty;
            }
            elseif (in_array($file_ext, $permited) === false) {
                $Empty = '<h5 class="text-danger">You can upload only!'.implode(', ', $permited).'</h5>';
                    return $Empty;
            }
            else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO  shop_post (title, category, brand, content, price, image, type) VALUES('$title', '$category', '$brand', '$content', '$price', '$uploaded_image', '$type')";
                $insert_product = $this->db->insert($query);
                if($insert_product){
                    $Empty = '<h5 class="text-success">Product add is Successfully.</h5>';
                    return $Empty;
                }
                else{
                    $Empty = '<h5 class="text-danger">Product add Fail !!</h5>';
                    return $Empty;
                }
                
            }
        }
        public function productList($id){
            $query = "SELECT shop_post.*, shop_category.name, shop_brand.brand
                FROM shop_post
                INNER JOIN shop_category
                ON shop_post.category = shop_category.id
                INNER JOIN shop_brand
                ON shop_post.brand = shop_brand.id
                ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function productView($id){
            $query = "SELECT * from shop_post WHERE id='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateProduct($data, $file, $id){
            $title = mysqli_real_escape_string($this->db->link, $data['title']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $content = mysqli_real_escape_string($this->db->link, $data['content']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
        
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($title == '' || $category == '' || $brand == '' || $content == '' || $price == '' || $type == ''){
                $Empty = '<h5 class="text-danger">Product Field must not be Empty !!</h5>';
                return $Empty;
            }
            else{
                if(!empty($file_name)){
                    if ($file_size >99048567) {
                        $Empty = '<h5 class="text-danger">Image Size should be less then 5MB!</h5>';
                            return $Empty;
                    }
                    elseif (in_array($file_ext, $permited) === false) {
                        $Empty = '<h5 class="text-danger">You can upload only!'.implode(', ', $permited).'</h5>';
                            return $Empty;
                    }
                    else{
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "UPDATE shop_post set
                        title = '$title',
                        category = '$category',
                        brand = '$brand',
                        content = '$content',
                        price = '$price',
                        image = '$uploaded_image',
                        type = '$type'
                        WHERE id = '$id'";
        
                        $update_product = $this->db->update($query);
                        if($update_product){
                            $Empty = '<h5 class="text-success">Product Updated is Successfully.</h5>';
                            return $Empty;
                        }
                        else{
                            $Empty = '<h5 class="text-danger">Product Updated Fail !!</h5>';
                            return $Empty;
                        }
                        
                    }
                }
                else{
                        $query = "UPDATE shop_post set
                        title = '$title',
                        category = '$category',
                        brand = '$brand',
                        content = '$content',
                        price = '$price',
                        type = '$type'
                        WHERE id = '$id'";
        
                        $update_product = $this->db->update($query);
                        if($update_product){
                            $Empty = '<h5 class="text-success">Product Updated is Successfully.</h5>';
                            return $Empty;
                        }
                        else{
                            $Empty = '<h5 class="text-danger">Product Updated Fail !!</h5>';
                            return $Empty;
                        }
                }
            }
        }
        public function delProduct($delproduct){
            $query = "DELETE FROM shop_post WHERE id='$delproduct'";
            $delete_product = $this->db->delete($query);
            if($delete_product){
                $Empty = '<h5 class="text-success">Product Deleted is Successfully.</h5>';
                return $Empty;
            }
            else{
                $Empty = '<h5 class="text-danger">Product Deleted Fail !!</h5>';
                return $Empty;
            }
                                
        }
        public function productFeture($pd){
            $query = "SELECT * from shop_post WHERE type = '2' order by id desc limit 4";
            $result = $this->db->select($query);
            return $result;
        }
        public function productGeneral($pd){
            $query = "SELECT * from shop_post WHERE type = '1' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function productDls($id){
            /*
            $query = "SELECT p.*, c.name, b.brand
            FROM shop_post as p, shop_category as c, shop_brand as b
            WHERE p.id = c.id AND p.id = b.id AND p.id = '$id'";
            */
            $query = "SELECT shop_post.*, shop_category.name, shop_brand.brand
                FROM shop_post
                INNER JOIN shop_category
                ON shop_post.category = shop_category.id
                INNER JOIN shop_brand
                ON shop_post.brand = shop_brand.id WHERE shop_post.id = '$id'";
                
            $result = $this->db->select($query);
            return $result;
        }
        public function oppo(){
            $query = "SELECT * from shop_post WHERE brand = '2' order by id desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function realmi(){
            $query = "SELECT * from shop_post WHERE brand = '1' order by id desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function dell(){
            $query = "SELECT * from shop_post WHERE brand = '5' order by id desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function hp(){
            $query = "SELECT * from shop_post WHERE brand = '6' order by id desc limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function byCategory($id){
            $query = "SELECT * from shop_post WHERE category = '$id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
    }
      
?>