<?php 
include "connection.php";

function Show_Sub_Category($cat_id){
    global $db;

    $sub_cat_sql = "SELECT * FROM mart_category WHERE is_parent = '$cat_id'";
    $sub_cat_Res = mysqli_query($db,$sub_cat_sql);
    while($row = mysqli_fetch_assoc($sub_cat_Res)){
        $cat_id     = $row['ID'];
        $cat_name   = $row['c_name'];
        $cat_image = $row['c_image'];
        $cat_status = $row['c_status'];

        ?>
        <tr>
        <th scope="row"><?php echo '-';?></th>
        <td>
            <img src="assets/img/products/category/<?php echo $cat_image;?>" width="40" />
        </td>
        <td><?php echo '<i class="bi bi-arrow-return-right"></i> '.$cat_name;?></td>
        <td>
            <?php if($cat_status == 0)echo '<span class="badge bg-danger">Inactive</span>';else echo '<span class="badge bg-success">Active</span>'; ?>
        </td>
        <td>
            <a href="category.php?editid=<?php echo $cat_id;?>"><i class="bi bi-pencil-square text-dark"></i></a>
            <a href="" data-bs-toggle="modal" data-bs-target="#deleteid<?php echo $cat_id;?>"><i class="bi bi-trash text-danger"></i></a>
                                    <!-- Modal -->
            <div class="modal fade" id="deleteid<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center py-5">
                        <h2 class="mb-2">Are you sure?</h2>
                        <a class="btn btn-md btn-danger" href="category.php?deleteid=<?php echo $cat_id;?>">Confirm</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
        <?php
    }  
}


// find parent category name
