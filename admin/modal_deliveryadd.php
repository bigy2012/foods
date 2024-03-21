<!-- addModal-->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">เพิ่มข้อมูลผู้ส่งอาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                <form action="delivery_add.php" method="POST" enctype="multipart/form-data">

                    <div class="d-block w-100 text-center">
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">Username :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="username" id="userName">
                                <span id="msg1"></span>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">Password :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="password" class="form-control p-2" name="password" id="shpasswd">
                                <input type="checkbox" onclick="Showpasswd()"> Show Password
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อ :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="fname" required>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">สกุล :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="lname" required>
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-form-label text-end">ที่อยู่ :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="address" required>
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">e-mail :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="email" class="form-control p-2" name="email" required>
                            </div>
                        </div>
                        <div class="mt-3 mb-3 row">
                            <label class="col-md-3 col-sm-3 col-form-label text-end">เบอร์โทร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="phone" required>
                            </div>
                        </div>
          
                        <div class="row">
                        <label class="col-md-3 col-sm-3 col-form-label text-end"></label>
                            <div class="col-md-8 col-sm-8">
                                <input type="hidden" name="MM_add" value="form1">
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