<?php
$id = $_GET['id'];
$sql = 'SELECT * FROM INVOICE WHERE id = ' . $id;
$preparedStm = $data['pr']->customQuery($sql);
$invoice = mysqli_fetch_array($preparedStm);

$sql = 'SELECT product_id from invoice_detail where invoice_id =' . $id;
$preparedStm = $data['pr']->customQuery($sql);
$i = 0;
$product_id = [];
// $product_id = mysqli_fetch_array($preparedStm)
while ($product_id[$i] = mysqli_fetch_array($preparedStm)) {
    $i++;
}
array_pop($product_id);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./test.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div id="tracking-order">
        <div style="margin-top: 50px;" class="line"></div>
        <div id="header">
            <h1>THÔNG TIN ĐƠN HÀNG</h1>
        </div>
        <div id="order-status">
            <div class="row header-row">
                <h3>TRẠNG THÁI ĐƠN HÀNG <span class="getId orange"><?php
                                                                    echo $invoice['id'];
                                                                    ?></span></h3>
            </div>
            <div class="row">
                <div class="col col-fourth ">
                    <div class="progress">
                        <div class="progress-header">
                            <h3 class="active">ĐẶT HÀNG THÀNH CÔNG</h3>
                        </div>
                        <p>
                            <?php
                            if (isset($invoice['created_at']))
                                echo $invoice['created_at']
                            ?><br><br>
                            Thời gian xử lý đơn hàng có thể từ 1-2 ngày làm việc. Vui lòng gọi đến hotline 0963 429 749
                            (trong giờ hành chính) nếu bạn muốn thay đổi thông tin đơn hàng trước khi đơn hàng của bạn
                            được
                            CHUYỂN QUA GIAO NHẬN.
                        </p>
                    </div>
                </div>
                <div class="col col-fourth ">
                    <div class="progress">
                        <div class="progress-header">
                            <?php
                            if (isset($invoice['cancel_at'])) {
                                echo '   <h3 class="active">ĐƠN HÀNG ĐÃ HỦY</h3>
                                </div>
                                <p>' . $invoice['cancel_at'] . '<br><br>
                                 Đơn hàng của bạn đã bị hủy.
                                </p>';
                            } else if (isset($invoice['confirm_at'])) {
                                echo '   <h3 class="active">CHUYỂN QUA GIAO NHẬN</h3>
                                </div>
                                <p>' . $invoice['confirm_at'] . '<br><br>
                                 Đơn hàng của bạn đã được đóng gói và chuyển cho đơn vị vận chuyển.
                                </p>';
                            } else echo '<h3>CHUYỂN QUA GIAO NHẬN</h3>
                            </div>';

                            ?>


                        </div>
                    </div>
                    <div class="col col-fourth ">
                        <div class="progress">
                            <div class="progress-header">
                                <?php
                                if (isset($invoice['ship_at'])) {
                                    echo '<h3 class="active">ĐANG GIAO HÀNG</h3>
                                </div>
                                <p>' . $invoice['ship_at'] . '<br><br>
                                Thời gian giao hàng tuỳ thuộc vào địa điểm và phương thức giao hàng bạn đã chọn.
                                Hãy tin rắng chúng tôi luôn cố gắng để hàng đến tay bạn sớm nhất!
                                </p>';
                                } else echo '<h3>ĐANG GIAO HÀNG</h3>
                            </div>';
                                ?>

                            </div>
                        </div>
                        <div class="col col-fourth ">
                            <div class="progress">
                                <div class="progress-header">
                                    <?php
                                    if (isset($invoice['arrived_at'])) {
                                        echo ' <h3 class="active">GIAO HÀNG THÀNH CÔNG </h3>
                                </div>
                                <p>
                                    Vào lúc ' . $invoice['arrived_at'] . '<br><br>
                                    Đơn hàng đã được giao thành công !
                                    Chúc bạn có một trải nghiệm thú vị ^^
                                </p>';
                                    } else echo ' <h3>GIAO HÀNG THÀNH CÔNG </h3>
                            </div>';
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="information">
                        <div style=" background-color: grey; margin-top:4%" class="line"></div>
                        <div class="shipping-information">
                            <div class="col col-half hc1">
                                <div class="media">
                                    <h4 class="title">THÔNG TIN CÁ NHÂN</h4>
                                    <div style=" width: 90%; margin-left:0px;" class="line"></div>
                                    <p class="text-1 style1">Họ tên: <?php echo $invoice['name']; ?></p>
                                    <p class="text-1">Điện thoại: <?php echo $invoice['phone']; ?></p>
                                    <p class="text-1">Email: n<?php echo $invoice['email']; ?></p>
                                    <p class="text-1">Địa chỉ: <?php echo $invoice['address']; ?></p>

                                </div>
                            </div>
                            <div class="col col-half hc1">
                                <div class="media">
                                    <h4 class="title">ĐỊA CHỈ NHẬN HÀNG</h4>
                                    <div style=" width: 90%; margin-left:0px;" class="line"></div>
                                    <p class="text-1 style1">Họ tên: <?php echo $invoice['name']; ?></p>
                                    <p class="text-1">Điện thoại: <?php echo $invoice['phone']; ?></p>
                                    <p class="text-1">Email: n<?php echo $invoice['email']; ?></p>
                                    <p class="text-1">Địa chỉ: <?php echo $invoice['address']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="information">
                        <div class="shipping-information">
                            <div class="col col-half hc1">
                                <div class="media item-media">
                                    <h4 class="title">DANH SÁCH SẢN PHẨM</h4>
                                    <div style=" width: 90%; margin-left:0px;" class="line"></div>
                                    <?php
                                    $i = 0;

                                    $sum = 0;
                                    foreach ($product_id as $value) {
                                        $sql = 'select products.name as name, price, size, invoice_detail.qty as qty from products, product_detail, invoice_detail where product_detail.id = ' . $value[0] . ' and product_detail.parent_id = products.id and invoice_detail.product_id = product_detail.id';
                                        $preparedStm = $data['pr']->customQuery($sql);
                                        $product = mysqli_fetch_array($preparedStm);
                                        echo ' 
                                        <div class="list-item">

                                        <div class="col item-information">
                                            <p class="text-1">' . $product['name'] . '</p>
                                            <p class="text-1">Giá: <span class="value">' . number_format($product['price'], 0, ",", ".") . ' VNĐ</span></p>
                                            <p class="text-1">Size: <span class="value">' . $product['size'] . '</span></p>
                                            <p class="text-1">Số lượng: <span class="value">' . $product['qty'] . '</span></p>
                                        </div>
                                    </div>';
                                        $sum +=  $product['price'] * $product['qty'];
                                        $i++;
                                    }

                                    ?>




                                </div>
                            </div>
                            <div class="col col-half hc1">
                                <div class="media">
                                    <h4 class="title">THANH TOÁN</h4>
                                    <div style=" width: 90%; margin-left:0px;" class="line"></div>
                                    <div class="invoice">
                                        <div class="media-body">
                                            <p><span class="pleft">Trị giá đơn hàng:</span><span class="pright bold"><?php echo number_format($sum, 0, ",", "."); ?>
                                                    VNĐ</span></p>
                                            <p><span class="pleft">Giảm giá:</span><span class="pright bold">0 VNĐ</span>
                                            </p>
                                            <p><span class="pleft">Phí giao hàng:</span><span class="pright bold">0 VNĐ</span>
                                            </p>
                                            <p><span class="pleft">Phí thanh toán:</span><span class="pright bold">0 VNĐ</span>
                                            </p>
                                            <div class="line"></div>
                                            <p><span class="pleft bold">Tổng thanh toán:</span><span class="pright bold"><?php echo number_format($sum, 0, ",", "."); ?>
                                                    VNĐ</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="butn">
                        <?php
                        if ($invoice['status'] == 0)
                            echo ' <button onclick="myFunction()" id="cancel-order">HỦY ĐƠN</button>';
                        ?>

                        <a href="http://localhost/Aglet/home" class="turn-back">QUAY LẠI TRANG CHỦ</a>
                    </div>
                </div>
                <script src="./mvc/view/tracking-order/tracking-order.js"></script>
</body>

</html>

<script>
    $(".active").css("color", "orange");

    $("#cancel-order").click(function() {
        var id = $(".getId").html();
        console.log(id);
        var d = new Date();
        var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        var date = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
        var createDate = date + ' ' + time;

        $.ajax({
            method: "POST",
            url: "http://localhost/Aglet/tracking_order/cancel",
            data: {
                id: id,
                date: createDate
            },
            success: function(response) {
                console.log(response);
                window.location.reload();
            }
        });
    });
</script>