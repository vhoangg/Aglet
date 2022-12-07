<?php
class productModel extends db
{
  public function getProduct()
  {
  }

  public function product()
  {
    $qr = "SELECT * FROM products";
    return mysqli_query($this->con, $qr);
  }

  public function menu()
  {
    $qr = "SELECT * FROM menus";
    return mysqli_query($this->con, $qr);
  }

  public function findProductWithId($id)
  {
    $qr = "SELECT A.id, A.name, A.description, A.menu_id, A.price, A.price_sale, A.active, A.thumb, A.color, A.qty, A.size, A.gender FROM PRODUCTS A, MENUS B  WHERE B.id = $id AND A.menu_id = B.id";
    return mysqli_query($this->con, $qr);
  }
  public function query($color, $size, $gender)
  {
    $qr = 'SELECT * FROM PRODUCTS WHERE color = "' . $color . '" AND size = ' . $size . ' AND gender = ' . $gender . ';';

    return mysqli_query($this->con, $qr);
  }

  public function paginationQuer($page)
  {
    $total_records_per_page = 10;
    $page--;
    $offset = (((int)$page) * (int)$total_records_per_page);


    $qr = "SELECT * FROM MENUS LIMIT " . $total_records_per_page . " offset " . $offset;

    return mysqli_query($this->con, $qr);
  }

  public function numOfProducts()
  {
    $qr = "SELECT COUNT(*) FROM PRODUCTS";
    return mysqli_query($this->con, $qr);
  }

  public function update($name, $description, $menu_id, $price, $price_sale, $qty, $active, $thumb, $color, $size, $gender, $id)
  {
    $qr = 'UPDATE PRODUCTS SET name = "' . $name . '", description = "' . $description . '", menu_id = ' . $menu_id . ', price = ' . $price . ', price_sale = ' . $price_sale . ',qty = ' . $qty . ', active = ' . $active . ', thumb = "' . $thumb . '", color = "' . $color . '", size = ' . $size . ',gender = ' . $gender . ' WHERE id = ' . $id;
    echo $qr;
    return mysqli_query($this->con, $qr);
  }


  public function add($name, $price, $price_sale, $color)
  {
    $qr = 'INSERT INTO MENUS (name, parent_id, price, price_sale, color) values ("' . $name . '",0 ,' . $price . ', ' . $price_sale . ', "' . $color . '");';

    return mysqli_query($this->con, $qr);
  }

  public function findProductWithGender($gender)
  {
    $qr = "SELECT * FROM MENUS WHERE gender = $gender";
    return mysqli_query($this->con, $qr);
  }
}
