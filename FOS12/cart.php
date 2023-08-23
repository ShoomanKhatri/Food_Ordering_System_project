<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E Khaja</title>
  <!--bootstrap css link-->
  <!--bootstrap js link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <!--font awesome link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file -->
  <link rel="stylesheet" href="style.css">

  <style>
    .cart_img {
      width: 60px;
      height: 60px;
      object-fit: contain;
    }

    body {
      overflow-x: hidden;
      /* for removing horizontal scrollbar.*/
    }

    .NAV {

      background-color: #1ad1ff;
    }

    .hov:hover {
      font-weight: 1000;
      color: #ff1a8c;
      background-color: ;
      border-radius: 17px;
      transition: 0.2s;
      display: block;
    }

    .hov {
      color: white;
      font-family: Arial, sans-serif;
      font-weight: bold;
    }

    .log {
      background-color: #04AA6D;
      color: white;
      padding: ;
      margin: ;
      border: none;
      cursor: pointer;
      width: ;
      border-radius: 5px 5px 5px 5px;
    }
  </style>

</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        <img src="images/logo5bg.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link  hov" aria-current="page" href="index.php">Home</a>
            </li>


            <li class="nav-item">
              <a class="nav-link hov" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hov" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hov" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hov" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                  <?php cart_item(); ?>
                </sup></a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Total Price:<?php total_cart_price(); ?>/-</a>
            </li> -->

          </ul>

        </div>
      </div>
    </nav>

    <!-- calling cart function -->
    <?php cart(); ?>

    <!-- second child -->
    <nav class="nav navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">


        <?php
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link mx-2' href='#'>Welcome Guest </a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link mx-2' href='#'>Welcome " . $_SESSION['username'] . "</a>
        </li>";
        }
        if (!isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
            <a class='nav-link' href='./user_login.php'> Login</a>
          </li>";
        } else {
          echo "<li class='nav-item'>
            <a class='nav-link mx-2' href='./users_area/logout.php'> Logout</a>
          </li>";

        }
        ?>

      </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center text-success"><span style="color:orange; font-weight:bold;"> E </span>khaja Store</h3>
      <p class="text-center">Choose the Best, Savor the Rest!</p>
    </div>
  </div>

  <!-- Fourth child table  -->
  <div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">


          <!-- php code to display dynamic data -->

          <?php
          global $con;
          $get_ip_add = getIPAddress();
          $total_price = 0;
          $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {
            echo " <thead>
          <tr>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Remove</th>
            <th colspan='2'>Operations</th>
          </tr>
        </thead>
        <tbody>";


            while ($row = mysqli_fetch_array($result)) {
              $product_id = $row['product_id'];
              $select_products = "select * from `products` where product_id='$product_id'";
              $result_products = mysqli_query($con, $select_products);
              while ($row_product_price = mysqli_fetch_array($result_products)) {
                $product_price = array($row_product_price['product_price']);
                $price_table = $row_product_price['product_price'];
                $product_title = $row_product_price['product_title'];
                $product_image1 = $row_product_price['product_image1'];
                $product_values = array_sum($product_price);
                $total_price += $product_values;

                ?>

                <tr>
                  <td>
                    <?php echo $product_title; ?>
                  </td>
                  <td><img src="admin_area/product_images/<?php echo $product_image1 ?>" class="cart_img" alt=""></td>
                  <td><input type="text" name="qty" placeholder="Max limit is 500" id="" class="form-input w-52"></td>

                  <?php

                  $maxCartItemLimit=500;
                  $get_ip_add = getIPAddress();
                  if (isset($_POST['update_cart'])) {
                    $quantities = $_POST['qty'];
                    if ($quantities > $maxCartItemLimit) {
                      echo "<p class='text-danger'>Quantity exceeds maximum limit of $maxCartItemLimit.</p>";
                    } else {
                      $update_cart = "update cart_details set quantity=$quantities where ip_address='$get_ip_add';";
                      $result_products_quantity = mysqli_query($con, $update_cart);
                      $total_price = $total_price * $quantities;
                    }
                  }
                  ?>

                  <td>
                    <?php echo $price_table ?>
                  </td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>" id=""></td>
                  <td>
                    <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                    <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                    <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                  </td>
                </tr>
                </tbody>

                <?php
              }
            }
          } else {
            echo "<h2 class='text-center text-danger'>Cart is empty.</h2>";
          }
          ?>
        </table>

        <!-- subtotal -->
        <div class="d-flex mb-5">

          <?php
          global $con;
          $get_ip_add = getIPAddress();
          $cart_query = "select * from `cart_details` where ip_address='$get_ip_add'";
          $result = mysqli_query($con, $cart_query);
          $result_count = mysqli_num_rows($result);
          if ($result_count > 0) {
            echo "<h4 class='px-4'>Subtotal:<strong class='text-info'>
           $total_price  /-
        </strong> </h4>
        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
      <button class='bg-secondary p-3 py-2 border-0'>
      <a href='users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
          } else {
            echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
          }
          if (isset($_POST['continue_shopping'])) {
            echo "<script>window.open('index.php','_self')</script>";
          }
          ?>

        </div>
    </div>
  </div>
  </form>

  <!-- function to remove item  -->
  <?php
  function remove_cart_item()
  {
    global $con;
    if (isset($_POST['remove_cart'])) {
      foreach ($_POST['removeitem'] as $remove_id) {
        echo $remove_id;
        $delete_query = "delete from cart_details where product_id=$remove_id;";
        $run_delete = mysqli_query($con, $delete_query);
        if ($run_delete) {
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }

    }
  }
  echo $remove_item = remove_cart_item();
  ?>


  <!-- last child  -->
  <!-- include footer -->
  <?php include("includes/footer.php") ?>
  </div>

</body>

</html>