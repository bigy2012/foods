<?php
include("authen.php");
include("../config.php");

$sql2 = "SELECT * FROM shop_type WHERE shtype_id='".$_POST['id']."'";
$result2 = $conn->query($sql2);
$data2 = $result2->fetch_assoc();

?>
<!-- viewModal-->

        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">รายละเอียดข้อมูลประเภทร้าน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                
                    <div class="d-block w-100 text-center">
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อประเภท :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" value="<?=$data2['shtype_name'];?>">
                                <span id="msg1"></span>
                            </div>
                        </div>
    
                        <div class="row">
                        <label class="col-md-3 col-sm-3 col-form-label text-end"></label>
                            <div class="col-md-8 col-sm-8">
                                
                                <button type="button" class="btn btn-lg btn-primary w-100" data-bs-dismiss="modal">ปิดหน้าต่าง</button>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>