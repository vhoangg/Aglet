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
    $total_records_per_page = 10;
    $page--;
    $offset = (   ((int)$page) * (int)$total_records_per_page);


    $qr = "SELECT * FROM PRODUCTS LIMIT " .$total_records_per_page. " offset ".$offset;

    return mysqli_query($this->con, $qr);
  }

  public function numOfProducts(){
    $qr = "SELECT COUNT(*) FROM PRODUCTS";
    return mysqli_query($this->con, $qr);
  }

  public function update($name, $description, $menu_id, $price, $price_sale, $qty, $active, $thumb, $color, $size,$gender, $id){
    $qr = 'UPDATE PRODUCTS SET name = "'.$name.'", description = "'.$description.'", menu_id = '.$menu_id.', price = '.$price.', price_sale = '.$price_sale.',qty = '.$qty.', active = '.$active.', thumb = "'.$thumb.'", color = "'.$color.'", size = '.$size.',gender = '.$gender.' WHERE id = '.$id;

    return mysqli_query($this->con, $qr);
  }

  public function add($name,  $menu_id, $price, $price_sale){
    $qr = 'INSERT INTO MENUS (name, parent_id, price, price_sale) values ("'.$name.'",0 ,'.$price.', '.$price_sale.');';
    return mysqli_query($this->con, $qr);
  }

  public function findProductWithGender($gender){
    $qr = "SELECT * FROM PRODUCTS WHERE gender = $gender";
    return mysqli_query($this->con, $qr);
  }
}
