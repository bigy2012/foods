<?php
include("authen.php");
include("../config.php");

$sql = "SELECT * FROM food_type WHERE ftype_id='".$_POST['id']."'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

?>
<!-- viewModal-->

        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">รายละเอียดข้อมูลหมวดหมู่อาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                <div class="d-block w-100 text-center">
  
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อหมวดหมู่อาหาร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" value="<?= $data['ftype_name']; ?>">
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                               
                                <button type="button" class="btn btn-lg btn-primary w-100" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
          
            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>