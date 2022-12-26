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
      $sql = 'SELECT PD.id as id, name, price, thumb FROM PRODUCT_DETAIL PD, PRODUCTS P WHERE PD.parent_id = P.id AND PD.id = ' . $id;
      $rs = mysqli_fetch_array($pr->customQuery($sql));
      if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
        $_SESSION['cart'][$id] = $rs;
        $_SESSION['cart'][$id]['sl'] = $_GET['sl'];
        $_SESSION['cart'][$id]['size'] = $_GET['size'];
        echo "Đã thêm vào giỏ hàng";
      } else {
        if (array_key_exists($id, $_SESSION['cart']) == true) {
          echo "Sản phẩm đã có trong giỏ hàng";
        } else {
          $_SESSION['cart'][$id] = $rs;
          $_SESSION['cart'][$id]['sl'] = $_GET['sl'];
          $_SESSION['cart'][$id]['size'] = $_GET['size'];
          echo "Đã thêm vào giỏ hàng";
        }
      }
    }
  }
  function delete()
  {
    session_start();
    unset($_SESSION['cart'][$_POST['id']]);
    echo 'Xoá sản phẩm thành công';
  }
}
