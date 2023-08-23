<h3 class="text-center heading">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th class='text-light bg-success '>S.NO</th>
            <th class='text-light bg-success '>brand Title</th>
            <th class='text-light bg-success '>Edit</th>
            <th class='text-light bg-success '>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat = "select * from `brands`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;

            ?>
            <tr class="text-center">
                <td class="text-light bg-secondary">
                    <?php echo $number ?>
                </td>
                <td class="text-light bg-secondary">
                    <?php echo $brand_title ?>
                </td>
                <td class='text-light bg-secondary '>
                    <a href='index.php?edit_brands=<?php echo $brand_id ?>' class='text-light'>
                        <i class='fa-solid fa-pen-to-square'></i>
                    </a>
                </td>
                <td class='text-light bg-secondary'>
                    <a href='index.php?delete_brands=<?php echo $brand_id ?>' type="button" class="text-light"
                        data-toggle="modal" data-target="#exampleModalCenter">
                        <i class='fa-solid fa-trash'></i>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4>Are you sure that you want to delete this?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <a href="./index.php?view_brands" class="text-light">No</a></button>
                <button type="button" class="btn btn-primary">
                    <a href='index.php?delete_brands=<?php echo $brand_id ?>'class="text-light">Yes</a>
                </button>
            </div>
        </div>
    </div>
</div>