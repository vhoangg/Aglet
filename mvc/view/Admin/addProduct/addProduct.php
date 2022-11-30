<?php
  //$product = mysqli_fetch_array($data['pr']);

  $pr = $data["product"];
  $str = "";



?>
<div id="noti"style = "display: none">
     <!--Modal: modalCookie-->
     <div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
              <!--Content-->
              <div class="modal-content">
              <!--Body-->
              <div class="modal-body">
                  <div class="row d-flex justify-content-center align-items-center" >
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
                    <form method = "post"  class = "myForm" id = "form">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên sản phẩm</label>

                            <input class="form-control" id="inputUsername" name="name" type="text" placeholder="Nhập tên" value="">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Giá</label>
                                <input class="form-control" id="inputFirstName" type="text" name="price" placeholder="Nhập giá" value="">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Giá khuyến mãi</label>
                                <input class="form-control" id="inputLastName" name="price_sale" type="text" placeholder="Nhập giá khuyến mãi" value="">
                            </div>
                        </div>
                        <!-- Form Row        -->

                            <!-- Form Group (location)-->

                        <!-- Form Group (email address)-->


                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label" >Mô tả</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"  >
                          </textarea>
                        </div>
                        <!-- Form Row-->

                        <!-- Save changes button-->
                        <button class="btn btn-primary" id ="button" data-toggle="modal" data-target="#modalCookie1" type="button" name="submit">Lưu</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
		$("#button").click(function(event){

			$.ajax({
				method: "POST",// phương thức dữ liệu được truyền đi
        data: {action: 'update'},
				url: "../edit",// gọi đến file server show_data.php để xử lý
				data: $("#form").serialize(),//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
				success : function(response){//kết quả trả về từ server nếu gửi thành công
                    $('#noti').fadeIn();
                    $("#message").after(response);
                    $("#message").remove();
				}
			});
		});


</script>