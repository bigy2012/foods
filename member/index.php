<?php
include('authen.php');
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
            <div class="col-md-10 col-lg-10 mt-5 text-center">
                <!-- เนื้อหา -->
               <h1>สำหรับสมาชิกหรือลูกค้า</h1>
               <h4>ระบบสั่งจองอาหารออนไลน์</h4>

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
$(document).ready(function() {
    $(".addItem").click(function(e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var fid = $form.find(".foodid").val();
        var fname = $form.find(".foodname").val();
        var fprice = $form.find(".foodprice").val();
        var fimg = $form.find(".foodimg").val();
        var fqty = $form.find(".qty").val();
        var ucode = $form.find(".ucode").val();
        $.ajax({
            url: 'action.php',
            method: 'post',
            data: {
                fid: fid,
                fname: fname,
                fprice: fprice,
                fimg: fimg,
                fqty: fqty,
                ucode: ucode
            },
            success: function(response) {
                $("#msg").html(response);
                window.scrollTo(0, 0);
                cart_item();
            }
        });
    });
    
    cart_item();

    function cart_item() {
        $.ajax({
            url: 'action.php',
            method: 'get',
            data: {
                cartItem: "cart_item"
            },
            success: function(response) {
                $("#cart-item").html(response);
            }
        });
    }
});
</script>