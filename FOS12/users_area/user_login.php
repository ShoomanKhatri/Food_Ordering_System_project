<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Login</title>
  <link rel="stylesheet" href="style.css">

  <!--bootstrap css link-->
  <!--bootstrap js link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

  <!-- css file -->
  <link rel="stylesheet" href="style.css" />

  <style>
    body {
      overflow-x: hidden;
      /* for removing horizontal scrollbar.*/
    }
    form{
      display:grid;
      grid-template-columns: 1fr;
  grid-gap: 1rem;
  border: 10px;
  border-color:green; 
    }
  </style>
</head>

<body>
  <div class="container-fluid my-3">
    <h2 class="text-center text-info">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post">

          <!-- username field -->
          <div class="form-outline mb-4 form">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
              autocomplete="off" required="required" name="user_username" />
          </div>

          <!-- password field -->
          <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
              autocomplete="off" required="required" name="user_password" />
          </div>
          <div class="mt-4 pt-2">
            <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
            <p class="small fw-bold mt-2 pt-1 mb-0">Dont have an account yet?
              <a href="user_registration.php" class="text-succes"> Register</a>
            </p>


        </form>
      </div>
    </div>
  </div>

</body>

</html>

<?php
if (isset($_POST['user_login'])) {
  $user_username = $_POST['user_username'];
  $user_password = $_POST['user_password'];

  $select_query = "select * from `user_table` where user_name='$user_username'";
  $result = mysqli_query($con, $select_query);
  $row_count = mysqli_num_rows($result);
  $row_data = mysqli_fetch_assoc($result);
  $user_ip = getIPAddress();

  // cart item 
  $select_query_cart = "select * from `cart_details` where ip_address='$user_ip'";
  $select_cart = mysqli_query($con, $select_query_cart);
  $row_count_cart = mysqli_num_rows($select_cart);
  
  if ($row_count > 0) {
    $_SESSION['username']=$user_username;
    if (password_verify($user_password, $row_data['user_password'])) {
      // echo "<script>alert('Logged in Successfully')</script>";
      if ($row_count == 1 and $row_count_cart == 0) {
        $_SESSION['username']=$user_username; 
        echo "<script>alert('Logged in Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>"; //alt profile.php
      } else {
        $_SESSION['username']=$user_username;
        echo "<script>alert('Logged in Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";   // alt payment.php
      }

    } else {
      echo "<script>alert('Invalid Credentials')</script>";
    }

  } else {
    echo "<script>alert('Invalid Credentials')</script>";
  }
}
?>