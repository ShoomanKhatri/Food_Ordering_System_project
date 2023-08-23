<h3 class="text-center  heading">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary">
        <?php
        $get_orders = "select * from `user_orders`";
        $result = mysqli_query($con, $get_orders);
        $row_count = mysqli_num_rows($result);
        
        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
        } else {
            echo " <tr>
        <th class='table-danger'>S.NO</th>
        <th class='table-danger'>Due Amount</th>
        <th class='table-danger'>Invoice Number</th>
        <th class='table-danger'>Total Products</th>
        <th class='table-danger'>Order Date</th>
        <th class='table-danger'>Status</th>
        <th class='table-danger'>Delete</th>
    </tr>
</thead>
<tbody class='bg-success text-light text-center'>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $user_id = $row_data['user_id'];
                $amount_due = $row_data['amount_due'];
                $invoice_number = $row_data['invoice_number'];
                $total_products = $row_data['total_products'];
                $order_date = $row_data['order_date'];
                $order_status = $row_data['order_status'];
                $number++;

                $orderStatuses = array("Pending", "Complete");
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>
                <select class='form-control' onchange='updateOrderStatus(this.value, $order_id)'>
                            <option value='Pending' " . ($order_status === "Pending" ? "selected" : "") . ">Pending</option>
                            <option value='Complete' " . ($order_status === "Complete" ? "selected" : "") . ">Complete</option>
                        </select>
                </td>
                <td class='text-light text-center'><a href='index.php?delete_orders= $order_id ' class='text-light'>
                        <i class='fa-solid fa-trash'></i></a>
                    
                </td>
            </tr>";
            }
        }
        ?>

        
<script>
    function updateOrderStatus(newStatus, orderId) {
        // Make an AJAX request to update the order status
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_order_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // You can handle the response here, if needed
                location.reload(); // Reload the page to reflect the updated status
            }
        };
        xhr.send("order_id=" + orderId + "&new_status=" + newStatus);
    }
</script>



        </tbody>
</table>