<?php
class search_order extends controller
{
  function show()
  {
    $product = $this->model("productModel");

    $this->view("layout", ["page" => "search-order"]);
  }

  function search(){
    $invoice = $this->model('invoiceModel');
    $sql = 'SELECT * FROM INVOICE WHERE id = '.$_POST['id'];
    $preparedStm = $invoice->customQuery($sql);
    $rs = mysqli_fetch_array($preparedStm);
    if(isset($rs))
      echo 'http://localhost/Aglet/tracking_order?id='.$rs['id'];
    else {
        echo 'Đơn hàng không tồn tại';
    }

  }
}
