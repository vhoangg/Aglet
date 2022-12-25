<?php
class search_order extends controller
{
  function show()
  {
    $product = $this->model("productModel");

    $this->view("layout", ["page" => "search-order"]);
  }
}
