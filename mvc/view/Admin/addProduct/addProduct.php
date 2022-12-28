<?php
//$product = mysqli_fetch_array($data['pr']);

  $pr = $data["product"];

?>

<div id="noti" style="display: none">
    <!--Modal: modalCookie-->
    <div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
        <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Body-->
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center">

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
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Ảnh sản phẩm</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile img-fluid square mb-2" src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" alt="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG hoặc PNG nhẹ hơn 5MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Đăng ảnh</button>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Thông tin sản phẩm</div>
                <div class="card-body">
                    <form method="post" class="myForm" id="form">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputName">Dòng sản phẩm</label>
                            <input class="form-control" id="inputName" name="name" type="text" value="<?php
                            $qr = 'SELECT NAME FROM PRODUCTS WHERE id = '.$data['id'];
                            $name = mysqli_fetch_array($data['product']->customQuery($qr));
                            echo $name[0];
                            ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputDetailName">Tên chi tiết</label>
                            <input class="form-control" id="inputDetailName" name="name" type="text" value="">
                        </div>
                        <div class="mb-3">
                          <!-- Default checkbox -->
                                 <label class="small mb-1" >Trạng thái</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="defaultCheckedDisabled2" checked disabled>
                                    <label class="custom-control-label" for="defaultCheckedDisabled2">Hoạt động</label>
                                 </div>

                                <!-- Checked checkbox -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="defaultUncheckedDisabled2" disabled>
                                    <label class="custom-control-label" for="defaultUncheckedDisabled2">Ngừng hoạt động</label>
                                </div>

                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPrice">Giá</label>
                                <input class="form-control mb-3" id="inputPrice" type="text" name="price" placeholder="Nhập giá" value="">

                                <label class="small mb-1" for="inputGender">Giới tính</label>
                                <select class="custom-select col-md-12 mb-3" name="gender" id="inputGender">
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPriceSale">Giá khuyến mãi</label>
                                <input class="form-control mb-3" id="inputPriceSale" name="price_sale" type="text" placeholder="Nhập giá khuyến mãi" value="">
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                <label class="small mb-1" for="colorCode">Mã màu</label>
                                <input class="form-control mb-3" id="colorCode" type="color" name="colorCode" value="">
                            </div>
                        </div>
                        <!-- Form Row        -->

                        <!-- Form Group (email address)-->

                        <div class="row gx-5 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputQty">Số lượng còn lại</label>
                                <input class="form-control" id="inputQty" name="qty" type="tel" placeholder="" value="0" readonly>
                            </div>

                            <div class="col-md-6">
                                <input class="form-control" id="parentId" name="parentId" type="hidden" placeholder="" value="<?php
                                    echo $data['id'];
                                ?>
                                ">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" id="type" name="type" type="hidden" placeholder="" value="<?php
                                    $str = 'SELECT MENU_ID FROM PRODUCTS WHERE ID = '.$data['id'];
                                    $result = mysqli_fetch_array($data['product']->customQuery($str));
                                    echo $result[0];
                                ?>
                                ">
                            </div>
                            <!-- Form Group (birthday)-->

                        </div>
                        <div class="mb-3">
                            <label for="inputDescription" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="inputDescription" name="description" rows="3">
                            </textarea>
                        </div>

                        <button class="btn btn-primary" id="button" data-toggle="modal" data-target="#modalCookie1" type="button" name="submit">Lưu</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

		$("#button").click(function(event){
            var detailName = $("#inputDetailName").val();
            var active = 1;



            var gender = $("#inputGender").val();
            var type = $("#type").val();
            var price = $("#inputPrice").val();
            var priceSale = $("#inputPriceSale").val();
            var qty = $("#inputQty").val();
            var parent_id = $("#parentId").val();
            var description = $("#inputDescription").val();
            var color_code = $("#colorCode").val();

            console.log(detailName);

            console.log(gender);
            console.log(qty);
            console.log(description);
            console.log(priceSale);
            console.log(price);
            console.log(color_code);

			$.ajax({
				method: "POST",// phương thức dữ liệu được truyền đi
				url: "../add",// gọi đến file server show_data.php để xử lý
				data: {detail_name:detailName, color_code:color_code, qty:qty, type:type, gender:gender, price:price, price_sale:priceSale, parent_id:parent_id, description: description},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
				success : function(response){
                    $("#message").remove("#message");//kết quả trả về từ server nếu gửi thành công
                    $('#noti').fadeIn();
                    $("#close").before(response);

                    console.log(response);

				},
                error: function (data) {
                    console.log(data);
                    $('#noti').fadeIn();
                    $("#close").before("LỖI!");
                    $("#message").remove();
                }
			});

		});


</script>