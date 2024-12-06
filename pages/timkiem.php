<?php
include("header.php");
?>
<?php
    require("../admin1/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_term = mysqli_real_escape_string($conn, $_POST['tukhoa']);
    
        $sql = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search_term%'";
        $result = $conn->query($sql);
?>
<h1 style="padding: 200px 0 50px 0; color: red; font-weight: bold; text-align: center; font-size: 60px;">KẾT QUẢ TÌM KIẾM</h1>
<div class="category-right-content row">
<?php    

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="category-right-content-item col-lg-3 col-md-6 container">
                            <a href="product.php?product_id=<?php echo $row['product_id'] ?>"><img src="../admin1/<?php echo $row['img'] ?>">
                            <h1><?php echo $row['product_name'] ?></h1>
                            <strike><?php echo $row['product_price'] ?>$</strike>
                            <p><?php echo $row['product_price_new'] ?>$</p></a>
                </div>
            <?php
            }
        } else {
            echo "<h3 style='text-align: center'>Không tìm thấy sản phẩm</h3>";
        }
    }
?>
</div>
<?php
    include("footer.php");
?>


