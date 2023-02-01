<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trang chủ</title>
</head>

<body>
    <div class="main">
        <form action="signup.php" method="POST" class="form" id="form-1">
            <h3 class="heading">Đăng kí thành viên</h3>
            <p class="desc">Wellcome to Travel ❤️</p>

            <div class="form-group">
                <label for="fullname" class="form-label" >Họ Và Tên (*)</label>
                <input id="fullname" name="fullname" type="text" placeholder="VD: Văn Hiếu" class="form-control" minlength="3" maxlength="50" required>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email (*)</label>
                <input id="email" name="email" type="text" placeholder="VD: nameemail@gmail.com" class="form-control" required>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Địa chỉ (*)</label>
                <input id="address" name="address" type="text" placeholder="VD:240/6 Thái Thị Bôi" class="form-control" required>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="address" class="form-label">Số điện thoại (*)</label>
                <input id="phone_number" name="phone_number" type="tel" placeholder="VD: 0355520976" class="form-control" pattern="(\+84|0)\d{9,10}" title="Nhập số điện thoại từ 10 đến 11 số"  required>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="fullname" class="form-label">Tên đăng nhập (*)</label>
                <input id="fullname" name="nameaccount" type="text" placeholder="VD: MyAccount" class="form-control" minlength="3" maxlength="50" required>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu (*)</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control" minlength="6" maxlength="50" required>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password_confirm" class="form-label">Nhập lại mật khẩu (*)</label>
                <input id="password_confirm" name="password_confirm" placeholder="Nhập lại mật khẩu" type="password" class="form-control" minlength="6" maxlength="50" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="seller" class="form-label">Seller</label>
                <input id="seller" name="seller" type="checkbox" style="margin-right: 300px;" class="form-control" value="3">
                <span class="form-message">Bạn có thể bán tour của mình</span>
            </div>
            <div class="form-notify">
                <i class="icon-notify fas fa-check-circle"></i>
                <span class="notify-message"></span>
            </div>
            <a href="signin.php">Sign in</a>
            <input type="submit" class="form-submit" id="submitBtn" name="signup" value="Dang ky"/>
        </form>
    </div>
    <script src='https://cdn.jsdelivr.net/g/lodash@4(lodash.min.js+lodash.fp.min.js)'></script>
    <script src="validation.js"></script>
    <script>
        // Mong muốn của chúng ta
        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập tên đăng nhập'),
                Validator.isEmail('#email'),
             
                Validator.minLength('#password', 6),
                Validator.isRequired('#password_confirm'),
                Validator.isConfirmed('#password_confirm', function () {
                    return document.querySelector('#form-1 #password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ],
            
        });

        
    </script>
     <?php
        if(isset($_POST['fullname']))
        {
        $fullname = $_POST['fullname'];
        $nameaccount = $_POST['nameaccount'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $typeAccount=1;
        if(isset($_POST['seller']))
            $typeAccount=$_POST['seller'];
        $acc = array("fullName" => $fullname,"email" => $email,"nameAccount" => $nameaccount, "password" => $password,"typeAccount" => $typeAccount,"address" => $address,"phoneNumber" => $phone_number,"status" => true);
        include '../admin/api/api.php';
        
        $result=post('http://localhost:8080/account/create',$acc);

        if($result['status']=="1")
        {
            $_SESSION['nameAccount']=$result['data']['nameAccount'];
            $_SESSION['typeAccount']=$result['data']['typeAccount'];
            $_SESSION['idAccount']=$result['data']['id'];
            echo "<script> window.location.href='../user/index.php'; </script>";
        }
        else 
        {
            echo $result['message'];
        }
       
        }
        
    ?>
</body>

</html>