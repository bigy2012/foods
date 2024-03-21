<?php
include("authen.php");
include("../config.php");

$id=$_POST['id'];
$sql2 = "SELECT * FROM shop_type WHERE shtype_id='$id'";
$result2 = $conn->query($sql2);
$data2 = $result2->fetch_assoc();
?>
<!-- viewModal-->

<div class="modal-content">
    <div class="modal-header text-center">
        <h5 class="modal-title w-100 text-primary">แก้ไขข้อมูลประเภทร้าน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body p-3 w-100">
        <form action="type_edit.php" method="POST" enctype="multipart/form-data">
            <div class="d-block w-100 text-center">
                <div class="row mt-3 mb-3">
                    <label class="col-md-3 col-form-label text-end">ชื่อประเภท :</label>
                    <div class="col-md-8 col-sm-8">
                        <input type="text" class="form-control p-2" name="typename" id="typeName"
                            value="<?=$data2['shtype_name'];?>">
                        <span id="msg1"></span>
                    </div>
                </div>

                <div class="row">
                <label class="col-md-3 col-sm-3 col-form-label text-end"></label>
                            <div class="col-md-8 col-sm-8">
                       <input type="hidden" name="typeid" value="<?php echo $data2['shtype_id']; ?>">
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
        $("#typeName").change(function () {
            var flag;
            $.ajax({
                url: "checktype.php",
                data: "typeName=" + $("#typeName").val(),
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