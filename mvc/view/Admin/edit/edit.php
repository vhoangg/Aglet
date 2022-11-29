<?php


  $pr = $data['product'];
  $str="";

      if($pr->update($_POST['name'], $_POST['description'], $_POST['menu_id'], $_POST['price'], $_POST['price_sale'],$_POST['qty'], 1, "gege", $_POST['color'], $_POST['size'], $_POST['id'])){
          $str = '<p class="pt-3 pr-2">Cập nhật thành công</p>';
      }

      else
      $str = '<p class="pt-3 pr-2">Cập nhật thất bại</p>';
          echo $str;



?>