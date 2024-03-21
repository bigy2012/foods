<?php
include("authen.php");
include("../config.php");

$sql = "SELECT * FROM shop_type";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$sql2 = "SELECT * FROM users WHERE role='ผู้ดูแลร้านอาหาร'";
$result2 = $conn->query($sql2);
$data2 = $result2->fetch_assoc();

$sql3 = "SELECT * FROM shop, shop_type, users WHERE (shop.shtype_id=shop_type.shtype_id AND shop.uid=users.uid) AND  shop.shop_id='".$_POST['id']."'";
$result3 = $conn->query($sql3);
$data3 = $result3->fetch_assoc();
?>

<!-- viewModal-->

        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">แก้ไขข้อมูลร้านอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
              <form action="shop_edit.php" method="POST" enctype="multipart/form-data">   
                    <div class="d-block w-100 text-center">
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อร้าน :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="shop_name" id="shopName" value="<?=$data3['shop_name'];?>">
                                <span id="msg1"></span>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ที่อยู่ :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="shop_address" value="<?=$data3['shop_address'];?>">
                                
                            </div>
                        </div>                        
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">เบอร์โทร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="shop_phone" value="<?=$data3['shop_phone'];?>">
                                
                            </div>
                        </div>    
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ผู้ดูแลร้าน:</label>
                            <div class="col-md-8 col-sm-8">
                                <select name="uid" class="form-select mb-1 mr-sm-1">
                                    <?php
                               foreach($result2 as $value2){ 
                                ?>
                                    <option value="<?php echo $value2['uid']; ?>" <?php if (!(strcmp($data3['uid'], $value2['uid']))) {
                                        echo "selected=\" selected\""; } ?> >
                                        <?php echo $value2['fname']." ".$value2['lname']; ?>
                                    </option>
                                    <?php }?>
                                </select>                                                               
                            </div>
                        </div>   
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ประเภทร้าน:</label>
                            <div class="col-md-8 col-sm-8">
                              <select name="shtype_id" class="form-select mb-1 mr-sm-1">
                                    <?php
                                foreach($result as $value){ 
                                ?>
                                    <option value="<?php echo $value['shtype_id']; ?>" <?php if (!(strcmp($data3['shtype_id'], $value['shtype_id']))) {
                                        echo "selected=\" selected\""; } ?> >
                                        <?php echo $value['shtype_name']; ?>
                                    </option>
                                    <?php }?>
                                </select>                                
                            </div>
                        </div>     
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">การอนุมัติ:</label>
                            <div class="col-md-8 col-sm-8">
                                <select name="approve" class="form-select mb-1 mr-sm-1">
                                    <?php
                                $approve=array('ไม่อนุมัติ','อนุมัติ'); 
                                foreach($approve as $value2){ 
                                ?>
                                    <option value="<?php echo $value2; ?>" <?php if (!(strcmp($data3['approve'], $value2))) {
                                        echo "selected=\" selected\""; } ?> >
                                        <?php echo $value2; ?>
                                    </option>
                                    <?php }?>
                                </select>                                                               
                            </div>
                        </div>                                                                      
                        <div class="row">
                        <label class="col-md-3 col-sm-3 col-form-label text-end"></label>
                            <div class="col-md-8 col-sm-8">
                        <input type="hidden" name="shopid" value="<?php echo $data3['shop_id']; ?>">
                        <input type="hidden" name="MM_up" value="form1">
                        <button type="submit" class="btn btn-lg btn-primary w-100">บันทึก</button>
                 
                        </div>
                        </div>
                    </div>
               </form>
            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>
        <script>
    // ตรวจสอบ Usename
    $(document).ready(function () {
        $("#shopName").change(function () {
            var flag;
            $.ajax({
                url: "checkshop.php",
                data: "shopName=" + $("#shopName").val(),
                type: "POST",
                async: false,
                success: function (data, status) {
                    var result = data.split(",");
                    flag = result[0];
                    var msg = result[1];
                    $("#msg1").html(msg);
                },
                error: function (xhr, status, exception) {
                    alert(status);
                }
            });
            return flag;
        });
    });
</script>