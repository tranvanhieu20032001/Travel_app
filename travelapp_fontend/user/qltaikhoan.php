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
    
        <form action="update.php" method="POST" class="form" >
            <h3 class="heading">Xin chào <?php echo $account['fullName']?></h3>
            <div class="avatar">
                <img src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt="">
                <div class="change-remove-avatar" style="margin-right:35px">
                    <button class="btn btn_xoa" style="padding:0">Xóa avatar</button>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Tên đăng nhập</label>
                <input id="name" name="name" type="text" placeholder="VD: abc" class="form-control"
                    value="<?php echo $account['nameAccount']?>" readonly>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: email@domain.com" class="form-control"
                    value="<?php echo $account['email']?>" readonly>
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="fullname" class="form-label">Họ Và Tên</label>
                <input id="fullname" name="fullname" type="text" value="<?php echo $account['fullName']?>" placeholder="VD: Văn Hiếu" class="form-control" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label" value="" >Địa chỉ</label>
                <div class="wrap-ip">
                    
                </div>
                <input id="phone" name="address" type="text" placeholder="Phone" class="form-control" value="<?php echo $account['address']?>" required>
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="phone" class="form-label" value="" >Số Điện Thoại</label>
                <div class="wrap-ip">
                    
                </div>
                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control" value="<?php echo $account['phoneNumber']?>" required>
                <span class="form-message"></span>
            </div>
            <!-- <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="wrap-ip">
                    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control showps" value="<?php echo $account['password']?>">
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
            </div> -->
            
            <button type="submit" name="update" class="form-submit" id="submitBtn">Cập nhật</button>
            <a href="updatetk.php" style="margin-top:15px">Thay đổi mật khẩu</a>
        </form>
    </div>
    



</main>   
<?php include './inc/footer.php';?>