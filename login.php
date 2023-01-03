<?php include 'inc/header.php'; ?>
<?php 
    $login = Session::get('cusLogin');
    if($login == true){
        header('Location: payment.php');
    }
    include_once 'class/Register.php';
    $rg = new Register();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = $rg->customerLogin($email, $password);
    }
?>

        <div class="row">
            <div class="col-md-4">
                <div class="signin">
                    <h4>Existing Customer</h4>
                    <?php
                        if(isset($login)){
                            echo $login;
                        }
                    ?>
                    <form action="" method="post">
                        <input type="email" name="email" placeholder="Email@gmail.com" id="">
                        <input type="password" name="password" placeholder="******" id="">
                        <span>Forgotten Password.? <a href="">Click Here</a></span>
                        <input type="submit" value="Sign In">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="signup">
                    <h4>Sign Up For New Account</h4>
                    <?php 
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
                            $add_customer = $rg->addCustomer($_POST);
                        }
                        if(isset($add_customer)){
                            echo $add_customer;
                        }
                    ?>
                    <form action="" method="post">
                        <input type="text" name="name" placeholder="Name">
                        <input type="text" name="address" placeholder="Address">
                        <input type="text" name="city" placeholder="City">
                        <input type="text" name="country" placeholder="Country">
                        <input type="text" name="zip" placeholder="Zip-Code">
                        <input type="text" name="phone" placeholder="Phone">
                        <input type="email" name="email" placeholder="Email@gmail.com" id="">
                        <input type="password" name="password" placeholder="******" id="">
                        <span><input type="checkbox" name="" id=""> By clicking 'Create Account' you agree to the <a href="">Terms & Conditions.</a></span>
                        <input type="submit" name="submit" value="Create Account">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'inc/footer.php'; ?>

