<?php
 if(!isset($_SESSION)) 
 { 
    session_start();
 } 
 if(!isset($_SESSION['nameAccount']))
        header("Location: ../login/signin.php");
    if ($_SESSION['typeAccount']!="3")
        header("Location: ../login/signin.php"); 
        $menu=1;
        if(isset($_GET['menu'])) $menu=$_GET['menu'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller - Travel App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    
<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-clinic-medical"><a href="../user/index.php">Home</a></span> <span>Quản lý bán tour</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="index.php?menu=1" class="<?php if($menu==1) echo "active";?>"><span class="las la-home"></span>
                    <span>Tour của bạn</span></a>
                </li>
                <li>
                    <a href="input_tour.php?menu=2" class="<?php if($menu==2) echo "active";?>"><span class="las la-plus-circle"></span>
                    <span>Thêm mới tour</span></a>
                </li>
                <li>
                    <a href="listinvoice.php?menu=3" class="<?php if($menu==3) echo "active";?>"><span class="las la-calendar"></span>
                    <span>Quản lý booking</span></a>
                </li>
                <li>
                    <a href=""><span class="lar la-chart-bar" class="<?php if($menu==4) echo "active";?>"></span>
                    <span>Thống kê doanh thu</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-history" class="<?php if($menu==5) echo "active";?>"></span>
                    <span>Lịch sử</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-search" class="<?php if($menu==6) echo "active";?>"></span>
                    <span>Báo cáo</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-book-medical" class="<?php if($menu==7) echo "active";?>"></span>
                    <span>Thông tin</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Travel - app
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>
            <div class="user-wrapper">
                <img src="img/Avatar.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Seller</h4>
                    <small><?php echo $_SESSION['nameAccount'];?></small>
                </div>
            </div>
        </header>
