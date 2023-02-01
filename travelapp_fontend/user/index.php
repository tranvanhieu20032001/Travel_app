<?php include_once('../admin/api/api.php');
    $baseurl='http://localhost:8080/';
    $listcategory = get($baseurl.'category/active');
    $listcategoryHome = get($baseurl.'category/home');
    $listTourSale = get($baseurl.'tour/sale');
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
    <title>Travel - app</title>
    <!-- animate cho Swiper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="root.css">
    <link rel="stylesheet" href="./assets/css/trangchu.css">

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
                <form action="../user/searchtour.php" method="POST">
                <div class="box-search">
                
                    <input class="_input" type="text" name="txtsearch" placeholder="Tìm kiếm..." value="<?php if(isset($_POST['txtsearch'])) echo $_POST['txtsearch']?>">
                    <span class="search_icon"><i class="fas fa-search"></i></span>
                
                </div>
                </form>
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
            <div class="tab-item active">
                <a href="#1" aria-current="page"><i class="tab-icon fas fa-home"></i>Trang Chủ</a>
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
                <a href="./invoicehistory.php?type=0"><i class="tab-icon fas fa-history"></i>Lịch Sử Hóa Đơn</a> 
            </div>
            <?php }?>

            <div class="line"></div>

        </nav>

    </header>


    <!--Main body  -->
    <main>
        <div class="slider">
            <div class="magintop"></div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="https://cdn.pixabay.com/photo/2018/08/16/08/39/hallstatt-3609863_960_720.jpg" alt="">
                        <div class="text-content">
                            <h2 class="text-heading">Du lịch giá rẻ</h2>
                            <div class="text-description">
                                Greenhouse travel mang đến cho bạn những tour du lịch hấp dẫn, độc đáo, giá cả hợp lí
                            </div>
                            <button class="btn_chitiet">Xem chi tiết</button>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://cdn.pixabay.com/photo/2017/04/15/11/51/mt-fuji-2232246_960_720.jpg" alt="">
                        <div class="text-content">
                            <h2 class="text-heading">Du lịch giá rẻ</h2>
                            <div class="text-description">
                                Greenhouse travel mang đến cho bạn những tour du lịch hấp dẫn, độc đáo, giá cả hợp lí

                            </div>
                            <button class="btn_chitiet">Xem chi tiết</button>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <img src="https://cdn.pixabay.com/photo/2019/11/24/08/07/lugu-lake-4648775_960_720.jpg" alt="">
                        <div class="text-content">
                            <h2 class="text-heading">Du lịch giá rẻ</h2>
                            <div class="text-description">
                                Greenhouse travel mang đến cho bạn những tour du lịch hấp dẫn, độc đáo, giá cả hợp lí
                            </div>
                            <button class="btn_chitiet">Xem chi tiết</button>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="section-banner">
            <?php foreach($listcategoryHome as $value){ ?>
            <div class="single-banner">
                <img src="../admin/<?php echo $value['image']?>" alt="">
                <div class="banner-content">
                    <div class="banner-title">
                        <?php echo $value['name'];?>
                    </div>
                    <!-- <div class="banner-subtitle">Flash sale</div>
                    <div class="percent-sale">50%</div> -->
                </div>
                <div class="hover_banner"></div>
            </div>
            <?php }?>
          
        </div>
        <div class="product-cards">
            <div class="product-cards_title">Khám Phá Tour Du Lịch</div>
            <div class="product-cards_tour">
                <?php foreach($listTourSale as $value){?>
                <div class="product-card_single">
                    <div class="thumbnail-tour">
                        <a href="chitiet.php?id=<?php echo $value['id'];?>">
                            <img src="../seller/upload/<?php $img=explode(';',$value["image"]); echo $img[0];?>"
                                alt="" class="thumbnail">
                        </a>
                    </div>
                    <div class="detail-tour">
                        <div class="title-tour">
                            <a href="chitiet.php?id=<?php echo $value['id'];?>"><?php echo $value['subTitle']?></a>
                        </div>
                        <div class="schedule"> 4 ngày - 3 đêm</div>
                        <div class="transport">
                            <span class="vihicle">Phương tiện: </span>

                            <?php foreach (explode(';',$value['vehicle']) as $pt){ ?>
                            <i class="fas fa-<?php echo $pt;?>"></i>
                            <?php } ?>
                            
                        </div>
                        <div class="service">
                            <?php $services=get($baseurl.'tourservice/'.$value['id']); 
                            if($services==null) echo"Không có dịch vụ..."; else foreach($services as $service) {echo $service['service']['logo'];}?>
                        </div>
                        <div class="new-price"><?php echo $english_format_number = number_format($value["price"]-($value["price"]*$value['sale']));?> VDN/người</div>
                        <div class="old-price"><?php echo $english_format_number = number_format($value["price"]);?> VND/người</div>
                        <div class="stars-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <a href="chitiet.php?id=<?php echo $value['id'];?>"><button class="btn_xemthem">Xem thêm</button></a>
                        
                    </div>
                </div>
                <?php }?>

               

               
            </div>
        </div>
    </main>
    <section class="review" id="review">
        <h1 class="heading"> Reviews</h1>

        <div class="swiper-container review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <div class="user-review">
                        <img class="user-review_avatar"
                            src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt="">
                        <div class="user-info">
                            <h3 class="user-name">Thanh Tinh</h3>
                            <div class="user-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        Một phát hiện đã tiết lộ rằng nền văn minh Babylon đã thực sự rất tiến bộ nói chung và về phương
                        diện toán học nói riêng. Mới đây các nhà khảo cổ đã tìm thấy một tấm bảng hình tròn bằng đất sét
                        có từ 3.700 năm trước (sớm hơn 1000 năm so với ngày sinh của nhà toán học Pythagoras).
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="user-review">
                        <img class="user-review_avatar"
                            src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt="">
                        <div class="user-info">
                            <h3 class="user-name">Thanh Tinh</h3>
                            <div class="user-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        Một phát hiện đã tiết lộ rằng nền văn minh Babylon đã thực sự rất tiến bộ nói chung và về phương
                        diện toán học nói riêng. Mới đây các nhà khảo cổ đã tìm thấy một tấm bảng hình tròn bằng đất sét
                        có từ 3.700 năm trước (sớm hơn 1000 năm so với ngày sinh của nhà toán học Pythagoras).
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="user-review">
                        <img class="user-review_avatar"
                            src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt="">
                        <div class="user-info">
                            <h3 class="user-name">Thanh Tinh</h3>
                            <div class="user-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        Một phát hiện đã tiết lộ rằng nền văn minh Babylon đã thực sự rất tiến bộ nói chung và về phương
                        diện toán học nói riêng. Mới đây các nhà khảo cổ đã tìm thấy một tấm bảng hình tròn bằng đất sét
                        có từ 3.700 năm trước (sớm hơn 1000 năm so với ngày sinh của nhà toán học Pythagoras).
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="user-review">
                        <img class="user-review_avatar"
                            src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt="">
                        <div class="user-info">
                            <h3 class="user-name">Thanh Tinh</h3>
                            <div class="user-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        Một phát hiện đã tiết lộ rằng nền văn minh Babylon đã thực sự rất tiến bộ nói chung và về phương
                        diện toán học nói riêng. Mới đây các nhà khảo cổ đã tìm thấy một tấm bảng hình tròn bằng đất sét
                        có từ 3.700 năm trước (sớm hơn 1000 năm so với ngày sinh của nhà toán học Pythagoras).
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="user-review">
                        <img class="user-review_avatar"
                            src="https://cdn.pixabay.com/photo/2020/05/10/07/40/man-5152638_960_720.jpg" alt="">
                        <div class="user-info">
                            <h3 class="user-name">Thanh Tinh</h3>
                            <div class="user-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        Một phát hiện đã tiết lộ rằng nền văn minh Babylon đã thực sự rất tiến bộ nói chung và về phương
                        diện toán học nói riêng. Mới đây các nhà khảo cổ đã tìm thấy một tấm bảng hình tròn bằng đất sét
                        có từ 3.700 năm trước (sớm hơn 1000 năm so với ngày sinh của nhà toán học Pythagoras).
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">

        <div class="box-container">
    
            <div class="box">
                <div class="logo ">
                    <img src="assets/image/logo.png" alt="" height="100%" class="left">
                </div>
                <p> Một phát hiện đã tiết lộ rằng nền văn minh Babylon đã thực sự rất tiến bộ nói chung và về phương
                    diện toán học nói riêng.</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
    
            <div class="box">
                <h3>Thông Tin liên hệ</h3>
                <a href="#" class="links"> <i class="fas fa-phone"></i> 0123456789 </a>
                <a href="#" class="links"> <i class="fas fa-phone"></i> 0987654321 </a>
                <a href="#" class="links"> <i class="fas fa-envelope"></i> tranvanhieu20032001@gmai.com </a>
                <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Đa Nang, Viet Nam </a>
            </div>
    
            <div class="box">
                <h3>Liên kết nhanh</h3>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i>Tour</a>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i> Liên hệ </a>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i> Dịch Vụ </a>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i> review </a>
                <a href="#" class="links"> <i class="fas fa-arrow-right"></i> Tin Tức </a>
            </div>
    
            <div class="box">
                <h3>Thông báo mới</h3>
                <p>Đăng kí để nhận thông báo mới nhất</p>
                <input type="email" placeholder="nhập email" class="email">
                <input type="submit" value="subscribe" class="btn">
                <img src="image/payment.png" class="payment-img" alt="">
            </div>
    
        </div>    
    </section>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- custom js file link  -->
    <script src="./assets/js/trangchu.js"></script>

</body>

</html>