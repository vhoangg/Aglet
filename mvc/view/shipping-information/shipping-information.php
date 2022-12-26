<?php
$cart = $_SESSION['cart'];
$sum = 0;
// session_unset();
?>


<body>
  <div id="shipping-information" class="container">
    <div class="form">
      <form action="" id="orderForm">
        <div class="form_title">THÔNG TIN GIAO HÀNG</div>
        <input type="text" class="info" id="name" placeholder="Họ Tên">
        <input type="text" class="info" id="phone" placeholder="Số điện thoại">
        <input type="text" class="info" id="email"  placeholder="Email">
        <input type="text" class="info" id="addr" placeholder="Địa chỉ">

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
        <?php
          foreach ($cart as $item => $value) {
            $sum += $value['price'] * $value['sl'];
            echo'
            <li class="group_item">
              <div class="item-information">
                <h4>'.$value['name'].'<span class="right normal">'.$value['price'].' VND</span></h4>
                <h4 class="normal">Size:'.$value['size'].' <span class="mid normal"> x'.$value['sl'].' </span></h4>
              </div>
            </li>';
          }
        ?>

        <li class="divider-dashed"></li>
        <li class="group_item fee">
          <h4>Đơn hàng <span class="right"><?php
            echo $sum;
          ?> VND</span></h4>
          <h4>Giảm <span class="right normal">Giá VND</span></h4>
          <h4 class="fee-black">Phí vận chuyển <span class="right normal">Giá VND</span></h4>
          <h4 class="fee-black">Phí thanh toán <span class="right normal">Giá VND</span></h4>
        </li>
        <li class="divider-dashed"></li>
        <li class="group_item total">
          <span>TỔNG CỘNG</span>
          <span id="price"><?php
           echo $sum;
          ?> VND</span>
        </li>
        <li class="group_item">
          <input type="submit" value="HOÀN TẤT ĐẶT HÀNG" class="submitBtn">
        </li>
      </ul>

    </div>

  </div>
</body>


<script type="text/javascript">
		$(".submitBtn").click(function(event){
            alert("helu");
            var name = $("#name").val();
            var phone= $("#phone").val();
            var email = $("#email").val();
            var address = $("#addr").val();
            var d = new Date();
            var createDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
            console.log(name);
            console.log(phone);
            console.log(email);
            console.log(address);
            console.log(createDate);

			$.ajax({

				method: "POST",// phương thức dữ liệu được truyền đi
				url: "http://localhost/aglet/shipping_information/process",// gọi đến file server show_data.php để xử lý
				data: {name:name, phone:phone, email:email, address : address, create_date:createDate},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
				success : function(response){//kết quả trả về từ server nếu gửi thành công
                  alert(response);
				}
			});
		});


</script>