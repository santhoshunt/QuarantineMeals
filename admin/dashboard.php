<?php

include('../config/db_connect.php');
session_start();
$chef_id = $_SESSION['chef_id'];
$sql = "SELECT * FROM food WHERE chef_id='$chef_id'";
$result = mysqli_query($conn, $sql);
$my_food = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql_o = "SELECT * FROM orders where chef_id='$chef_id'";
$result_o = mysqli_query($conn, $sql_o);
$my_orders = mysqli_fetch_all($result_o, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quarantine Meals</title>
    <!--jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--using FontAwesome--------------->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <style>
        nav {
            z-index: 99999;
            width: 100%;
            background-color: #000 !important;
        }

        .brand-logo {
            max-height: 100%;
        }

        .food-img {
            object-fit: cover;
            width: 100%;
            /* width: 25vmin;
            height: 25vmin; */
            height: 30vh !important;
        }
        
        .input-field label {
            color: orange;
        }

        /* label focus color */
        .input-field input:focus+label {
            color: orange !important;
        }

        /* label underline focus color */
        .input-field input:focus {
            border-bottom: 1px solid orange !important;
            box-shadow: 0 1px 0 0 orange !important;
        }

        /* icon prefix focus color */
        .input-field .suffix .active {
            color: orange !important;
        }

        [type="checkbox"].filled-in:checked+span:not(.lever):after {
            background-color: orange;
            border: 2px solid orange;
        }

        [type="radio"]:checked+span:after,
        [type="radio"].with-gap:checked+span:after {
            background-color: orange;
        }

        [type="radio"]:checked+span:after,
        [type="radio"].with-gap:checked+span:before,
        [type="radio"].with-gap:checked+span:after {
            border: 2px solid orange;
        }

        body {
            background: whitesmoke;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="nav-wrapper">
                <img class="brand-logo" src="../img/txtlogo.png" alt="Quarantine Meals">
                <ul class="right" style="font-family: 'Merienda', cursive;">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <br>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col s6 ">
                    <div class="container section z-depth-3">
                        <a href="my_orders.php">
                            <div class="container">
                                <h3><i class="fas fa-clipboard-list orange-text"></i> <span class="orange-text"><?php echo " ".count($my_orders) ?></span></h3>
                                <h4 class="orange-text">Your Orders</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s6 ">
                    <div class="container section z-depth-3">
                        <a href="food_add.php">
                            <div class="container">
                                <h3><i class="far fa-plus-square orange-text"></i></h3>
                                <h4 class="orange-text">Add Food</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container section center">
            <h3>Your Menu</h3>
        </div>
        <div class="row">
            <?php for ($i = 0; $i < count($my_food); $i++) : ?>
                <?php $food = $my_food[$i]; ?>
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img class="food-img" src=<?php echo "uploads/" . $food['food_img'] ?>>
                            <a class="btn-floating halfway-fab orange" href=<?php echo "edit_food.php?food_id=" . $food['food_id']; ?>><i class="far fa-edit"></i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title"><?php echo $food['food_name']; ?></span>
                            <p class="truncate">DESC:<strong> <?php echo $food['food_desc']; ?></strong></p>
                            <p>PRICE: RS. <strong> <?php echo $food['food_price']; ?></strong></p>
                            <p>RATING: <strong><?php echo $food['food_rating']; ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </section>
    <sectin class="section">
        <form action="dashboard.php" action="POST">
            
        </form>
    </sectin>

</body>

</html>