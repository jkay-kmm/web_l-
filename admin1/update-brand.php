<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cập nhật danh mục</title>
</head>
<body>

  <h1>Cập nhật danh mục</h1>

  <form action="update_category.php" method="post">

    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
      <label for="cate_name">Tên danh mục</label>
      <input type="text" class="form-control" id="cate_name" name="cate_name" value="<?php echo $cate_name; ?>">
    </div>

    <div class="form-group">
      <label for="cate_parent">Danh mục cha</label>
      <select class="form-control" id="cate_parent" name="cate_parent">
        <option value="">Chọn danh mục cha</option>
        <?php
          $sql = "select * from tbl_category where cate_id != $id";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row["cate_id"]."'>".$row["cate_name"]."</option>";
          }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="cate_desc">Mô tả</label>
      <textarea class="form-control" id="cate_desc" name="cate_desc"><?php echo $cate_desc; ?></textarea>
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
