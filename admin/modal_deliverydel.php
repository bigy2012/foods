<?php
include("authen.php");
include("../config.php");

$sql2 = "SELECT * FROM users WHERE uid='".$_POST['id']."'";
$result2 = $conn->query($sql2);
$data2 = $result2->fetch_assoc();

?>
<!-- delModal-->
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">คุณต้องการลบข้อมูลผู้ส่งอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                <form action="delivery_del.php" method="POST" enctype="multipart/form-data">

              <div class="d-block w-100 text-center">
                <!-- แสดงรูปภาพ-->
                <?php
                    if ($data2['userimg'] != "") {
                 ?>
                <div>
                    <img class="img-thumbnail" style="width: 120px; height: 150px;" src="<?= $data2['userimg'];?>">
                </div>
                <?php
                       } else {
                       ?>
                <div>
                    <img class="img-thumbnail" style="width: 120px; height: 150px;" src="../images/muk.png">
                </div>
                <?php } ?>
                <!-- // แสดงรูปภาพ-->
                       
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อ :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="fname" value="<?=$data2['fname']; ?>">
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">สกุล :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="lname" value="<?=$data2['lname']; ?>">
                            </div>
                        </div>
                          <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">e-mail :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="email" class="form-control p-2" name="email" value="<?=$data2['email']; ?>">
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">เบอร์โทร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="phone" value="<?=$data2['phone']; ?>">
                            </div>
                        </div>
                        <div class="row">
                        <label class="col-md-3 col-sm-3 col-form-label text-end"></label>
                            <div class="col-md-8 col-sm-8">
                            <input type="hidden" name="uid" value="<?php echo $data2['uid']; ?>">
                             <input type="hidden" name="oldimg" value="<?php echo $data2['img']; ?>">                                
                             <input type="hidden" name="MM_del" value="form1">
                             <button type="submit" class="btn btn-lg btn-primary w-100"> ใช่ </button>
                          </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>