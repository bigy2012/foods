<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];
$sql = "SELECT * FROM orders, orders_detail WHERE orders.order_id=orders_detail.order_id  and orders.user_id='$uid'";
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
                <div class="row justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header text-center">
                            <h5> ประวัติการสั่งซื้อ</h5>

                        </div>
                        <div class="card-body">
                        <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>ลำดับ</th>
                            <th>รูปภาพ</th>
                            <th>รายการ</th>
                            <th>จำนวน</th>
                            <th>ราคา/หน่วย</th>
                            <th>ส่วนลด</th>
                            <th>ราคารวม</th>
                            <th>ชื่อร้าน</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $my_total = 0;
                        while ($data = $result->fetch_assoc()) {
                            $foodid= $data['food_id'];
                            $shopid=$data['shop_id'];
                            $sql2="SELECT * FROM food WHERE food_id='$foodid'";
                            $result2=$conn->query($sql2); 
                            $data2=$result2->fetch_assoc(); 
                            
                            $sql3="SELECT * FROM shop WHERE shop_id='$shopid'";
                            $result3=$conn->query($sql3); 
                            $data3=$result3->fetch_assoc();  
                            ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $i; ?>
                                
                            </td>
                            <td class="text-center"><img src="<?php echo $data2['foodimg']; ?>" width="50">
                            </td>
                            <td>
                                <?php echo $data2['food_name']; ?>
                            </td>
                            <td class="text-end">
                                <input type="text" class="form-control text-center" value="<?php echo $data['qty']; ?>"
                                    style="width: 50px;">
                            </td>                            
                            <td class="text-end">
                                <?php echo number_format($data2['price'], 2); ?>    
                            </td>
                            <td class="text-end">
                                <?php echo number_format($data['discount'], 2); ?> 
                            </td>
                            <td class="text-end">
                                <?php echo number_format($data['price'], 2); ?> 
                            </td>                            
                            <td>
                            <?php echo $data3['shop_name']; ?>
                            </td>
                            <td>
                            <?php echo $data['sen_status']; ?>
                            </td>
                            
                        </tr>
                        <?php $i++;
                                $my_total += $data['price'];
                            } ?>

                    </tbody>
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