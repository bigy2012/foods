<!-- addModal-->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100 text-primary">เพิ่มข้อมูลหมวดหมู่อาหาร</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 w-100">
                <form action="food_typeadd.php" method="POST" enctype="multipart/form-data">

                    <div class="d-block w-100 text-center">
                        <div class="row mt-3 mb-3">
                            <label class="col-md-3 col-form-label text-end">ชื่อหมวดหมู่อาหาร :</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control p-2" name="ftypename"> 
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" name="MM_add" value="form1">
                                <button type="submit" class="btn btn-lg btn-primary w-50">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="text-center">
                <p class="mb-3">&copy; 2022 วิทยาลัยการอาชีพนวมินทราชินีมุกดาหาร</p>
            </div>
        </div>
    </div>
</div>
