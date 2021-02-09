<?php
include "Aheader.php";
include_once "database.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering Application</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../static\css\user.css">
    <link rel="stylesheet" href="../static\css\admin.css">

    <!-- footer -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- footerend -->
</head>

<body>
    <h1 class="display-5">Add, Delete or Update Items here</h1>

    <div class="add_container container">
        <h1 class="display-6">Add items</h1>

        <?php

            if (isset($_SESSION["affected_row"])) {
                # code...
                ?>
                <div class="alert alert-info" role="alert">
                    Data was uploaded Successfully
                </div>
        <?php
        unset($_SESSION["affected_row"]);
            }

?>

        <form class="g-3 needs-validation" novalidate name="form" method="post" action="./admin_operations/add.php"
            enctype="multipart/form-data">

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="validationCustom01" name="product_id" placeholder="abcdF342"
                    required>
                <label for="floatingInput" class="form-label">Product Id</label>

                <div class="invalid-feedback">
                    Please Provide an ID
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="validationCustom01" name="item_name" placeholder="abcdF342"
                    required>
                <label for="floatingInput" class="form-label">Item Name</label>

                <div class="invalid-feedback">
                    Please Provide a Name
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="form-floating mb-4">
                <input type="number" class="form-control" id="validationCustom01" name="quantity" placeholder="abcdF342"
                    required>
                <label for="floatingInput" class="form-label">Quantity</label>

                <div class="invalid-feedback">
                    Please Provide a Quantity
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="form-floating mb-4">
                <input type="number" class="form-control" id="validationCustom01" name="price" placeholder="abcdF342"
                    required>
                <label for="floatingInput" class="form-label">Price</label>

                <div class="invalid-feedback">
                    Please Provide a Price
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="validationCustom01" name="category" placeholder="abcdF342"
                    required>
                <label for="floatingInput" class="form-label">Category</label>

                <div class="invalid-feedback">
                    Please Provide a Name for Category
                </div>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="custom-file">
                <label for="">Upload the Product image</label>
                <input type="file" name="product_img" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile"></label>
            </div>


            <button name='loginsubmit' class="btn btn-primary login_btn" type="submit">Add Item</button>
            <button name='loginsubmit' class="btn btn-primary login_btn" type="reset">Reset</button>

        </form>

    </div>

    <?php
        include "admin_operations/delete.php";

        include "admin_operations/update.php";
        
    ?>

    <script src="validation.js"></script>
</body>

</html>
<?php
include "Afooter.php";
?>