<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./mvc/view/layout/layout.css?v=<?php echo time(); ?> ">
    <link rel="stylesheet" href="../mvc/view/layout/layout.css?v=<?php echo time(); ?> ">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d822126298.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <title>Aglet Store</title>
    <style>
    </style>
</head>

<body>
    <nav>
        <div class="header">
            <ul class="menu">
                <li><a href="http://localhost/Aglet/search_order"><i class="fa-sharp fa-solid fa-truck-fast"> </i>Tra cứu đơn hàng</a> </li>
                <li><a href="#"><i class="fa-solid fa-location-dot"></i> Tìm cửa hàng </a> </li>
                <li><a href="#"><i class="fa-solid fa-heart"></i> Yêu thích</a> </li>
                <li><a href="http://localhost/Aglet/login"> <i class="fa-solid fa-user"></i> Đăng nhập</a> </li>
                <li><a href="http://localhost/Aglet/cart"><i class="fa-solid fa-bag-shopping"></i> Giỏ hàng</a> </li>
            </ul>
            <div class="my-navbar">
                <div class="my-navbar-logo" title="Aglet Home">
                    <a href="home"><img src="./mvc/view/layout/img/logo.png" alt="logo"></a>
                </div>
                <ul class="my-navbar-center">
                    <li class="drop">
                        <a href="http://localhost/Aglet/product_list?gender=all" class="drop-toggle">TẤT CẢ<i class="fa-solid fa-angle-down fa-xs"></i></a>
                        <div class="mega-menu">
                            <div class="my-mega-content">
                                <div class="mega-row">
                                    <header><a href="product_list">NỔI BẬT</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Hàng mới về</a></li>
                                        <li><a href="product_list">Best-seller</a></li>
                                        <li><a href="product_list">Sale-off</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">GIÀY </a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Bóng đá</a></li>
                                        <li><a href="product_list">Chạy bộ</a></li>
                                        <li><a href="product_list">Bóng rổ</a></li>
                                        <li><a href="product_list">Quần vợt</a></li>
                                        <li><a href="product_list">Slip on</a></li>
                                        <li><a href="product_list">High top</a></li>
                                        <li><a href="product_list">Low top</a></li>
                                        <li><a href="product_list">Dép</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">QUẦN ÁO</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Jackets</a></li>
                                        <li><a href="product_list">Bộ đồ thể thao</a></li>
                                        <li><a href="product_list">Hoddie</a></li>
                                        <li><a href="product_list">Sweater</a></li>
                                        <li><a href="product_list">Áo thun</a></li>
                                        <li><a href="product_list">Quần</a></li>
                                        <li><a href="product_list">Quần bó</a></li>
                                        <li><a href="product_list">Quần sóoc</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">PHỤ KIỆN</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Túi & Ba lô</a></li>
                                        <li><a href="product_list">Tất</a></li>
                                        <li><a href="product_list">Mũ </a></li>
                                        <li><a href="product_list">Dây giày</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="line"></li>
                    <li class="drop">
                        <a href="http://localhost/Aglet/product_list?gender=men" class="drop-toggle">NAM<i class="fa-solid fa-angle-down fa-xs"></i></a>
                        <div class="mega-menu">
                            <div class="my-mega-content">
                                <div class="mega-row">
                                    <header><a href="product_list">NỔI BẬT</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Hàng mới về</a></li>
                                        <li><a href="product_list">Best-seller</a></li>
                                        <li><a href="product_list">Sale-off</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">GIÀY </a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Bóng đá</a></li>
                                        <li><a href="product_list">Chạy bộ</a></li>
                                        <li><a href="product_list">Bóng rổ</a></li>
                                        <li><a href="product_list">Quần vợt</a></li>
                                        <li><a href="product_list">Slip on</a></li>
                                        <li><a href="product_list">High top</a></li>
                                        <li><a href="product_list">Low top</a></li>
                                        <li><a href="product_list">Dép</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">QUẦN ÁO</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Jackets</a></li>
                                        <li><a href="product_list">Bộ đồ thể thao</a></li>
                                        <li><a href="product_list">Hoddie</a></li>
                                        <li><a href="product_list">Sweater</a></li>
                                        <li><a href="product_list">Áo thun</a></li>
                                        <li><a href="product_list">Quần</a></li>
                                        <li><a href="product_list">Quần bó</a></li>
                                        <li><a href="product_list">Quần sóoc</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">PHỤ KIỆN</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Túi & Ba lô</a></li>
                                        <li><a href="product_list">Tất</a></li>
                                        <li><a href="product_list">Mũ </a></li>
                                        <li><a href="product_list">Dây giày</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="line"></li>
                    <li class="drop">
                        <a href="http://localhost/Aglet/product_list?gender=women" class="drop-toggle">NỮ<i class="fa-solid fa-angle-down fa-xs"></i></a>
                        <div class="mega-menu">
                            <div class="my-mega-content">
                                <div class="mega-row">
                                    <header><a href="product_list">NỔI BẬT</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Hàng mới về</a></li>
                                        <li><a href="product_list">Best-seller</a></li>
                                        <li><a href="product_list">Sale-off</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">GIÀY </a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Bóng đá</a></li>
                                        <li><a href="product_list">Chạy bộ</a></li>
                                        <li><a href="product_list">Bóng rổ</a></li>
                                        <li><a href="product_list">Quần vợt</a></li>
                                        <li><a href="product_list">Slip on</a></li>
                                        <li><a href="product_list">High top</a></li>
                                        <li><a href="product_list">Low top</a></li>
                                        <li><a href="product_list">Dép</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">QUẦN ÁO</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Jackets</a></li>
                                        <li><a href="product_list">Bộ đồ thể thao</a></li>
                                        <li><a href="product_list">Hoddie</a></li>
                                        <li><a href="product_list">Sweater</a></li>
                                        <li><a href="product_list">Áo thun</a></li>
                                        <li><a href="product_list">Quần</a></li>
                                        <li><a href="product_list">Quần bó</a></li>
                                        <li><a href="product_list">Quần sóoc</a></li>
                                        <li><a href="product_list">Váy</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row">
                                    <header><a href="product_list">PHỤ KIỆN</a></header>
                                    <ul class="mega-links">
                                        <li><a href="product_list">Túi & Ba lô</a></li>
                                        <li><a href="product_list">Tất</a></li>
                                        <li><a href="product_list">Mũ </a></li>
                                        <li><a href="product_list">Dây giày</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="line"></li>
                    <li class="drop">
                        <a href="#" class="drop-toggle">THỂ THAO<i class="fa-solid fa-angle-down fa-xs"></i></a>
                        <div class="mega-menu">
                            <div class="my-mega-content">
                                <div class="mega-row style1">
                                    <header><a href="#">Bóng đá<img src="./mvc/view/Layout/img/bongda.jpg"></a></header>
                                    <ul class="mega-links">
                                        <li><a href="#">Quần áo</a></li>
                                        <li><a href="">Giày ống</a></li>
                                        <li><a href="">Phụ kiện</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row style1">
                                    <header><a href="#">Chạy bộ<img src="./mvc/view/Layout/img/chaybo.jpg"></a></header>
                                    <ul class="mega-links">
                                        <li><a href="#">Quần áo</a></li>
                                        <li><a href="">Giày</a></li>
                                        <li><a href="">Phụ kiện</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row style1">
                                    <header><a href="#">Bóng rổ<img src="./mvc/view/Layout/img/bongro.jpg"></a></header>
                                    <ul class="mega-links">
                                        <li><a href="#">Quần áo</a></li>
                                        <li><a href="">Giày</a></li>
                                        <li><a href="">Phụ kiện</a></li>
                                    </ul>
                                </div>
                                <div class="mega-row style1">
                                    <header><a href="#">Quần vợt<img src="./mvc/view/Layout/img/quanvot.jpg"></a></header>
                                    <ul class="mega-links">
                                        <li><a href="#">Quần áo</a></li>
                                        <li><a href="">Giày</a></li>
                                        <li><a href="">Phụ kiện</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="line"></li>
                    <li class="drop">
                        <a href="#" class="drop-toggle">GIẢM GIÁ</a>
                    </li>
                </ul>
                <div class="my-navbar-box">
                    <div class="search-box">
                        <input class="search-txt" type="text" name="" placeholder="Tìm kiếm">
                        <label for="check" class="icon">
                            <i class="fas fa-search"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <?php require_once "./mvc/view/" . $data["page"] . "/" . $data["page"] . ".php" ?>
    <div id="footer">
        <div class="find-store">
            <div class="find-store-pic">
                <img src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/svg/Store.svg" alt="pic">
            </div>

            <div class="find-store-btn">
                <a href="">TÌM CỬA HÀNG</a>
            </div>
        </div>
        <div class="footer-items">
            <div class="rowF">
                <div class="colF">
                    <a href="http://localhost/Aglet/product_list">SẢN PHẨM</a>
                    <ul>
                        <li><a href="#">Giày nam</a></li>
                        <li><a href="#">Giày nữ</a></li>
                        <li><a href="#">Thời trang & Phụ kiện</a></li>
                        <li><a href="#">Sale-off</a></li>
                    </ul>
                </div>

                <div class="colF">
                    <a href="#">VỀ CÔNG TY</a>
                    <ul>
                        <li><a href="#">Dứa tuyển dụng</a></li>
                        <li><a href="#">Liên hệ nhượng quyền</a></li>
                        <li><a href="#">Về Ananas</a></li>
                    </ul>
                </div>

                <div class="colF">
                    <a href="#">HỖ TRỢ</a>
                    <ul>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Bảo mật thông tin</a></li>
                        <li><a href="#">Chính sách chung</a></li>
                        <li><a href="#">Tra cứu đơn hàng</a></li>
                    </ul>
                </div>

                <div class="colF">
                    <a href="#">LIÊN HỆ</a>
                    <ul>
                        <li><a href="#">Email góp ý</a></li>
                        <li><a href="#">Hotline</a></li>
                        <li><a href="#">113</a></li>
                    </ul>
                </div>
            </div>

            <div class="rowF">
                <div class="colF">
                    <p>ANANAS SOCIAL</p>
                    <div class="ft-icon">
                        <i class="fa-brands ft-icon  fa-square-facebook"></i>
                        <i class="fa-brands ft-icon fa-square-instagram"></i>
                        <i class="fa-brands ft-icon fa-youtube"></i>
                    </div>
                </div>

                <div class="colF">
                    <p>ĐĂNG KÝ NHẬN MAIL</p>
                    <form action="">
                        <div>
                            <input type="text" name="" id="" class="form-input">

                            <button>
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="colF">
                    <a href="#">
                        <img src="" alt="">
                    </a>

                </div>

            </div>

            <div class="rowF">
                <div class="colF f-r3">
                    <img src="https://ananas.vn/wp-content/themes/ananas/fe-assets/images/icon_bocongthuong.png" alt="">
                </div>

                <div class="colF f-r3">
                    <p>Copyright © 2022 Aglet. All rights reserved.</p>
                </div>
            </div>

        </div>
        <div class="clear"></div>
    </div>

</body>

</html>