<?php
    include_once '../inc/Database.php';
    include_once '../help/Format.php';
    class Register{
        private $db;
        private $format;
        public function __construct(){
            $this->db = new Database();
            $this->format = new Format();
        }
        public function addCustomer($data){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);

            if($name == '' || $address == '' || $city == '' || $country == '' || $zip == '' || $phone == '' || $email == '' || $password == ''){
                $Empty = '<h5 class="text-danger">Field must not be Empty !!</h5>';
                return $Empty;
            }
            $mailquery = "SELECT * FROM shop_register WHERE email = '$email'";
            $mailchk = $this->db->select($mailquery);
            if($mailchk){
                $Empty = '<h5 class="text-danger">Email already Exist Please! anothers Email !!</h5>';
                return $Empty;
            }
            else{
                $query = "INSERT INTO  shop_register (name, address, city, country, zip, phone, email, password) VALUES('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$password')";
                $insert_customer = $this->db->insert($query);
                if($insert_customer){
                    $Empty = '<h5 class="text-success">Registered is Successfully.</h5>';
                    return $Empty;
                }
                else{
                    $Empty = '<h5 class="text-danger">Registered Fail !!</h5>';
                    return $Empty;
                }
            }
        }
        public function customerLogin($email, $password){
            $email = mysqli_real_escape_string($this->db->link, $email);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if($email == '' || $password == ''){
                $Empty = '<h5 class="text-danger">Field must not be Empty !!</h5>';
                return $Empty;
            }
            $query = "SELECT * FROM shop_register WHERE email = '$email' and password = '$password'";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('cusLogin', true);
                Session::set('name', $value['name']);
                Session::set("id", $value['id']);
                header('Location: order_list.php');
                
            }
            else{
                $Empty = '<h5 class="text-danger">Email or Password Not Metched !!</h5>';
                return $Empty;
            }
        }
        public function name(){
            $query = "SELECT * FROM shop_register limit 1";
            $result = $this->db->select($query);
            return $result;
        }
        public function profileView($id){
            $query = "SELECT * FROM shop_register WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateProfile($data, $id){
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);

            if($name == '' || $address == '' || $city == '' || $country == '' || $zip == '' || $phone == '' || $email == ''){
                $Empty = '<h5 class="text-danger">Field must not be Empty !!</h5>';
                return $Empty;
            }
            else{
                $query = "UPDATE shop_register set
                        name = '$name',
                        address = '$address',
                        city = '$city',
                        country = '$country',
                        zip = '$zip',
                        phone = '$phone',
                        email = '$email'
                        WHERE id = '$id'";
                $update_customer = $this->db->insert($query);
                if($update_customer){
                    $Empty = '<h5 class="text-success">Profile Updated is Successfully.</h5>';
                    return $Empty;
                }
                else{
                    $Empty = '<h5 class="text-danger">Profile Updated Fail !!</h5>';
                    return $Empty;
                }
            }
        }
        public function shipAddress($id){
            $query = "SELECT * FROM shop_register WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>