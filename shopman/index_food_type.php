<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];

$sql2 = "SELECT * FROM  shop WHERE shop.uid='$uid'AND approve='อนุมัติ'";
$result2 = $conn->query($sql2);
$rowCount=$result2->num_rows;

$sql = "SELECT * FROM  food_type, shop WHERE food_type.shop_id=shop.shop_id and shop.uid='$uid'";
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
         <div class="col-md-10 col-lg-10 mt-1">
                <!-- เนื้อหา -->
                <div class="row justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header text-center">
                            <h5> ข้อมูลหมวดหมู่อาหาร</h5>
                        </div>
                        <div class="card-body">
                            <?php if($rowCount >0){?>
                            <table class="table table-hover">
                                <th>#</th>
                                <th>ชื่อหมวดหมู่อาหาร</th>
                                <th>จัดการ [<a href="#" data-bs-toggle="modal" data-bs-target="#addModal">
                                        เพิ่มข้อมูล</a>]</th>
                                <?php
                            $i=1;    
                            while ($data = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $i;  ?>
                                    </td>
                                    <td>
                                        <?= $data['ftype_name'];  ?>
                                    </td>
                                    <td>
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="myView"  id="<?=$data['ftype_id'];?>"> ดู</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#editModal" class="myEdit"  id="<?=$data['ftype_id'];?>"> แก้ไข</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#delModal" class="myDel"  id="<?=$data['ftype_id'];?>"> ลบ</a>]
                                    </td>
                                </tr>
                                <?php
                            $i++;
                            }
                            ?>
                            </table>
                            <?php }else{echo "=== ยังไม่ได้อนุมัติร้าน ===";}?>
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
        <!-- ดูข้อมูล modal ======================= -->
     <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog" id="viewall">

            </div>
      </div>
     <!-- แก้ไข modal ======================= -->
     <div class="modal fade" id="editModal" tabindex="-2" aria-hidden="true">
          <div class="modal-dialog" id="editall">

            </div>
      </div>    
      <!-- ลบ modal ======================= -->
     <div class="modal fade" id="delModal" tabindex="-3" aria-hidden="true">
          <div class="modal-dialog" id="delall">

            </div>
      </div>     
    <?php  include("modal_food_typeadd.php");?>
</body>

</html>
<script>
    $(document).ready(function () {
        // ดูข้อมูล
        $('.myView').click(function () {
            var eid = $(this).attr("id");
            $.ajax({
                url: "modal_food_typeview.php",
                type: "post",
                data: {
                    id: eid
                },
                success: function (data) {
                     $("#viewall").html(data);
                    $("#viewModal").modal('show');
                }
            });
        });
        // จบดูข้อมูล
        // แก้ไขข้อมูล
        $('.myEdit').click(function () {
            var eid = $(this).attr("id");
            $.ajax({
                url: "modal_food_typeedit.php",
                type: "post",
                data: {
                    id: eid
                },
                success: function (data) {
                     $("#editall").html(data);
                    $("#editModal").modal('show');
                }
            });
        });
        // จบแก้ไขข้อมูล
        // ลบข้อมูล
        $('.myDel').click(function () {
            var eid = $(this).attr("id");
            $.ajax({
                url: "modal_food_typedel.php",
                type: "post",
                data: {
                    id: eid
                },
                success: function (data) {
                     $("#delall").html(data);
                    $("#delModal").modal('show');
                }
            });
        });
        // จบลบข้อมูล
    });     
</script>