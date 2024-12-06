<?php
//kiem tra xem ng dung an nut inset chua
require("config.php");
if(isset($_POST["btn_update"])){
    $id = $_POST["txt_cate_id"];
    $cate_name = $_POST["txt_cate_name"];
    $status = $_POST["txt_status"];
    $sql_update = "update tbl_category set cate_name = N'".$cate_name."', status=".$status." where cate_id=".$id;
    if (mysqli_query($conn, $sql_update)) {
        //echo "New record created successfully";
        header("location:category.php");
    }
    else{
        echo "Error: " . $sql_update . "<br>" . mysqli_error($conn) ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.mim.css"/>        
</head>
<body style="background-color: #FFFFCC;">
    <div class="container">
        <h1 style="text-align: center;">Trang cap nhat danh muc</h1>
        <div class="row">
            <div class="col-6">
                <form action="update_cate.php" method="post">
                    <?php
                    if(isset($_GET["task"]) && $_GET["task"] == "update"){
                        $id = $_GET["id"];
                        $sql_select = "select * from tbl_category where cate_id = " .$id;
                        $result = mysqli_query($conn,$sql_select);
                    }
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo "<input type='hidden' name='txt_cate_id' value='".$row["cate_id"]."'>";
                                echo "Nhap vao ten danh muc:";
                                echo "<input values='" .$row["cate_name"]."' class='form-control' type='text' name='txt_cate_name' id=''>";
                                echo "Nhap vao trang thai:";
                                echo "<input values='".$row["status"]."' class='form-control' type='text' name='txt_status' id=''>";
                            }                                                
                        }
                    ?>                    
                    <input class=" btn btn-primary" type="submit" value="Cap nhat " name="btn_update">
                </form>
            </div>
        </div>
        
                    </div>
                </div>
            </div>
        </body>
        </html>