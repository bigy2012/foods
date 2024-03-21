<?php
include("authen.php");
include("../config.php");
$uid=$_SESSION['uid'];
$sql = "SELECT *  FROM orders, orders_detail WHERE orders.order_id=orders_detail.order_id AND orders_detail.sen_uid ='$uid' GROUP BY orders.order_id";
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
                <div class="card-body">
                            <table class="table">
                                <th>#</th>
                                <th>ชื่อร้าน</th>
                                <th>ชื่อลูกค้า</th>
                                <th>ที่อยู่ลูกค้า</th>                                
                                <th>ยื่นยันชำระเงิน/ส่งสำเร็จ</th>
                        <?php
                            $i=1;    
                            while ($data = $result->fetch_assoc()) {
                                $sql2 = "SELECT * FROM shop WHERE shop_id='".$data['shop_id']."'";
                                $result2 = $conn->query($sql2);
                                $data2 = $result2->fetch_assoc();   

                                $sql3 = "SELECT * FROM users WHERE uid='".$data['user_id']."'";
                                $result3 = $conn->query($sql3);
                                $data3 = $result3->fetch_assoc(); 
                        ?>
                                <tr>
                                    <td> <?= $i;  ?> </td>
                                    <td class="text-start"> <?php echo $data2['shop_name'];?> </td>
                                    <td class="text-start"> <?php echo $data3['fname']." ".$data3['lname'];?></td>
                                    <td class="text-start"> <?php echo $data3['address'];?></td>  
                                    <td>
                            <?php
                        if($data['sen_status']=='ส่งเรียบร้อย'){
                        echo "ส่งเรียบร้อย";
                                }else{
                                ?>
                                        <a href="action.php?confirm=<?= $data['shop_id'];?>&deid=<?= $uid; ?>" onClick="return confirm('คุณต้องการยืนยันการส่งนี้ใช่มั้ย');">ยืนยัน</a>
                                        <?php  } ?>
                                    </td>     
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