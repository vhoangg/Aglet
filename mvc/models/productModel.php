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
    $qr = "SELECT B.id as id, name, color, size, qty, A.active, A.description as description , B.parent_id as parent_id, price, price_sale, thumb FROM PRODUCTS B, PRODUCT_DETAIL A  WHERE A.parent_id = $id AND A.parent_id = B.id ";
    return mysqli_query($this->con, $qr);
  }

  public function getProductColor($id)
  {
    $qr = "SELECT color, A.parent_id as parent_id FROM PRODUCTS B, PRODUCT_DETAIL A WHERE A.parent_id = B.id GROUP BY color, B.parent_id";
    return mysqli_query($this->con, $qr);
  }

  public function getProductSize($id)
  {
    $qr = "SELECT * FROM `product_detail` WHERE parent_id = $id;
    ";

    return mysqli_query($this->con, $qr);
  }

  public function query($color, $size, $gender, $id)
  {
    $qr = 'SELECT B.id as id, qty, A.description as description , price, price_sale, thumb FROM PRODUCTS B, PRODUCT_DETAIL A  WHERE A.parent_id = ' . $id . ' AND A.parent_id = B.id AND A.color ="' . $color . '"AND A.size = ' . $size . ' AND A.gender = ' . $gender . ';';

    return mysqli_query($this->con, $qr);
  }

  public function paginationQuer($page)
  {
    $total_records_per_page = 10;
    $page--;
    $offset = (((int)$page) * (int)$total_records_per_page);


    $qr = 'SELECT * FROM PRODUCTS WHERE PRODUCTS.parent_id = 0  LIMIT ' . $total_records_per_page . ' offset ' . $offset;

    return mysqli_query($this->con, $qr);
  }

  public function numOfProducts()
  {
    $qr = "SELECT COUNT(*) FROM PRODUCTS";
    return mysqli_query($this->con, $qr);
  }

  public function update($description,  $price, $price_sale, $qty, $color, $size, $gender)
  {
    $qr = 'UPDATE PRODUCT_DETAIL SET  description = "' . $description . '", price = ' . $price . ', price_sale = ' . $price_sale . ', qty = ' . $qty . ' WHERE color = "' . $color . '" AND size = ' . $size . ' AND gender = ' . $gender;
    echo $qr;
    return mysqli_query($this->con, $qr);
  }


  public function add($name, $type)
  {
    $qr = 'INSERT INTO PRODUCTS (name, menu_id, parent_id) values ("' . $name . '", "' . $type . '", 0);';
    echo $qr;
    return mysqli_query($this->con, $qr);
  }

  public function findProductWithGender($gender)
  {
    $qr = "SELECT thumb, PD.parent_id, name, price, color FROM PRODUCTS P, PRODUCT_DETAIL PD WHERE P.id = PD.parent_id and gender = $gender GROUP BY parent_id;
    ";
    return mysqli_query($this->con, $qr);
  }


  public function customQuery($qr)
  {
    return mysqli_query($this->con, $qr);
  }
}
