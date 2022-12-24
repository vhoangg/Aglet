<?php
//$product = mysqli_fetch_array($data['pr']);

  $pr = $data["product"];
  $str = "";
  $product = mysqli_fetch_array($pr->findProductWithId($data["id"]));
  echo $product['id'];
  echo $_POST['id'];



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
                    <img class="img-account-profile square mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
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

                                $qr = 'SELECT name from products where parent_id = 0 and id = '.$product['parent_id'];
                                $name = mysqli_fetch_array($pr->customQuery($qr));
                                echo $name[0];
                            ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputDetailName">Tên chi tiết</label>
                            <input class="form-control" id="inputDetailName" name="name" type="text" value="<?php
                                echo $product['name'];
                            ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputDetailName">Trạng thái dòng sản phẩm</label>
                            <input class="form-control" id="inputDetailName" name="name" type="text" value="<?php
                                echo $product['name'];
                            ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPrice">Giá</label>
                                <input class="form-control" id="inputPrice" type="text" name="price" placeholder="Enter your first name" value="<?php

                                                                                                                                                echo $product['price'];
                                                                                                                                                ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPriceSale">Giá khuyến mãi</label>
                                <input class="form-control" id="inputPriceSale" name="price_sale" type="text" placeholder="Nhập giá khuyến mãi" value="<?php
                                                                                                                                                        echo $product['price_sale'];
                                                                                                                                                        ?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputSize">Size</label>
                                <select class="custom-select col-md-12" name="size" id="inputSize">
                                    <?php
                                    for ($i = 36; $i <= 46; $i++) {

                                        if ($product['size'] == $i) {
                                            echo '<option selected value="' . $i . '">' . $i . '</option>';
                                        } else
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                    <!-- disable ="disable" -->
                                </select>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputColor">Màu</label>
                                    <select class="custom-select col-md-12" name="color" id="inputColor">
                                        <?php
                                            $color = ["Blue", "Red", "Yellow", "Green", "Black", "White" ];
                                            for($i = 0; $i < 6; $i++){
                                                if($product['color'] == $color[$i]){
                                                    echo '<option selected value="'.$color[$i].'">'.$color[$i].'</option>';
                                                }
                                                else
                                                  echo '<option value = "'.$color[$i].'">'.$color[$i].'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputGender">Giới tính</label>
                                    <select class="custom-select col-md-12" name="gender" id="inputGender">
                                        <?php
                                            $gender = ["Nữ", "Nam" ];

                                            for($i = 0; $i < 2; $i++){
                                                if($product['gender'] == $gender[$i]){
                                                    echo '<option selected value="'.$i.'">'.$gender[$i].'</option>';
                                                }
                                                else
                                                  echo '<option value="'.$i.'">'.$gender[$i].'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputQty">Số lượng còn lại</label>
                                <input class="form-control" id="inputQty" name="qty" type="tel" placeholder="" value="<?php
                                                                                                                        echo $product['qty'];
                                                                                                                        ?>">
                            </div>
                            <div class="col-md-6">

                                <input class="form-control" id="productId" name="productId" type="hidden" placeholder="" value="<?php
                                 echo $product['id'];
                                ?>">
                            </div>
                            <div class="col-md-6">

                                <input class="form-control" id="parentId" name="parentId" type="hidden" placeholder="" value="<?php
                                 echo $product['parent_id'];
                                ?>">
                            </div>
                            <!-- Form Group (birthday)-->

                        </div>
                        <div class="mb-3">
                            <label for="inputDescription" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="inputDescription" name="description" rows="3"><?php
                                                                                                                echo $product['description'];
                                                                                                                ?>
                          </textarea>
                        </div>
                        <!-- Form Row-->

                        <!-- Save changes button-->
                        <button class="btn btn-primary" id="button" data-toggle="modal" data-target="#modalCookie1" type="button" name="submit">Lưu</button>
                        <button class="btn btn-danger" id="deleteButton" data-toggle="modal" data-target="#modalCookie1" type="button" name="submit">xóa</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
		$("#button").click(function(event){
            var detailName = $("#inputDetailName").val();
            var size = $("#inputSize").val();
            var color = $("#inputColor").val();
            var gender = $("#inputGender").val();
            var price = $("#inputPrice").val();
            var priceSale = $("#inputPriceSale").val();
            var qty = $("#inputQty").val();
            var parent_id = $("#parentId").val();
            var description = $("#inputDescription").val();
            var id = $("#productId").val();
            var name = $("#inputName").val();
            console.log(detailName);
            console.log(id);
            console.log(color);
            console.log(gender);
            console.log(qty);
            console.log(description);
            console.log(name);
			$.ajax({
				method: "POST",// phương thức dữ liệu được truyền đi
				url: "../edit",// gọi đến file server show_data.php để xử lý
				data: {detail_name:detailName, name:name, size:size, qty:qty, color:color, gender:gender, price:price, price_sale:priceSale, parent_id:parent_id, description: description, id:id},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
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
    	$("select").change(function(event){
            var size = $("#inputSize").val();
            var color = $("#inputColor").val();
            var gender = $("#inputGender").val();
            var id = $("#productId").val();
            console.log(size);
            console.log(gender);
            console.log(color);
            console.log(id);
			$.ajax({
				method: "POST",// phương thức dữ liệu được truyền đi
				url: "http://localhost/aglet/admin/query",// gọi đến file server show_data.php để xử lý
                dataType: 'json',
				data: {action:"query", "size":size, "color":color, "gender":gender, "id":id},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
				success : function(data){
                   //kết quả trả về từ server nếu gửi thành công
                    $("#inputPrice").val(data.price);
                    $("#inputPriceSale").val(data.price_sale);
                    $("#inputQty").val(data.qty);
                    $("#inputDescription").html(data.description);
                    $("#productId").val(data.id);
                    console.log(data);
                    console.log($("#inputPrice"));
				},
                error: function (data) {

                    console.log(data);
                    $("#inputPrice").val("0");
                    $("#inputPriceSale").val("0");
                    $("#inputQty").val("0");
                    $("#inputDescription").html("");
                  //always the same for refused and insecure responses.
                }
			});
		});



</script>