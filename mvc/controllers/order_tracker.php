<?php
  class order_tracker extends controller{
    function show(){
      $product = $this->model("productModel");

      $this->view("layout",["page"=>"order-tracker"]);
    }

  }
?>
