<?php
    require("../admin1/config.php");
    include("header.php");
    $sql_prod= "SELECT tbl_product.*,tbl_brand.brand_name 
    FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id 
    AND tbl_product.product_id='$_GET[product_id]' ORDER BY tbl_product.product_id";
    $query_prod = mysqli_query($conn,$sql_prod);
    $row_prod = mysqli_fetch_array($query_prod);
    $sql_menu1 = "SELECT tbl_product.*,tbl_category.cate_name 
    FROM tbl_product INNER JOIN tbl_category ON tbl_product.cate_id = tbl_category.cate_id
    AND tbl_product.product_id='$_GET[product_id]' ORDER BY tbl_product.product_id";
    $query_menu1 = mysqli_query($conn,$sql_menu1);
    $row_menu1 = mysqli_fetch_assoc($query_menu1);

    $sql_rand="SELECT * FROM `tbl_product` ORDER BY RAND() LIMIT 4;";
    $query_rand = mysqli_query($conn,$sql_rand);
?>
<form action="cart.php?action=add" method="POST">
<section class="product">
    <div class="container">
        <div class="product-container-top">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">TRANG CHỦ</a></li>
                  <li class="breadcrumb-item"><a href="category.php?cate_id=<?php echo $row_menu1['cate_id'] ?>"><?php echo $row_menu1['cate_name'] ?></a></li>
                  <li class="breadcrumb-item"><a href="brand.php?brand_id=<?php echo $row_prod['brand_id'] ?>"><?php echo $row_prod['brand_name'] ?></a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo $row_menu1['product_name'] ?></li>
                </ol>
              </nav>
        </div>
        <div class="product-content">
            <div class="product-content-left">
                <div class="product-content-left-big-img">
                    <img src="../admin1/<?php echo $row_menu1['img'] ?>">
                </div>
                <!-- <div class="product-content-left-small-img">
                    <img src="../img/giay/adidas/anphabounce/apb full trang/anh2.jpg">
                    <img src="../img/giay/adidas/anphabounce/apb full trang/anh3.jpg">
                    <img src="../img/giay/adidas/anphabounce/apb full trang/anh4.jpg">
                    <img src="../img/giay/adidas/anphabounce/apb full trang/anh5.jpg">
                </div> -->

            </div>
            <div class="product-content-right">
                <div class="product-content-right-product-name">
                    <h1><?php echo $row_menu1['product_name'] ?></h1>
                    <p style="color: #aaa; font-size: 14px" name="product_id">Mã SP: <?php echo $row_menu1['product_id'] ?></p>
                    <strike name="product_price"><?php echo $row_menu1['product_price'] ?>$</strike>
                    <p><?php echo $row_menu1['product_price_new'] ?>$</p>
                </div>
                
                <div class="product-content-right-product-size">
                    <div class="size-text">Kích cỡ:</div>
                    <select class="" name="size" id="">
                            <option value="#">Chọn Size</option> 
                            <option>37</option>
                            <option>38</option>
                            <option>39</option>
                            <option>40</option>
                            <option>41</option>
                            <option>42</option>                            
                    </select>
                </div>
                <div class="quantity">
                    <p style="font-weight: bold;">Số lượng:</p>
                    <input type="number" min="1" value="1" name="soluong">
                </div>
                <p style="color: red;">Vui lòng chọn size</p>
                <div class="product-content-right-product-button">
                    <button class="themgiohang" name="themgiohang"><i class="fas fa-shopping-cart"></i><p style="margin: 0 0 0 8px; font-size: 24px;">Thêm vào giỏ hàng</p></button>
                </div>
                <div class="product-content-right-product-icon">
                    <div class="product-content-right-product-icon-item">
                        <a href=""><i class="fas fa-phone-alt"></i> <p>Hotline</p></a>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <a href=""><i class="fas fa-comments"></i> <p>Chat</p></a>
                    </div>
                    <div class="product-content-right-product-icon-item">
                        <a href=""><i class="fas fa-envelope"></i> <p>Mall</p></a>
                    </div>
                </div>
                <div class="product-content-right-bottom">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                CHÍNH SÁCH GIAO HÀNG & ĐỔI TRẢ
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Giao hàng hoàn toàn miễn phí 100% <br>
                                An toàn với nhận hàng và trả tiền tại nhà <br>
                                Bảo hành đổi trả trong vòng 60 ngày
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                HƯỚNG DẪN BẢO QUẢN
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <strong>Khử mùi bên trong giày</strong> <br>
                              Bạn hãy đặt túi đựng viên chống ẩm vào bên trong giày để hút ẩm và rắc phấn rôm (có thể thay bằng cách đặt vào bên trong giày gói trà túi lọc chưa qua sử dụng) để khử mùi, giúp giày luôn khô thoáng.
                                <br>
                              Để hạn chế mùi hôi và sự ẩm ướt cho giày, hãy chọn vớ chân loại tốt, có khả năng thấm hút cao. Ngoài ra, dùng các loại lót giày khử mùi cũng là một phương pháp tốt.
                                <br>
                                <strong>Bảo quản giày khi không sử dụng</strong> <br>
                                Khi sử dụng giày, bạn đừng vội vứt hộp đi mà hãy cất lại để dành. Khi không sử dụng, hãy nhét một ít giấy vụn vào bên trong giày để giữ cho dáng giày luôn chuẩn, đẹp. Sau đó đặt giày vào hộp bảo quản cùng túi hút ẩm.
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                TỔNG ĐÀI BÁN HÀNG 
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <i class="fas fa-phone-alt"></i> 0327.712.793
                                <br>
                                Miễn phí từ (8:30 - 21:30) mỗi ngày
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<section class="product-related">
    <div class="product-related-title">
        <p>SẢN PHẨM TƯƠNG TỰ</p>
    </div>
    <div class="product-content">
                    <?php 
                    while ($row_rand = mysqli_fetch_array($query_rand)){
                    ?>
                        <div class="product-related-item col-lg-3 col-md-6">
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
</section>
<?php
    include("footer.php");
?>