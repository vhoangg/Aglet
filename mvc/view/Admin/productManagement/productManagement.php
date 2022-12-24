
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
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Tình trạng</th>
      <th scope= "col">

      <a href="http://localhost/aglet/admin/createProduct"><i class="fa-solid fa-circle-plus fa-xl"></i></a>
      </th>
    </tr>
  </thead>
  <tbody>
		<?php
			$i = 0;
			$row = [];
			while($row[$i] = mysqli_fetch_array($data["pr"])){
                $sql = 'SELECT SUM(product_detail.QTY), product_detail.parent_id FROM products, product_detail WHERE products.parent_id =  '.$row[$i]['id'].' AND products.id = product_detail.parent_id group by product_detail.parent_id';
                $qty = mysqli_fetch_array($data['model']->customQuery($sql));
                $str;
                $isActive;
                if($qty > 0)
                    $str = "Còn hàng";
                else
                    $str = "Hết hàng";
                if($row[$i]['active'] == 0){
                    $isActive = "Ngừng hoạt động";

                }

                else {
                    $isActive = "Đang hoạt dộng";
                }
				echo '
				<tr>
				<td>'.$row[$i]['id'].'</td>
				<td>'.$row[$i]['name'].'</td>
				<td>'.$isActive.'</td>
				<td>'.$str.'</td>
				<td>
                    <div class="d-flex flex-row justify-content-around">
                        <a href = "http://localhost/aglet/admin/addProduct/'.$row[$i]["id"].'"><i class="fa-solid fa-plus"></i></a></li>
						<a href = "http://localhost/aglet/admin/editProducts/'.$row[$i]["id"].'"><i class="fa-regular fa-pen-to-square"></i></a></li>
						<h6><i class="fa-solid fa-trash"></i></h6>
                    </div>
				</td>
				</tr>
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
                $page = $data["resultPage"];
                if($page[0] == 1)
                    echo "http://localhost/aglet/admin/productManagement/".($page[0]);
                else
                    echo "http://localhost/aglet/admin/productManagement/".($page[0]-1);
                ?>" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <?php

                $num = mysqli_fetch_array($data["numOfPr"]);
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
                $page = $data["resultPage"];
                echo "http://localhost/aglet/admin/productManagement/".($page[0]+1);
                ?> " class="page-link" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div>