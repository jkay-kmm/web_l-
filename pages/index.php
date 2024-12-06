<?php
require("../admin1/config.php");
include("header.php");
$sql_rand="SELECT * FROM `tbl_product` ORDER BY RAND() LIMIT 20;";
    $query_rand = mysqli_query($conn,$sql_rand);
?>
<!----------------------Slider-------------------------->
<div class="row">
    <!-- <div class="aspect-ratio-169">
        <img src="../img/sale/sale1.jpg">
        <img src="../img/sale/sale2.jpg">
        <img src="../img/sale/sale3.jpg">
        <img src="../img/sale/sale4.png">
    </div> -->
<div class="col-1" style="margin-top: 90px;"></div>
<div class="col-10" style="margin-top: 90px;">
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/sale/sale5.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../img/sale/sale2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../img/sale/sale3.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../img/sale/sale4.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<div class="col-1" style="margin-top: 90px;"></div>
</div>
<section class="index-related">
    <div class="index-related-title">
        <p>SẢN PHẨM NỔI BẬT</p>
    </div>
    <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
    <div class="index-content row">
                    <?php 
                    while ($row_rand = mysqli_fetch_array($query_rand)){
                    ?>
                        <div class="index-related-item col-lg-3 col-md-6">
                            <a href="product.php?product_id=<?php echo $row_rand['product_id'] ?>">
                                <img class="rand" src="../admin1/<?php echo $row_rand['img'] ?>" alt="" >
                            <h1><?php echo $row_rand['product_name'] ?></h1>
                            <strike class="giathat"><?php echo $row_rand['product_price'] ?>$</strike>
                            <p class="giagiam"><?php echo $row_rand['product_price_new'] ?>$</p></a>
                        </div>
                    <?php 
                    }
                    ?>
    </div>
</div>
<div class="col-1"></div>
</div>
</section>
<section>
    <div class="profile">
        <div class="profile-left">
            <p>Hơn 10 năm phát triển, GIAY luôn mang đến những mẫu giày chất lượng tốt nhất với giá cả hợp lí nhất đến tay người tiêu dùng với hệ thống cửa hàng Số 1 Hà Nội và bán online khắp Việt Nam.</p>
            <h1>1 349 841</h1>
            <h3>Số Sản Phẩm Đã Bán</h3>
            <h1>567 392</h1>
            <h3>Khách Hàng Đã Mua</h3>
        </div>
        <div class="profile-right">
        <iframe width="747" height="420" src="https://www.youtube.com/embed/a1ILAowCiOw?list=TLGG3l7cyXWDlJEyNDExMjAyMw" title="Cửa hàng giày XSHOP" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></section>
<div class="address">
    <h2>Hệ thống cửa hàng GIAY</h2>
    <h4>XEM NGAY HỆ THỐNG GIAY</h4>
    <p><a href="" class="rounded">Xem ngay</a></p>
</div>
<?php
include("footer.php");
?>