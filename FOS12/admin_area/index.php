<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
if (!isset($_SESSION['IsLogin'])) {
    echo "<script>window.open('admin_login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!--bootstrap css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--bootstrap js link-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- font awesome link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css">


    <style>
        .textcolor {
            color: #ff4000;
        }

        .logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .admin_image {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .NAV {
            opacity: 1;

            background-color: #b3e6b3;
        }

        .footer {
            flex-shrink: 0;
            Position: relative;
            bottom: 0;
            width: 100%;
            height: 80px;
            margin-top:50%;
            line-height: 60px;
            /* Set the line-height to the height of the footer for vertical centering */
            text-align: center;
        }

        body {
            overflow-x: hidden;

        }

        .user_image {
            width: 100px;
            object-fit: contain;
        }

        .hamburger-menu {
            position: relative;
            display: inline-block;
        }

        .menu-button {
            cursor: pointer;
            display: inline-block;
            padding: 15px;
        }

        .bar {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background-color: #333;
            transition: 0.4s;
        }

        #menu-toggle {
            display: none;
        }

        .menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 200px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
            display: none;
        }

        #menu-toggle:checked~.menu {
            display: block;
        }

        .button-container {
            padding: 10px;
            background-color: #04AA6D;
        }

        .btn1 {
            background-color: #ff4000;
            border-radius: 15px;
        }

        .hov3:hover {
            background-color: #04AA6D;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .hov4 {
            background-color: #04AA6D;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            margin: 0 auto;
        }
        .hov4:hover{
            background-color:#037c50;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 5px;
            margin: 0 auto;
        }
        .hov5:hover{
            background-color: gray;
            border: none;
            cursor: pointer;
            color:black;
            font-weight: bold;
            font-size: 18px;
            border-radius: 5px;

        }

        body {
            background-image: url('../images/foodbg2.avif');
            background-repeat: no-repeat;
            background-size: cover;
            object-fit: contain;
            width: 100%;
            /* Adjust the width as needed */
            height: 100vh;
            /* Adjust the height as needed */
            margin: 0;
            padding: 0;
            opacity: 0.9;
            z-index: 1;
        }
        .heading{
            font-weight: bolder;
            color: #ff0066;
        }
        
    </style>
</head>
</body>
<!-- navbar -->
<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light NAV">
        <div class="container-fluid">
            <img src="../images/logo5bg.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg ">
                <ul class="navbar-nav">

                    <li class="nav-item ">
                        <a href="index.php" class="nav-link ">
                            <h3 class="textcolor text-left hov3"> Home</h3>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="admin_logout.php" class="nav-link ">
                            <h3 class="textcolor hov3 hov4"> Logout</h3>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </nav>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2 text-success">Manage Details</h3>
    </div>
    <!-- Third child -->
    <div class="row">
        <div class="col-md-3 bg-secondary p-1 d-flex flex-row align-items-center">
            <div class="px-5 ">
                <a href="#"><img src="../images/admin.png" alt="image" class="admin_image" /></a>
                <p class="text-light text-center">Admin Panel</p>
            </div>

            <div class="hamburger-menu hov5 align-items-center">
                <input type="checkbox" id="menu-toggle">
                <label for="menu-toggle" class="menu-button">
                    <h3>menu</h3>
                    <span class="bar hov5"></span>
                    <span class="bar hov5"></span>
                    <span class="bar hov5"></span>
                </label>
                <div class="menu">

                    <div class="button-container ">

                        <button class="  btn1 border-0 my-2"><a href="insert_product.php"
                                class="  nav-link text-light   ">Insert
                                Products</a>
                        </button>
                        <button class="btn1 border-0 my-2">
                            <a href="index.php?view_products" class="nav-link text-light ">View Products</a>
                        </button>
                        <button class="btn1 border-0 my-2">
                            <a href="index.php?insert_category" class="nav-link text-light ">Insert
                                Categories</a>
                        </button>
                        <button class="btn1 border-0 my-2">
                            <a href="index.php?view_categories" class="nav-link text-light ">View
                                Categories</a>
                        </button>


                        <button class="btn1 border-0 my-2">
                            <a href="index.php?insert_brand" class="nav-link text-light ">Insert Brands</a>
                        </button>
                        <button class="btn1 border-0 my-2">
                            <a href="index.php?view_brands" class="nav-link text-light ">View Brands</a>
                        </button>
                        <button class="btn1 border-0 my-2">
                            <a href="index.php?list_orders" class="nav-link text-light ">All Orders</a>
                        </button>
                        <button class="btn1 border-0 my-2">
                            <a href="index.php?list_payments" class="nav-link text-light ">All Payments</a>
                        </button>


                        <button class="btn1 border-0 my-2">
                            <a href="index.php?list_users" class="nav-link text-light ">List Users</a>
                        </button>
                        <button class="btn1 border-0 my-2">
                            <a href="admin_logout.php" class="nav-link text-light ">Log out</a>
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3">
        <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }

        if (isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
            include('delete_product.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }
        if (isset($_GET['view_brands'])) {
            include('view_brands.php');
        }
        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }
        if (isset($_GET['edit_brands'])) {
            include('edit_brands.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['delete_brands'])) {
            include('delete_brands.php');
        }

        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }
        if (isset($_GET['delete_orders'])) {
            include('delete_orders.php');
        }
        if (isset($_GET['list_payments'])) {
            include('list_payments.php');
        }
        if (isset($_GET['delete_payments'])) {
            include('delete_payments.php');
        }
        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        if (isset($_GET['delete_users'])) {
            include('delete_users.php');
        }
        ?>

    </div>

    <!-- last child  -->
    <!-- include footer -->
    <?php
    //  include("../includes/footer.php");
    ?>


    <div class="NAV p-3 text-center footer">
        <p class="text-center m-auto">All Rights Reserved &copy; -Designed by EKhaja-2023
            <?php
            // echo date("Y");
            ?>
        </p>
    </div>

</div>
</div>


</body>

</html>