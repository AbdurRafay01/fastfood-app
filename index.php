<?php
    include "includes/header.php";
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

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="static\img\food1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="static\img\food2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="static\img\food3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>

    <!-- <div class="container-md">
        <h1 class="display-1">Welcome To ABC Food Ording!!!</h1>
    </div> -->

    <div class="container">
        <div class="row">

            <div class="col-sm">
                <h3 class="display-3"><strong>Welcome To ABC Food Ordering!!!</strong></h3>
            </div>

            <div class="wall_text">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                    <p class="inner_text">
                    Our online ordering system will help you transform your website into a money-making machine.

No matter how much your business grows, you will always be able to take free unlimited orders with zero costs.

Power your business with our free restaurant online ordering system & you’ll never have to worry about fees or commissions.
                </p>
                    </div>
                    <div class="col-sm">
                    <img src="static\img\chefphone.png" alt="">
                    </div>
                    
                </div>
                </div>
            </div>

        </div>
    </div>


    <?php

?>

    <?php
    include "includes/footer.php";
    ?>
</body>
</html>