
<?php include './inc/header.php';?>
<?php 
    $baseurl='http://localhost:8080/';
    $listcategory = get($baseurl.'category/active'); 
    $listTour =get($baseurl.'tour/active');?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="./assets/js/tourincategory.js"></script>
<link rel="stylesheet" href="./assets/css/tourincategory.css">
<main >

<div style="min-height: 690px;">
<!-- Sidebar filter section -->
<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
        </div>

        <div style= "margin-right:500px">
        
            
            <?php foreach($listcategory as $value) {?>
            <button class="btn btn-default filter-button" data-filter="<?php echo $value['id']?>"><?php echo $value['name'] ?></button>
            <?php } ?>
            
            <!-- <button class="btn btn-default filter-button" data-filter="sprinkle">Sprinkle Pipes</button>
            <button class="btn btn-default filter-button" data-filter="spray">Spray Nozzle</button>
            <button class="btn btn-default filter-button" data-filter="irrigation">Irrigation Pipes</button> -->
            <br/>
        <br/>
        <br/>
       
            
           
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        


            <?php foreach($listTour as $value){ echo "";?>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter <?php echo $value['category']['id']?>">
            <div class="product-card_single">
                    <div class="thumbnail-tour">
                        <a href="chitiet.php?id=<?php echo $value['id'];?>">
                            <img src="../seller/upload/<?php $img=explode(';',$value["image"]); echo $img[0];?>" style="width:400px;height:250px" class="img-responsive">
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
                        <div class="old-price" style="text-decoration: line-through"><?php echo $english_format_number = number_format($value["price"]);?> VND/người</div>
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
            </div>
            <?php }?>
            

            <!-- <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div> -->
        </div>
    </div>

</div>
</main>

<?php include './inc/footer.php';?>