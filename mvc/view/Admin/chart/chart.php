<?php
$model = $data['pr'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$month = date('m');

$year = date('Y');

$sql = 'select arrived_at, invoice_detail.product_id, sum(invoice_detail.qty) as qty from invoice, invoice_detail where invoice.id = invoice_detail.invoice_id and status = 3 and month(arrived_at) = '.$month.' and year(arrived_at) = '.$year.' group by product_id order by sum(invoice_detail.qty) desc limit 1;';
$preparedStm = $model->customQuery($sql);
$rs = mysqli_fetch_array($preparedStm);

$sql = 'select products.id ,name, thumb, size, gender from products, product_detail where product_detail.id = '.$rs['product_id'].' and product_detail.parent_id = products.id';
$preparedStm = $model->customQuery($sql);
$result = mysqli_fetch_array($preparedStm);


?>
<div class="container-xl px-1 mt-4">
  <div class="row ">
    <div class="card col-xl-6 mx-1 ">
      <div class="card-header">Sản phẩm bán chạy nhất tháng hiện tại</div>
      <div class="row">
          <div class="col-xl-5 mx-1 mt-2">
          <img class="img-account-profile square img-fluid mb-2" id="thumb" src="<?php
          echo $result['thumb'];
          ?>" alt="">
          </div>
          <div class="col-xl-6 mx-1 mt-2">
          <?php
                echo'
                <div class="row">
                    <div class="mt-2 col-xl-6">Tên sản phẩm</div>
                    <div class="mt-2 col-xl-6">'.$result['name'].'</div>
                  <div></div>
                </div>
                <div class="row">
                 <div class="mt-2 col-xl-6">Size</div>
                 <div class="mt-2 col-xl-6">'.$result['size'].'</div>
                </div>
                <div class="row">
                  <div class="mt-2 col-xl-6">Số lượng đã bán</div>
                  <div class="mt-2 col-xl-6">'.$rs['qty'].'</div>
                </div>
                ';
              ?>




          </div>
      </div>

    </div>

  <div class="row mt-4">
      <div class="card col-xl mx-2">
        <div class="card-header">Doanh thu từng tháng</div>
        <canvas id="myChart"></canvas>
      </div>

  </div>
  <div class="row mt-4">

      <div class="card col-xl-6 ">
        <div class="card-header">Doanh thu từng tháng</div>
        <canvas id="myChart"></canvas>
      </div>
  </div>
</div>

<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      datasets: [{
        label: '# of Votes',
        data: [12000, 19000, 30000, 500000, 2000000, 300000, 8000000, 400000, 200000, 90000, 110000, 5000000],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          min: 0,
          max: 10000000
        }
      }
    }
  });


  const circle = document.getElementById('circleChart');
  new Chart(circle, {
    type: 'doughnut',
    data:ata = {
    labels: [
    'Red',
    'Blue',
    'Yellow'
    ],
    datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
}
  });
</script>