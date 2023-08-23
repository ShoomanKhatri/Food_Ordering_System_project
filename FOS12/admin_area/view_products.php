<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .product_img {
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>
    <h3 class="text-center heading">All Products</h3>
    <table class="table table-bordered  mt-5">
        <thead class="bg-info table table-danger table-hover text-center">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        <tbody class="table-hover ">
            <?php
            $get_products = "select * from `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
                echo "<tr class='text-center'>
                    <td class='text-light bg-success  '>$number</td>
                    <td class='text-light bg-success '>$product_title</td>
                    <td class='text-light bg-success '><img src='./product_images/$product_image1' class='product_img'/></td>
                    <td class='text-light bg-success '>$product_price /-</td>
                    <td class='text-light bg-success '>";
                ?>
                <?php
                $get_count = "select * from `orders_pending` where product_id=$product_id";
                $result_count = mysqli_query($con, $get_count);
                $rows_count = mysqli_num_rows($result_count);
                echo $rows_count;
                ?>
                <?php
                echo "</td>
                    <td class='text-light bg-success '>$status</td>
                    <td class='text-light bg-success '>
                    <a href='index.php?edit_products= $product_id' class='text-light'>
                    <i class='fa-solid fa-pen-to-square'></i>
                    </a>
                    </td>
                    <td class='text-light bg-success '>
                    <a href='index.php?delete_product= $product_id' class='text-light' class='text-light'>
                    <i class='fa-solid fa-trash'></i>
                    </a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
        </thead>
    </table>
</body>

</html>