$(document).ready(function () {
    // เพิ่มสินค้าในตระกร้า
    $(".addItem").click(function (e) {
        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var fid = $form.find(".foodid").val();
        var fname = $form.find(".foodname").val();
        var fprice = $form.find(".foodprice").val();
        var fdis = $form.find(".fdiscount").val();        
        var fimg = $form.find(".foodimg").val();
        var fqty = $form.find(".qty").val();
        var ucode = $form.find(".ucode").val();
        var shopid = $form.find(".shopid").val();
        $.ajax({
            url: 'action.php',
            method: 'post',
            data: {
                fid: fid,
                fname: fname,
                fprice: fprice,
                fdis: fdis,
                fimg: fimg,
                fqty: fqty,
                ucode: ucode,
                shopid: shopid
            },
            success: function (response) {
                $("#msg").html(response);
                window.scrollTo(0, 0);
                cart_item();
            }
        });
    });

    cart_item();

    // นับจำนวนสินค้าในตระกร้า
    function cart_item() {
        $.ajax({
            url: 'action.php',
            method: 'get',
            data: {
                cartItem: "cart_item"
            },
            success: function (response) {
                $("#cart-item").html(response);
            }
        });
    }

    // รีวิว อาหาร
    $('.myView').click(function () {
        var eid = $(this).attr("id");
        $.ajax({
            url: "review_modal.php",
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
});
