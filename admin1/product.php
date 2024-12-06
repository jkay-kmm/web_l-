<?php
include 'headerqt.php';
?>
<?php
    require("config.php");
    session_start();
    if(!$_SESSION["user_name"]){
        header("location:login.php");
    }
    //kiem tra xem nguoi dung da nhan nut insert hay chua
    if(isset($_POST["insert"])){
        $cate_id = $_POST["cate_id"];
        $brand_id = $_POST["brand_id"];
        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_price_new = $_POST["product_price_new"];
        $status = $_POST["status"];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        }
        else{
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                //viet cau truy van de insert du lieu
                $sql_insert = "insert into tbl_product(cate_id, brand_id, product_name, product_price, product_price_new, img, status) 
                values(".$cate_id.",N'".$brand_id."',N'".$product_name."','".$product_price."','".$product_price_new."','".$target_file."','".$status."')";
                if (mysqli_query($conn, $sql_insert)) {
                    //echo "New record created successfully";
                    header("location:product.php");
                } 
                else {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }       
            }
            else{
                echo "co loi upload";
            }
        } 
    }
    // xoa du lieu
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $id = $_GET["id"];
        $sql_delete = "delete from tbl_product where product_id = ".$id;
        if (mysqli_query($conn, $sql_delete)) {
            // echo "New record created successfully";
            header("location:product.php");
          } 
          else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
    //
    if(isset($_POST["delete_check"])){
        $product_id = $_POST["product"];
        foreach($product_id as $c){
            $sql_delete = "delete from tbl_product where product_id = ".$c;
            if (mysqli_query($conn, $sql_delete)) {
            // echo "New record created successfully";
            header("location:product.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
    }
    if(isset($_POST["delete-all"])){
        $sql_delete_all = "DELETE FROM tbl_product";
        if ($conn->query($sql_delete_all) === TRUE) {
            echo "Dữ liệu đã được xóa thành công";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
    
?>

        <div class="bot">
            <h1>Trang quản trị sản phẩm</h1>
            <div class="row">
                <div class="col-6">
                    <form action="product.php" method="post" enctype="multipart/form-data">
                        Nhập tên danh mục:
                        <select class="form-control" name="cate_id" id="">
                            <option value="#">Chọn Danh Mục</option>
                            <?php
                                $sql = "select * from tbl_category order by cate_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) 
                                    { echo "<option value='".$row["cate_id"]."'>".$row["cate_name"]."</option>";
                                    }
                                }    
                            ?>
                        </select>
                        <br>
                        Nhập tên loại sản phẩm:
                        <select class="form-control" name="brand_id" id="">
                            <option value="#">Chọn Loại Sản Phẩm</option>
                            <?php
                                $sql = "select * from tbl_brand order by brand_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) 
                                    { echo "<option value='".$row["brand_id"]."'>".$row["brand_name"]."</option>";
                                    }
                                }    
                            ?>
                        </select>
                        <br>
                        Nhập tên sản phẩm:
                        <input class="form-control" type="text" name="product_name" id="">
                        <br>
                        Nhập giá cũ:
                        <input class="form-control" type="text" name="product_price" id="">
                        <br>
                        Nhập giá khuyến mãi:
                        <input class="form-control" type="text" name="product_price_new" id="">
                        <br>
                        Chọn ảnh đại diện:
                        <input class="form-control" type="file" name="img" id="">
                        <br>
                        Nhập vào trạng thái:
                        <input class="form-control" type="text" name="status" id="">
                        <br>
                        <input class="btn btn-primary" type="submit" value="Thêm mới" name="insert">
                        <br>
                        <br>
                        <input placeholder="Nhập vào tên sản phẩm........." class="form-control" type="text" name="txt_search">
                        <br>
                        <input class="btn btn-success" type="submit" value="search" name="search">
                    </form>
                </div>
            <div class="row">
                <div class="col-12">
                <?php
                         $result = mysqli_query($conn, 'select count(product_id) as total from tbl_product');
                         $row = mysqli_fetch_assoc($result);
                         $total_records = $row['total'];
                         //tim limit va current page
                         $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 5;
                        // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                        // tổng số trang
                        $total_page = ceil($total_records / $limit);
                        
                        // Giới hạn current_page trong khoảng 1 đến total_page
                        if ($current_page > $total_page){
                            $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                            $current_page = 1;
                        }
                        
                        // Tìm Start
                        $start = ($current_page - 1) * $limit;
                    ?>
                    <table class="table table-stripped">
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Mã danh mục</th>
                            <th>Mã loại sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá cũ</th>
                            <th>Giá khuyến mãi</th>
                            <th>Ảnh đại diện</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            <th>Chọn</th>
                        </tr>
                        <form action="product.php" method="post">
                            <input type="submit" value="Xóa chọn" name="delete_check" class="btn btn-info">
                            <input type="submit" value="Xóa tất cả" name="delete-all" class="btn btn-danger">
                            <?php
                            $sql = "";
                            if(isset($_POST["search"]))
                            {
                                $sql = "select * from tbl_product where product_name like '%".$_POST["txt_search"]."%'";
                            }
                            else
                                $sql = "select * from tbl_product LIMIT $start,$limit";

                        //    require("../config.php");    
                        //    $sql = "select * from tbl_news order by news_id DESC";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                                $s = "";
                                if($row["status"]==0){
                                    $s = "<p style='color: red'>An</p>";
                                }
                                else{
                                    $s = "<p style='color: green'>Hien</p>";
                                }
                                echo "<tr>";
                                echo "<td>".$row["product_id"]."</td>";
                                echo "<td>".$row["cate_id"]."</td>";
                                echo "<td>".$row["brand_id"]."</td>";
                                echo "<td>".$row["product_name"]."</td>";
                                echo "<td>".$row["product_price"]."</td>";
                                echo "<td>".$row["product_price_new"]."</td>";
                                echo "<td><img style='width: 150px; height: 150px;' src='".$row["img"]."'></td>";
                                echo "<td>".$s."</td>";
                                echo "<td>";
                                    echo "<a class='btn btn-warning' href='update_product.php?task=update&id=".$row["product_id"]."'>Sua</a>";
                                    echo "<a class='btn btn-danger' href='product.php?task=delete&id=".$row["product_id"]."'>Xoa</a>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='checkbox' name='product[]' value='".$row["product_id"]."' class='form-check-input'>";
                                echo "</td>";
                                echo "</tr>";
                                // echo $row["news_id"] . " , " . $row["title"] . "<br>";
                            }
                            } 
                            else {
                                echo "0 results";
                            }
                        ?>
                        </form>
                    </table>
                    <div class="pagination">
                    <?php 
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="product.php?page='.($current_page-1).'">Truoc</a> | ';
                        }
                         
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<span>'.$i.'</span> | ';
                            }
                            else{
                                echo '<a href="product.php?page='.$i.'">'.$i.'</a> | ';
                            }
                        }
                         
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="product.php?page='.($current_page+1).'">Sau</a> | ';
                        }
                    ?>
        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>