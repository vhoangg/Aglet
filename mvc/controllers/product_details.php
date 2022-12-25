<?php
class product_details extends controller
{
  function show()
  {
    $product = $this->model("productModel");
    $color = 'black';
    $id = $_GET["id"];
    $this->view("layout", ["page" => "product-details", "product" => $product->findProductWithId($id), "color" => $product->getProductColor($id), "size" => $product->getProductSize($id)]);
  }

  function ajax()
  {
  }
}
