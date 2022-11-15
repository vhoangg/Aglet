

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Tình trạng</th>
    </tr>
  </thead>
  <tbody>
		<?php
			$i = 0;
			$row = [];
			while($row[$i] = mysqli_fetch_array($data["pr"])){
				echo "
				<tr>
				<td>".$row[$i]['id']."</td>
				<td>".$row[$i]['name']."</td>
				<td>".$row[$i]['price']."</td>
				<td>".$row[$i]['active']."</td>
				<td>
					<ul>
						<li><a href = ","editProducts/". $row[$i]['id']."",">Sửa</a></li>
						<li>Xóa</li>
					</ul>
				</td>
				</tr>
				";
				$i++;
			}
		?>
  </tbody>
</table>