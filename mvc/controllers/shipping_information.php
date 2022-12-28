<?php
class shipping_information extends controller
{
  function show()
  {
    $product = $this->model("productModel");

    $this->view("layout", ["page" => "shipping-information"]);
  }

  function process()
  {
    session_start();
    $invoice = $this->model("invoiceModel");

    $sql = 'INSERT INTO INVOICE (NAME, PHONE,   ADDRESS, EMAIL, CREATED_AT, status ) VALUES("' . $_POST['name'] . '", "' . $_POST['phone'] . '", "' . $_POST['address'] . '", "' . $_POST['email'] . '", "' . $_POST['create_date'] . '",0)';

    $invoice->customQuery($sql);
    $sql = 'SELECT ID FROM INVOICE WHERE NAME="' . $_POST['name'] . '"AND PHONE = "' . $_POST['phone'] . '" AND EMAIL = "' . $_POST['email'] . '" AND CREATED_AT  = "' . $_POST['create_date'] . '" AND ADDRESS = "' . $_POST['address'] . '" ORDER BY CREATED_AT DESC LIMIT 1';
    $id = mysqli_fetch_array($invoice->customQuery($sql));
    foreach ($_SESSION['cart'] as $key => $value) {
      $sql = 'INSERT INTO INVOICE_DETAIL (INVOICE_ID, PRODUCT_ID, QTY) VALUES(' . $id[0] . ', ' . $value['id'] . ', ' . $value['sl'] . ')';
      $invoice->customQuery($sql);

      $sql = 'UPDATE product_detail SET qty = qty - ' . $value['sl'] . ' WHERE ID = ' . $value['id'] . '';
      $invoice->customQuery($sql);
      echo $id[0];
      unset($_SESSION['cart'][$value['id']]);
    }
  }

  function mail()
  {
    session_start();
    $invoice = $this->model("invoiceModel");

    $cart = $_SESSION['cart'];
    $name = $_POST['name'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $email = $_POST['email'] ?? null;
    $address = $_POST['address'] ?? null;
    $create_date = $_POST['create_date'] ?? null;

    $sql = 'SELECT ID FROM INVOICE WHERE NAME="' . $name . '"AND PHONE = "' . $phone . '" AND EMAIL = "' . $email . '" AND CREATED_AT  = "' . $create_date . '" AND ADDRESS = "' . $address . '" ORDER BY CREATED_AT DESC LIMIT 1';
    $id = mysqli_fetch_array($invoice->customQuery($sql));

    $sum = 0;
    foreach ($cart as $item => $value) {
      $sum += $value['price'] * $value['sl'];
    }

    require("mvc/PHPMailer/src/PHPMailer.php");
    require("mvc/PHPMailer/src/SMTP.php");
    require('mvc/PHPMailer/src/Exception.php');

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587

    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );

    $mail->IsHTML(true);
    $mail->Username = "agletstoreuit@gmail.com";
    $mail->Password = "esuiutesxdyjzkph";
    $mail->SetFrom("agletstoreuit@gmail.com");
    $mail->Subject = "Test";
    $mail->Body = '
    
<table border="0" cellpadding="0" cellspacing="0" width="600"
  style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
  <tbody>
    <tr>
      <td align="center" valign="top">

        <table border="0" cellpadding="0" cellspacing="0" width="100%"
          style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
          <tbody>
            <tr>
              <td style="padding:36px 48px;display:block">
                <h1
                  style="font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">
                  Cảm ơn bạn đã đặt hàng</h1>
              </td>
            </tr>
          </tbody>
        </table>

      </td>
    </tr>
    <tr>
      <td align="center" valign="top">

        <table border="0" cellpadding="0" cellspacing="0" width="600">
          <tbody>
            <tr>
              <td valign="top" style="background-color:#ffffff">

                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <td valign="top" style="padding:48px 48px 32px">
                        <div
                          style="color:#636363;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">

                          <p style="margin:0 0 16px">Xin chào ' . $name . ',</p>
                          <p style="margin:0 0 16px">Cảm ơn đã đặt hàng. Đơn hàng sẽ bị tạm
                            giữ cho đến khi chúng tôi xác nhận thanh toán hoàn thành. Trong
                            thời gian chờ đợi, đây là lời nhắc về những gì bạn đã đặt hàng:
                          </p>


                          <h2
                            style="color:#96588a;display:block;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                            [Đơn hàng #' . $id[0] . ' (' . $create_date . ')</h2>

                          <div style="margin-bottom:40px">
                            
                          </div>


                          <table cellspacing="0" cellpadding="0" border="0"
                            style="width:100%;vertical-align:top;margin-bottom:40px;padding:0">
                            <tbody>
                              <tr>
                                <td valign="top" width="50%"
                                  style="text-align:left;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;border:0;padding:0">
                                  <h2
                                    style="color:#96588a;display:block;font-family:"Helvetica Neue",Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                    Thông tin người nhận</h2>

                                  <address style="padding:12px;color:#636363;border:1px solid #e5e5e5">
                                  ' . $name . '<br>' . $address . ' <br><a href="tel:' . $phone . '"
                                      style="color:#96588a;font-weight:normal;text-decoration:underline"
                                      target="_blank">' . $phone . '</a> <br><a href="mailto:' . $email . '"
                                      target="_blank">' . $email . '</a>
                                  </address>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <p style="margin:0 0 16px">Chúng tôi đang tiến hành hoàn thiện đơn
                            đặt hàng của bạn</p>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </td>
            </tr>
          </tbody>
        </table>

      </td>
    </tr>
  </tbody>
</table>

';

    $mail->AddAddress("$email");

    if (!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Thông tin đơn hàng được gửi qua mail";
    }
  }
}
