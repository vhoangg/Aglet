<?php
  $product = mysqli_fetch_array($data['pr']);


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
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Tên sản phẩm</label>

                            <input class="form-control" id="inputUsername" type="text" value="<?php
                                echo $product['name'];
                            ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Giá</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php

                                  echo $product['price'];
                                ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Giá khuyến mãi</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Nhập giá khuyến mãi" value="">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inlineFormCustomSelect">Size</label>
                                    <select class="custom-select col-md-6" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                    </select>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inlineFormCustomSelect">Màu</label>
                                    <select class="custom-select col-md-6" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="blue">Xanh</option>
                                        <option value="red">Đỏ</option>
                                        <option value="yellow">Vàng</option>
                                        <option value="green">Xanh lá</option>
                                        <option value="black">Đen</option>
                                        <option value="white">Trắng</option>
                                    </select>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Số lượng còn lại</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="" value="">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Bộ sưu tập</label>
                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="" value="">
                            </div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <!-- Form Row-->

                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>