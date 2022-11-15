<?php
  class admin extends controller{
    function show(){
        $product = $this->model("productModel");
        echo $product->getProduct();
        $this->adminView("adminLayout",["page"=>"home"]);
    }



  }