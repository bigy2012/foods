<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];
$sql = "SELECT * FROM shop WHERE uid='$uid'";
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
                <div class="card col-md-10">
                    <div class="card-header d-block w-100">
                        <h5> <i class="fa-solid fa-print text-warning"></i> สรุปรายงานยอดขาย</h5>
                    </div>
                    <div class="card-body">
                        <!-- แสดงผล  ========================= -->
                        <div class="row">
                            <div class="text-center">
                                <table  class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th width="10%" class="text-center">ลำดับ</th>
                                            <th width="30%" class="text-center">วันเดือนปี</th>
                                            <th width="30%" class="text-center">ยอดขาย</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                           //ประกาศตัวแปรผลรวม
                           $total =0;
                           $i=1;
                           @$shopid=$data['shop_id'];
                           $sql2 = "SELECT orders.ordate AS mydate, SUM(orders_detail.price) AS myTotal, orders.*, orders_detail.* FROM  orders, orders_detail WHERE orders.order_id=orders_detail.order_id AND orders_detail.shop_id='$shopid' AND pay_status='ชำระเงิน' GROUP BY orders.ordate";
                           $result2 = $conn->query($sql2);
                           foreach($result2 as $key)  {
                            //หาผลรวมยอดขายใน loop โดยใข้ +=
                            $total += $key['myTotal'];
                             ?>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $i; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= DateThai($key['mydate']);?>
                                            </td>
                                            <td class="text-end">
                                                <?= number_format($key['myTotal'],2);?> บาท
                                            </td>
                                        </tr>
                                        <?php
                                         $i++;                        
                                    }
                                    ?>
                                        <tr class="table-light">
                                            <td class="text-end" colspan="2">รวมทั้งสิ้น</td>
                                            <td class="text-end">
                                                <?= number_format($total,2);?> บาท
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- // แสดงผล ======================= -->
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
<?php
//แปลงวันที่ให้เป็นไทย
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

?>