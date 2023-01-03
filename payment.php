<?php include 'inc/header.php'; ?>

<?php
    include_once 'class/Register.php';
    $rg = new Register();
     
    $login = Session::get('cusLogin');
    if($login == false){
        header('Location:login.php');
    }

?>
<style>
    .payment{
        margin: 0 auto;
        border: 1px solid #ddd;
        width: 400px;
        text-align: center;
        height: 300px;
    }
    .payment h4{
        border-bottom: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 40px;
    }
    .payment a{
        text-decoration: none;
        color: #fe5800;
        border: 1px solid #CC3636;
        padding: 10px;
        margin: 10px;
        font-weight: 700;
    }
</style>
        <div class="title">
            <h2>Payment Option</h2>
        </div>

        <div class="container">
            <div class="payment">
                <h4>Choose Payment Option</h4>
                <a href="payment_online.php">Online Payment</a>
                <a class="mb-5" href="payment_offline.php">Offline Payment</a>
                <a class="mt-5 d-block" href="cart.php">Go Back</a>
            </div>
        </div>
    </div>
    
    <?php include 'inc/footer.php'; ?>

