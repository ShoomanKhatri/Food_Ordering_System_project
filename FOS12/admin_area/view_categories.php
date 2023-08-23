<h3 class="text-center heading">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th class='text-light bg-success '>S.NO</th>
            <th class='text-light bg-success '>Category Title</th>
            <th class='text-light bg-success '>Edit</th>
            <th class='text-light bg-success '>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat = "select * from `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;

            ?>
            <tr class="text-center">
                <td class="text-light bg-secondary">
                    <?php echo $number ?>
                </td>
                <td class="text-light bg-secondary">
                    <?php echo $category_title ?>
                </td>
                <td class='text-light bg-secondary '>
                    <a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'>
                        <i class='fa-solid fa-pen-to-square'></i>
                    </a>
                </td>
                <td class='text-light bg-secondary'>
                    <a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light' class='text-light'>
                        <i class='fa-solid fa-trash'></i>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>