<?php
  class product_list extends controller{
    function show(){
      $product = $this->model("productModel");

      $this->view("layout",["page"=>"product-list", "product"=> $product]);
    }



  }
?>
