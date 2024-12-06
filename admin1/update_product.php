<?php

require("config.php");

// Lấy ID sản phẩm từ tham số
$product_id = $_GET["product_id"];

// Truy vấn database để lấy thông tin chi tiết của sản phẩm
$sql = "select * from tbl_product where product_id = '$product_id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

// Hiển thị form cập nhật với các trường nhập liệu đã điền sẵn thông tin của sản phẩm
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cập nhật sản phẩm</title>
</head>
<body>

<h1>Cập nhật sản phẩm</h1>

<form action="update_product.php" method="post" enctype="multipart/form-data">

  <input type="hidden" name="id" value="<?php echo $product["product_id"]; ?>">

  <div class="form-group">
    <label for="cate_id">Mã danh mục</label>
    <input type="text" class="form-control" id="cate_id" name="cate_id" value="<?php echo $product["cate_id"]; ?>">
  </div>

  <div class="form-group">
    <label for="brand_id">Mã loại sản phẩm</label>
    <input type="text" class="form-control" id="brand_id" name="brand_id" value="<?php echo $product["brand_id"]; ?>">
  </div>

  <div class="form-group">
    <label for="product_name">Tên sản phẩm</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product["product_name"]; ?>">
  </div>

  <div class="form-group">
    <label for="product_price">Giá cũ</label>
    <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product["product_price"]; ?>">
  </div>

  <div class="form-group">
    <label for="product_price_new">Giá khuyến mãi</label>
    <input type="text" class="form-control" id="product_price_new" name="product_price_new" value="<?php echo $product["product_price_new"]; ?>">
  </div>

  <div class="form-group">
    <label for="img">Ảnh đại diện</label>
    <input type="file" class="form-control" id="img" name="img">
  </div>

  <div class="form-group">
    <label for="status">Trạng thái</label>
    <select class="form-control" id="status" name="status">
      <option value="1">Hiển thị</option>
      <option value="0">Ẩn</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Cập nhật</button>

</form>

</body>
</html>
