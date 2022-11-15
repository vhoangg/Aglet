<?php
class productModel extends db{
  public function getProduct(){

  }

  public function product(){
    $qr = "SELECT * FROM products";
    return mysqli_query($this->con, $qr);
  }
}
?>