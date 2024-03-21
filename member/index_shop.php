<?php
include("authen.php");
include("../config.php");

$strKey = null;
	if(isset($_POST["search"]))
	{
		$strKey = $_POST["search"];
	}
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
                <div class="row justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header text-center">
                            <h5> ข้อมูลร้านอาหาร</h5>
                            <!--ค้นหา -->
                            <form action="" method="post">
                            <div class="row p-2 justify-content-center">
                                <div class="col-auto">
                                    <label  class="col-form-label">ค้นหา :</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="search" value="<?php echo $strKey;?>" placeholder="กรอกคำค้นหา">
                                </div>
                                <div class="col-auto">
                            <input type="hidden" name="MM_up" value="form1">
                            <button type="submit" name="submit" class="btn btn-primary"> ...ค้นหา</button>                                  
                                </div>                                
                            </div>  
                            </form>                    
                            <!-- ค้นหา //-->
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <th>#</th>
                                <th>ชื่อร้าน</th>
                                <th>ชื่อผู้ดูแลร้าน</th>
                                <th>ที่อยู่ร้าน</th>                                
                                <th>ประเภทร้าน</th>
 <?php

$sql = "SELECT * FROM shop, shop_type, users WHERE (shop.shtype_id=shop_type.shtype_id and shop.uid=users.uid and shop.approve='อนุมัติ') and  shop.shop_name LIKE '%".$strKey."%' ";
$result = $conn->query($sql);                            
                            $i=1;    
                            while ($data = $result->fetch_assoc()) {
?>
                                <tr>
                                    <td> <?= $i;  ?> </td>
                                    <td><a href="index_view.php?id=<?=$data['shop_id'];?>"> <?= $data['shop_name'];?> </a></td>
                                    <td> <?= $data['fname']." ".$data['lname'];?></td>
                                    <td> <?= $data['shop_address'];?></td>  
                                    <td> <?= $data['shtype_name'];?></td>   
                                </tr>
                                <?php
                            $i++;
                            }
                            ?>
                            </table>                   
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