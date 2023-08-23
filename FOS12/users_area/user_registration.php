<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User-registration</title>
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
</head>

<body>
  <div class="container-fluid my-3">
    <h2 class="text-center text-success">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">

          <!-- username field -->
          <div class="form-outline mb-4">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
              autocomplete="off" required="required" name="user_username" />
          </div>

          <!-- email field -->
          <div class="form-outline mb-4">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off"
              required="required" name="user_email" />
          </div>


          <!-- password field -->
          <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
              autocomplete="off" required="required" name="user_password" />
          </div>

          <!-- confirm password field -->
          <div class="form-outline mb-4">
            <label for="conf_user_password" class="form-label"> Confirm Password</label>
            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password"
              autocomplete="off" required="required" name="conf_user_password" />
          </div>

          <!-- address field  -->
          <div class="form-outline mb-4">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
              autocomplete="off" required="required" name="user_address" />
          </div>

          <!-- contact field  -->
          <div class="form-outline mb-4">
            <label for="user_contact" class="form-label">Contact</label>
            <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number"
              autocomplete="off" required="required" name="user_contact" />
          </div>

          <div class="mt-4 pt-2">
            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register"
              onclick="return validateForm(); return testUsernameValidation();">
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
              <a href="user_login.php" class="text-danger"> Login</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script>
    function validateForm() {
      var username = document.getElementById("user_username").value;
      var email = document.getElementById("user_email").value;
      var password = document.getElementById("user_password").value;
      var confirmPassword = document.getElementById("conf_user_password").value;
      var address = document.getElementById("user_address").value;
      var contact = document.getElementById("user_contact").value;

      if (username === "" || email === "" || password === "" || confirmPassword === "" || address === "" || contact === "") {
        alert("Please fill in all fields.");
        return false;
      }
      if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
      }

      if (!validateUsername(username)) {
        alert("Username must be at least 4 characters long and contain only letters with numbers.");
        return false;
      }

      if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      return true;
    }

    function validateEmail(email) {
      var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; // Basic email pattern
      return pattern.test(email);
    }

    function validateUsername(username) {
      var pattern = /^(?=.*[a-zA-Z])[a-zA-Z0-9]{4,}$/; // At least one letter, only letters and numbers, minimum length of 4
      return pattern.test(username);
    }

    function testUsernameValidation() {
      var username = document.getElementById("user_username").value;
      var isValid = validateUsername(username);

      if (isValid) {
        alert("Username is valid.");
      } else {
        alert("Username is not valid.");
      }
    }


  </script>

</body>

</html>

<!-- php  code -->
<?php
if (isset($_POST['user_register'])) {
  $user_username = $_POST['user_username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
  $conf_user_password = $_POST['conf_user_password'];
  $user_address = $_POST['user_address'];
  $user_contact = $_POST['user_contact'];
  $user_ip = getIPAddress();

  //select query
  $select_query = "select * from user_table where user_name='$user_username' or user_email='$user_email';";
  $result = mysqli_query($con, $select_query);
  $rows_count = mysqli_num_rows($result);
  if ($rows_count > 0) {
    echo "<script>alert('Username or email already exist.');</script>";
  } else if ($user_password != $conf_user_password) {
    echo "<script>alert('Password do not match.');</script>";

  } else {
    // insert_query
    $insert_query = "insert into user_table(user_name,user_email,user_password,user_ip,user_address,user_mobile)
values
('$user_username','$user_email','$hash_password','$user_ip','$user_address','$user_contact')";
    $sql_execute = mysqli_query($con, $insert_query);

    echo "<script>alert('Registered Successfully')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
  }
}
?>