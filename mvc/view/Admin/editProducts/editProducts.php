
<?php
//$product = mysqli_fetch_array($data['pr']);

  $pr = $data["product"];
  $str = "";
  $product = mysqli_fetch_array($pr->findProductWithId($data["id"]));


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

<div class="container-xl ">
    <form action="">
        <div class="row">
            <div class="col-xl-4 mt-4">
                <div class="card">
                    <div class="card-header">Dòng sản phẩm</div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 mt-4" for="name">Tên dòng sản phẩm</label>
                        <input class="form-control mb-3" id="inputName" type="text" name="name" placeholder="Nhập tên" value="<?php
                                $qr = 'SELECT name from products where parent_id = 0 and id = '.$data['id'];
                                $name = mysqli_fetch_array($pr->customQuery($qr));
                                echo $name[0];?>">

                    </div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1" for="inputGender">Sản phẩm</label>

                            <select class="form-control col-md-12 mb-3" name="gender" id="detailName" >
                                <option value="" disabled selected>Chọn sản phẩm</option>
                                <?php
                                    while($row = mysqli_fetch_array($data['names'])){
                                        echo '<option id="'.$row['id'].'"value="' . $row['name']. '">' .$row['name'] . '</option>';
                                    }

                                ?>
                            </select>

                    </div>

                </div>
            </div>
            <div class="col-xl-4 mt-4">
                <div class="card">
                    <div class="card-header">Chi tiết sản phẩm</div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 mt-4" for="name">Tên sản phẩm</label>
                        <input class="form-control mb-3" id="inputDetailName" type="text" name="price" placeholder="Nhập tên" value="">
                    </div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 " for="name">Size</label>
                        <select class="form-control col-md-12 mb-3" name="gender" id="inputSize">
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                            </select>
                    </div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 " for="name">Giới tính</label>
                         <select class="form-control col-md-12 mb-3" name="gender" id="inputGender">
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                        </select>
                    </div>

                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 " for="name">Mã màu</label>
                        <input class="form-control mb-3" id="color_code" type="color" name="price"  value="">
                    </div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 " for="name">Số lượng</label>
                        <input class="form-control mb-3" id="inputQty" type="text" name="price" placeholder="Nhập số lượng" value="">
                    </div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 " for="name">Giá</label>
                        <input class="form-control mb-3" id="inputPrice" type="text" name="price" placeholder="Nhập giá" value="">
                    </div>
                    <div class="row-md-6 mx-3">
                        <label class="small mb-1 " for="name">Giá khuyến mãi</label>
                        <input class="form-control mb-3" id="inputPriceSale" type="text" name="price" placeholder="Nhập giá" value="">
                    </div>
                    <div class="row-md-6 mx-3 mb-4">
                        <label class="small mb-1" >Trạng thái</label>
                                 <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cbActive" value = "1" >
                                    <label class="custom-control-label" for="defaultCheckedDisabled2">Hoạt động</label>
                                 </div>

                                <!-- Checked checkbox -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cbUnactive" value = "0">
                                    <label class="custom-control-label" for="defaultUncheckedDisabled2">Ngừng hoạt động</label>
                                </div>
                    </div>
                    <div class="row-md-6 mx-3 mb-4">
                     <input class="form-control" id="productId" name="productId" type="text" placeholder="" value="<?php

                                 echo $product['id'];
                                ?>">
                     <input class="form-control" id="parentId" name="parentId" type="text" placeholder="" value="<?php

                                    echo $data['id'];
                                ?>">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mt-4">
            <div class="card-header">Ảnh sản phẩm</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <div class="row-md">
                        <img class="img-account-profile square img-fluid mb-2" id="thumb" src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930" alt="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930">
                    </div>

                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG hoặc PNG nhẹ hơn 5MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Đăng ảnh</button>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="car-xl-10">
                <div class="card-header">Mô tả</div>

                <textarea class="form-control" id="inputDescription" name="description" rows="20"></textarea>
            </div>
        </div>
    </form>

        <button type="button" id="btnUpdate" class="btn btn-success float-sm-right">Cập nhật</button>
        <button type="button" id="btnDelete" class="btn btn-danger float-sm-right">Xóa</button>

</div>

<script type="text/javascript">
       $('#edit').click(function(){

                $("$inputNewName").attr("type", 'hidden') ;

        });
		$("#btnUpdate").click(function(event){
            var detailName = $("#inputDetailName").val();
            var size = $("#inputSize").val();
            var gender = $("#inputGender").val();
            var price = $("#inputPrice").val();
            var priceSale = $("#inputPriceSale").val();
            var qty = $("#inputQty").val();
            var parent_id = $("#parentId").val();
            var description = $("#inputDescription").val();
            var id = $("#productId").val();
            var name = $("#inputName").val();
            var color = $("#color_code").val();
            var active = $("input[type='checkbox']:checked").val()
            console.log(detailName);
            console.log(id);
            console.log(color);
            console.log(gender);
            console.log(qty);
            console.log(description);
            console.log(name);
            console.log(active);
			$.ajax({
				method: "POST",// phương thức dữ liệu được truyền đi
				url: "../edit",// gọi đến file server show_data.php để xử lý
				data: {
                    detail_name:detailName,
                    active:active,
                    name:name,
                    size:size,
                    qty:qty,
                    color:color,
                    gender:gender,
                    price:price,
                    price_sale:priceSale,
                    parent_id:parent_id,
                    description: description,
                    id:id
                },//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
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
            var gender = $("#inputGender").val();
            var id = $("#detailName option:selected").attr("id");
            var name = $("#detailName").val();
            console.log(size);
            console.log(gender);
            console.log(id);
            $("#inputDetailName").val(name);
			$.ajax({
				method: "POST",// phương thức dữ liệu được truyền đi
				url: "http://localhost/aglet/admin/query",// gọi đến file server show_data.php để xử lý
                dataType: 'json',
				data: {action:"query","name":name, "size":size, "gender":gender, "id":id},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
				success : function(data){

                   //kết quả trả về từ server nếu gửi thành công
                    $("#inputPrice").val(data.price);
                    $("#inputPriceSale").val(data.price_sale);
                    $("#inputQty").val(data.qty);
                    $("#inputDescription").html(data.description);
                    $("#productId").val(data.id);
                    $("#thumb").prop('src', data.thumb);
                    if(data.status == 1){
                        $('#cbActive').prop('checked', data.thumb);
                        $('#cbUnactive').prop('checked', false);
                    }
                    else{
                        $('#cbActive').prop('checked', false);
                        $('#cbUnactive').prop('checked', true);
                    }

                    console.log(data);
                    console.log($("#inputPrice"));
				},
                error: function (data) {
                    alert("Sản phẩm không tồn tại");
                    console.log(data);
                    $("#inputPrice").val("0");
                    $("#inputPriceSale").val("0");
                    $("#inputQty").val("0");
                    $("#inputDescription").html("");
                  //always the same for refused and insecure responses.
                }
			});
		});


        $("#btnDelete").click(function(event){


            var id = $("#productId").val();
            var parent_id = $("#parentId").val();
            var gender = $("#inputGender").val();

            console.log(id);
            console.log(parent_id);

			$.ajax({
				method: "POST",// phương thức dữ liệu được truyền đi
				url: "../delete",// gọi đến file server show_data.php để xử lý
				data: {
                     gender:gender,
                     id:id,
                     parent_id:parent_id
                    },//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
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