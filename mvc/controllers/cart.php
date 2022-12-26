<?php
  class cart extends controller{
    function show(){

      $product = $this->model("productModel");

      $this->view("layout",["page"=>"cart"]);
    }
    function process(){
      session_start();
      if(isset($_GET['id'])){
        $id = $_GET['id'] ?? null;
        $pr = $this->model("productModel");
        $sql = 'SELECT * FROM PRODUCT_DETAIL WHERE id = '.$id;
        $rs = mysqli_fetch_array($pr->customQuery($sql));

        if(array_key_exists($id, $_SESSION['cart']) == true){
          echo "Sản phẩm đã có trong giỏ hàng";
        }
        else{
          $_SESSION['cart'][$id] = $rs;
          echo "Đã thêm vào giỏ hàng";
        }


      }
    }
  }
?>
