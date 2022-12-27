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
    function delete(){
      $pr = $this->model("productModel");
      $sql = 'SELECT PRODUCTS.id FROM PRODUCTS, PRODUCT_DETAIL WHERE PRODUCT_DETAIL.id = '.$_POST['id'].' AND PRODUCTS.parent_id = '.$_POST['parent_id'].' AND PRODUCT_DETAIL.parent_id = PRODUCTS.id';
      echo $sql;

      $id = mysqli_fetch_array($pr->customQuery($sql));
      echo $id[0];
      echo $_POST['gender'];
      $sql = 'DELETE FROM PRODUCT_DETAIL WHERE parent_id = '.$id[0].' AND gender = '.$_POST['gender'];
      $pr->customQuery($sql);
      echo "Đã xóa sản phẩm";
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
        $sql = 'SELECT PRODUCTS.id FROM PRODUCTS, PRODUCT_DETAIL WHERE PRODUCT_DETAIL.id = '.$_POST['id'].' AND PRODUCTS.parent_id = '.$_POST['parent_id'].' AND PRODUCT_DETAIL.parent_id = PRODUCTS.id';
        echo $sql;
        $id = mysqli_fetch_array($pr->customQuery($sql));
        $updateActive = 'UPDATE PRODUCT_DETAIL SET active ='.$_POST['active'].', price = '.$_POST['price'].', price_sale = '.$_POST['price_sale'].', color_code = "'.$_POST['color'].'" WHERE parent_id = '.$id[0].' AND gender = '.$_POST['gender'];
        echo $updateActive;
        $pr->customQuery($updateActive);




        if( $pr->customQuery($updateName) && $pr->customQuery($updateDetailName) && $pr->update( $_POST['size'],$_POST['qty'], $_POST['gender'], $id[0])){
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

    function orderDetail(){
      $inv= $this->model("invoiceModel");
      $rs= [];
      $i = 0;
      $id = $_GET['id'];
      $this->adminView("adminLayout",["page"=>"orderDetail", "inv"=>$inv, "product"=>$inv->getProducts($id)]);
    }


    function orderManagement($page){
      $inv = $this->model("invoiceModel");
      $this->adminView("adminLayout",["page"=>"orderManagement", "invocie"=>$inv,"pg"=>$page, "inv"=>$inv->paginationQuer($page),"num"=>$inv->numOfInvoice()]);
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
      $flag = true;
      $sql ='SELECT id FROM PRODUCTS WHERE name =  "'.$_POST['detail_name'].'" AND parent_id = '.$_POST['parent_id'];
      $tmp = mysqli_fetch_array($pr->customQuery($sql));
      if($tmp[0] != null){
        $sql = 'SELECT id from PRODUCT_DETAIL WHERE parent_id = '.$tmp[0].' AND gender = '.$_POST['gender'];
        $check = mysqli_fetch_array($pr->customQuery($sql));
        if($check[0] != null)
          $flag = false;
      }
      else{
        $sql1='INSERT INTO PRODUCTS (name, menu_id, active, parent_id, description) values("'.$_POST['detail_name'].'", '.$_POST['type'].', 1, '.$_POST['parent_id'].')';

        if($pr->customQuery($sql1))
          echo "Thành công";
        else {
          echo "thất bại";
        }
      }
      if($flag == true){
        $id = mysqli_fetch_array( $pr->customQuery('SELECT ID FROM PRODUCTS WHERE NAME = "'.$_POST['detail_name'].'"'));

        $str = '';
        $sql2 = '';

        for($i = 36; $i <= 43; $i++) {
          $sql2 = 'INSERT INTO PRODUCT_DETAIL ( size, qty, active, parent_id, price, price_sale, gender, color_code) values ('.$i.', 0, 1, '.$id[0].', '.$_POST['price'].', '.$_POST['price_sale'].', '.$_POST['gender'].', "'.$_POST['color_code'].'")';
          $pr->customQuery($sql2);

        }


      }
      else{
        echo 'Sản phẩm đã tồn tại';
      }



    }

    function query(){
      $pr = $this->model("productModel");
      $str = 'SELECT ID FROM PRODUCTS WHERE NAME = "'.$_POST['name'].'"';
      echo $str;
      $id = mysqli_fetch_array($pr->customQuery($str));
      if(!isset($id)){
        $id = -1;
      }

      $rs = mysqli_fetch_array($pr->query($_POST['size'], $_POST['gender'], $id[0]));
      $success = array(
      "id"=>$rs['id'],
      "status"=>$rs['active'],
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



    function orderDetailProcess(){
      if(!strcasecmp($_POST['status'],"confirm")){
        $sql = 'UPDATE invoice SET status = 1, confirm_at  = "'.$_POST['date'].'" WHERE id = '.$_POST['id'] ;
        $invoice = $this->model("invoiceModel");
        $invoice->customQuery($sql);
        echo "thành công";
      }
      else if(!strcasecmp($_POST['status'],"cancel")){
        $sql = 'UPDATE invoice SET status = -1, cancel_at  = "'.$_POST['date'].'" WHERE id = '.$_POST['id'] ;
        $invoice = $this->model("invoiceModel");
        $invoice->customQuery($sql);
        echo "thành công";
      }


    }


  }