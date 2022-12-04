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
      $pr = $this->model("productModel");
      if(empty($_POST['price'])){
        echo '<p id= "message" class="pt-3 pr-2 mt-10 mb-5">Vui lòng nhập đủ thông tin</p>';
      } else
      if($_POST['id'] <= 0){
        echo '<p id= "message" class="pt-3 pr-2 mt-10 mb-5">Sản phẩm không tồn tại, vui lòng nhập hàng!</p>';
      }
      else{
        $str="";
        if($pr->update($_POST['name'], $_POST['description'], $_POST['menu_id'], $_POST['price'], $_POST['price_sale'],$_POST['qty'], 1, "gege", $_POST['color'], $_POST['size'], $_POST['gender'],$_POST['id'])){
            $str = '<p id = "message" class="pt-3 pr-2 mt-10 mb-5">Cập nhật thành công</p>';
        }
        else
          $str = '<p id = "message" class="pt-3 pr-2 mt-10 mb-5">Cập nhật thất bại</p>';
    echo $str;
      }


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
      if($pr->add($_POST['name'],$_POST['price'],$_POST['price_sale'],$_POST['color'])){
          $str = '<p class="pt-3 pr-2">Thêm thành công</p>';
      }
      else
       $str = '<p class="pt-3 pr-2">Thêm thất bại</p>';
          echo $str;
    }

    function query(){
      $pr = $this->model("productModel");
      $str = "";
      $rs = mysqli_fetch_array($pr->query($_POST['color'], $_POST['size'], $_POST['gender']));
      $success = array("name"=>$rs['name'],
      "id"=>$rs['id'],
      "description"=>$rs['description'],
      "menu_id"=>$rs['menu_id'],
      "price"=>$rs['price'],
      "price_sale"=>$rs['price_sale'],
      "thumb"=>$rs['thumb'],
      "color"=>$rs['color'],
      "qty"=>$rs['qty'],
      "size"=>$rs['size'],
      "gender"=>$rs['gender']
    );

      if(isset($rs)){
          echo json_encode(
            $success
          );
      }


    }
  }