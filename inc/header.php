<?php
    include 'Session.php';
    Session::init();
    
?>
<?php
    include 'Database.php';
    include 'help/Format.php';
    include_once 'class/Cart.php';
    include_once 'class/Register.php';

    $rg = new Register();
    $cart = new Cart();
    $db = new Database();
    $format = new Format();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Store</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="bgb">
    <div class="container">
        <header>
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="index.php"><img src="img//logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="search">
                        <form action="" class="d-inline-flex">
                            <input type="search" placeholder="Search for Product..">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart_box d-inline-flex">
                        <?php
                          $carticon = $cart->showIcon();
                          if($carticon){
                        ?>
                        <a href="cart.php" class="d-inline-flex">
                            <i class="fa fa-cart-plus"></i>
                            
                            <p>Cart <span class="text-danger">
                              <?php
                                $notification = $cart->notification();
                                if(isset($notification)){
                                  echo $notification;
                                }
                            ?></span></p>
                        </a>
                         <?php } ?>
                        <div class="login_icon">
                          <?php  
                            $login = Session::get('cusLogin');
                            $name = Session::get('name');
                          ?>
                          <?php 
                            if($login == true){ ?>
                              <a href="account.php">My Account</a>
                            <?php }  ?>
                          <?php
                              if(isset($_GET['action'])){
                                $delData = $cart->delCustomer();
                                Session::destroy();
                              }
                          ?>
                          <?php
                            if($login == false){ ?>
                                <a href="login.php">Login</a>
                            <?php } else{ ?>
                                <a href="?action=<?php Session::get('id');?>">Logout</a>
                            <?php } ?>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav class="navbar p-0 mt-3 navbar-expand-lg navbar-light bgn">
            <div class="">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="top_brand.php">Top Brands</a>
                  </li>
                  
                  <?php if($login == true){ ?>
                  <li class="nav-item">
                    <a class="nav-link" href="account.php">Profile</a>
                  </li>
                    <?php }?>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        