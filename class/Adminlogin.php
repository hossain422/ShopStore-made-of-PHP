<?php
    include '../inc/Session.php';
    Session::checkLogin();

    include '../inc/Database.php';
    include '../help/Format.php';
    
    class Adminlogin{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function adminLogin($username, $password){
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);

            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);
            if(empty($username)){
                $loginEmpty = 'Field must not be Empty!!';
                return $loginEmpty;
            }
            else{
                $query = "SELECT * FROM shop_admin WHERE username = '$username' AND password = '$password'";                $result = $this->db->select($query);
                if($result != false){
                    $value = mysqli_fetch_array($result);
                    $row = mysqli_num_rows($result);
                    if($row > 0){
                        Session::set('login', true);
                        Session::set('username', $value['username']);
                        Session::set('userId', $value['id']);
                        Session::set('userRole', $value['role']);

                        header('Location: index.php');
                    }
                    else{
                        $loginEmpty = '<h5 class="text-danger">No Result Founded !!</h5>';
                        return $loginEmpty;
                    }
                }
                else{
                    $loginEmpty = '<h5 class="text-danger">Username or Password not Matched !!</h5>';
                    return $loginEmpty;
                }
            }
        }
    }
?>
