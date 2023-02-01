<?php  
        
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }        
        include '../admin/api/api.php';
        $baseurl='http://localhost:8080/';
        if(!isset($_SESSION["nameAccount"])){
            echo "<script> alert('Vui lòng đăng nhập trước khi book tour')</script>";
            echo "<script> window.location.href='../login/signin.php'; </script>";
        }
        else
        {
            $id=$_SESSION["idAccount"];
            $account =get($baseurl.'account/'.$id);
            if(isset($_GET["idTour"])) { $id=$_GET["idTour"];
            $tour =get($baseurl.'tour/'.$id);
            print_r($account);
            }
        }
?>

<?php include_once './inc/header.php';?>
<link rel="stylesheet" href="./assets/css/styleqltk.css">
<link rel="stylesheet" href="./assets/css/thongtinlh.css">
<main>
        <form action="xulybooking.php" method="post">
        <input type="hidden" name="amount" value="<?php echo ($tour["price"]-($tour["price"]*$tour['sale']))*$_POST['people'];?>">
        <input type="hidden" name="idtour" value="<?php echo $tour['id'];?>">
        <input type="hidden" name="people" value="<?php echo $_POST['people'];?>">
        <main style="font-size:2rem">
        <div class="wrapper">
        <div style=""><h1 style="text-align: center;">BOOKING TOUR</h1></div>
        <h1 class="title-tt">Thông Tin Liên Hệ</h1>
        <div class="main">
            <div class="left-tt">
                <div class="form-tt" id="form-5">
                    <div class="form-group">
                        <label for="fullname" class="form-label">Họ Và Tên</label>
                        <input id="fullname" name="fullname" type="text" placeholder="VD: Văn Hiếu" value="<?php echo $account['fullName'];?>" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text" placeholder="VD: email@domain.com" value="<?php echo $account['email'];?>" class="form-control">
                        <span class="form-message"></span>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input id="phone" name="phone" pattern="[0-9]{10}" type="text" placeholder="Phone" class="form-control" value="<?php echo $account['phoneNumber'];?>">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input id="address" name="address" type="text" placeholder="address" class="form-control" value="<?php echo $account['address'];?>">
                        <span class="form-message"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="content-yc" class="form-label">Yêu cầu khác</label>
                    <textarea name="note" id="content-yc" cols="30" rows="10" class="content-yc"></textarea>
                    <span class="form-message"></span>
                </div>
                <div class="form-gg">
                    <label for="magg" class="">Mã giảm giá</label>
                    <i class="fas fa-toggle-off btn-toggle"></i>
                    <div class="form-pay">
                    </div>
                </div>
                <div class="form-pttt">
                    <div class="form-radio">
                        <label for="tainha"><input type="radio" checked="checked" id="tainha" class="btn_check"
                                name="btn_pttt" value="1"> Thanh toán tại quầy</label>
                        <label for="atm"><input type="radio" id="atm" class="btn_check" name="btn_pttt" value="2">
                            Chuyển khoản ngân hàng</label>
                        </div>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="wrapper-place">
                                <div class="image-place">
                                    <img src="images/pexels-mateusz-sałaciak-4275885.jpg" alt="" class="image-place">
                                </div>
                                <div class="address-place">
                                    <h2 class="city">Đà Nẵng</h2>
                                    <div class="box-address">168/28 Tô Hiệu, Thanh Khê</div>
                                    <div class="box-address">168/28 Tô Hiệu, Thanh Khê</div>
                                </div>
                            </div>

                            <div class="wrapper-place">
                                <div class="image-place">
                                    <img src="images/pexels-mateusz-sałaciak-4275885.jpg" alt="" class="image-place">
                                </div>
                                <div class="address-place">
                                    <h2 class="city">Đà Nẵng</h2>
                                    <div class="box-address">168/28 Tô Hiệu, Thanh Khê</div>
                                    <div class="box-address">168/28 Tô Hiệu, Thanh Khê</div>
                                </div>
                            </div>

                            <div class="wrapper-place">
                                <div class="image-place">
                                    <img src="images/pexels-mateusz-sałaciak-4275885.jpg" alt="" class="image-place">
                                </div>
                                <div class="address-place">
                                    <h2 class="city">Đà Nẵng</h2>
                                    <div class="box-address">168/28 Tô Hiệu, Thanh Khê</div>
                                    <div class="box-address">168/28 Tô Hiệu, Thanh Khê</div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane">
                            Thanh toán VNPay
                            <div><input type="submit" class="btn btn-xn" name="redirect" value="Xác nhận và thanh toán"></div>
                            <!-- <div class="bank">
                                <div class="bank-item active">
                                    <img src="https://data.vietnambooking.com/common/logo/bank/vietcombank.png"
                                        data-bank="vietcombank" alt="bank vietcombank">
                                </div>
                                <div class="bank-item">
                                    <img src="https://data.vietnambooking.com/common/logo/bank/techcombank.png"
                                        data-bank="techcombank" alt="bank techcombank">
                                </div>
                                <div class="bank-item">
                                    <img src="https://data.vietnambooking.com/common/logo/bank/mbbank.png"
                                        data-bank="mbbank" alt="bank mbbank">
                                </div>
                            </div> -->

                            <!-- <div class="infor-bank">
                                <div class="tab-bank active">
                                    <h3>Ngân hàng TMCP Ngoại Thương Việt Nam</h3>
                                    Số tài khoản:<span>123456789</span><br />
                                    Chủ tài khoản: <span> Công Ty Cổ Phần Travel Chi nhánh Sài Thành</span>
                                </div>
                                <div class="tab-bank">
                                    <h3>Ngân hàng TMCP Kỹ Thương Việt Nam</h3>
                                    Số tài khoản:<span>096314785</span><br />
                                    Chủ tài khoản: <span> Công Ty Cổ Phần Travel Chi nhánh Sài Thành</span>
                                </div>
                                <div class="tab-bank">
                                    <h3>Ngân hàng TMCP Quân Đội</h3>
                                    Số tài khoản:<span>46454561148</span><br />
                                    Chủ tài khoản: <span> Công Ty Cổ Phần Travel Chi nhánh Sài Thành</span>
                                </div>
                            </div> -->
                        </div>

                        <div class="tab-pane">

                        </div>
                    </div>

                </div>
            </div>

            <div class="right-tt">
                <div class="thumbnail-qc">
                    <img src="../seller/upload/<?php $img=explode(';',$tour["image"]); echo $img[0];?>"
                        alt="">
                </div>
                <div class="box-infor-tour">
                    <div class="code-tour"> 
                        <span class="code">TOUR<?php echo $tour['id'];?></span><a href="./chitiet.php?id=<?php echo $tour['id'];?>">| <?php echo $tour['title'];?> | <?php echo $tour['subTitle'];?></a>
                    </div>
                    <div><i class="fas fa-map-marker-alt"></i><span class="city-tt"> <?php echo $tour['address'];?></span> | <span class="soluongk"><?php echo $_POST['people']." Khách";?></span></div>
                    <div><i class="fas fa-clock"></i><span class="lichtrinh"> <?php echo $tour['inteval'];?></span></div>
                    <div><span class="transport">Phương tiện: </span><?php foreach (explode(';',$tour['vehicle']) as $pt){ ?>
                            <i class="fas fa-<?php echo $pt;?>"></i>
                            <?php } ?></div>
                    <div><i class="fas fa-calendar-alt"></i><span class="lichtrinh"><?php if($tour['dayStart']==null) echo ""; else{ 
                            $date=date_create($tour['dayStart']);
                            echo date_format($date,"d-m-Y");}?></span></div>        
                </div>
                <div class="total">
                    <span>Tổng</span><span class="total-tt"><?php echo $english_format_number = number_format(($tour["price"]-($tour["price"]*$tour['sale']))*$_POST['people']);?> VND</span>

                </div>
                
                <div class="note">Sau khi hoàn tất đơn hàng nhân viên của Travel sẽ liên hệ với quý khách để xác nhận tình trạng tour <br/> Mọi thắc mắc xin liên hệ hot line: <span class="hotline-tt">1900 111 1011</span></div>
                
                <div><button type="submit" class="btn btn-xn">Xác nhận tour</button></div>
            </div>
        </div>
        <script src="validation.js"></script>
        <script>
            Validator({
                form: "#form-5",
                formGroupSelector: ".form-group",
                errorSelector: ".form-message",
                rules: [
                    Validator.isRequired(
                        "#fullname",
                        "Vui lòng nhập họ tên của bạn"
                    ),
                    Validator.isEmail('#email'),
                    Validator.isRequired('#phone'),
                    Validator.isPhone('#phone', 10),
                    Validator.isRequired('#address'),


                ],
                onSubmit: function (data) {
                    event.preventDefault();
                    getUser(handleLogin)

                },
            });
            Validator({
                form: ".form-gg",
                formGroupSelector: ".form-pay",
                errorSelector: ".form-message",
                rules: [
                    Validator.isRequired(
                        "#magg",
                        "Vui lòng nhập mã giảm giá của bạn"
                    ),
                ],
                onSubmit: function (data) {
                    event.preventDefault();
                    getUser(handleLogin)

                },
            });
        </script>
        <script>
            const toggle_btn = document.querySelector(".btn-toggle")
            const addform = document.querySelector(".form-pay")

            const btnchecks = document.querySelectorAll(".btn_check")
            const panes = document.querySelectorAll(".tab-pane")
            const bankitems = document.querySelectorAll(".bank-item")
            const tabbanks = document.querySelectorAll(".tab-bank")
            var toggle = true
            toggle_btn.onclick = function () {
                if (toggle) {
                    toggle_btn.classList.add("fa-toggle-on")
                    toggle_btn.classList.remove("fa-toggle-off")
                    addform.innerHTML = `<input id="magg" name="magg" type="text" placeholder="Mã giảm giá" class="form-control">
                        <button class="btn btn_magg">Áp dụng mã</button><br/>
                        <span class="form-message"></span>`
                    toggle = false;


                }
                else {
                    toggle_btn.classList.remove("fa-toggle-on")
                    toggle_btn.classList.add("fa-toggle-off")
                    addform.innerHTML = ``
                    toggle = true;
                }
            }
            btnchecks.forEach((btncheck, index) => {
                const pane = panes[index];
                btncheck.onclick = function () {
                    document.querySelector('.tab-pane.active').classList.remove("active")
                    pane.classList.add("active")
                }

            })
            bankitems.forEach((bankitem, index) => {
                const tabbank = tabbanks[index];
                bankitem.onclick = function () {
                    document.querySelector(".bank-item.active").classList.remove("active")
                    document.querySelector(".tab-bank.active").classList.remove("active")
                    this.classList.add("active")
                    tabbank.classList.add("active")
                }
            })

        </script>
        </main>
        </form>
        
    </div>
<?php include './inc/footer.php';?>