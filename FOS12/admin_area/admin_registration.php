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
    <title>Admin Registration</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="container-fluid m-3">
        <h2 class="text-center mb-5 text-success">Admin Registration</h2>
        <div class="row d-flex justify-content ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username"
                            required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required="required"
                            class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label"> Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Confirm your password" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-success py-2 px-3 border-0 text-light" name="admin_registration"
                            value="Register" onclick="return validateForm();" onclick="return testUsernameValidation();">
                        <p class="mt-2 pt-1">Already have an account?<a href="admin_login.php"
                         class="text-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
    function validateForm() {
      var username = document.getElementById("username").value;
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirm_password").value;
      

      if (username === "" || email === "" || password === "" || confirmPassword === "") {
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
      var username = document.getElementById("username").value;
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
if(isset($_POST['admin_registration'])){
$admin_username=$_POST['username'];
$admin_email=$_POST['email'];
$admin_password=$_POST['password'];
$hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
$conf_admin_password=$_POST['confirm_password'];


//select query
$select_query="select * from admin_table where admin_name='$admin_username' or admin_email='$admin_email';";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
  echo "<script>alert('Admin name or email already exist.');</script>";
}else if($admin_password!=$conf_admin_password){
  echo "<script>alert('Password do not match.');</script>";

}else{
// insert_query

$insert_query="insert into admin_table(admin_name,admin_email,admin_password)
values
('$admin_username','$admin_email','$hash_password')";
$sql_execute = mysqli_query($con,$insert_query);

echo "<script>alert('Registration Successful.');</script>";
echo "<script>window.open('admin_login.php','_self')</script>";
}
}
?>