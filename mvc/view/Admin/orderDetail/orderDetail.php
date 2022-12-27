<head>
  <style>
    #order-detail {
      padding-left: 20px;
      padding-top: 20px;
    }

    .od-col {
      float: left;
    }

    .od-col-half {
      width: 45%;
      /* background-color: whitesmoke; */
      margin-left: 10px;
    }

    #order-detail {
      width: 1200px;
      padding: 0 auto;
      margin: 0 auto;
      min-height: 350px;
    }

    img {
      max-width: 200px;
      height: auto;
    }

    .list-item .item-picture img {
      padding-bottom: 20px;
    }

    .media.item-media {
      padding-left: 20px;
    }

    .media.item-media .title {
      font-weight: 600;
      padding-bottom: 10px;
      padding-top: 10px;
      letter-spacing: 1.2px;
      margin-left: -5px;
    }

    #order-detail .line {
      margin-left: 2.5%;
      margin-right: 2.55%;
      width: 95%;
      height: 2px;
      background-color: black;
      margin-bottom: 10px;
    }

    #order-detail .item-picture {
      width: 40%;
    }

    #order-detail .item-information {
      width: 60%;
      padding-left: 10px;
    }

    .media.item-media .list-item {
      padding-left: 0px;
    }

    .media.item-media .text-1 {
      font-weight: 700;
    }

    .media.item-media .value {
      font-weight: 500;
    }

    .media.item-media.style1 {
      min-height: 300px;
      max-height: 300px;
      overflow-y: scroll;
      scroll-behavior: smooth;
    }

    .media.item-media {
      background-color: whitesmoke;
      padding-bottom: 10px;
    }

    .media.item-media.invoice {
      margin-top: 40px;
    }

    #order-detail .list-item {
      height: 230px;
    }

    #order-detail .od-col-half.style1 {
      background-color: white;
    }

    .media.item-media.invoice .text-3 {
      font-size: 20px;
      font-weight: 600;
    }

    #order-detail .id-order {
      width: 100%;
      display: inline-flex;
    }

    #order-detail #id {
      padding-left: 10px;
      color: #f15e2c;
      font-style: italic;
    }

    #order-detail .total-order {
      display: inline-flex;
    }

    #order-detail .total-order .total {
      padding-left: 10px;
      color: #f15e2c;
      font-size: 25px;
      margin-top: -5px;
    }

    #order-detail .od-col .media.item-media.od-status {
      margin-top: 40px;
    }

    #order-detail #od-button.od-col-half {
      padding-top: 20px;
      display: flex;
    }

    #order-detail #od-button #button {
      padding-right: 20px;
    }
  </style>
</head>
<?php
$id = $_GET['id'];
$str = 'SELECT * FROM INVOICE WHERE ID = ' . $id;
$invoice = $data['inv'];
$i = 0;
$row = mysqli_fetch_array($invoice->customQuery($str));
function formatMoney($money)
{
  return number_format($money, 0, '', ',');
}
?>

<body>
  <div id="order-detail">
    <div class="od-col od-col-half">
      <div class="media item-media style1">
        <h4 class="title">DANH SÁCH SẢN PHẨM</h4>
        <div style=" width: 90%; margin-left:0px;" class="line"></div>

        <?php
        $rs = [];
        $i = 0;
        $sum = 0;
        while ($rs[$i] = mysqli_fetch_array($data["product"])) {
          $sum += $rs[$i]['price'] * $rs[$i]['qty'];
          $sql = 'SELECT name from products where  products.id = ' . $rs[$i]['pid'];
          $name = mysqli_fetch_array($invoice->customQuery($sql));
          echo '
                  <div class="list-item">
            <div class="od-col item-picture">
              <img src="https://ananas.vn/wp-content/uploads/AGT0010_1.jpg" alt="">
            </div>
            <div class="od-col item-information">
              <p class="text-1">' . $name[0] . '</p>
              <p class="text-1">Giá: <span class="value">' . formatMoney($rs[$i]['price']) . ' VNĐ</span></p>
              <p class="text-1">Size: <span class="value">' . $rs[$i]['size'] . '</span></p>
              <p class="text-1">Số lượng: <span class="value">' . $rs[$i]['qty'] . '</span></p>
            </div>
          </div>
          ';
          $i++;
        }
        ?>
      </div>
      <div class="media item-media od-status">
        <h4 class="title">TRẠNG THÁI ĐƠN HÀNG</h4>
        <p class="text-1 value">
          <?php
          $str = '';
          switch ($row['status']) {
            case 0:
              $str = "Chưa xác nhận";
              break;
            case 1:
              $str = "Đã chuyển giao vào: " . $row['confirm_at'];
              break;
            case 2:
              $str = "Bắt đầu giao vào: " . $row['ship_at'];
              break;
            case 3:
              $str = "Đã nhận hàng vào:  " . $row['arrived_at'];
              break;

            default:
              $str = "Đã hủy vào ngày: " . $row['cancel_at'];
              break;
          }
          echo $str;
          ?>
        </p>
      </div>
    </div>
    <div class="od-col od-col-half style1">
      <div class="media item-media">
        <h4 class="title">ĐỊA CHỈ NHẬN HÀNG</h4>
        <div style=" width: 90%; margin-left:0px;" class="line"></div>
        <p class="text-2">Họ tên: <?php echo $row['name']; ?></p>
        <p class="text-2">Điện thoại: <?php echo $row['phone']; ?></p>
        <p class="text-2">Email: <?php echo $row['email']; ?></p>
        <p class="text-2">Địa chỉ: <?php echo $row['address']; ?></p>
      </div>
      <div class="media item-media invoice">
        <h4 class="title">THANH TOÁN</h4>
        <div style=" width: 90%; margin-left:0px;" class="line"></div>
        <div class="id-order">
          <p class="text-3">Mã đơn hàng: </p>
          <p class="text-3" id="id"> <?php echo $row['id']; ?></p>
        </div>
        <div class="total-order">
          <p class="text-3 title1">Tổng thanh toán: </p>
          <p class="text-3 total"> <?php
                                    echo formatMoney($sum);
                                    ?></p>
        </div>
      </div>
    </div>
    <?php
    if ($row['status'] == 0)
      echo '
      <div id = "od-button" class = "od-col od-col-half">
              <div class="od-confirm" id ="button">
                <button type="button" class="btn btn-primary" id="confirm">Xác nhận và chuyển giao</button>
              </div>
              <div class="od-cancel" id ="button">
                <button type="button" class="btn btn-danger" id="cancel">Hủy đơn hàng</button>
              </div>
              </div>
              ';
    else if ($row['status'] == 3)
      echo '
          <div class="col-xl-4 mt-3">
             <button type="button" class="btn btn-success" id="print">In hóa đơn</button>
           </div>';
    ?>
  </div>

</body>
<script type="text/javascript">
  $("#confirm").click(function(event) {
    var id = $('#id').html();
    console.log(id);
    var d = new Date();
    var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    var date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
    var createDate = date + ' ' + time;
    $.ajax({
      method: "POST", // phương thức dữ liệu được truyền đi
      url: "http://localhost/aglet/admin/orderDetailProcess", // gọi đến file server show_data.php để xử lý
      data: {
        status: "confirm",
        id: id,
        date: createDate
      }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
      success: function(response) { //kết quả trả về từ server nếu gửi thành công
        window.location.reload();
      }
    });
  });

  $("#cancel").click(function(event) {
    var id = $('#id').html();
    console.log(id);
    var d = new Date();
    var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    var date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
    var createDate = date + ' ' + time;
    console.log(createDate);
    $.ajax({

      method: "POST", // phương thức dữ liệu được truyền đi
      url: "http://localhost/aglet/admin/orderDetailProcess", // gọi đến file server show_data.php để xử lý
      data: {
        status: "cancel",
        id: id,
        date: createDate
      }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
      success: function(response) { //kết quả trả về từ server nếu gửi thành công
        window.location.reload();
      }
    });
  });

  $("#print").click(function(event) {
    var id = $('#id').html();
    console.log(id);
    var d = new Date();
    var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
    var date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
    var createDate = date + ' ' + time;
    console.log(createDate);
    $.ajax({

      method: "POST", // phương thức dữ liệu được truyền đi
      url: "http://localhost/aglet/admin/orderDetailProcess", // gọi đến file server show_data.php để xử lý
      data: {
        status: "print",
        id: id,
        date: createDate
      }, //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
      success: function(response) { //kết quả trả về từ server nếu gửi thành công
        window.location.reload();
      }
    });
  });
</script>