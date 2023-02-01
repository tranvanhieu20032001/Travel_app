<?php
include '../admin/api/api.php';
$baseurl='http://localhost:8080/';
$id=1;
$categories=get($baseurl.'category');
$services=get($baseurl.'service');
if (isset($_GET['id'])) $id=$_GET['id'];
$tour = get($baseurl.'tour/'.$id);
if(!isset($_SESSION)) 
 { 
    session_start(); 
     
 } 
 if($_SESSION['idAccount']!=$tour['id_seller'])
  echo "<script> window.location.href='index.php'; </script>";
?>
<?php include './inc/header.php';?>
    <main>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="xulyupdatetour.php?id=<?php echo $id;?>" class="tm-edit-product-form" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="category">Danh mục</label>
                    <select class="custom-select tm-select-accounts" id="category" name="category" value="1">
                      <option value="0" selected>Select category</option>
                      <?php foreach($categories as $category){?>
                      <option value="<?php echo $category['id'];?>" <?php if($category['id']==$tour['category']['id']) echo "selected"?>  ><?php echo $category['name'];?></option>
                      <?php }?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="title">Tiêu đề tour</label>
                    <input  id="title" name="title" type="text" class="form-control validate" value="<?php echo $tour['title']?>" required/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="subtitle">Tiêu đề phụ
                    </label>
                    <input  id="subtitle" name="subtitle" type="text" class="form-control validate" value="<?php echo $tour['subTitle']?>" required/>
                  </div>

                  <div class="form-group mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control validate"rows="5" required> <?php echo $tour['describe']?></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label for="description">Tour có gì hấp dẫn??</label>
                    <textarea class="form-control validate"rows="4" required name="interesting"><?php echo $tour['interesting']?></textarea>
                  </div>

                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="address">Địa điểm xuất phát</label>
                          <input id="address" name="address" type="text" class="form-control validate" value="<?php echo $tour['address']?>" required/>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="inteval">Thời gian chuyến đi</label>
                          <input id="inteval" name="inteval" type="text" class="form-control validate" value="<?php echo $tour['inteval']?>" required/>
                        </div>
                  </div>  
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="daystart">Thời gian khởi hành</label>
                          <input id="daystart" name="daystart" type="date" class="form-control validate" data-large-mode="true" value="<?php 
                            if($tour['dayStart']==null) echo ""; else{ 
                            $date=date_create($tour['dayStart']);
                            echo date_format($date,"Y-m-d");} ?>" />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="vehicle">Phương tiện di chuyển</label>
                          <input id="vehicle" name="vehicle" type="text" class="form-control validate" value="<?php echo $tour['vehicle']?>" />
                        </div>
                  </div>       
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                

                <div class="custom-file mt-3 mb-3">
                  <img src="./upload/<?php echo explode(';',$tour["image"])[0]; ?>" alt="" style="height:200px">
                  <input id="fileInput" type="file" name="files[]" style="display:none;"  multiple />
                  <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD TOUR IMAGES" onclick="document.getElementById('fileInput').click();"/>
                  <input type="hidden" value="<?php echo $tour['image'];?>" name="imgold">
                </div>
                
                <div class="custom-file mt-3 mb-3">     
                             
                  <div class="form-group mb-3">
                    <label for="price">Giá tour</label>
                    <input  id="price" name="price" type="number" class="form-control validate" value="<?php echo $tour['price']?>"  required/>
                  </div>

                  <div class="form-group mb-3">
                        <label for="service">Dịch vụ đi kèm:  </label><br>
                        <?php $tourservice=get($baseurl.'tourservice/'.$_GET['id']);    foreach($services as $service){?>
                        <input type="checkbox"  name="service[<?php $service['id'];?>]" value="<?php echo $service['id'];?>"
                        <?php foreach($tourservice as $s) if($service['id']==$s['service']['id']) echo "checked";?> >
                        <?php echo $service['name'];?><br>
                        <?php }?>
                  </div>
                  

                  <div class="form-group mb-3">
                    <label for="sale">Khuyến mãi</label>
                    <input  id="sale" name="sale" type="number" step="0.001" class="form-control validate" value="<?php echo $tour['sale']?>"/>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="people">Số lượng chỗ trống</label>
                          <input id="slot" name="slot" type="number" min="0" max="1000" class="form-control validate" value="<?php echo $tour['slot']?>" required/>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="active">Trạng thái</label>
                        <div class="form-control">
                        <input type="radio" id="mo" name="status" value="1" checked >
                        <label for="mo">Active</label>
                        <input type="radio" id="khoa" name="status" value="0" <?php if($tour['status']!="1") echo 'checked';?>  >
                        <label for="khoa">Block</label></div>
                        
                        </div>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="inteval">Người đăng</label>
                          <input id="inteval" name="nameseller" type="text" class="form-control validate" value="<?php echo $tour['nameSeller']?>" required/>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="inteval">Số điện thoại liên hệ</label>
                          <input id="inteval" name="phonecontact" type="text" class="form-control validate" value="<?php echo $tour['phoneContact']?>" required/>
                        </div>
                  </div>
                </div>
                
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="submit" onclick="return confirm('Update tour ?')">Update Tour Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </main>

    <?php include './inc/footer.php';?>