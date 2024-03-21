<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];
$sql = "SELECT * FROM tbrestaurant, tbcategory, tbusers WHERE (tbrestaurant.catid=tbcategory.catid and tbrestaurant.uid=tbusers.uid) and tbusers.username='$uid'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
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
            <div class="col-md-10 col-lg-10 mt-1 text-center">
                <!-- เนื้อหา -->
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5> ข้อมูลหมวดหมู่อาหาร</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <th>#</th>
                                <th>ชื่อหมวดหมู่อาหาร</th>

                                <th>จัดการ [<a href="#" data-bs-toggle="modal" data-bs-target="#addModal">
                                        เพิ่มข้อมูล</a>]</th>
                                <?php
                            $i=1;    
                            //while ($rows = $result->fetch_assoc()) {
                            ?>
                                <tr>
 
                                    <td>
                                       
                                    </td>                                                                                                          
                                    <td>
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="retView"  id="<?=$rows['rid'];?>"> ดู</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#editModal" class="retEdit"  id="<?=$rows['rid'];?>"> แก้ไข</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#delModal" class="retDel"  id="<?=$rows['rid'];?>"> ลบ</a>]
                                    </td>
                                </tr>
                                <?php
                            $i++;
                          // }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- เนื้อหา -->
            </div>
        </div>
    </div>
    <div class="text-center fixed-bottom">
        <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
    </div>
</body>

</html>