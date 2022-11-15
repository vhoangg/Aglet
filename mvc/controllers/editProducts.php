<?php
  class editProducts extends controller{
    function show($id){
        $product = $this->model("productModel");
        echo $product->getProduct();
        $this->adminView("adminLayout",["page"=>"editProducts","pr" => $product->product()]);
    }
  }