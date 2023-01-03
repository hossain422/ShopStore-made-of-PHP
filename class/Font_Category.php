<?php
    include_once 'inc/Database.php';
    include_once 'help/Format.php';
  
    class Category{
        private $db;
        private $format;
        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }
        public function addCategory($name){
            $name = $this->format->validation($name);

            $name = mysqli_real_escape_string($this->db->link, $name);
            if(empty($name)){
                $Empty = '<h5 class="text-danger">Category add is Successfully.</h5>';
                return $Empty;
            }
            else{
                $query = "INSERT INTO  shop_category (name) VALUES('$name')";
                $insert_category = $this->db->insert($query);
                if($insert_category){
                    $Empty = '<h5 class="text-success">Add Category is Successfully.</h5>';
                    return $Empty;
                }
                else{
                    $Empty = '<h5 class="text-danger">Category add Fail !!</h5>';
                    return $Empty;
                }
                
            }
        }
        public function categoryList($list){
            $query = "SELECT * FROM  shop_category ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function details(){
            $query = "SELECT * FROM  shop_category ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function CategoryShow($id){
            $query = "SELECT * FROM  shop_category WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateCategory($name, $id){
            $name = $this->format->validation($name);

            $name = mysqli_real_escape_string($this->db->link, $name);
            if(empty($name)){
                $Empty = '<h5 class="text-danger">Category Update is Successfully.</h5>';
                return $Empty;
            }
            else{
                $query = "UPDATE shop_category set
                name = '$name'
                WHERE id = '$id'";
                $update_category = $this->db->update($query);
                if($update_category){
                    $Empty = '<h5 class="text-success">Category Updated is Successfully.</h5>';
                    return $Empty;
                }
                else{
                    $Empty = '<h5 class="text-danger">Category add Fail !!</h5>';
                    return $Empty;
                }
                
            }
        }
        public function delCategory($delcategory){
            $query = "DELETE FROM shop_category WHERE id='$delcategory'";
            $delete_category = $this->db->delete($query);
            if($delete_category){
                $Empty = '<h5 class="text-success">Category Deleted is Successfully.</h5>';
                return $Empty;
            }
            else{
                $Empty = '<h5 class="text-danger">Category Deleted Fail !!</h5>';
                return $Empty;
            }
                                
        }
    }
?>