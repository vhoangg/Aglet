<?php
class tracking_order extends controller
{
    function show()
    {
        $product = $this->model("productModel");

        $this->view("layout", ["page" => "tracking-order", "pr" => $product]);
    }

    function cancel()
    {
        $invoice = $this->model("invoiceModel");
        $sql = 'UPDATE INVOICE SET status = -1, cancel_at = "' . $_POST['date'] . '" where id = ' . $_POST['id'];

        $invoice->customQuery($sql);

        $sql = 'select product_id, qty from invoice_detail where invoice_id = ' . $_POST['id'];
        $preparedStm =    $invoice->customQuery($sql);
        $i = 0;
        while ($product_id[$i] = mysqli_fetch_array($preparedStm)) {
            $i++;
        }
        array_pop($product_id);
        print_r($product_id);
        $i = 0;
        foreach ($product_id as $value) {

            $sql = 'update product_detail set qty = qty+' . $value[$i]['qty'] . ' where id = ' . $value[$i]['product_id'];
            $invoice->customQuery($sql);
            $i++;
        }
    }
}
