<?php


include "includes/header.php";
    include_once "admin/database.php";
    session_start();

if (!empty($_GET['action'])) {
    # code...
    switch ($_GET['action']) {
        case 'add':
            if (isset($_POST['quantity_user'])) {
                # code...
            
            // echo "ye dekh phirse" . $_POST['quantity_user']; # user ki quantity demanded agyi
            # code...
            // echo "Idher dekh" . $_GET["productID"]; #product id agyi
            $productID1 = $_GET["productID"];
            $quantity = $_POST['quantity_user'];

            $sql = "SELECT * FROM `products` WHERE `ProductId` = $productID1";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                # code...
                ?>
<div class="alert alert-danger" role="alert">
    <?php echo "Error:" . mysqli_error($conn); ?>
</div>
<?php
            }

            $row = mysqli_fetch_assoc($result);
            $sql = "INSERT INTO `cart`(`ProductId`, `Quantity`, `Date`) VALUES ($row[ProductId] , $quantity,  now())";
            $result = mysqli_query($conn, $sql);
            // echo ':::hogya::';
            // echo mysqli_error($conn);
            if (!$result) {
                # code...
                ?>
<div class="alert alert-danger" role="alert">
    <?php echo "Error:" . mysqli_error($conn); ?>
</div>
<?php
                // echo "Error:" . mysqli_error($conn);
            }
        }
            break;
        default:
            # code...
            break;
    }
}

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
    <!-- <h1 class="display-1">Fast Food Items</h1> -->
    <?php
        $sql = "
        SELECT `Category` FROM `products` WHERE 1 GROUP BY `Category`
        ";
        $result = mysqli_query($conn, $sql);
        // echo mysqli_info($conn);
            // echo $row['Category'];
        ?>


    <div class="container">
        <h1 class="display-6">Search For Food Items Here</h1>
        <form action="fastfood.php" method="post">

            <div class="input-group mb-3">
                <input name="searched_item" type="text" class="form-control" list="datalistOptions"
                    placeholder="Type to search food..." aria-label="Recipient's username"
                    aria-describedby="button-addon2">
                <!-- <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button> -->
                <input class="btn btn-dark" id="searchedsubmit" type="submit" value="Submit">
                <!-- <input type="text"> -->
            </div>

            <!-- <label for="exampleDataList" class="form-label">Datalist example</label> -->
            <datalist id="datalistOptions">
                <?php
        while ($row = $result -> fetch_assoc()) {?>
                <option value="<?php echo $row['Category']; ?>">
                    <?php
                }
                ?>
            </datalist>
        </form>
    </div>

    <?php
        //echo $_POST['searched_item'];
        // if (isset($_POST["searched_item"])) {
        if (isset($_POST["searched_item"]) or isset($_SESSION['category_name'])) {

            # code...
            if (!isset($_SESSION['category_name'])) {
                # code...
                $_SESSION['category_name'] = $_POST["searched_item"];
            }

            if (isset($_POST["searched_item"]) and $_POST["searched_item"] != $_SESSION['category_name']){
                # code...
                $_SESSION['category_name'] = $_POST["searched_item"];
            }
            
            
            $searched_item = $_SESSION['category_name'];
            // echo "searched item" . $searched_item . "<br>";

            $sql = "SELECT `Category` FROM `products` WHERE `Category` LIKE CONCAT(SUBSTRING('$searched_item%', 1, 2),'%') GROUP BY `Category`
            ";
            $result = mysqli_query($conn, $sql);
            //SELECT `Category` FROM `products` WHERE `Category` LIKE 'bur%' GROUP BY `Category`
            //
            $row = mysqli_fetch_row($result); 

            // echo 939459349 . $row[0]; // category name here
            if (strlen($searched_item) > 1) {
                # code...
                ?>
    <div class="container">
        <div class="alert alert-success" role="alert">
            We found your desired food!!
        </div>
    </div>
    <?php
            
            
            
    ?>

    <h1 class="display-5"><?php echo $row[0]; ?></h1>
    <div class="fastfood_main container">
        <div class="fastfood_row row">
            <!-- in -->
            <?php
            $sql = "
            SELECT `ProductId`, `Name`, `Quantity`, `Price`, `Category`, `img_path`, `Description` FROM `products` WHERE `Category` = '$row[0]'
            ";

            $result = mysqli_query($conn, $sql);

            while ($row = $result -> fetch_assoc()) {
                # code...
                // echo $row['Name'];?>
            <div class="col-sm">

                <div class="card">
                    <form action="fastfood.php?action=add&productID=<?php echo $row['ProductId']; ?>" method="post">

                        <img src="product_images\<?php echo $row['img_path']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['Name']; ?></h5>
                            <p class="card-text"><?php echo $row['Description']; ?></p>
                            <button type="button" class="btn btn-info">Price: <?php echo $row['Price']; ?>
                                Rupees</button>
                            <button type="button" class="btn btn-info">Stock: <?php echo $row['Quantity']; ?> Items
                                Left</button>

                            <?php
                        // echo gettype($row['ProductId']); //string
                        $_SESSION['key' . $row['ProductId']] = array("name"=>$row['Name'], "price"=>$row['Price'], "quantity"=>$row['Quantity']); // will be used in ff_and_cart
                        ?>
                            <br>
                            <br>
                            <div class="form-floating mb-3">
                                <input name="quantity_user" style="width: 150px" type="number" class="form-control"
                                    value="1" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Enter Quantity</label>
                                <br>

                                <input name="add_2_cart" class="btn btn-dark" type="submit" value="Add to Cart">
                            </div>
                    </form>

                    <?php
                            if (isset($_POST['add_2_cart'])) {
                                # code...
                            // echo "<script>console.log(57346345);</script>";
                            // echo "PID" . $row['ProductId']; //pid

                            }

                        ?>

                </div>
            </div>
        </div>

        <?php
            }
        }
        else {
            # code...
            ?>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                Oopps!!, No Results Found
            </div>
        </div>
        <?php
            
        }
    }


            ?>

        <!-- out -->
    </div>
    </div>


    <?php
    include "includes/footer.php";
    ?>
</body>

</html>