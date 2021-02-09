<div class="add_container container">
    <h1 class="display-6">Update items</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Image Path</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "./database.php";

            $sql = "SELECT * FROM `products` WHERE 1";
            $result = mysqli_query($conn, $sql);

            while ($row = $result -> fetch_assoc()){
                # code...

                // print $row['Name'];
                ?>
            <tr>
                <th scope="row"><?php echo $row['ProductId'] ?></th>
                <td><?php echo $row['Name'] ?></td>
                <td><?php echo $row['Quantity'] ?></td>
                <td><?php echo $row['Price'] ?></td>
                <td><?php echo $row['Category'] ?></td>
                <td><?php echo $row['img_path'] ?></td>
            </tr>

            <?php

            }
            ?>
        </tbody>
    </table>

    <form class="g-3 needs-validation" novalidate action="../admin/fastfood.php" method="post">
        <div class="form-floating mb-4">
            <input type="text" class="form-control" id="validationCustom01" name="item_name" placeholder="abcdF342"
                required>
            <label for="floatingInput" class="form-label">Enter the product Id of item to Update it</label>
            <div class="invalid-feedback">
                Please Provide a Product Id
            </div>
            <div class="valid-feedback">
                Looks good!
            </div>
            </div>
        
            <div class="form-floating mb-4">
            <input type="text" class="form-control" id="validationCustom01" name="column_name" placeholder="abcdF342"
                required>
            <label for="floatingInput" class="form-label">Enter the Column Name to Update</label>
            <div class="invalid-feedback">
                Please Provide a Column Name
            </div>
            <div class="valid-feedback">
                Looks good!
            </div>
            </div>

            <div class="form-floating mb-4">
            <input type="text" class="form-control" id="validationCustom01" name="new_value" placeholder="abcdF342"
                required>
            <label for="floatingInput" class="form-label">Enter the New Value to Update</label>
            <div class="invalid-feedback">
                Please Provide a Value
            </div>
            <div class="valid-feedback">
                Looks good!
            </div>
            </div>

        <button name='updatesubmit' class="btn btn-primary login_btn" type="submit">Update Item</button>
    </form>


    <?php
    if (isset($_POST['updatesubmit'])) {
        # code...
        $to_update_id = $_POST['item_name'];
        $to_update_colname = $_POST['column_name'];
        $new_value = $_POST['new_value'];
        
        // echo "<h2>Here are the values</h1>" . $to_update_id . $to_update_colname . $new_value;

        $sql = "
        SELECT * FROM `products` WHERE `ProductId` = '$to_update_id'
        ";
        $result = mysqli_query($conn, $sql);
        $output = mysqli_num_rows($result);

        // echo $output;
        if (empty($output)) {
            # code...
            ?>
                <div class="alert alert-danger" role="alert">
                    No Results Found
                </div>
    <?php
            // echo "no results found";
        }
        else {
            # code...
            $sql = "
            UPDATE `products` SET `$to_update_colname`='$new_value' WHERE `ProductId` = '$to_update_id';
            ";
            $result = mysqli_query($conn, $sql);
            ?>
                <div class="alert alert-info" role="alert">
                    Results Found and Updated, Refresh the page to see changes, rows updated are: <?php echo mysqli_affected_rows($conn); ?>
                </div>
            <?php

        }

    }
    
    

?>

</div>