<?php
    require("../admin1/config.php");
    include("header.php");
    $sql_cate= "SELECT * FROM tbl_product WHERE tbl_product.cate_id='$_GET[cate_id]' ORDER BY tbl_product.product_id DESC";
    $query_cate = mysqli_query($conn,$sql_cate);
    $sql_breadcrumb= "SELECT `cate_name` FROM tbl_category where tbl_category.cate_id='$_GET[cate_id]'";
    $query_breadcrumb = mysqli_query($conn,$sql_breadcrumb);
    $row_breadcrumb= mysqli_fetch_array($query_breadcrumb);
    $sql_brand_cate = "SELECT * FROM tbl_brand WHERE cate_id = '$_GET[cate_id]'";
    $query_brand_cate = mysqli_query($conn,$sql_brand_cate);

    // $sql_brand_prod= "SELECT * FROM tbl_brand,tbl_product WHERE tbl_brand.brand_id = tbl_product.brand_id 
    // AND tbl_product.brand_id='$_GET[brand_id]' ORDER BY tbl_product.product_id DESC";
    // $query_brand_prod = mysqli_query($conn,$sql_brand_prod);
    
?>
<section class="category">
    <div class="category">
        <div class="category-top">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">TRANG CHỦ</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $row_breadcrumb['cate_name'] ?></li>
              </ol>
            </nav>
      </div>
        <div class="container1">
            <div class="contens">
            <div class="category-left">
                    <div class="category-left-top">
                        Danh mục sản phẩm
                    </div>
                    <ul>
                    <?php 
                    while ($row_brand_cate = mysqli_fetch_array($query_brand_cate)){
                    ?>
                        <li class="category-left-li"><a href="brand.php?brand_id=<?php echo $row_brand_cate['brand_id'] ?>"><?php echo $row_brand_cate['brand_name'] ?></a></li>
                    <?php 
                    }
                    ?>
                    </ul>
                </div>
                <div class="category-right row">
                    <div class="category-right-top-item">
                        <p>SẢN PHẨM</p>
                    </div>
                    <div class="category-right-top-item">
                        <select id="sort-box">
                            <option value="">Nổi bật</option>
                            <option value="?field=price&sort=desc" name="desc">Giá cao đến thấp</option>
                            <option value="?field=price&sort=asc" name="asc">Sắp thấp đến cao</option>
                        </select>
                    </div>
                <?php
                    // $orderField = isset($_GET['field']) ? $_GET['field'] :'';
                    // $orderSort = isset($_GET['sort']) ? $_GET['sort'] :'';
                    // if(!empty($orderField) && !empty($orderSort)){
                    //     $orderConditon = "ORDER BY 'tbl_product'.'".$orderField."' ".$orderSort;
                    //     print_r($orderConditon);
                    // }
                    // if(isset($_POST['desc'])){
                    //     $sql = "SELECT * FROM tbl_product WHERE tbl_product.cate_id='$_GET[cate_id]' ORDER BY tbl_product.product_price DESC";
                    //     $query = mysqli_query($conn,$sql);
                    //     print_r($query);
                    // }
                ?>
                    
                    <div class="category-right-content row">
                    <?php 
                    while ($row_cate = mysqli_fetch_array($query_cate)){
                    ?>
                        <div class="category-right-content-item col-lg-3 col-md-6">
                            <a href="product.php?product_id=<?php echo $row_cate['product_id'] ?>"><img src="../admin1/<?php echo $row_cate['img'] ?>" alt="" >
                            <h1><?php echo $row_cate['product_name'] ?></h1>
                            <strike><?php echo $row_cate['product_price'] ?>$</strike>
                            <p><?php echo $row_cate['product_price_new'] ?>$</p></a>
                        </div>
                    <?php 
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include("footer.php");
?>