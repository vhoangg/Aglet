<?php
print_r($_SESSION['cart']);
?>
<section id="cart" class="main-cart container-fluid">
  <div class="row">
    <div class="col col-half">
      <div class="title-1">
        <h3>
          GIỎ HÀNG
        </h3>
      </div>
      <div class="allCart">
        <div class="product-cart main-cart-left">
          <div class="product-info">
            <div class="col col-big item-2">
              <div class="media">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="https://ananas.vn/wp-content/uploads/Pro_AV00008_1-500x500.jpg">
                  </a>
                </div>
                <div class="media-body">
                  <a href="#">
                    <h4 class="media-heading">Basas bumper shoes</h4>
                  </a>
                  <h4 class="price">
                    Giá: 520.000VNĐ
                  </h4>
                  <div class="row bottom">
                    <div class="sizePicker">
                      <h4>Size</h4>
                      <select id="size-1" class="selectpicker selectSize pickSize bs-select-hidden">
                        <option>&nbsp;</option>
                        <option>35</option>
                        <option>36</option>
                        <option>37</option>
                        <option>38</option>
                        <option>39</option>
                        <option>40</option>
                        <option>41</option>
                        <option>42</option>
                        <option>43</option>
                        <option>44</option>
                      </select>

                    </div>
                    <div class="quanPicker">
                      <h4>Số lượng</h4>
                      <select id="size-1" class="selectpicker selectQuan pickQuan bs-select-hidden">
                        <option>&nbsp;</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col col-third item-2-1 media-right">
              <div class="price orange">
                <h4>782000000 VNĐ</h4>
              </div>
              <div class="status orange">Còn hàng</div>
              <div class="button">
                <i class="fa-solid fa-trash"></i>
              </div>
            </div>
          </div>
          <div class="divider-dashed"></div>
        </div>
      </div>
    </div>
    <div class="col-third ">
      <ul class="bill">
        <li class="group_title">ĐƠN HÀNG</li>
        <li class="divider"></li>
        <li class="promotion">
          <h4>NHẬP MÃ KHUYẾN MÃI</h4>
          <input type="text">
          <button>ÁP DỤNG</button>
        </li>
        <li class="group_item"></li>
        <li class="divider-dashed"></li>
        <li class="group_item total small">
          <span>Đơn hàng</span>
          <span id="price">2.000.000 VNĐ</span>
        </li>
        <li class="group_item discount small">
          <span>Giảm giá</span>
          <span id="price">0 VNĐ</span>
        </li>
        <li class="divider-dashed"></li>
        <li class="group_item total">
          <span class="black">TẠM TÍNH</span>
          <span id="price" class="black">2.000.000 VNĐ</span>
        </li>
        <li class="group_item">
          <input type="submit" value="TIẾP TỤC THANH TOÁN" class="submitBtn">
        </li>
      </ul>
    </div>
  </div>
</section>