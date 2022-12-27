<?php
class product_details extends controller
{
  function show()
  {
    $product = $this->model("productModel");
    $id = $_GET["id"];
    $qr = "SELECT P.id as id, name,color_code, size, qty, PD.active, P.description as description, price, price_sale, thumb FROM PRODUCTS P, PRODUCT_DETAIL PD  WHERE PD.parent_id = $id AND PD.parent_id = P.id ";
    $preparedStm = $product->customQuery($qr);
    $this->view("layout", ["page" => "product-details", "product" => $preparedStm, "color" => $product->getProductColor($id), "size" => $product->getProductSize($id), "qty" => $product->getQty($id)]);
  }

  function ajax()
  {
  }
}
