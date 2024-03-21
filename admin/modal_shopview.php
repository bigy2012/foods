<?php
include("authen.php");
include("../config.php");

$sql = "SELECT * FROM shop_type";
$result = $conn->query($sql);

$sql2 = "SELECT * FROM users WHERE role='shopman'";
$result2 = $conn->query($sql2);

$sql3 = "SELECT * FROM shop, shop_type, users WHERE (shop.shtype_id=shop_type.shtype_id AND shop.uid=users.uid) AND  shop.shop_id='".$_POST['id']."'";
$result3 = $conn->query($sql3);
$data3 = $result3->fetch_assoc();
?>

<!-- viewModal-->

        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">รายละเอียดข้อมูลร้านอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                
                    <div class="d-block w-100 text-center">
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อร้าน :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2"  value="<?=$data3['shop_name'];?>">

                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ที่อยู่ :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2"  value="<?=$data3['shop_address'];?>">
                                
                            </div>
                        </div>                        
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">เบอร์โทร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2"  value="<?=$data3['shop_phone'];?>">
                                
                            </div>
                        </div>    
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ผู้ดูแลร้าน:</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2"  value="<?=$data3['fname']." ".$data3['lname'];?>">
                                
                            </div>
                        </div>   
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ประเภทร้าน:</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2"  value="<?=$data3['shtype_name'];?>">
                                
                            </div>
                        </div>     
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">การอนุมัติ:</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" value="<?=$data3['approve'];?>">
                                
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