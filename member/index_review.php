<?php
include("authen.php");
include("../config.php");

$uid = $_SESSION['uid'];
$sql = "SELECT * FROM review WHERE uid='$uid'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>ระบบสั่งจองอาหารออนไลน์ วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</title>
    <link rel="stylesheet" href="../dst/bootstrap/css/bootstrap.css">
    <script src="../dst/bootstrap/js/bootstrap.js"></script>
    <script src="../dst/bootstrap/js/jquery-3.5.1.js"></script>
    <script src="./cart.js"></script>
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
                <!-- เนื้อหา -->
                <table class="table table-bordered">
                    <?php
                    while ($data = $result->fetch_assoc()) {
                        $fid = $data['food_id'];
                        $sql2 = "SELECT * FROM food, food_type, shop  WHERE food.ftype_id=food_type.ftype_id AND food_type.shop_id=shop.shop_id  AND food_id='$fid'";
                        $result2 = $conn->query($sql2);
                        $data2 = $result2->fetch_assoc()
                    ?>
                        <tr>
                            <td class="col-md-4 text-center">
                                <img class="img-thumbnail" style="width: 190px; height: 200px;" src="<?php echo $data2['foodimg']; ?>">
                                <br>ชื่ออาหาร : <?php echo $data2['food_name']; ?>
                                <br>ชื่อร้าน : <?php echo $data2['shop_name']; ?>
                            </td>
                            <td class="col-md-8">
                                ข้อความรีวิว :
                                <p> <?php echo $data['comment']; ?></p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <!-- เนื้อหา -->
            </div>
        </div>
    </div>
    <div class="text-center fixed-bottom">
        <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
    </div>
</body>

</html>