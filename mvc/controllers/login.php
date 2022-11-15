<?php
  class login extends controller{
    function show(){
        $product = $this->model("productModel");
        echo $product->getProduct();
        $this->adminView("login");
    }



  }