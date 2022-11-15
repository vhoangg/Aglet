<?php
  class cart extends controller{
    function show(){
      $product = $this->model("productModel");

      $this->view("layout",["page"=>"cart"]);
    }

  }
?>
