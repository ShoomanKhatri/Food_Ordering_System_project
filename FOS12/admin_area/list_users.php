<h3 class="text-center heading">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary text-center">
        <?php
        $get_payments = "select * from `user_table`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);

        if ($row_count == 0) {
            echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
        } else {
            echo " <tr>
        <th class='table-danger'>S.NO</th>
        <th class='table-danger'>Username</th>
        <th class='table-danger'>User Email</th>
        <th class='table-danger'>User Address</th>
        <th class='table-danger'>User Mobile</th>
        <th class='table-danger'>Delete</th>
    </tr>
</thead>
<tbody class='bg-success text-light text-center'>";

            $number = 0;
            while ($row_data = mysqli_fetch_assoc($result)) {
                $user_id = $row_data['user_id'];
                // $payment_id = $row_data['payment_id'];
                $username = $row_data['user_name'];
                $user_email = $row_data['user_email'];
                // $user_image = $row_data['user_image'];
                $user_address = $row_data['user_address'];
                $user_mobile = $row_data['user_mobile'];
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$username</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_mobile</td>
                <td class='text-light text-center'><a href='index.php?delete_users=$user_id' class='text-light'>
                        <i class='fa-solid fa-trash'></i></a>
                    
                </td>
            </tr>";
            }
        }
        ?>


        </tbody>
</table>