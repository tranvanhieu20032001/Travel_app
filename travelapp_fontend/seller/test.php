<?php include './inc/header.php';?>
<main style="">
<?php
include '../admin/api/api.php';
$baseurl='http://localhost:8080/';
$categories=get($baseurl.'category');
$services=get($baseurl.'service');
?>

      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row" style="margin:30px 0">
              <div class="col-12">
                <h1 class="tm-block-title d-inline-block">Thêm mới tour du lịch</h1>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="addtour.php" class="tm-edit-product-form" method="POST">

                <div class="form-group mb-3">
                    <label for="category">Danh mục</label>
                    <select class="custom-select tm-select-accounts" id="category" name="category">
                      <option value="0" selected>Select category</option>
                      <?php foreach($categories as $category){?>
                      <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                      <?php }?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="title">Tiêu đề tour
                    </label>
                    <input  id="title" name="title" type="text" class="form-control validate" required/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="subtitle">Tiêu đề phụ
                    </label>
                    <input  id="subtitle" name="subtitle" type="text" class="form-control validate" required/>
                  </div>

                  <div class="form-group mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control validate"rows="6" required></textarea>
                  </div>

                  <div class="form-group mb-3">
                    <label for="description">Tour có gì hấp dẫn??</label>
                    <textarea class="form-control validate"rows="6" required></textarea>
                  </div>

                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="address">Địa điểm tour</label>
                          <input id="address" name="inteval" type="text" class="form-control validate" required/>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="inteval">Thời gian chuyến đi</label>
                          <input id="inteval" name="inteval" type="text" class="form-control validate" required/>
                        </div>
                  </div>                                                 
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" style="display:none;" />
                  <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD TOUR IMAGES" onclick="document.getElementById('fileInput').click();"/>
                </div>
                
                <div class="custom-file mt-3 mb-3">     
                <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="daystart">Thời gian khởi hành</label>
                          <input id="daystart" name="daystart" type="date" class="form-control validate" data-large-mode="true"/>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="vehicle">Phương tiện di chuyển</label>
                          <input id="vehicle" name="vehicle" type="text" class="form-control validate" required/>
                        </div>
                  </div>             
                  <div class="form-group mb-3">
                    <label for="price">Giá tour</label>
                    <input  id="price" name="price" type="text" class="form-control validate" required/>
                  </div>

                  <div class="form-group mb-3">
                        <label for="service">Dịch vụ đi kèm:  </label><br>
                        <?php foreach($services as $service){?>
                        <input type="checkbox" name="service[<?php $service['id'];?>]" value="<?php echo $service['id'];?>"><?php echo $service['name'];?><br>
                        <?php }?>
                  </div>
                  
                  <div class="form-group mb-3">
                    <label for="title">Khuyến mãi</label>
                    <input  id="title" name="title" type="number" step="0.001" class="form-control validate" required/>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="inteval">Người đăng</label>
                          <input id="inteval" name="inteval" type="text" class="form-control validate" required/>
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label for="inteval">Số điện thoại liên hệ</label>
                          <input id="inteval" name="inteval" type="text" class="form-control validate" required/>
                        </div>
                  </div>
                </div>
                

              </div>
              <div class="" style="margin-top:50px; text-align:center; font-size:20px">
                <button type="submit" class="btn btn-primary text-uppercase" name="submit">Add Tour Now</button>
              </div>
           
            </form>
            </div>
          </div>
        </div>
      </div>
    


</main>
<?php include './inc/footer.php'?>