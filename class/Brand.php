<?php
    include_once '../inc/Database.php';
    include_once '../help/Format.php';
  
    class Brand{
        private $db;
        private $format;
        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }
        public function addBrand($name){
            $name = $this->format->validation($name);

            $name = mysqli_real_escape_string($this->db->link, $name);
            if(empty($name)){
                $Empty = '<h5 class="text-danger">Brand add is Successfully.</h5>';
                return $Empty;
            }
            else{
                $query = "INSERT INTO  shop_brand (brand) VALUES('$name')";
                $insert_brand = $this->db->insert($query);
                if($insert_brand){
                    $Empty = '<h5 class="text-success">Add Brand is Successfully.</h5>';
                    return $Empty;
                }
                else{
                    $Empty = '<h5 class="text-danger">Brand add Fail !!</h5>';
                    return $Empty;
                }
                
            }
        }
        public function brandList($brand){
            $query = "SELECT * FROM  shop_brand ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function brandShow($id){
            $query = "SELECT * FROM  shop_brand WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateBrand($name, $id){
            $name = $this->format->validation($name);

            $name = mysqli_real_escape_string($this->db->link, $name);
            if(empty($name)){
                $Empty = '<h5 class="text-danger">Brand Updated is Successfully.</h5>';
                return $Empty;
            }
            else{
                $query = "UPDATE shop_brand set
                brand = '$name'
                WHERE id = '$id'";
                $update_brand = $this->db->update($query);
                if($update_brand){
                    $Empty = '<h5 class="text-success">Brand Updated is Successfully.</h5>';
                    return $Empty;
                }
                else{
                    $Empty = '<h5 class="text-danger">Brand add Fail !!</h5>';
                    return $Empty;
                }
                
            }
        }



        public function delBrand($delbrand){
            $query = "DELETE FROM shop_brand WHERE id='$delbrand'";
            $delete_brand = $this->db->delete($query);
            if($delete_brand){
                $Empty = '<h5 class="text-success">Brand Deleted is Successfully.</h5>';
                return $Empty;
            }
            else{
                $Empty = '<h5 class="text-danger">Brand Deleted Fail !!</h5>';
                return $Empty;
            }
                                
        }
    }
?>