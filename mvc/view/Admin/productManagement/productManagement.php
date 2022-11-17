

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
						<li><a href = ","http://localhost:8888/aglet/editProducts/". $row[$i]['id']."",">Sửa</a></li>
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


<div class="demo">
    <nav class="pagination-outer" aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <?php

                $num = mysqli_fetch_array($data["numOfPr"]);
                $per_page = 1;
                $pages = ceil($num[0] / $per_page);
                $i = 1;
                while($i <= $pages){
                    echo "
                        <li class=","page-item","><a class=","page-link"," href= ","http://localhost:8888/aglet/productManagement/".$i.">".$i."</a></li>
                    ";
                    $i++;
                }

            ?>

            <li class="page-item">
                <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div>