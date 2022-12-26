<body>
  <div id="shipping-information" class="container">
    <div class="form">
      <form action="" id="orderForm">
        <div class="form_title">THÔNG TIN GIAO HÀNG</div>
        <input type="text" class="info" placeholder="HỌ TÊN">
        <input type="text" class="info" placeholder="Số điện thoại">
        <input type="text" class="info" placeholder="Email">
        <input type="text" class="info" placeholder="Địa chỉ">

        <div class="info-holder">
          <input type="checkbox" name="" id="getInfo" class="checkBox">
          <h4>Cập nhật các thông tin mới nhất về chương trình từ Aglet</h4>
        </div>
        <div class="form_title">PHƯƠNG THỨC GIAO HÀNG</div>
        <div class="info-holder">
          <input type="checkbox" name="" id="shippingType" class="checkBox">
          <h4>Tốc độ tiêu chuẩn (từ 2 - 5 ngày làm việc)</h4>
        </div>
        <div class="form_title">PHƯƠNG THỨC THANH TOÁN</div>
        <div class="info-holder">
          <input type="checkbox" name="" id="checkBox" class="checkBox">
          <h4> Thanh toán trực tiếp khi giao hàng </h4>
        </div>
        <div class="info-holder">
          <input type="checkbox" name="" id="checkBox" class="checkBox">
          <h4>Thanh toán bằng thẻ quốc tế và nội địa (ATM)</h4>
        </div>
        <div class="info-holder">
          <input type="checkbox" name="" id="checkBox" class="checkBox">
          <h4>Thanh toán bằng ví MoMo</h4>
        </div>
      </form>
    </div>
    <div class="bill_container">
      <ul class="bill">
        <li class="group_title">ĐƠN HÀNG</li>
        <li class="divider"></li>
        <li class="group_item">
          <div class="item-information">
            <h4>Tên sản phẩm <span class="right normal">Giá VND</span></h4>
            <h4 class="normal">Size: <span class="mid normal"> x1 </span></h4>
          </div>
        </li>
        <li class="divider-dashed"></li>
        <li class="group_item fee">
          <h4>Đơn hàng <span class="right">Giá VND</span></h4>
          <h4>Giảm <span class="right normal">Giá VND</span></h4>
          <h4 class="fee-black">Phí vận chuyển <span class="right normal">Giá VND</span></h4>
          <h4 class="fee-black">Phí thanh toán <span class="right normal">Giá VND</span></h4>
        </li>
        <li class="divider-dashed"></li>
        <li class="group_item total">
          <span>TỔNG CỘNG</span>
          <span id="price">2.000.000 VNĐ</span>
        </li>
        <li class="group_item">
          <input type="submit" value="HOÀN TẤT ĐẶT HÀNG" class="submitBtn">
        </li>
      </ul>

    </div>

  </div>
</body>