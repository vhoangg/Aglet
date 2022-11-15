<?php
  class shipping_information extends controller{
    function show(){
      $product = $this->model("productModel");

      $this->view("layout",["page"=>"shipping-information"]);
    }

  }
?>
