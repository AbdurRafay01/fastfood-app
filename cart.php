<?php
    include "includes/header.php";
    include_once "admin/database.php";
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
    <link rel="stylesheet" href="static\css\user.css">
    <!-- footer -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- footerend -->
</head>

<body>

    <h1 class="display-5">Your Shopping Cart</h1>

    <?php

        $sql2 = "SELECT `products`.`Name`, `products`.`Price`, `products`.`Quantity`, `products`.`Category`, SUM(`cart`.`Quantity`) quantsum, `products`.`Price`*SUM(`cart`.`Quantity`) product  , `cart`.`ProductId`
        FROM `products`
        INNER JOIN `cart` ON `cart`.`ProductId` = `products`.`ProductId`
        GROUP BY `products`.`Name`";
        $result2 = mysqli_query($conn, $sql2);

        
    ?>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Items</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity Available</th>
                    <th scope="col">Category</th>
                    <th scope="col">Your quanitity</th>
                    <th scope="col">Total Cost</th>
                </tr>
            </thead>

            <?php
        while ($row = $result2 -> fetch_assoc()) {
            # code...



?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $row['Name'] ?></th>
                    <td><?php echo $row['Price'] ?></td>
                    <td><?php echo $row['Quantity'] ?></td>
                    <td><?php echo $row['Category'] ?></td>
                    <td><?php echo $row['quantsum'] ?></td>
                    <td><?php echo $row['product'] ?></td>
                </tr>

            </tbody>
            <?php
        }
        ?>
        </table>
    </div>

    <div class="container">
        <form action="cart.php" method="post">
            <button name="removeall" class="btn btn-danger" type="submit">Remove Items</button>
            
        </form>

        <form action="checkout.php" method="post">
            <button name="" class="btn btn-info" type="submit">Proceed To Payment</button>
        </form>

        <?php
        if (isset($_POST['removeall'])) {
            # code...
            $sql = "SELECT * FROM `cart` WHERE 1";
            $result = mysqli_query($conn, $sql);

            while ($row = $result -> fetch_assoc()) {
                # code...
                $PIDS = $row['ProductId'];
                $delterows = mysqli_query($conn, "DELETE FROM `cart` WHERE `ProductId`=$PIDS ");
            }
            ?>

            <div class="alert alert-info" role="alert">
            All items Removed From Cart
            </div>

        <?php
        }

        ?>
    </div>

    <?php
    include "includes/footer.php";
    ?>
</body>

</html>