<?php
    require("../admin1/config.php");
    $sql_menu = "SELECT * FROM tbl_category ORDER BY cate_id";
    $query_menu = mysqli_query($conn,$sql_menu);
    // function has_child($conn);
    $sql_brand1= "SELECT * FROM tbl_brand,tbl_category WHERE tbl_brand.cate_id=tbl_category.cate_id";
    $query_brand1 = mysqli_query($conn,$sql_brand1);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/bootstrap.mim.css"/>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/script.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/47847aeabc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Giay</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>                     
</head>
<body>
<header>
    <div class="logo">
        <a href="index.php"><img  style="width: 120px; height: 69px;" src="../img/logo/logo-giay.jpg"></a>
    </div>
    <div class="menu">
         <?php 
            while ($row_menu = mysqli_fetch_assoc($query_menu)){
        ?>
            <li><a href="category.php?cate_id=<?php echo $row_menu['cate_id'] ?>"><?php echo $row_menu['cate_name'] ?></a>
            </li>
        <?php 
        }
        ?>
    </div>
    <div class="others">
        <form action="timkiem.php" method="post">
        <li><input class="tukhoa" placeholder="Tim kiem" type="text" name="tukhoa">
        <input class="timkiem" type="submit" value="search" name="timkiem"></li>
        <li><a class="fa fa-user" href=""></a></li>
        <li><a class="fa fa-shopping-bag" href="cart.php"></a></li>
        </form>
    </div>
</header>