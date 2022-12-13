<?php
class controller{
  public function model($model){
    require_once "./mvc/models/".$model.".php";
    return new $model;
  }

  public function view($view, $data=[]){
    require_once "./mvc/view/".$view."/".$view.".php";

  }


  public function adminView($view, $data=[]){
    require_once "./mvc/view/admin/".$view."/".$view.".php";

  }



}
?>