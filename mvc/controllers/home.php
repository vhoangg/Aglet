<?php
  class home extends controller{
    function show(){

        $product = $this->model("productModel");
        echo $product->getProduct();
        $this->view("layout",["page"=>"homepage"]);


    }



  }
?>
