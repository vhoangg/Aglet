<?php
//$product = mysqli_fetch_array($data['pr']);

$pr = $data["product"];
$str = "";



?>
<style>
    .container-xl .card .card-header {
        font-size: 24px;
        color: #f15e2c;
        font-weight: 600;
    }

    .container-xl .card .card-body {
        font-size: 21px;
    }
</style>
<div id="noti" style="display: none">
    <!--Modal: modalCookie-->
    <div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
        <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Body-->
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div id="message"></div>
                        <a type="button" id="close" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Đóng</a>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalCookie-->
</div>
<div class="container-xl px-4 mt-4">
    <div class="row">

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Thông tin dòng sản phẩm</div>
                <div class="card-body">
                    <form method="post" class="myForm" id="form">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputName">Tên sản phẩm</label>

                            <input class="form-control" id="inputName" name="name" type="text" placeholder="Nhập tên" value="">
                        </div>


                        <!-- Form Group (email address)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputType">Loại</label>
                            <select class="custom-select col-md-12" name="color" id="inputType">
                                <?php
                                $type = ["Chọn", "Giày", "Phụ kiện", "Thân"];
                                for ($i = 0; $i <= 3; $i++) {
                                    echo '<option value="' . $i . '">' . $type[$i] . '</option>';
                                }
                                ?>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">
                          </textarea>
                        </div>
                        <!-- Form Row-->

                        <!-- Save changes button-->
                        <button class="btn btn-primary" id="button" data-toggle="modal" data-target="#modalCookie1" type="button" name="submit">Lưu</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#button").click(function(event) {
        var name = $("#inputName").val();
        var price = $("#inputPrice").val();
        var priceSale = $("#inputPriceSale").val();
        var type = $("#inputType").val();
        $.ajax({

            method: "POST", // phương thức dữ liệu được truyền đi
            url: "http://localhost/aglet/admin/createNewProduct", // gọi đến file server show_data.php để xử lý
            data: {
                action: "add",
                name: name,
                price: price,
                price_sale: priceSale,
                type: type
            }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
            success: function(response) { //kết quả trả về từ server nếu gửi thành công
                $('#noti').fadeIn();
                $("#message").after(response);
                $("#message").remove();
            }
        });
    });
</script>