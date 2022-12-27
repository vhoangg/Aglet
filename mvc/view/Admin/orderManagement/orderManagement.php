
<div class="input-group d-flex flex-row justify-content-center mt-3 mb-3">
    <div class="col-md-4">
        <input type="search" class="form-control  rounded " placeholder="Search" aria-label="Search" aria-describedby="search-addon" />

    </div>
    <button type="button" class="btn btn-outline-primary">search</button>
</div>

<table class="table table-hover">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">SĐT</th>
      <th scope="col">Email</th>
      <th scope="col">Ngày tạo</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">gege</th>
    </tr>
  </thead>
  <tbody>
		<?php
			$i = 0;
			$row = [];
			while($row[$i] = mysqli_fetch_array($data["inv"])){
        $str='';
        switch ($row[$i]['status']) {
          case 0:
            $str = "Chưa xác nhận";
            break;
          case 1:
            $str = "Đã chuyển giao";
            break;
          case 2:
            $str = "Đang giao";
            break;
          case 3:
            $str = "Đã nhận hàng";
            break;

          default:
            $str = "Đã hủy";
            break;
        }
				echo '
				<tr>
				<td>'.$row[$i]['id'].'</td>
				<td>'.$row[$i]['phone'].'</td>
				<td>'.$row[$i]['email'].'</td>
				<td>'.$row[$i]['created_at'].'</td>
        <td>'.$str.'</td>
        <td>
        <div class="d-flex flex-row justify-content-around">
          <a href = "http://localhost/aglet/admin/orderDetail?id='.$row[$i]["id"].'"><i class="fa-regular fa-circle-info"></i></a></li>

    </div>
        </td>
				';
				$i++;
			}
		?>
  </tbody>
</table>


<div class="demo">
    <nav class="pagination-outer" aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item">
                <a href="<?php
                $page = $data["pg"];
                if($page[0] == 1)
                    echo "http://localhost/aglet/admin/productManagement/".($page[0]);
                else
                    echo "http://localhost/aglet/admin/productManagement/".($page[0]-1);
                ?>" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <?php

                $num = mysqli_fetch_array($data["num"]);
                $per_page = 10;
                $pages = ceil($num[0] / $per_page);
                $i = 1;
                while($i <= $pages){
                    echo "
                        <li class=","page-item","><a class=","page-link"," href= ","http://localhost/aglet/admin/productManagement/".$i.">".$i."</a></li>
                    ";
                    $i++;
                }


            ?>

            <li class="page-item">
                <a href="<?php
                $page = $data["pg"];
                echo "http://localhost/aglet/admin/productManagement/".($page[0]+1);
                ?> " class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
