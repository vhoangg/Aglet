<?php
class invoiceModel extends db
{
  public function customQuery($qr){
    return mysqli_query($this->con, $qr);
  }

  public function paginationQuer($page)
  {
    $total_records_per_page = 10;
    $page--;
    $offset = (((int)$page) * (int)$total_records_per_page);


    $qr = 'SELECT * FROM INVOICE  LIMIT ' . $total_records_per_page . ' offset ' . $offset;

    return mysqli_query($this->con, $qr);
  }

  public function numOfInvoice()
  {
    $qr = "SELECT COUNT(*) FROM INVOICE";
    return mysqli_query($this->con, $qr);
  }

  public function getProducts($id)
  {
    $qr = 'SELECT PARENT_ID as pid , SIZE as size, INVOICE_DETAIL.QTY AS qty, price FROM INVOICE_DETAIL, PRODUCT_DETAIL  WHERE INVOICE_DETAIL.PRODUCT_ID = PRODUCT_DETAIL.ID AND INVOICE_DETAIL.INVOICE_ID = '.$id;
    echo $qr;
    return mysqli_query($this->con, $qr);
  }



}

?>