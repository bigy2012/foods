<?php
include("authen.php");
include("../config.php");

$sql3 = "SELECT * FROM food, food_type WHERE food.ftype_id=food_type.ftype_id and food.food_id='".$_POST['id']."' ";
$result3 = $conn->query($sql3);
$data3=$result3->fetch_assoc();

?>
<!-- viewModal-->

        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">รายละเอียดข้อมูลรายการอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                <div class="d-block w-100 text-center">
                <!-- แสดงรูปภาพ-->
                <?php
                    if ($data3['foodimg'] != "") {
                 ?>
                <div>
                    <img class="img-thumbnail" style="width: 190px; height: 200px;" src="<?= $data3['foodimg'];?>">
                </div>
                <?php
                                    } else {
                                    ?>
                <div>
                    <img class="img-thumbnail" style="width: 190px; height: 200px;" src="../images/muk.png">
                </div>
                <?php } ?>
                   <!-- // แสดงรูปภาพ-->
                <div class="mt-3 mb-3 row">
                    <label class="col-md-3 col-sm-3 col-form-label text-end">เลือกรูปภาพ :</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="file" class="form-control p-2" name="foodimg">
                    </div>
                </div>
                <!-- รูปภาพ-->
                     
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่ออาหาร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="foodname" value="<?php echo $data3['food_name']; ?>"> 
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ราคา :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="number" class="form-control p-2" name="price" value="<?php echo $data3['price']; ?>"> 
                            </div>
                        </div>   
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">% ส่วนลด :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="number" class="form-control p-2" name="discount" value="<?php echo $data3['discount']; ?>"> 
                            </div>
                        </div>                         
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">หมวดหมู่อาหาร :</label>
                            <div class="col-md-8 col-sm-8">
      <input type="text" class="form-control p-2"  value="<?php echo $data3['ftype_name']; ?>"> 
                            </div>
                        </div>                     
    
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                
                                <button type="ิbutton" class="btn btn-lg btn-primary w-50" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
              
            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>
