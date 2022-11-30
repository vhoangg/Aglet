<?php
class home extends controller
{
  function show()
  {

    $product = $this->model("productModel");
    $this->view("layout", [
      "page" => "homepage"
    ]);
  }
}
