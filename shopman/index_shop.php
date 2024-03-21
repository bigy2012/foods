<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];

$sql = "SELECT * FROM shop, shop_type, users WHERE (shop.shtype_id=shop_type.shtype_id and shop.uid=users.uid) and users.uid='$uid'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
$rowCount=$result->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>ระบบสั่งจองอาหารออนไลน์ วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</title>
    <link rel="stylesheet" href="../dst/bootstrap/css/bootstrap.css">
    <script src="../dst/bootstrap/js/bootstrap.js"></script>
    <script src="../dst/bootstrap/js/jquery-3.5.1.js"></script>
</head>

<body>
    <header class="text-center p-5">
        <!-- เมนูด้านบน -->
        <?php include("menu.php");  ?>
    </header>
    <div class="container-fluid">
        <div class="row p-1">
            <!-- เมนูด้านซ้าย -->
            <div class="col-md-2 mb-1 text-center">
                <?php
                    include("sidebar.php");
                 ?>
            </div>
            <div class="col-md-10 col-lg-10 mt-2">
                <!-- เนื้อหา -->
                <div class="row justify-content-center">
                    <div class="card col-md-6">
                        <div class="card-header text-center">
                            <h5> ข้อมูลร้านอาหาร</h5>
                        </div>
                        <div class="card-body">
                            <?php
                          if($rowCount > 0){
                          ?>
                         <!-- -->
                            <div class="row">
                                <label class="col-md-3 col-sm-3 col-form-label text-end">ชื่อร้าน :</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" class="form-control p-2" value="<?php  echo $data['shop_name']; ?>">
                                </div>
                            </div>
                            <div class="mt-2 mb-2 row">
                                <label class="col-md-3 col-sm-3 col-form-label text-end">ที่อยู่ร้าน :</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" class="form-control p-2" value="<?php  echo $data['shop_address']; ?>">
                                </div>
                            </div>   
                            <div class="mt-2 mb-2 row">
                                <label class="col-md-3 col-sm-3 col-form-label text-end">เบอร์โทรร้าน :</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" class="form-control p-2" value="<?php  echo $data['shop_phone']; ?>">
                                </div>
                            </div> 
                            <div class="mt-2 mb-2 row text-center">
                                    <!-- แสดงรูปภาพ-->
                                    <?php
                                    if ($data['userimg'] != "") {
                                    ?>
                                    <div>   
                                        <img class="img-thumbnail" style="width: 120px; height: 150px;" src="<?= $data['userimg'];?>">
                                    </div>
                                    <?php
                                    } else {
                                    ?>
                                    <div>
                                        <img class="img-thumbnail" style="width: 120px; height: 150px;" src="../images/muk.png">
                                    </div>
                                    <?php } ?>
                                    <!-- // แสดงรูปภาพ-->
                            </div>
                            <div class="mt-2 mb-2 row">
                                <label class="col-md-3 col-sm-3 col-form-label text-end">ผู้ดูแลร้าน :</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" class="form-control p-2" value="<?php  echo $data['fname']." ".$data['lname']; ?>">
                                </div>
                            </div> 
                            <div class="mt-2 mb-2 row">
                                <label class="col-md-3 col-sm-3 col-form-label text-end">เบอร์โทร :</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" class="form-control p-2" value="<?php  echo $data['phone']; ?>">
                                </div>
                            </div> 
                            <div class="mt-2 row">
                                <label class="col-md-3 col-sm-3 col-form-label text-end">เบอร์โทร :</label>
                                <div class="col-md-9 col-sm-9">
                                    <input type="text" class="form-control p-2" value="<?php  echo $data['phone']; ?>">
                                </div>
                            </div>                                                                                 
                         <!-- -->
                          <?php
                          }else{
                            echo "<center>==== ยังไม่มี ข้อมูลร้านค้า ====</center>";
                          ?>
                            <div class="text-center">
                                [<a href="#" data-bs-toggle="modal" data-bs-target="#addModal"> จัดการข้อมูลร้าน</a>]
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                    </div>
                </div>
                <!-- เนื้อหา -->
            </div>
        </div>
    </div>
    <div class="text-center">
        <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
    </div>

    <?php  include("modal_shopadd.php");?>
</body>

</html>