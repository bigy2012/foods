<?php
include('authen.php');
include("../config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $shid = $_GET['shid'];

    $sql = "SELECT * FROM orders WHERE order_id='$id'";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    $sql2 = "SELECT * FROM orders, orders_detail WHERE orders.order_id=orders_detail.order_id AND orders.order_id='$id'";
    $result2 = $conn->query($sql2);

    $sql3 = "SELECT * FROM orders, users WHERE orders.user_id=users.uid AND orders.order_id='$id'";
    $result3 = $conn->query($sql3);
    $data3 = $result3->fetch_assoc();

    $sql4 = "SELECT * FROM shop WHERE shop_id='$shid'";
    $result4 = $conn->query($sql4); 
    $data4 = $result4->fetch_assoc();

    require_once __DIR__ . '../../vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    ob_start();  
}

?>

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
    <style>
    body{
            font-family: "Garuda";
            font-size: 14px;
        }
    table{
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #000;   
        } 
    th, td{
        padding: 5px;
        }             
</style>
</head>

<body>
    <div class="container-fluid">
        <div class="row p-5 text-center">
            <div class="text-center">
                <h5>ใบเสร็จรับเงิน</h5>
            </div>
                <!--//รายสินค้าในใบสั่งซื้อ  -->
            <div class="row">
                <table class="table">
                    <tr>
                        <td class="text-start"><?php  echo $data4['shop_name']; ?></td>
                        <td class="text-end">เลขที่ :
                            <?= $data['order_id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start"><?php  echo $data4['shop_address']; ?></td>
                        <td class="text-end">วันที่ :
                            <?= $data['ordate']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-start">โทร. <?php  echo $data4['shop_phone']; ?></td>
                        <td class="text-end">ชื่อลูกค้า :
                            <?= $data3['fname'] . " " . $data3['lname']; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="border:1px solid #000;">ลำดับ</th>
                            <th style="border:1px solid #000;">รายการ</th>
                            <th style="border:1px solid #000;">จำนวน</th>
                            <th style="border:1px solid #000;">ราคา/หน่วย</th>
                            <th style="border:1px solid #000;">ส่วนลด</th>
                            <th style="border:1px solid #000;">ราคารวม</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $my_total = 0;
                    $my_discount = 0;
                    while ($data2 = $result2->fetch_assoc()) {
                        $food_id = $data2['food_id'];
                       
                        $sql5 = "SELECT * FROM food WHERE food_id='$food_id'";
                        $result5 = $conn->query($sql5);
                        $data5 = $result5->fetch_assoc();
                    ?>
                        <tr style="border:1px solid #000;">
                            <td class="text-center" style="border:1px solid #000;">
                                <?php echo $i; ?>
                            </td>
                            <td class="text-start" style="border:1px solid #000;">
                                <?php echo $data5['food_name']; ?>
                            </td>
                            <td class="text-end" style="border:1px solid #000;">
                                <?php echo $data2['qty']; ?>
                            </td>
                            <td class="text-end" style="border:1px solid #000;">
                                <?php echo number_format($data5['price'], 2); ?>
                            </td>
                            <td class="text-end" style="border:1px solid #000;">
                                <?php echo number_format($data2['discount'], 2); ?>
                            </td>
                            <td class="text-end" style="border:1px solid #000;">
                                <?php echo number_format($data2['price'], 2); ?>
                            </td>
                        </tr>
                        <?php $i++;
                        $my_total += $data2['price'];
                        $my_discount += $data2['discount'];  
                    } 
                    $totall=$my_total + $my_discount;
                    ?>
                        <tr>
                            <td colspan="5" class="text-end"><b>รวมเป็นเงิน</b></td>
                            <td class="text-end">
                                <?php echo number_format($totall, 2); ?> บาท
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end"><b>หักส่วนลด</b></td>
                            <td class="text-end">
                                <?php echo number_format($my_discount, 2); ?> บาท
                            </td>
                        </tr>  
                        <tr>
                            <td colspan="5" class="text-end"><b>ยอดรวมหลังหักส่วนลด</b></td>
                            <td class="text-end">
                                <?php echo number_format($my_total, 2); ?> บาท
                            </td>
                        </tr>                       
                        <tr>
                            <td colspan="5" class="text-end"><b>ภาษีมูลค่าเพิ่ม 7 %</b></td>
                            <td class="text-end">
                                <?php echo $vat= number_format($my_total*(7/100), 2); ?> บาท
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end"><b>จำนวนเงินรวมทั้งสิ้น</b></td>
                            <td class="text-end">  
                                <?php echo number_format(($my_total+$vat), 2); ?> บาท
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php

$html = ob_get_contents();
ob_get_clean();
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

//$mpdf->Output();












?>