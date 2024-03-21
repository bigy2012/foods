<?php
include("authen.php");
include("../config.php");

if(isset($_GET['id']))
{
    $shopid=$_GET['id'];
}

$sql = "SELECT * FROM  shop WHERE shop.shop_id='$shopid'";
$result = $conn->query($sql);
$data=$result->fetch_assoc();

$sql3 = "SELECT * FROM  food_type WHERE shop_id='$shopid'";
$result3 = $conn->query($sql3);


$myKey = null;
	if(isset($_POST["ftypename"]))
	{
		$myKey = $_POST["ftypename"];
	}
    
    $sql2 = "SELECT * FROM  food_type, food WHERE (food_type.ftype_id=food.ftype_id and food_type.shop_id='$shopid')and food_type.ftype_name LIKE '%".$myKey."%'";
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
            <div id="msg"></div>
            <div class="col-md-2 mb-1 text-center">
                <?php
                    include("sidebar.php");
                 ?>
            </div>
            <div class="col-md-10 col-lg-10 mt-2">
                <!-- เนื้อหา -->
                <div class="row">
                    <div class="row mb-2 justify-content-center">
                        <form action="" method="post">
                            <div class="row p-2 justify-content-center">
                                <h4 class="text-center">
                                    <?php echo @$data['shop_name'];?>
                                </h4>
                                <div class="col-auto">
                                    <label class="col-form-label">หมวดหมู่อาหาร :</label>
                                </div>
                                <div class="col-auto">
                                    <select name="ftypename" class="form-control">
                                        <option value="">-โปรดเลือก-</option>
                                            <?php foreach($result3 as $key){?>

                                            <option value="<?php echo $key["ftype_name"];?>">
                                                <?php echo $key["ftype_name"]; ?>
                                            </option>
                                        
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <input type="hidden" name="MM_up" value="form1">
                                    <button type="submit" name="submit" class="btn btn-primary"> ...ค้นหา</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <?php
            while ($data2 = $result2->fetch_assoc()) {
            ?>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="card mb-2">
                            <div class="card-header text-center">
                                <?php echo $data['shop_name'];?>
                            </div>
                            <div class="card-body p-1">
                                <img src="<?php echo $data2['foodimg']; ?>" class="card-img-top" height="250">
                                <h4 class="card-title text-center">
                                    <?php echo $data2['food_name']; ?>
                                </h4>
                                <h5 class="card-title text-center text-danger">
                                    ราคา:
                                    <?php echo number_format($data2['price'], 2); ?> บาท
                                </h5>
                                <p class="card-title text-center">
                                    % ส่วนลด:
                                    <?php echo number_format($data2['discount'], 2); ?>
                                </p>
                            </div>
                            <div class="card-footer p-1">
                                <!-- เพิ่มลงในตระกร้า -->
                                <form action="" class="form-submit">
                                    <div class="row p-2">
                                        <div class="col-md-6 py-1"><b>จำนวน :</b></div>
                                        <div class="col-md-6 text-center">
                                            <input type="number" class="form-control qty" value="1">
                                        </div>
                                    </div>
                                    <input type="hidden" class="foodid" value="<?php echo $data2['food_id']; ?>">
                                    <input type="hidden" class="foodname" value="<?php echo $data2['food_name']; ?>">
                                    <input type="hidden" class="foodprice" value="<?php echo $data2['price']; ?>">
                                    <input type="hidden" class="fdiscount" value="<?php echo $data2['discount']; ?>">                                    
                                    <input type="hidden" class="foodimg" value="<?php echo $data2['foodimg']; ?>">
                                    <input type="hidden" class="ucode" value="<?php echo $_SESSION['uid']; ?>">
                                    <input type="hidden" class="shopid" value="<?php echo $data2['shop_id']; ?>">

                                    <div class="row text-center">
                                        <div class="col-md-8">
                                        <button  class="btn btn-primary btn-block text-white addItem">เพิ่มลงตระกร้า</button>
                                        </div>
                                        <div class="col-md-4">
                                        <button  class="btn btn-info btn-block"><a  href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="text-white myView"  id="<?=$data2['food_id'];?>"> รีวิว </a></button>
                                        </div>
                                    </div>
                                </form>
                                <!-- เพิ่มลงในตระกร้า //-->
                            </div>
                        </div>
                    </div>
                    <?php
            }
            ?>
                </div>
                <!-- เนื้อหา -->
            </div>
        </div>
    </div>
    <div class="text-center">
        <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
    </div>
 <!-- review modal ======================= -->
  <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" id="viewall">

            </div>
   </div> 
</body>

</html>
