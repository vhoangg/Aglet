<?php
class cart extends controller
{
  function show()
  {

    $product = $this->model("productModel");

    $this->view("layout", ["page" => "cart"]);
  }
  function process()
  {
    session_start();
    if (isset($_GET['id'])) {
      $id = $_GET['id'] ?? null;
      $pr = $this->model("productModel");
      $sl = $_GET['sl'] ?? null;
      $size = $_GET['size'] ?? null;
      $sql = 'SELECT PD.id as id, name, price, thumb, qty FROM PRODUCT_DETAIL PD, PRODUCTS P WHERE PD.parent_id = P.id AND PD.id = ' . $id;
      $rs = mysqli_fetch_array($pr->customQuery($sql));
      if ($rs['qty'] >= $sl) {
        if (!isset($_SESSION['cart'])) {                            // Check tồn tại
          $_SESSION['cart'] = [];
          $_SESSION['cart'][$id] = $rs;
          $_SESSION['cart'][$id]['key'] = 0;
          $_SESSION['cart'][$id]['key']['sl'] = $sl;
          $_SESSION['cart'][$id]['key']['size'] = $size;
          echo "Đã thêm vào giỏ hàng";
        } else {
          if (array_key_exists($id, $_SESSION['cart']) == true) {  // Trùng id trùng size cũ
            if ($_SESSION['cart'][$id]['size'] == $size) {
              $_SESSION['cart'][$id]['sl'] += $sl;
              echo "Đã thêm vào giỏ hàng";
            } else if ($_SESSION['cart'][$id + 100 + $size]['size'] == $size) { // Trùng id trùng size mới
              $_SESSION['cart'][$id + 100 + $size]['sl'] += $sl;
              echo "Đã thêm vào giỏ hàng";
            } else {                                                  //trùng id khác size
              $_SESSION['cart'][$id + 100 + $size] = $rs;
              $_SESSION['cart'][$id + 100 + $size]['sl'] = $sl;
              $_SESSION['cart'][$id + 100 + $size]['size'] = $size;
              echo "Đã thêm vào giỏ hàng";
            }
          } else {                                                      // khác id
            $_SESSION['cart'][$id] = $rs;
            $_SESSION['cart'][$id]['sl'] = $sl;
            $_SESSION['cart'][$id]['size'] = $size;
            echo "Đã thêm vào giỏ hàng";
          }
        }
      } else
        echo "Kho hàng không đủ số lượng sản phẩm";
    }
  }
  function delete()
  {
    session_start();
    unset($_SESSION['cart'][$_POST['id']]);
    echo 'Xoá sản phẩm thành công';
  }
}
