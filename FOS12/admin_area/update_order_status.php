<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $order_id = $_POST["order_id"];
    $new_status = $_POST["new_status"];
    
    // Establish a database connection using mysqli
    $con = mysqli_connect("localhost", "root","","mystore");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct and execute the SQL query
    $update_query = "UPDATE user_orders SET order_status = ? WHERE order_id = ?";
    
    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, "si", $new_status, $order_id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Success"; // Send a success response back to JavaScript
    } else {
        echo "Error: " . mysqli_error($con); // Send an error response if the query fails
    }

    // Close the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
