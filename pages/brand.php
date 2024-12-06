<?php
    require("../admin1/config.php");
    include("header.php");
    $sql_brand= "SELECT * FROM tbl_brand,tbl_product WHERE tbl_product.brand_id = tbl_brand.brand_id 
    AND tbl_product.brand_id='$_GET[brand_id]' ORDER BY tbl_product.product_id DESC";
    $query_brand = mysqli_query($conn,$sql_brand);

    $sql_breadcrumb_brand= "SELECT tbl_brand.*,tbl_category.cate_name 
    FROM tbl_brand INNER JOIN tbl_category ON tbl_brand.cate_id = tbl_category.cate_id 
    AND tbl_brand.brand_id='$_GET[brand_id]' ORDER BY tbl_brand.brand_id DESC";
    $query_breadcrumb_brand = mysqli_query($conn,$sql_breadcrumb_brand);
    $row_breadcrumb_brand= mysqli_fetch_array($query_breadcrumb_brand);
?>
<section class="category">
    <div class="category">
        <div class="category-top">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">TRANG CHỦ</a></li>
                <li class="breadcrumb-item"><a href="category.php?cate_id=<?php echo $row_breadcrumb_brand['cate_id'] ?>"><?php echo $row_breadcrumb_brand['cate_name'] ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $row_breadcrumb_brand['brand_name'] ?></li>
              </ol>
            </nav>
      </div>
        <div class="container">
            <div class="row">
                
                <div class="category-right row">
                    <div class="category-right-top-item">
                        <p>SẢN PHẨM</p>
                    </div>
                    <div class="category-right-top-item">
                        <select name="" id="">
                            <option value="">Nổi bật</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Sắp thấp đến cao</option>
                        </select>
                    </div>
                    <div class="category-right-content row">
                    <?php 
                    while ($row_brand = mysqli_fetch_array($query_brand)){
                    ?>
                        <div class="category-right-content-item col-lg-3 col-md-6">
                            <a href="product.php?product_id=<?php echo $row_brand['product_id'] ?>"><img src="../admin1/<?php echo $row_brand['img'] ?>" alt="" >
                            <h1><?php echo $row_brand['product_name'] ?></h1>
                            <strike><?php echo $row_brand['product_price'] ?>$</strike>
                            <p><?php echo $row_brand['product_price_new'] ?>$</p></a>
                        </div>
                    <?php 
                    }
                    ?>
                    </div>
                    <div class="category-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                              <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                              </li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    require("../admin1/config.php");
    include("footer.php");    
?>