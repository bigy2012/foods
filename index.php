<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <title>ระบบสั่งจองอาหารออนไลน์ วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</title>
    <link rel="stylesheet" href="./dst/bootstrap/css/bootstrap.css">
    <script src="./dst/bootstrap/js/bootstrap.js"></script>
    <script src="./dst/bootstrap/js/jquery-3.5.1.js"></script>
</head>

<body>
    <header class="text-center p-5">
        <!-- เมนูด้านบน -->
        <h1 class="text-primary">ระบบสั่งจองอาหารออนไลน์</h1>
    </header>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <form action="gologin.php" method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control rounded-3" placeholder="Username" required>
                    <label>Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control rounded-3" placeholder="Password"
                        required>
                    <label>Password</label>
                </div>
                <input type="hidden" name="MM_login" value="form1">
                <button class="w-100 btn btn-lg btn-primary" type="submit">เข้าสู่ระบบ</button>
            </form>
            <!-- หรือ สมัครสมาชิก-->
            <div class="form-floating mb-3 mt-3">
                <button class="btn btn-info w-100"><a href="#" class="text-white" data-bs-toggle="modal"
                        data-bs-target="#regModal">หรือ สมัครสมาชิก</a></button>
            </div>
            <!-- หรือ สมัครสมาชิก-->
        </div>
    </div>
    <div class="text-center">
        <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
    </div>
    <?php
      include("regmodal.php");
    ?>
</body>

</html>