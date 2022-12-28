<?php
class product_list extends controller
{
  function show()
  {
    $product = $this->model("productModel");
    $gd = $_GET["gender"];
    if ($gd == 'men') $gender = 0;
    else $gender = 1;

    

    $this->view("layout", ["page" => "product-list", "product" => $product->findProductWithGender($gender)]);
  }
}
