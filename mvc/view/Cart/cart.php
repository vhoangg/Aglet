<?php
$cart = $_SESSION['cart'];
$sum = 0;
// session_unset();
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
        <?php
        foreach ($cart as $value) {
        ?>
          <div class="product-cart main-cart-left">
            <div class="product-info" id="row_<?php echo $value['id'] ?>">
              <div class="col col-big item-2">
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="<?php echo $value['thumb'] ?>">
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#">
                      <h4 class="media-heading"><?php echo $value['name'] ?></h4>
                    </a>
                    <h4 class="price">
                      Giá: <span class="normal"><?php echo $value['price'] ?>VNĐ</span>
                    </h4>
                    <div class="row bottom">
                      <div class="sizePicker">
                        <h4>Size</h4>
                        <select id="size-1" class="selectpicker selectSize pickSize bs-select-hidden">
                          <option><?php echo $value['size'] ?></option>
                        </select>

                      </div>
                      <div class="quanPicker">
                        <h4>Số lượng</h4>
                        <select id="size-1" class="selectpicker selectQuan pickQuan bs-select-hidden">
                          <option><?php echo $value['sl']; ?></option>

                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col col-third item-2-1 media-right">
                <div class="price orange">
                  <h4><?php echo number_format($value['price'], 0, ",", ".") ?> VNĐ</h4>
                </div>
                <div class="status orange">Còn hàng</div>
                <div class="button btnDelete" data-id="<?php echo $value['id'] ?>">
                  <i class="fa-solid fa-trash"></i>
                </div>
              </div>
            </div>
            <div class="divider-dashed"></div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-third ">
      <?php
      foreach ($cart as $value) {
        $sum += $value['price'] * $value['sl'];
      }
      ?>
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
          <span id="price"><?php echo number_format($sum, 0, ",", ".") ?> VNĐ</span>
        </li>
        <li class="group_item discount small">
          <span>Giảm giá</span>
          <span id="price" class="normal">0 VNĐ</span>
        </li>
        <li class="divider-dashed"></li>
        <li class="group_item total">
          <span class="black">TẠM TÍNH</span>
          <span id="price" class="black"><?php echo number_format($sum, 0, ",", ".") ?> VNĐ</span>
        </li>
        <li class="group_item">
          <input type="submit" value="TIẾP TỤC THANH TOÁN" class="submitBtn">
        </li>
      </ul>
    </div>
  </div>
</section>
<script>
  $('body').on('click', '.btnDelete', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    // Adding ajax 
    $.ajax({
      method: 'POST',
      url: 'http://localhost/Aglet/cart/delete',
      data: {
        id: id,
      },
      success: function(data) {
        $('#row_' + id).remove();
        alert(data);
        window.location.reload();
      }
    })

  })
</script>