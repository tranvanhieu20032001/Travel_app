<?php
if(!isset($_SESSION)) 
{ 
session_start();
}
if(!isset($_SESSION['nameAccount'])) echo "a";
else{
include '../admin/api/api.php';
$baseurl='http://localhost:8080/';
$account =get($baseurl.'account/'.$_SESSION['idAccount']);

print_r($account);

}
?>
<?php include './inc/header.php';?>

<main>

<link rel="stylesheet" href="./assets/css/styleqltk.css">
<link rel="stylesheet" href="./assets/css/qltaikhoancn.css">
    <div class="main">
        <form action="" method="POST" class="form" >
            <h3 class="heading">Xin chào <?php echo $account['fullName']?></h3>
            <div class="avatar">
                <img src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt="">
                <div class="change-remove-avatar" style="margin-right:35px">
                    <button class="btn btn_xoa" style="padding:0">Xóa avatar</button>
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu cũ</label>
                <div class="wrap-ip">
                    <input id="password" name="oldpassword" type="password" placeholder="Nhập mật khẩu" class="form-control showps" >
                    <div class="show-pass">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                <span class="form-message"></span>
            </div>

             <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="wrap-ip">
                    <input id="password" name="newpassword" type="password" placeholder="Nhập mật khẩu" class="form-control showps">
                    <div class="show-pass">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password_confirm" class="form-label">Nhập lại mật khẩu</label>
                <div class="wrap-ip">
                    <input id="password_confirm" name="password_confirm" placeholder="Nhập lại mật khẩu" type="password"
                        class="form-control showps">
                        <div class="show-pass">
                            <i class="fas fa-eye"></i>
                        </div>

                </div>
                <span class="form-message"></span>
            </div>
            
            <button type="submit" class="form-submit" id="submitBtn">Thay đổi mật khẩu</button>
            
        </form>
    </div>
    <script src="./assets/js/validation.js"></script>
  <script>
    
     Validator({
            form: '#form-4',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập tên đăng nhập'),
                Validator.isPhone('#phone', 10),
                Validator.minLength('#password', 6),
                Validator.isRequired('#password_confirm'),
                Validator.isConfirmed('#password_confirm', function () {
                    return document.querySelector('#form-4 #password').value;
                }, 'Mật khẩu nhập lại không chính xác')
            ],
            onSubmit: function () {
                // Call API
                event.preventDefault();
                console.log("Hieu");
            }
        })
  </script>


</main>   
<?php include './inc/footer.php';?>