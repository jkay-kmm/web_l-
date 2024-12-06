<?php
    require("config.php");
    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password_re = $_POST["password_re"];
        if($password!=$password_re){
            echo "mat khau k khop de nghi nhap lai";
        }
        else{
            $sql = "select * from tbl_user where user_name = '".$username."'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "ten dang nhap da ton tai";
            }
            else{
                $sql_insert = "insert into tbl_user(user_name, password, status) values('".$username."','".$password."', '1')";
                if (mysqli_query($conn, $sql_insert)) {
                    header("location:login.php");
                } 
                else {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }
            }
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
    <style>
body {
  background-image: url('../img/anh1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
h1, p{
    color: white;
}
</style>
</head>
<body>
    <div class="container">
        <form action="register.php" method="post">
        <h1 style="text-align: center">Trang đăng ký Tài khoản</h1>
        <p>Nhap vao ten dang nhap:</p>
        <input type="text" name="username" class="form-control">
        <p>Nhap vao mat khau:</p>
        <input type="password" name="password" class="form-control">
        <p>Nhap lai mat khau:</p>
        <input type="password" name="password_re" class="form-control">
        <br>
        <input type="submit" value="Dang ky" name="register" class="btn btn-primary">
        <a class="btn btn-primary" href="login.php">đăng nhap</a>
        </form>
    </div>
</body>
</html>