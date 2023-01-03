<?php
    include_once 'inc/Database.php';
    include_once 'help/Format.php';

    class Cart{
        private $db;
        private $format;
        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }
        public function addCart($qty, $id){
            $qty = $this->format->validation($qty);

            $qty = mysqli_real_escape_string($this->db->link, $qty);
            $product = mysqli_real_escape_string($this->db->link, $id);
            $session = session_id();

            $squery = "SELECT * from shop_post WHERE id='$product'";
            $result = $this->db->select($squery)->fetch_assoc();

            $title = $result['title'];
            $price = $result['price'];
            $image = $result['image'];

            $chquery = "SELECT * from shop_cart WHERE product ='$product' and session = '$session'";
            $chresult = $this->db->select($chquery);
            if($chresult){
                $Empty = '<h5 class="text-danger">Product Already add to Cart !!</h5>';
                return $Empty;
            }
            else{
                $query = "INSERT INTO  shop_cart (session, product, title, price, qty, image) VALUES('$session','$product','$title','$price','$qty','$image')";
                $insert_cart = $this->db->insert($query);
                if($insert_cart){
                    $view = 'View Cart';
                    return $view;
                }
                else{
                    header('Location: index.php');
                } 
            }       
        }
        public function addBuy(){
            $session = session_id();
            $query = "SELECT * from shop_cart where session = '$session' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateCart($id, $qty){
            $qty = mysqli_real_escape_string($this->db->link, $qty);

            $query = "UPDATE shop_cart set
            qty = '$qty'
            WHERE id = '$id'";
            $update_cart = $this->db->update($query);
            if($update_cart){
               header('Location: cart.php');
            }
            else{
                $Empty = '<h5 class="text-danger">Quantity Updated Fail !!</h5>';
                return $Empty;
            }
        }
        public function delCart($delCart){
            $query = "DELETE FROM shop_cart WHERE id='$delCart'";
            $delete_cart = $this->db->delete($query);
            if($delete_cart){
                $Empty = '<h5 class="text-success">Cart Deleted is Successfully.</h5>';
                return $Empty;
            }
            else{
                $Empty = '<h5 class="text-danger">Cart Deleted Fail !!</h5>';
                return $Empty;
            }
                                
        }
        public function notification(){
            $session = session_id();
            $query = "SELECT * FROM shop_cart where session = '$session' order by id desc";
            $notification = $this->db->select($query);
            if($notification){
                $count = mysqli_num_rows($notification);
                $notify = '(<span class="text-danger"> '.$count.' </span>)';
                return $notify;
            }
            else{
                $notify = '(<span class="text-danger"> 0 </span>)';
                return $notify;
            }
        }
        public function delCustomer(){
            $session = session_id();
            $query = "DELETE FROM shop_cart WHERE session = '$session'";
            $this->db->delete($query);
        }
        public function order($id){
            $session = session_id();
            $cquery = "SELECT * FROM shop_cart WHERE session='$session'";
            $result = $this->db->select($cquery);
            if($result){
                while($value = $result->fetch_assoc()){
                    $pdid = $value['product'];
                    $pdname = $value['title'];
                    $qty = $value['qty'];
                    $price = $value['price'] * $qty;
                    $image = $value['image'];
                    
                    $query = "INSERT INTO shop_order (cmid, pdid, pdname, qty, price, image) VALUES('$id','$pdid','$pdname','$qty','$price','$image')";
                    $insert_order = $this->db->insert($query);
                }
            }
        }
        public function showIcon(){
            $query = "SELECT * from shop_cart";
            $result = $this->db->select($query);
            return $result;
        }
        public function orderList($id){
            $query = "SELECT * from shop_order WHERE cmid = '$id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }
        public function orderListAdmin(){
            $query = "SELECT * from shop_order order by date desc";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>