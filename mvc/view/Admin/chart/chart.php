
<div class="container-xl px-1 mt-4">
  <div class="row ">
    <div class="card col-xl-5 mx-5 ">
      <div class="card-header">Sản phẩm bán chạy nhất</div>
      <p>tên</p>
    </div>
    <div class="card col-xl-5 ">
        <div class="card-header">Tỉ lệ hủy hàng</div>
        <canvas id="circleChart"></canvas>
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