<?php
  class productManagement extends controller{
    function show(){
        $product = $this->model("productModel");
        echo $product->getProduct();
        $this->adminView("adminLayout",["page"=>"productManagement","pr" => $product->product()]);
    }
  }