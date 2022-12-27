<?php
class shipping_information extends controller
{
  function show()
  {
    $product = $this->model("productModel");

    $this->view("layout", ["page" => "shipping-information"]);
  }

  function process()
  {
    session_start();
    $invoice = $this->model("invoiceModel");

    $sql = 'INSERT INTO INVOICE (NAME, PHONE,   ADDRESS, EMAIL, CREATED_AT, status ) VALUES("' . $_POST['name'] . '", "' . $_POST['phone'] . '", "' . $_POST['address'] . '", "' . $_POST['email'] . '", "' . $_POST['create_date'] . '",0)';

    $invoice->customQuery($sql);
    $sql = 'SELECT ID FROM INVOICE WHERE NAME="' . $_POST['name'] . '"AND PHONE = "' . $_POST['phone'] . '" AND EMAIL = "' . $_POST['email'] . '" AND CREATED_AT  = "' . $_POST['create_date'] . '" AND ADDRESS = "' . $_POST['address'] . '" ORDER BY CREATED_AT DESC LIMIT 1';
    $id = mysqli_fetch_array($invoice->customQuery($sql));
    foreach ($_SESSION['cart'] as $key => $value) {
      $sql = 'INSERT INTO INVOICE_DETAIL (INVOICE_ID, PRODUCT_ID, QTY) VALUES(' . $id[0] . ', ' . $value['id'] . ', ' . $value['sl'] . ')';
      $invoice->customQuery($sql);

      $sql = 'UPDATE product_detail SET qty = qty - ' . $value['sl'] . ' WHERE ID = ' . $value['id'] . '';
      $invoice->customQuery($sql);
      echo $id[0];
      unset($_SESSION['cart'][$value['id']]);
    }
  }
}
