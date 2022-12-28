<?php
class tracking_order extends controller
{
    function show()
    {
        $product = $this->model("productModel");

        $this->view("layout", ["page" => "tracking-order","pr"=>$product]);
    }

    function cancel(){
        $invoice = $this->model("invoiceModel");
        $sql = 'UPDATE INVOICE SET status = -1, cancel_at = "'.$_POST['date'].'" where id = '.$_POST['id'];
        echo $sql;
        $invoice->customQuery($sql);

    }
}
