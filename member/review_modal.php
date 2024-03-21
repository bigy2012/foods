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
                <h5 class="modal-title w-100 text-primary">รีวิวอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                <form action="food_review.php" method="POST" enctype="multipart/form-data">
                    <div class="d-block w-100 text-center">
                        <!-- แสดงรูปภาพ-->
                        <?php
                    if ($data['foodimg'] != "") {
                 ?>
                        <div>
                            <img class="img-thumbnail" style="width: 190px; height: 200px;"
                                src="<?= $data['foodimg'];?>">
                        </div>
                        <?php
                                    } else {
                                    ?>
                        <div>
                            <img class="img-thumbnail" style="width: 190px; height: 200px;" src="../images/muk.png">
                        </div>
                        <?php } ?>
                        <!-- // แสดงรูปภาพ-->

                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่ออาหาร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="foodname"
                                    value="<?php echo $data['food_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ข้อความ :</label>
                            <div class="col-md-8 col-sm-8">
                                <textarea class="form-control p-2" name="myreview" rows="3"></textarea>
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
