<?php
    require("config.php");
    session_start();
    if(isset($_POST["login"])){
        $user_name = $_POST["txt_username"];
        $password = $_POST["txt_password"];
        $sql = "select * from tbl_user where user_name = '".$user_name."' and password = '".$password."' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION["user_name"] = $user_name;
            header("location:category.php");
        }
        else {
            echo "Sai ten dang nhap hoac mat khau";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/bootstrap.mim.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
  background-image: url('../img/anh1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
p {
    color: white;
}
</style>

<body>
    <div class="container">
        <h1 style="text-align: center; color: white">Login</h1>
        <div class="login">
        <form action="login.php" method="post">
            <p>nhập tên đăng nhập:</p>
            <input type="text" name="txt_username" class="form-control" id="" placeholder="Username" >
            <p>Nhập mật khẩu:</p>
            <input type="password" name="txt_password" class="form-control" id="" placeholder="Password">
            <br>
            <input type="submit" value="Đăng nhập" name="login" class="btn btn-primary">
            <a class="btn btn-primary" href="register.php">đăng ký</a>

        </form>
        </div>
    </div>
</body>
</html>