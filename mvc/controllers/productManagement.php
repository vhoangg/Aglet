<?php
  class productManagement extends controller{
    function show($page = 1){
        $product = $this->model("productModel");
        echo $product->getProduct();
        $this->adminView("adminLayout",["page"=>"productManagement","pr" => $product->paginationQuer($page), "numOfPr"=>$product->numOfProducts()]);
    }
  }