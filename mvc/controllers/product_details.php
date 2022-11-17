<?php
  class product_details extends controller{
    function show(){
      $product = $this->model("productModel");

      $this->view("layout",["page"=>"product-details"]);
    }

  }
