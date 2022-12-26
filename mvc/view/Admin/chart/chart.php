
<div class="container-xl px-1 mt-4">
  <div class="row ">
    <div class="card col-xl-5 mx-2">
      <div class="card-header">Sản phẩm bán chạy nhất</div>
      <p>tên</p>
    </div>
  </div>
  <div class="row mt-4">
      <div class="card col-xl-5 mx-2">
        <div class="card-header">Doanh thu từng tháng</div>
        <canvas id="myChart"></canvas>
      </div>
      <div class="card col-xl-6 ">
        <div class="card-header">Doanh thu từng tháng</div>
        <canvas id="circleChart"></canvas>
      </div>
  </div>
  <div class="row mt-4">
      <div class="card col-xl-5 mx-2">
        <div class="card-header">Doanh thu từng tháng</div>
        <canvas id="myChart"></canvas>
      </div>
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
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
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