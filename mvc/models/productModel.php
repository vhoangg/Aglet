<?php
class productModel extends db{
  public function getProduct(){

  }

  public function product(){
    $qr = "SELECT * FROM products";
    return mysqli_query($this->con, $qr);
  }

  public function findProductWithId($id){
    $qr = "SELECT * FROM PRODUCTS WHERE ID = $id";
    return mysqli_query($this->con, $qr);
  }

  public function paginationQuer($page){
    $total_records_per_page = 1;

    $offset = ((int)$page - 1) * $total_records_per_page;


    $qr = "SELECT * FROM PRODUCTS LIMIT " .$total_records_per_page. " offset ".$offset;
    echo $qr;
    return mysqli_query($this->con, $qr);
  }

  public function numOfProducts(){
    $qr = "SELECT COUNT(*) FROM PRODUCTS";
    return mysqli_query($this->con, $qr);
  }
}
?>