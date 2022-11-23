<?php
  class admin extends controller{
    function show(){
        $this->adminView("adminLayout",["page"=>"home"]);
    }

    function productManagement($page = 1){
          $product = $this->model("productModel");
          $this->adminView("adminLayout",[
            "page"=>"productManagement",
            "pr" => $product->paginationQuer($page),
            "numOfPr"=>$product->numOfProducts(),
            "resultPage"=>$page]);
    }

    function editProducts($id){
      $product = $this->model("productModel");
      echo $product->getProduct();
      $this->adminView("adminLayout",["page"=>"editProducts","pr" => $product->findProductWithId($id),"product"=>$product, "id"=> $id]);
    }
  }