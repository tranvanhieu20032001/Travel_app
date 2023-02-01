<?php  
        include '../admin/api/api.php';
        $baseurl='http://localhost:8080/';
        $id=1;
        if(isset($_GET['id']))
            $id=$_GET['id'];
        
        $tour =get($baseurl.'tour/'.$id);
        if($tour==null) echo "<script> window.location.href='notfound.php'; </script>";
        $pt=explode(';',$tour["vehicle"]);
        $listImage=explode(';',$tour["image"]);
        $service=get($baseurl.'tourservice/'.$id);
        $rating = get($baseurl.'rating/ratingtour/'.$id);
?>
<?php include './inc/header.php';?>
<link rel="stylesheet" href="./assets/css/chitiettour.css">
<div class="wrapper" style="margin-top:200px;margin-buttom:200px">
        <h1 class="title-tour"><?php if($tour["title"]==null) echo "Đang cập nhật..."; echo $tour["title"];?> | <?php echo $tour["subTitle"];?></h1>
        <div class="details">
            <div class="left-details">
                <div class="slider">
                    <div class="magintop"></div>
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            
                            <?php foreach($listImage as $img){ echo"";?>
                            <div class="swiper-slide">
                                <img src="../seller/upload/<?php echo $img;?>"
                                    alt="">
                                <!-- <div class="text-content">
                                    <h2 class="text-heading"></h2>
                                    <div class="text-description">
                                    </div>
                                    <button class="btn_chitiet"></button>
                                </div> -->
                            </div>
                            <?php } ?>
                          
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="tour-code">
                    <span class="title-code">Mã tour:</span>
                    <span class="code">TOUR<?php echo $tour["id"];?></span>
                </div>
                <div class="infor-tour">
                    <div class="location">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="city"><?php if($tour["address"]==null) echo "Đang cập nhật..."; echo $tour["address"];?></span>
                    </div>
                    <div class="schedule"> <?php echo $tour["inteval"];?></div>
                    <div class="transport">
                        <span class="vihicle">Phương tiện</span>
                        <?php foreach ($pt as $value) {
                             # code...
                             echo "<i class='fas fa-".$value."'></i><span> | </span>";
                        }?>
                        
                        <!-- <i class="fas fa-train"></i>
                        <i class="fas fa-plane"></i> -->
                    </div>
                </div>
                <div class="tour-start">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="">Khởi hành:</span>
                    <span class="start"><?php if($tour['dayStart']==null) echo ""; else{ 
                            $date=date_create($tour['dayStart']);
                            echo date_format($date,"d-m-Y");}?></span>
                </div>
                <div class="line"></div>
                <div class="service">
                    <h2>Dịch vụ kèm theo</h2>
                    <?php if($service==null) echo"Không có dịch vụ..."; else foreach($service as $sv){ ?>
                    <div class="service-accom">
                        <?php echo $sv["service"]["logo"]; ?>
                        <span class="city"><?php echo $sv["service"]["name"]; ?></span>
                    </div>
                    <?php }?>
                    

                    <p class="describe">
                    <?php echo $tour["describe"];?>
                    </p>

                    <h2>Tour có gì hấp dẫn ?</h2>
                    <pre style="font-size:15px;color:green" class="attract"><?php if($tour["interesting"]==null) echo "Đang cập nhật..."; else echo $tour["interesting"];?></pre>
                    <p class="note">Nhanh tay book ngay tour <?php echo $tour["title"];?> trọn gói giá tốt của
                        ThanhTinh travel qua hotline 1900 3398 thôi nào !</p>
                </div>
            </div>
            <div class="right-details">
                <div class="price">
                    <form action="booktour.php?idTour=<?php echo $tour["id"];?>" method="POST">
                    <div class="wrap-price">
                        <del class="price-dell" style="text-decoration: line-through"><?php echo $english_format_number = number_format($tour["price"]);?> VND/người</del>
                        <span class="price-current"><?php echo $english_format_number = number_format($tour["price"]-($tour["price"]*$tour['sale']));?> VND/người </span>
                    </div>
                    <div class="form-group">
                        <label for="select-time">Khởi hành</label>
                        <div class="dropdown">
                            <select name="select-time" class="dropdown-select" style="color: red;">
                                <!-- <option value="">Thời gian khởi hành</option> -->
                                <option value="1"><?php if($tour['dayStart']==null) echo ""; else{ 
                            $date=date_create($tour['dayStart']);
                            echo date_format($date,"Y-m-d");}?></option>                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="people" class="people">Số khách</label>
                        <input id="people" name="people" type="number" placeholder="Số khách" min="1" max="<?php echo $tour['slot'];?>" class="form-control" required />
                        <span class="form-message">Chi con <?php echo $tour['slot'];?> slot</span>
                    </div>
                    <button class="btn-dattour">Đặt tour</button>
                    </form>
                </div>
                <div class="contact">
                    <div class="lienhe">Liên Hệ Với Chúng tôi</div>
                    <div class="hotline">
                        <h2>Hotline</h2>
                        <div class="hotline-numbers">
                            <i class="fas fa-phone-square-alt"></i>
                            <span class="hotline-number">1900 3398</span>
                        </div>
                    </div>
                    <h2>Tư vấn viên</h2>
                    <div class="tuvanvien">
                        <div class="icon-phone">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="wrap-name">
                            <div class="name">
                            <?php if($tour["nameSeller"]==null) echo "Đang cập nhật..."; echo $tour["nameSeller"];?>
                            </div>
                            <div class="phone-number">
                            <?php echo $tour["phoneContact"];?>
                            </div>
                        </div>
                    </div>
                
                    <div class="line"></div>

                    <div class="logo-brand">
                        <div class="icon-brand">
                            <a href="https://www.facebook.com/profile.php?id=100009216958825"><i class="fab fa-facebook-square"></i></a>
                        </div>
                        <div class="icon-brand">
                            <a href=""><i class="fab fa-instagram-square"></i></a>
                        </div>
                        <div class="icon-brand">
                            <a href=""><i class="fab fa-twitter-square"></i></a>
                        </div>
                    </div>
                    <div class="line"></div>

                </div>
            </div>
        </div>

        <div>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="./assets/css/danhgia.css">
        <div class="row">
            <?php foreach($rating as $rate){ ?>
			<div class="col-sm-10">
				<hr/>
				<div class="review-block">
					<div class="row">
						<div class="col-sm-3">
							<img src="./assets/image/user.jpg" class="img-rounded" style="width: 50px;">
							<div class="review-block-name"><a href="#"><?php echo $rate['account']['fullName']?></a></div>
							<div class="review-block-date"><?php if($rate['time']==null) echo ""; else{ 
                            $date=date_create($rate['time']);
                            echo date_format($date," \N\g\à\y d \T\h\á\g m \N\ă\m Y");} ?><br/>1 day ago</div>
						</div>
                        <style>.rate:not(:checked) > label {color: #dfdf17c2;}</style>
						<div class="col-sm-9">
							<div class="review-block-rate">
                            <div class="rate">
                                <!-- <input type="radio" id="star5" name="rate" value="5" checked /> -->
                                <?php for( $i=1;$i<=$rate['star'];$i++) {?>
                                    
                                 <label for="star5" title="text">5 stars</label>
                                 <?php echo "";}?>
                              
                            </div>
							</div>
							<div class="review-block-title">(<?php echo $rate['star']; ?> sao)</div>
							<div class="review-block-description"><?php echo $rate['comment'] ?></div>
						</div>
					</div>
					<hr/>
					
				</div>
			</div>
            <?php }?>
            
		</div>
        </div>

    </div>

<?php include './inc/footer.php';?>