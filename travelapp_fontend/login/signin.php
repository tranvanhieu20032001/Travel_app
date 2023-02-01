<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css" />
    <title>Trang chủ</title>
</head>

<body>
<?php
if(isset($_POST['txtcapcha'])){
    $capcha=$_POST['txtcapcha'];
    if(strcasecmp($capcha,$_SESSION['capcha'])==0){
        if(isset($_POST['nameaccount'])&&isset($_POST['password']))
        {
        $ac = $_POST['nameaccount'];
        $pw = $_POST['password'];
        $acc = array("nameAccount" => $ac, "password" => $pw);
        include '../admin/api/api.php';
        $result=post('http://localhost:8080/account/login',$acc);
        if($result['status']=="1")
        {
            $_SESSION['nameAccount']=$result['account']['nameAccount'];
            $_SESSION['idAccount']=$result['account']['id'];
            $_SESSION['typeAccount']=$result['account']['typeAccount'];
            echo '<script>alert("Đăng nhập thành công")</script>';
            if ($result['account']['typeAccount']=="2")
                echo "<script> window.location.href='../admin/listcategory.php'; </script>";
            else if($result['account']['typeAccount']=="3") 
                echo "<script> window.location.href='../seller/index.php'; </script>";
            else {
                echo "<script> window.location.href='../user/index.php'; </script>";
            }
        }
        else echo "<script>alert('".$result['message']."')</script>";
       
        }       
    }
        else{
            echo '<script>alert("Mã xác nhận không chính xác")</script>';
        }
    }
        include "capcha.php";
    ?>
    <div class="main">
        <form action="signin.php" method="POST" class="form" id="form-2">
            <h3 class="heading">Đăng nhập</h3>
            <p class="desc">Wellcome to Travel ❤️</p>

            <div class="form-group">
                <label for="fullname" class="form-label">User name</label>
                <input id="fullname" name="nameaccount" type="text" placeholder="Email or phone" class="form-control" required/>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter password"
                    class="form-control" required/>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Capcha</label>
                <input id="capcha" name="txtcapcha" type="text" placeholder="Enter password" minlength="4" maxlength="4"
                    class="form-control" required />
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="lbcapcha" class="form-label" style="text-transform: uppercase;font-size: large;"><?php echo $_SESSION['capcha']; ?></label>
                <!-- <input id="capcha" name="txtcapcha" type="text" placeholder="Enter password"
                    class="form-control" required />
                <span class="form-message"></span> -->
            </div>
            <div class="form-notify ">
                <i class="icon-notify fas fa-check-circle"></i>
                <span class="notify-message">Đăng nhập thành công</span>
            </div>
            <a href="signup.php">Sign up</a>

            <input type="submit" class="form-submit" id="submitBtn" name="login" value="Dang nhap"/>
        </form>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/g/lodash@4(lodash.min.js+lodash.fp.min.js)"></script> -->
    <script src="validation.js"></script>
    <script>
        // Mong muốn của chúng ta
        Validator({
            form: "#form-2",
            formGroupSelector: ".form-group",
            errorSelector: ".form-message",
            rules: [
                Validator.isRequired(
                    "#fullname",
                    "Vui lòng nhập tên đăng nhập của bạn"
                ),
                Validator.minLength("#password", 6),
            ],
            
        });  
          
    </script>


</body>

</html>