<?php
  class product_details extends controller{
    function show(){
      $product = $this->model("productModel");

<<<<<<< HEAD
      $this->view("layout",
      ["page"=>"product-details"]
    );
=======
      $this->view("layout",["page"=>"product-details"]);
>>>>>>> 5a56d3e6ffab61ed62e7c2929fed2642dab3fca1
    }

  }
?>
