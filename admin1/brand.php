<?php
    require("config.php");
    session_start();
    if(!$_SESSION["user_name"]){
        header("location:login.php");
    }
    //kiem tra xem nguoi dung da nhan nut insert hay chua
    // $brand = mysqli_query($conn,"SELECT tbl_brand.*,tbl_category.cate_name AS 'cate_name' FROM tbl_brand JOIN tbl_category ON tbl_brand.cate_id = tbl_category.cate_id");
    if(isset($_POST["insert"])){
        $cate_id = $_POST["cate_id"];
        $brand_name = $_POST["txt_brand_name"];
        $status = $_POST["txt_status"];
        //viet cau truy van de insert du lieu
        $sql_insert = "insert into tbl_brand(cate_id, brand_name, status) values(".$cate_id.", N'".$brand_name."' ,".$status.")";
        // $sql = "insert into tbl_news(title, content, author, post_date) values(N'',N'',N'',N'')";
        if (mysqli_query($conn, $sql_insert)) {
            // echo "New record created successfully";
            header("location:brand.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
    //xoa du lieu.+
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $id = $_GET["id"];
        $sql_delete = "delete from tbl_brand where brand_id = ".$id;
        if (mysqli_query($conn, $sql_delete)) {
            // echo "New record created successfully";
            header("location:brand.php");
          } 
          else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
    //
    if(isset($_POST["delete_check"])){
        $cate_id = $_POST["brand"];
        foreach($cate_id as $c){
            $sql_delete = "delete from tbl_brand where brand_id = ".$c;
            if (mysqli_query($conn, $sql_delete)) {
            // echo "New record created successfully";
            header("location:brand.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        }
    }
    if(isset($_POST["delete-all"])){
        $sql_delete_all = "DELETE FROM tbl_brand";
        if ($conn->query($sql_delete_all) === TRUE) {
            echo "Dữ liệu đã được xóa thành công";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
?>
<?php
include 'headerqt.php';
?>
        <div class="bot">
            <h1>Trang quản trị loại danh mục</h1>
            <div class="row">
                <div class="col-6">
                    <form action="brand.php" method="post">
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
                        <input class="form-control" type="text" name="txt_brand_name" id="">
                        <br>
                        Nhập vào trạng thái:
                        <input class="form-control" type="text" name="txt_status" id="">
                        <br>
                        <input class="btn btn-primary" type="submit" value="Thêm mới" name="insert">
                        <br>
                        <br>
                        <input placeholder="Nhập vào tên loại danh mục........." class="form-control" type="text" name="txt_search">
                        <br>
                        <input class="btn btn-success" type="submit" value="search" name="search">
                    </form>
                </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-stripped">
                        <tr>
                            <th>Mã loại sản phẩm</th>
                            <th>Mã danh mục</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                            <th>Chọn</th>
                        </tr>
                        <form action="brand.php" method="post">
                            <input type="submit" value="Xóa chọn" name="delete_check" class="btn btn-info">
                            <input type="submit" value="Xóa tất cả" name="delete-all" class="btn btn-danger">
                        <?php
                            $sql = "";
                            if(isset($_POST["search"]))
                            {
                                $sql = "select * from tbl_brand where brand_name like '%".$_POST["txt_search"]."%'";
                            }
                            else
                                $sql = "select * from tbl_brand order by brand_id DESC";

                        //    require("../config.php");    
                        //    $sql = "select * from tbl_category order by cate_id DESC";
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
                                echo "<td>".$row["brand_id"]."</td>";
                                echo "<td>".$row["cate_id"]."</td>";
                                echo "<td>".$row["brand_name"]."</td>";
                                echo "<td>".$s."</td>";
                                echo "<td>";
                                    echo "<a class='btn btn-warning' href='update_brand.php?task=update&id=".$row["brand_id"]."'>Sua</a>";
                                    echo "<a class='btn btn-danger' href='brand.php?task=delete&id=".$row["brand_id"]."'>Xoa</a>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<input type='checkbox' name='brand[]' value='".$row["brand_id"]."' class='form-check-input'>";
                                echo "</td>";
                                echo "</tr>";
                                // echo $row["cate_id"] . " , " . $row["cate_name"] . "<br>";
                            }
                            } 
                            else {
                                echo "0 results";
                            }
                        ?>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>