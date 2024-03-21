<?php
include("authen.php");
include("../config.php");

$sql = "SELECT * FROM food, food_type WHERE food.ftype_id=food_type.ftype_id and food.food_id='".$_POST['id']."' ";
$result = $conn->query($sql);
$data=$result->fetch_assoc();

?>
<!-- viewModal-->

<div class="modal-content">
    <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-primary">แก้ไขข้อมูลรายการอาหาร</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body p-3 w-100">
        <form action="food_edit.php" method="POST" enctype="multipart/form-data">
            <div class="d-block w-100 text-center">
                <!-- แสดงรูปภาพ-->
                <?php
                    if ($data['foodimg'] != "") {
                 ?>
                <div>
                    <img class="img-thumbnail" style="width: 190px; height: 200px;" src="<?= $data['foodimg'];?>">
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
                        <input type="text" class="form-control p-2" name="foodname"
                            value="<?php echo $data['food_name']; ?>">
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <label class="col-md-3 col-form-label text-end">ราคา :</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="number" class="form-control p-2" name="price"
                            value="<?php echo $data['price']; ?>">
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <label class="col-md-3 col-form-label text-end">% ส่วนลด :</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="number" class="form-control p-2" name="discount"
                            value="<?php echo $data['discount']; ?>">
                    </div>
                </div>
                <div class="mt-3 mb-3 row">
                    <label class="col-md-3 col-sm-3 col-form-label text-end">หมวดหมู่อาหาร :</label>
                    <div class="col-md-8 col-sm-8">
                        <select name="ftypeid" class="form-select mb-1 mr-sm-1">
                            <?php
                                $sql2 = "SELECT * FROM food_type";
                                $result2 = $conn->query($sql2);
                                $data2=$result2->fetch_assoc();
                           foreach($result2 as $value){ 
                                ?>
                            <option value="<?php echo $value['ftype_id']; ?>" <?php if (!(strcmp($data['ftype_id'],
                                $value['ftype_id']))) { echo "selected=\" selected\""; } ?> >
                                <?php echo $value['ftype_name']; ?>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <input type="hidden" name="food_id" value="<?php echo $data['food_id']; ?>">
                        <input type="hidden" name="MM_up" value="form1">
                        <button type="submit" class="btn btn-lg btn-primary w-50">ตกลง</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="text-center">
        <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
    </div>
</div>