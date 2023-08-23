<h2 class="text-center  heading">All Payments</h2>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary text-center">
        <?php
        $get_payments = "select * from `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);
        
        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
        } else {
            echo " <tr>
        <th class='table-danger'>S.NO</th>
        <th class='table-danger'>Invoice Number</th>
        <th class='table-danger'>Amount</th>
        <th class='table-danger'>Payment Mode</th>
        <th class='table-danger'>Order Date</th>
        <th class='table-danger'>Delete</th>
    </tr>
</thead>
<tbody class='bg-success text-light text-center'>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $order_id = $row_data['order_id'];
                $payment_id = $row_data['payment_id'];
                $amount = $row_data['amount'];
                $invoice_number = $row_data['invoice_number'];
                $payment_mode = $row_data['payment_mode'];
                $date = $row_data['date'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td class='text-light text-center'><a href='index.php?delete_payments= $payment_id ' class='text-light'>
                        <i class='fa-solid fa-trash'></i></a>
                    
                </td>
            </tr>";
            }
        }
        ?>


        </tbody>
</table>