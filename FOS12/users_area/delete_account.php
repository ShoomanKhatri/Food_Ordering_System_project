<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Account</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <h3 class="text-danger">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto bg-success text-light" name="delete"
                value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto bg-success text-light" name="dont_delete"
                value="Don't Delete Account">
        </div>
    </form>

    <?php
    $username_session = $_SESSION['username'];
    if (isset($_POST['delete'])) {
        $delete_query = "delete from `user_table` where user_name='$username_session';";
        $result = mysqli_query($con, $delete_query);
        if ($result) {
            session_destroy();
            echo "<script>alert('Account Deleted Successfully')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if (isset($_POST['dont_delete'])) {
        echo "<script>window.open('profile.php','_self')</script>";
    }
    ?>

</body>

</html>