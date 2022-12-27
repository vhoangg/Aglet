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
    if ($_GET['size'] && $_GET['sl']) {
      $pid = $_GET['id'] ?? null;

      $pr = $this->model("productModel");
      $sl = $_GET['sl'] ?? null;
      $size = $_GET['size'] ?? null;
      $sql = 'SELECT PD.id as id, name, price, thumb, qty FROM PRODUCT_DETAIL PD, PRODUCTS P WHERE PD.parent_id = P.id AND P.id = ' . $pid.' AND size = '.$size;
      $rs = mysqli_fetch_array($pr->customQuery($sql));
      $sql = 'select id from product_detail where parent_id = '.$pid.' and size = '.$size;

      $result = mysqli_fetch_array($pr->customQuery($sql));
      $id = $result[0];

      if ($rs['qty'] >= $sl) {
        if (!isset($_SESSION['cart'])) {                            // Check tồn tại
          $_SESSION['cart'] = [];
          $_SESSION['cart'][$id] = $rs;
          $_SESSION['cart'][$id]['sl'] = $sl;
          $_SESSION['cart'][$id]['size'] = $size;
          echo "Đã thêm vào giỏ hàng";
        } else {
          if (array_key_exists($id, $_SESSION['cart']) == true) {
            // Trùng id trùng size cũ
              $_SESSION['cart'][$id]['sl'] += $sl;
              echo "Đã thêm vào giỏ hàng";
          } else {
                                                         // khác id
            $_SESSION['cart'][$id] = $rs;
            $_SESSION['cart'][$id]['sl'] = $sl;
            $_SESSION['cart'][$id]['size'] = $size;
            echo "Đã thêm vào giỏ hàng";
          }
        }
      } else
        echo "Kho hàng không đủ số lượng sản phẩm";
    }
    else {
        echo "Vui lòng nhập size, số lượng";
    }
  }
  function delete()
  {
    session_start();
    unset($_SESSION['cart'][$_POST['id']]);
    echo 'Xoá sản phẩm thành công';
  }
}
