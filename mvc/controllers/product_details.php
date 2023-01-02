<?php
class product_details extends controller
{
  function show()
  {
    $product = $this->model("productModel");
    $id = $_GET["id"];

    $this->view("layout", ["page" => "product-details", "product" => $product->findProductWithId($id), "color" => $product->getProductColor($id), "size" => $product->getProductSize($id), "qty" => $product->getQty($id)]);
  }

  function ajax()
  {
  }
}
