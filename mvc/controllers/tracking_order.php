<?php
class tracking_order extends controller
{
    function show()
    {
        $product = $this->model("productModel");

        $this->view("layout", ["page" => "tracking-order"]);
    }
}
