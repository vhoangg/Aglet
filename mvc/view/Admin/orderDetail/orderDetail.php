<?php
  $id = $_GET['id'];
  $str = 'SELECT * FROM INVOICE WHERE ID = '.$id;
  $invoice= $data['inv'];
  $i = 0;
  $row = mysqli_fetch_array($invoice->customQuery($str));
  function formatMoney($money){
   return number_format($money, 0, '', ',');

  }
?>
<div class="container-xl px-1 mt-4 mh-vw-100">
    <div class="row mt-3">
      <div class="card col-xl mx-1">
        <div class="card-header">Chi tiết hóa đơn</div>
        <div class="row mt-4">

          <div class="col-xl-6">
            <div class="row mb-2">Thông tin người nhận</div>
            <div class="row mt-4">
              <div class="col-xl-6">Tên người đặt:</div>
              <div class="col-xl-6"><?php
              echo $row['name'];
              ?></div>
            </div>
            <div class="row mt-2">
              <div class="col-xl-6">Số điện thoại:</div>
              <div class="col-xl-6"><?php
              echo $row['phone'];
              ?></div>
            </div>
            <div class="row mt-2">
              <div class="col-xl-6">Email:</div>
              <div class="col-xl-6"><?php
              echo $row['email'];
              ?></div>
            </div>
            <div class="row mt-2">
              <div class="col-xl-6">Địa chỉ:</div>
              <div class="col-xl-6"><?php
              echo $row['address'];
              ?></div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="row mb-2">Đơn hàng</div>
             <div class="row mt-2">
                  <div class="col-xl-8" >Đơn hàng số:</div>
                  <div class="col-xl-4" id="id"><?php
                  echo $row['id'];
                  ?></div>

                </div>

            <?php
              $rs= [];
              $i=0;
              $sum = 0;
              while($rs[$i]= mysqli_fetch_array($data["product"])){
                $sum += $rs[$i]['price'] * $rs[$i]['qty'];
                $sql = 'SELECT name from products where  products.id = '.$rs[$i]['pid'];
                $name = mysqli_fetch_array($invoice->customQuery($sql));
                echo '
                <div class="row mt-2">
                  <div class="col-xl-8">Sản phẩm: '.$name[0].'</div>
                  <div class="col-xl-4">'.formatMoney($rs[$i]['price']).' VND</div>
                </div>
                <div class="row mt-2">
                  <div class="col-xl-8">Size: '.$rs[$i]['size'].'</div>
                  <div class="col-xl-4">x '.$rs[$i]['qty'].'</div>
                </div>
                ';
                $i++;
              }
            ?>
            <div class="row">Tổng: <?php
            echo formatMoney($sum);
            ?> VND</div>


          </div>

        </div>
        <div class="row mt-4 mb-6">
          <?php
            if($row['status'] == 0)
            echo '
            <div class="col-xl-4" id ="button">
            <button type="button" class="btn btn-primary" id="confirm">Xác nhận và chuyển giao</button>
            </div>

            ';
          ?>
        </div>

    </div>

  </div>

  <script type="text/javascript">
		$("#confirm").click(function(event){
          var id = $('#id').html();
          console.log(id);
          var d = new Date();
          var createDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
			$.ajax({

				method: "POST",// phương thức dữ liệu được truyền đi
				url: "http://localhost/aglet/admin/orderDetailProcess",// gọi đến file server show_data.php để xử lý
				data: {date:createDate},//lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
				success : function(response){//kết quả trả về từ server nếu gửi thành công
          window.location.reload();
				}
			});
		});


</script>