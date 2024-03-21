<?php
include("authen.php");
include("../config.php");

$uid=$_SESSION['uid'];

$sql = "SELECT * FROM  shop WHERE shop.uid='$uid'";
$result = $conn->query($sql);
$data=$result->fetch_assoc();
$rowCount=$result->num_rows;

@$shop_id=$data['shop_id'];

$sql2 = "SELECT * FROM  food_type, food WHERE food_type.ftype_id=food.ftype_id and food_type.shop_id='$shop_id'";
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
            <div class="col-md-10 col-lg-10 mt-1">
                <!-- เนื้อหา -->
                <div class="row justify-content-center">
                    <div class="card col-md-10">
                        <div class="card-header text-center">
                            <h5> ข้อมูลรายการอาหาร</h5>
                        </div>
                        <div class="card-body">
                            <?php if($rowCount>0){ ?>
                            <table class="table table-hover">
                                <th>#</th>
                                <th>ชื่ออาหาร</th>
                                <th>ราคา</th>
                                <th>% ส่วนลด</th>                                
                                <th>หมวดหมู่อาหาร</th>
                                <th>จัดการ [<a href="#" data-bs-toggle="modal" data-bs-target="#addModal">
                                        เพิ่มข้อมูล</a>]</th>
                                <?php
                            $i=1;    
                            while ($data2 = $result2->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td> <?= $i;  ?> </td>
                                    <td> <?= $data2['food_name']; ?> </td>
                                    <td> <?= $data2['price']; ?> </td>
                                    <td> <?= $data2['discount']; ?> </td>
                                    <td> <?= $data2['ftype_name']; ?> </td>                                    
                                    <td>
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="myView"  id="<?=$data2['food_id'];?>"> ดู</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#editModal" class="myEdit"  id="<?=$data2['food_id'];?>"> แก้ไข</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#delModal" class="myDel"  id="<?=$data2['food_id'];?>"> ลบ</a>]
                                    </td>
                                </tr>
                                <?php
                            $i++;
                            }
                            ?>
                            </table>
                            <?php }else{ echo"== ยังไม่ได้อนุมติร้าน ==";} ?>
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
    <?php  include("modal_food_add.php");?>
</body>

</html>
<script>
    $(document).ready(function () {
        // ดูข้อมูล
        $('.myView').click(function () {
            var eid = $(this).attr("id");
            $.ajax({
                url: "modal_food_view.php",
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
                url: "modal_food_edit.php",
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
                url: "modal_food_del.php",
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