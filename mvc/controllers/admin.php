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
            "resultPage"=>$page,
            "model"=>$product
          ]);
    }

    function categoryManagement($page = 1){
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
        $updateName = 'UPDATE PRODUCTS SET name = "'.$_POST['name'].'" WHERE parent_id = 0 AND id = '.$_POST['parent_id'];
        $updateDetailName = 'UPDATE  PRODUCTS SET name = "'.$_POST['detail_name'].'" WHERE id = '.$_POST['id'];

        if( $pr->customQuery($updateName) && $pr->customQuery($updateDetailName) && $pr->update( $_POST['description'], $_POST['price'], $_POST['price_sale'],$_POST['qty'], $_POST['color'], $_POST['size'], $_POST['gender'], $_POST['id'])){
            $str = '<p id = "message" class="pt-3 pr-2 mt-10 mb-5">Cập nhật thành công</p>';
        }
        else
          $str = '<p id = "message" class="pt-3 pr-2 mt-10 mb-5">Cập nhật thất bại</p>';
    echo $str;
      }


    }

    function editProducts($id){
      $product = $this->model("productModel");
      $this->adminView("adminLayout",["page"=>"editProducts","product"=>$product, "id"=> $id, "names"=>$product->customQuery1($id)]);
    }

    function chart(){
      $product = $this->model("productModel");
      $this->adminView("adminLayout",["page"=>"chart", "pr"=>$product]);
    }

    function createProduct(){
      $product = $this->model("productModel");
      $this->adminView("adminLayout",["page"=>"createProduct","product"=>$product]);
    }

    function addProduct($id){
      $product = $this->model("productModel");
      $this->adminView("adminLayout",["page"=>"addProduct","product"=>$product, "id"=>$id]);
    }

    function createNewProduct(){
      $pr = $this->model("productModel");
      $str="";
      if($pr->add($_POST['name'], $_POST['type'])){
          $str = '<p class="pt-3 pr-2">Thêm thành công</p>';
      }
      else
       $str = '<p class="pt-3 pr-2">Thêm thất bại</p>';
          echo $str;
    }


    function add(){
      $pr = $this->model("productModel");
      $sql1='INSERT INTO PRODUCTS (name, menu_id, active, parent_id) values("'.$_POST['detail_name'].'", '.$_POST['type'].', 1, '.$_POST['parent_id'].')';

      if($pr->customQuery($sql1))
        echo "Thành công";
      else {
        echo "thất bại";
      }

      $id = mysqli_fetch_array( $pr->customQuery('SELECT ID FROM PRODUCTS WHERE NAME = "'.$_POST['detail_name'].'"'));

      $str = '';
      $shoe_size = $_POST['size'];


      $sql2 = '';

      for($i = 0; $i < count($shoe_size); $i++) {
        $s = $shoe_size[$i];
        $sql2 = 'INSERT INTO PRODUCT_DETAIL (color, size, qty, active, parent_id, price, price_sale, description, gender) values ("'.$_POST['color'].'", '.$s.', 0, 1, '.$id[0].', '.$_POST['price'].', '.$_POST['price_sale'].', "'.$_POST['description'].'", '.$_POST['gender'].')';

        $pr->customQuery($sql2);

      }

    }

    function query(){
      $pr = $this->model("productModel");
      $str = 'SELECT ID FROM PRODUCTS WHERE NAME = "'.$_POST['name'].'"';
      $id = mysqli_fetch_array($pr->customQuery($str));
      if(!isset($id)){
        $id = -1;
      }

      $rs = mysqli_fetch_array($pr->query($_POST['color'], $_POST['size'], $_POST['gender'], $id[0]));
      $success = array(
      "id"=>$rs['id'],
      "description"=>$rs['description'],
      "price"=>$rs['price'],
      "price_sale"=>$rs['price_sale'],
      "thumb"=>$rs['thumb'],
      "qty"=>$rs['qty'],
    );

      if(isset($rs)){
          echo json_encode(
            $success
          );
      }

    }

    function delete(){
      $pr = $this->model("productModel");
      $sql = 'DELETE FROM PRODUCT_DETAIL WHERE PARENT_ID = "'.$_POST['id'].'", AND SIZE = '.$_POST['size'].' AND COLOR = "'.$_POST['color'].'" AND GENDER = '.$_POST['gender'];
      mysqli_fetch_array($pr->customQuery($sql));
      echo "Đã xóa sản phẩm";
    }



  }