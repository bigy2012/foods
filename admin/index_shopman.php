<?php
include("authen.php");
include("../config.php");

$sql = "SELECT * FROM users WHERE role='ผู้ดูแลร้านอาหาร'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
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
                <div class="row justify-content-center">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5> ข้อมูลผู้ดูร้านอาหาร</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <th>#</th>
                                <th>ชื่อ สกุล</th>
                                <th>email</th>
                                <th>เบอร์โทร</th>
                                <th>ประเภท</th>
                                <th>การอนุมัติ</th>
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
                                        <?= $data['fname']." ".$data['lname'];  ?>
                                    </td>
                                    <td>
                                        <?= $data['email'];  ?>
                                    </td>
                                    <td>
                                        <?= $data['phone'];  ?>
                                    </td>
                                     <td>
                                        <?= $data['role'];  ?>
                                    </td>
                                    <td>
                                        <?= $data['status'];  ?>
                                    </td>                                    
                                    <td>
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#viewModal" class="myView"  id="<?=$data['uid'];?>"> ดู</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#editModal" class="myEdit"  id="<?=$data['uid'];?>"> แก้ไข</a>]
                                        [<a href="#" data-bs-toggle="modal" data-bs-target="#delModal" class="myDel"  id="<?=$data['uid'];?>"> ลบ</a>]
                                    </td>
                                </tr>
                                <?php
                            $i++;
                            }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
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
<?php  include('modal_shopmanadd.php');?>
</body>

</html>
<script>
    $(document).ready(function () {
        // ดูข้อมูล
        $('.myView').click(function () {
            var eid = $(this).attr("id");
            $.ajax({
                url: "modal_shopmanview.php",
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
                url: "modal_shopmanedit.php",
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
                url: "modal_shopmandel.php",
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