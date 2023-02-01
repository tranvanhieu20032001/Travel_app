<?php
include '../admin/api/api.php';
$baseurl='http://localhost:8080/';
$key="";
$listTour =get($baseurl.'tour/active');
if(isset($_POST["txtsearch"]) && $_POST["txtsearch"]!="")
    {
    $key=$_POST["txtsearch"];
    $k = array("key" => $key);
    $listTour =post($baseurl.'tour/search',$k);
    }
?>
<?php include './inc/header.php';?>
<link rel="stylesheet" href="./assets/css/trangchu.css">
<main>


    <div class="product-cards">
            <div class="product-cards_title" style="font-size:20px;font-weight: 1;
     text-align: left;text-transform: none;">Tìm thấy <?php echo count($listTour);?> Tour</div>
            <div class="product-cards_tour">
                <?php foreach($listTour as $value){?>
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
                        <i class="fas fa-map-marker-alt"></i><span style="color:red">  <?php echo $value['address']?></span>
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
<?php include './inc/footer.php';?>