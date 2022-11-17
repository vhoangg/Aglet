<?php
class app
{
  protected $controller = "home";
  protected $action = "show";
  protected $params = [];

  function __construct()
  {

    $arr = $this->UrlProcess();



<<<<<<< HEAD
      //xu li controller
      if(file_exists("./mvc/controllers/".$arr[0].".php"))
      {
        $this->controller = $arr[0];
        unset($arr[0]);

      }
      require_once "./mvc/controllers/".$this->controller.".php";
      $this->controller = new $this->controller;


       //xu li params
       $this->params = $arr?array_values($arr):[];



        call_user_func_array([new $this->controller, "show"], $this->params);

=======
    //xu li controller
    if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
      $this->controller = $arr[0];
      unset($arr[0]);
>>>>>>> 8c12c07ab5278dda18b81365fdae2a0c8da6fa31
    }
    require_once "./mvc/controllers/" . $this->controller . ".php";
    $this->controller = new $this->controller;


    //xu li params
    $this->params = $arr ? array_values($arr) : [];


    call_user_func_array([new $this->controller, "show"], $this->params);
  }



<<<<<<< HEAD
    function UrlProcess(){
      if(isset($_GET["url"])){
        return explode("/", filter_var(trim($_GET["url"], "/")));
      }

      $temp[] = "home";
      return $temp;

=======
  function UrlProcess()
  {
    if (isset($_GET["url"])) {
      return explode("/", filter_var(trim($_GET["url"], "/")));
>>>>>>> 8c12c07ab5278dda18b81365fdae2a0c8da6fa31
    }
  }
}
