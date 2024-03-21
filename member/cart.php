<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];
$sql = "SELECT * FROM cart WHERE uid='$uid'";
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
                            <h5> ตระกร้าสั่งซื้อ</h5>

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
                                        <th>จำนวนเงิน</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $t_price = 0;
                                        $t_discount = 0;
                                        $discount = 0;
                                        $m_vat=0;
                                        $total_price = 0;

                                        while ($data = $result->fetch_assoc()) {
                                        ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $i; ?>
                                            <input type="hidden" class="cartid" value="<?= $data['cart_id'] ?>">
                                        </td>
                                        <td class="text-center"><img src="<?php echo $data['foodimg']; ?>" width="50">
                                        </td>
                                        <td>
                                            <?php echo $data['foodname']; ?>
                                        </td>
                                        <td class="text-end">
                                            <input type="number" class="form-control itemQty" value="<?php echo $data['qty']; ?>"
                                                style="width: 75px;">
                                        </td>                                        
                                        <td class="text-end">
                                            <!--ราคา/หน่วย -->
                                            <?php echo number_format($data['price'], 2); ?> 
                                            <input type="hidden" class="fprice" value="<?= $data['price']; ?>">
                                        </td>
                                        <td class="text-end">
                                             <!--ส่วนลด -->
                                            <?php  echo number_format($data['t_discount'], 2); ?> 
                                            <input type="hidden" class="fdisc" value="<?= $data['discount']; ?>">
                                        </td>                                        
                                        <td class="text-end">
                                            <!--จำนวนเงิน -->
                                            <?php echo number_format($data['total_price'], 2); ?> 
                                            
                                        </td>
                                        <td class="text-center">
                                            <a href="action.php?remove=<?= $data['cart_id']; ?>" class="text-danger"
                                                onClick="return confirm('คุณต้องการลบข้อมูลนี้ใช่มั้ย');">ยกเลิก</a>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                            $t_price += $data['t_price'];
                                            $t_discount += $data['t_discount'];
                                            $total_price += $data['total_price'];
                                        } ?>
                                    <tr>
             
                                        <td colspan="6" class="text-end"><b>รวมเป็นเงิน</b></td>
                                        <td class="text-end">
                                            <?php echo number_format($t_price, 2); ?> บาท
                                        </td>

                                    </tr>
                                    <tr>
             
                                        <td colspan="6" class="text-end"><b>หักส่วนลด</b></td>
                                        <td class="text-end">
                                            <?php echo number_format($t_discount, 2); ?> บาท
                                        </td>

                                    </tr>      
                                    <tr>
             
                                        <td colspan="6" class="text-end"><b>ภาษีมูลค่าเพิ่ม 7 %</b></td>
                                        <td class="text-end">
                                            <?php $m_vat=$total_price * (7/100); echo number_format($m_vat, 2); ?> บาท
                                        </td>

                                    </tr>                                                                     
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <a href="index_shop.php" class="btn btn-success"><i
                                                    class="fa-solid fa-cart-arrow-down"></i> เลือกสินค้าเพิ่ม</a>
                                        </td>
                                        <td colspan="3" class="text-end"><b>จำนวนเงินรวมทั้งสิ้น</b></td>
                                        <td class="text-end">
                                            <?php echo number_format($my_total=$total_price + $m_vat, 2); ?> บาท
                                        </td>
                                        <td>
                                            <a href="checkout.php?payid=<?= $my_total; ?>"
                                                class="btn btn-success text-white <?= ($my_total > 1) ? '' : 'disabled'; ?>">สั่งซื้อ</a>
                                        </td>
                                    </tr>                                    
                                </tbody>
                            </table>                            
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

<script>
        $(document).ready(function () {
            $(".itemQty").on('change', function () {
                var $el = $(this).closest('tr');
                var cartid = $el.find(".cartid").val();
                var fprice = $el.find(".fprice").val();
                var fdisc = $el.find(".fdisc").val();
                var qty = $el.find(".itemQty").val();
                location.reload(true);
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    cache: false,
                    data: {
                        cartid: cartid,
                        fprice: fprice,
                        fdisc: fdisc,
                        qty: qty
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            });
        });        
    </script>