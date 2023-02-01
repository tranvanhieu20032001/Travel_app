<?php
    if(!isset($_SESSION)) 
    { 
    session_start();
    }
    include_once('../admin/api/api.php'); 
    $baseurl='http://localhost:8080/';
    $listcategory = get($baseurl.'category/active');    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <!-- animate cho Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="root.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="./assets/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    
</head>

<body>

    <!-- header section starts      -->

    <header class="header">
        <div class="header_top">
            <ul class="header_top-list-icon">
                <span class="item_text">Theo dõi: </span>
                <li class="header_top-item item_brand"><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li class="header_top-item item_brand"> <a href=""><i class="fab fa-twitter"></i></a></li>
                <li class="header_top-item item_brand"> <a href=""><i class="fab fa-instagram"></i></a></li>
                <li class="header_top-item item_brand"> <a href=""><i class="fab fa-pinterest"></i></a></li>
            </ul>
            <ul class="header_top-list <?php if(isset($_SESSION['nameAccount'])) echo "active";?>">
                <li class="header_top-item item_text">
                    <a href="qltaikhoan.php">
                        <div class="wrap-user">
                            <div class="wrap-user-avatar">
                                <img src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt=""
                                    class="avatar-mini">
                            </div>
                            <div class="user-name"><?php if(isset($_SESSION['nameAccount'])) echo $_SESSION['nameAccount']; ?></div>
                        </div>
                    </a>
                </li>
                <li class="header_top-item item_text">
                    <a href="../admin/logout.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
                </li>
            </ul>
            <ul class="header_top-list <?php if(!isset($_SESSION['nameAccount'])) echo "active";?>">
                <li class="header_top-item item_text">
                    <a href="../login/signin.php"><i class="fas fa-sign-in-alt"></i>Đăng nhập</a>
                </li>
                <li class="header_top-item item_text">
                    <a href="../login/signup.php"><i class="fas fa-user"></i>Đăng kí</a>
                </li>
            </ul>
        </div>
        <div class="header_mid">
            <div class="logo ">
                <img src="assets/image/logo.png" alt="" height="100%" class="left">
            </div>
            <div class="wrap_boxsearch">
                <div class="dropdown_list">
                    <i class="fas fa-list-ul"></i>
                </div>
                <div>
                <form action="../user/searchtour.php" method="POST">
                <div class="box-search">
                
                    <input class="_input" type="text" name="txtsearch" placeholder="Tìm kiếm..." value="<?php if(isset($_POST['txtsearch'])) echo $_POST['txtsearch']?>">
                    <span class="search_icon"><i class="fas fa-search"></i></span>
                
                </div>
                </form>
                </div>
                <div class="hotline">
                    <div class="_icon-hotline">
                        <img src="assets/image/hotline.png" alt="" height="100%">
                    </div>
                    <div class="_phone">
                        <span class="item_text">Hotline: </span>
                        <div class="_phone-number">0368 766 753</div>
                    </div>
                </div>

            </div>
        </div>
        <nav class="tabs">
        <div class="tab-item">
                <a href="index.php" aria-current="page"><i class="tab-icon fas fa-home"></i>Trang Chủ</a>
            </div>
            <div class="tab-item">
                <a href="https://www.facebook.com/" target="_blank"><i class="tab-icon fas fa-ad"></i>Giới Thiệu</a>
            </div>
            <div class="tab-item" id="sanpham">
                <a href="tourincategory.php"><i class="tab-icon fab fa-pagelines"></i>Danh mục<i
                        class="fas fa-chevron-circle-down"></i></a>
                <div class="dropdown-content">
                    <?php foreach($listcategory as $value){?>
                    <a href="#"><?php echo $value['name'];?></a>
                    <?php }?>                   
                </div>
            </div>
            <div class="tab-item">
                <a href="#4"><i class="tab-icon fas fa-newspaper"></i>Book Tour</a>
            </div>
            <div class="tab-item">
                <a href="#5"><i class="tab-icon fas fa-phone-square-alt"></i>Liên Hệ</a>
            </div>
            <?php if(isset($_SESSION['typeAccount'])){if( $_SESSION['typeAccount']=="3") {?>
            <div class="tab-item">
                <a href="../seller/index.php"><i class="tab-icon fas fa-tools"></i>Bán Tour</a>
            </div>
            <?php }}?>
            
            <?php if(isset($_SESSION['typeAccount'])){?>
            <div class="tab-item">
                <a href="./invoicehistory.php?type=0"><i class="tab-icon tab-icon fas fa-history"></i>Lịch Sử Hóa Đơn</a>
            </div>
            <?php }?>

            <div class="line"></div>
        </nav>
    </header>