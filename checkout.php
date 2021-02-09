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

    <h1 class="display-5">Thank You For Shopping With Us</h1>
    <div class="container">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Enter Name" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Enter Email" aria-label="Recipient's username"
            aria-describedby="basic-addon2">
        <span class="input-group-text" id="basic-addon2">@example.com</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">Enter Your IBAN</span>
        <input type="number" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Any Coupons</span>
        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text"></span>
    </div>

    <div class="input-group">
        <span class="input-group-text">Any Comments</span>
        <textarea class="form-control" aria-label="With textarea"></textarea>
    </div>
    <br>
    <form action="checkout.php" method="post">
            <button name="checkout" class="btn btn-success" type="submit">Check Out</button>
        </form>
    
        </div>

    <?php
        if (isset($_POST['checkout'])) {
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