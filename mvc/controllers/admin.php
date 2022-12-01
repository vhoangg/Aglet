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

    function addProduct(){
      $product = $this->model("productModel");
      $this->adminView("adminLayout",["page"=>"addProduct","product"=>$product]);
    }

    function add(){
      $pr = $this->model("productModel");
      $str="";
      if($pr->add($_POST['name'],$_POST['price'],$_POST['price_sale'])){
          $str = '<p class="pt-3 pr-2">Thêm thành công</p>';
      }
      else
      $str = '<p class="pt-3 pr-2">Thêm thất bại</p>';
          echo $str;
    }
  }