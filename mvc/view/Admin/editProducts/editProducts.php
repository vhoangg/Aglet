<?php
  //$product = mysqli_fetch_array($data['pr']);
  $pr = $data["product"];
  $str = "";
  $product = mysqli_fetch_array($pr->findProductWithId($data["id"]));



?>
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
                    <form method = "post"  class = "myForm" >
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên sản phẩm</label>

                            <input class="form-control" id="inputUsername" name="name" type="text" value="<?php
                                echo $product['name'];
                            ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Giá</label>
                                <input class="form-control" id="inputFirstName" type="text" name="price" placeholder="Enter your first name" value="<?php

                                  echo $product['price'];
                                ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Giá khuyến mãi</label>
                                <input class="form-control" id="inputLastName" name="price_sale" type="text" placeholder="Nhập giá khuyến mãi" value="<?php
                                 echo $product['price_sale'];
                                ?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inlineFormCustomSelect">Size</label>
                                    <select class="custom-select col-md-6" name="size" id="inlineFormCustomSelect">
                                        <?php
                                            for($i = 36; $i <= 46; $i++){

                                                if($product['size'] == $i){
                                                    echo '<option selected value="'.$i.'">'.$i.'</option>';
                                                }
                                                else
                                                     echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        ?>

                                    </select>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inlineFormCustomSelect">Màu</label>
                                    <select class="custom-select col-md-6" name="color" id="inlineFormCustomSelect">
                                        <?php
                                            $color = ["Blue", "Red", "Yellow", "Green", "Black", "White" ];
                                            for($i = 0; $i < 6; $i++){
                                                if($product['color'] == $color[$i]){
                                                    echo '<option selected value="'.$color[$i].'">'.$color[$i].'</option>';
                                                }
                                                else
                                                  echo '<option value="'.$color[$i].'">'.$color[$i].'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Số lượng còn lại</label>
                                <input class="form-control" id="inputPhone" name="qty" type="tel" placeholder="" value="<?php
                                 echo $product['qty'];
                                ?>">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Bộ sưu tập</label>
                                <input class="form-control" id="inputBirthday" type="text" name="menu_id" placeholder="" value="<?php
                                 echo $product['menu_id'];
                                ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label" >Mô tả</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"  ><?php
                          echo $product['description'];
                          ?>
                          </textarea>
                        </div>
                        <!-- Form Row-->

                        <!-- Save changes button-->
                        <button class="btn btn-primary"  data-toggle="modal" data-target="#modalCookie1" type="submit" name="submit">Lưu</button>
                        <?php
                            $str="";
                            if(isset($_POST['submit'])){
                                if($pr->update($_POST['name'], $_POST['description'], $_POST['menu_id'], $_POST['price'], $_POST['price_sale'],$_POST['qty'], 1, "gege", $_POST['color'], $_POST['size'],$data['id'])){
                                    $str = '<p class="pt-3 pr-2">Cập nhật thành công</p>';
                                }

                                else
                                $str = '<p class="pt-3 pr-2">Cập nhật thất bại</p>';
                                    echo '
                                    <!--Modal: modalCookie-->
                                    <div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                    aria-hidden="true" data-backdrop="true">
                                    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                        <!--Body-->
                                        <div class="modal-body">
                                            <div class="row d-flex justify-content-center align-items-center">
                                            '.$str.'
                                            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Đóng</a>
                                            </div>
                                        </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                    </div>
                                    <!--Modal: modalCookie-->
                                    ';

                            }
?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

