<?php
include("authen.php");
include("../config.php");

$sql = "SELECT * FROM users WHERE uid= '" . $_SESSION['uid'] . "'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>ระบบสั่งจองอาหารออนไลน์ วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</title>
    <link rel="stylesheet" href="../dst/bootstrap/css/bootstrap.css">
    <script src="../dst/bootstrap/js/bootstrap.js"></script>
    <script src="../dst/bootstrap/js/jquery-3.5.1.js"></script>
</head>

<body>

    <header class="text-center p-5">
        <!-- เมนูด้านบน -->
        <?php include("menu.php");  ?>
    </header>
    <div class="container-fluid">
        <div class="row p-1">
            <!-- เมนูด้านซ้าย -->
            <div class="col-md-2 mb-1 text-center">
                <?php
                    include("sidebar.php");
                 ?>
            </div>
            <div class="col-md-10 col-lg-10 mt-2">
                <div class="row justify-content-center">
                    <div class="card col-md-6">
                        <div class="card-header text-center">
                            <h5> แก้ไขข้อมูลส่วนตัว</h5>
                        </div>
                        <div class="card-body">
                            <!-- ส่วนฟอร์ม// -->
                            <form action="profile_edit.php" method="post" enctype="multipart/form-data">
                                <div class="d-block w-100 text-center">
                                    <!-- แสดงรูปภาพ-->
                                    <?php
                                    if ($data['userimg'] != "") {
                                    ?>
                                    <div>   
                                        <img class="img-thumbnail" style="width: 120px; height: 150px;" src="<?= $data['userimg'];?>">
                                    </div>
                                    <?php
                                    } else {
                                    ?>
                                    <div>
                                        <img class="img-thumbnail" style="width: 120px; height: 150px;" src="../images/muk.png">
                                    </div>
                                    <?php } ?>
                                    <!-- // แสดงรูปภาพ-->
                                   <div class="mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3 col-form-label text-end">เลือกรูปภาพ :</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="file" class="form-control p-2" name="userimg">
                                        </div>    
                                    </div>
                                    <!-- รูปภาพ-->
                                    <div class="mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3 col-form-label text-end">Username
                                            :</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control p-2" name="username" id="username"
                                                value="<?php echo $data['username']; ?>" autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class=" mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3 col-form-label text-end">Password
                                            :</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="password" class="form-control p-2" name="password"
                                                id="shpasswd" value="<?php echo $data['passwd']; ?>" autocomplete="off">
                                            <input type="checkbox" onclick="Showpasswd()"> Show Password
                                        </div>
                                    </div>

                                    <div class="mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3 col-form-label text-end" for="name">ชื่อ
                                            :</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control p-2" name="fname"
                                                value="<?php echo $data['fname']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3col-form-label text-end" for="lname">สกุล
                                            :</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control p-2" name="lname"
                                                value="<?php echo $data['lname']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3 col-form-label text-end">ที่อยู่
                                            :</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control p-2" name="address"
                                                value="<?php echo $data['address']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3col-form-label text-end">e-mail
                                            :</label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control p-2" name="email"
                                                value="<?php echo $data['email']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-3 row">
                                        <label class="col-md-3 col-sm-3 col-form-label text-end">เบอร์โทร :
                                        </label>
                                        <div class="col-md-9 col-sm-9">
                                            <input type="text" class="form-control p-2" name="phone"
                                                value="<?php echo $data['phone']; ?>">
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-3 row">
                                    <label class="col-md-3 col-sm-3 col-form-label text-end"></label>
                                    <div class="col-md-9 col-sm-9">
                                            <input type="hidden" name="uid" value="<?php echo $data['uid']; ?>">
                                            <input type="hidden" name="oldimg" value="<?php echo $data['userimg']; ?>">
                                            <input type="hidden" name="MM_up" value="form1">
                                            <button type="submit" name="submit" class="btn btn-primary mt-3 mb-3 w-100">
                                                บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- ส่วนฟอร์ม// -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
    </div>
</body>

</html>
<script>
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