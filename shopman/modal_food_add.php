<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];

$sql3 = "SELECT * FROM food_type, shop WHERE food_type.shop_id=shop.shop_id and shop.uid='$uid'";
$result3 = $conn->query($sql3);
$data3=$result3->fetch_assoc();

?>
<!-- addModal-->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">เพิ่มข้อมูลรายการอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                <form action="food_add.php" method="POST" enctype="multipart/form-data">

                    <div class="d-block w-100 text-center">
                <!-- แสดงรูปภาพ-->
                <div>
                    <img class="img-thumbnail" style="width: 120px; height: 150px;" src="../images/muk.png">
                </div>
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
                                <input type="text" class="form-control p-2" name="foodname"> 
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ราคา :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="number" class="form-control p-2" name="price"> 
                            </div>
                        </div>   
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">% ส่วนลด :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="number" class="form-control p-2" name="discount"> 
                            </div>
                        </div>                         
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">หมวดหมู่อาหาร :</label>
                            <div class="col-md-8 col-sm-8">
                                <select name="ftypeid" class="form-select mb-1 mr-sm-1">
                                 <?php
                                      foreach($result3 as $value){ 
                                ?>
                                    <option value="<?php echo $value['ftype_id']; ?>" <?php if (!(strcmp($data3['ftype_id'], $value['ftype_id']))) {
                                        echo "selected=\" selected\""; } ?> >
                                        <?php echo $value['ftype_name']; ?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>                     
    
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" name="MM_add" value="form1">
                                <button type="submit" class="btn btn-lg btn-primary w-50">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>
    </div>
</div>
