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

    function edit(){
      $product = $this->model("productModel");

      $this->adminView("edit",["product"=>$product]);
    }
    function editProducts($id){
      $product = $this->model("productModel");

      $this->adminView("adminLayout",["page"=>"editProducts","product"=>$product, "id"=> $id]);
    }
  }