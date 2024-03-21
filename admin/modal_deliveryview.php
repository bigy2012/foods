<?php
include("authen.php");
include("../config.php");

$sql2 = "SELECT * FROM users WHERE uid='".$_POST['id']."'";
$result2 = $conn->query($sql2);
$data2 = $result2->fetch_assoc();

?>
<!-- viewModal-->

        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">รายละเอียดข้อมูลผู้ส่งอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                
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
                            <label class="col-md-3 col-form-label text-end">Username :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="username" value="<?= $data2['username']; ?>">
                                <span id="msg1"></span>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">Password :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="password" class="form-control p-2" name="password" id="shpasswd" value="<?= $data2['passwd']; ?>">
                                <input type="checkbox" onclick="Showpasswd()"> Show Password
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อ :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="fname" value="<?= $data2['fname']; ?>">
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">สกุล :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="lname" value="<?= $data2['lname']; ?>">
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-form-label text-end">ที่อยู่ :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="address" value="<?= $data2['address']; ?>">
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">e-mail :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="email" class="form-control p-2" name="email" value="<?= $data2['email']; ?>">
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">เบอร์โทร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="phone" value="<?= $data2['phone']; ?>">
                            </div>
                        </div>

                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">การอนุมัติ :</label>
                            <div class="col-md-8 col-sm-8">
                                <select name="status" class="form-select mb-1 mr-sm-1">
                                    <?php
                                $status=array('ไม่อนุมัติ','อนุมัติ'); 
                                foreach($status as $value2){ 
                                ?>
                                    <option value="<?php echo $value2; ?>" <?php if (!(strcmp($data2['status'], $value2))) {
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
                               
                                <button type="button" class="btn btn-lg btn-primary w-100" data-bs-dismiss="modal">ปิด</button>
                            </div>
                        </div>
                    </div>
          
            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>

<script>
    // ตรวจสอบ Usename
    $(document).ready(function () {
        $("#userName").change(function () {
            var flag;
            $.ajax({
                url: "checkuser.php",
                data: "userName=" + $("#userName").val(),
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
    // แสดง Password
    function Showpasswd() {
        var x = document.getElementById("shpasswd");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>