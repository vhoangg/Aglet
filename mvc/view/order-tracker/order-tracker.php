<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://kit.fontawesome.com/d822126298.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aglet Official Site</title>
    <link rel="stylesheet" href="./mvc/view/order-tracker/ordertracker.css?v=<?php echo time(); ?> ">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,600;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <style>
        .header {
            height: 165px;
        }

        .search-box .icon {
            width: 5.125rem !important;
        }

        .menu {
            font-size: 160%;

        }

        html {
            color: #333;
            font-size: 62.5%;
            font-family: "Roboto", sans-serif;
        }
    </style>

</head>

<body>
    <div id="order-tracker">
        <form action="" method="POST" class="form">
            <h2 class="heading">TRA CỨU ĐƠN HÀNG</h2>
            <div class="form-group">
                <input id="madonhang" name="madonhang" type="text" placeholder="MÃ ĐƠN HÀNG" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <input id="ttlienlac" name="ttlienlac" type="text" placeholder="Email/Số điện thoại" class="form-control">
                <span class="form-message"></span>
            </div>
            <button class="form-submit">TRA CỨU ĐƠN HÀNG</button>
        </form>
    </div>
    <script src="./ordertracker.js"></script>
    <script>
        Validator({
            form: '.form',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#madonhang', 'Vui lòng nhập mã đơn hàng'),
                Validator.isRequired('#ttlienlac', 'Vui lòng nhập email/số điện thoại'),
            ]
        });
    </script>

</body>

</html>