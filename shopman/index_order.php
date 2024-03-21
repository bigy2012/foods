<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];
$sql = "SELECT * FROM shop WHERE uid='$uid'";
$result = $conn->query($sql); 
$data = $result->fetch_assoc();

$sql2 = "SELECT *  FROM  orders, users WHERE orders.user_id=users.uid";
$result2 = $conn->query($sql2);

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
                    <div class="card col-md-10">
                        <div class="card-header text-center">
                            <h5> ข้อมูลการสั่งอาหาร </h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <th>#</th>
                                <th>ชื่อลูกค้า</th>
                                <th>ที่อยู่</th>
                                <th>ราคารวม</th>                                
                                <th>สถานะการส่ง</th>
                                <th>สถานะการชำระเงิน</th>
                                <th>ใบเสร็จรับเงิน</th>

                                <?php
                            $i=1; 
                            $total=0;  
                                                           
                            while ($data2 = $result2->fetch_assoc()) {
                                
                                $shop_id=$data['shop_id'];
                                $order_id=$data2['order_id'];
                                $sql3 = "SELECT SUM(orders_detail.price) AS mytotal, orders_detail.*  FROM  orders_detail WHERE shop_id='$shop_id' AND order_id='$order_id'";
                                $result3 = $conn->query($sql3);
                                $data3 = $result3->fetch_assoc();
                            ?>
                                <tr>
                                    <td> <?= $i;  ?> </td>
                                    <td class="text-start"> <?= $data2['fname']." ".$data2['lname']; ?> </td>
                                    <td class="text-start"> <?= $data2['address']; ?> </td>
                                    <td> <?= $data3['mytotal']; ?> </td>
                                    <td> <?= $data3['sen_status']; ?> </td>        
                                    <td> <?= $data3['pay_status']; ?> </td>    
                                    <td> <a href="order_print.php?id=<?php echo $data3['order_id'];?>&shid=<?php echo $data3['shop_id'];?>"> พิมพ์ใบเสร็จ </a></td>   
                                </tr>
                                <?php
                            $i++;
                            }
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