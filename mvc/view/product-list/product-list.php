<?php


if (isset($_GET['gender'])) {
  $gender;
  if (strcmp(($_GET['gender']), "men") == 0) {
    $gender = 0;
  } else if (strcmp(($_GET['gender']), "women") == 0) {
    $gender = 1;
  } else {
    //query all
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <link href=' http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
  <script src="https://kit.fontawesome.com/d822126298.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="./mvc/view/product-list/product-list.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="row">'
    <div class="container">
      <div class="sidebar">
        <div class="sidebar type">
          <ul class="tab">
            <li class="item"><a href="#">TẤT CẢ</a></li>
            <li class="item-divider"></li>
            <li class="item"><a href="#">NAM</a></li>
            <li class="item-divider"></li>
            <li class="item"><a href="#">NỮ</a></li>
          </ul>
        </div>
        <div class="row-divider"></div>
        <ul class="sidebar type-item">
          <li class="type-item item"><a href="#">Accessories | Phụ kiện</a></li>
          <li class="type-item item"><a href="#">Footwear | Lên chân</a></li>
          <li class="type-item item"><a href="#">Top | Nửa trên</a></li>
        </ul>
        <div class="row-divider"></div>
        <div class="sidebar tree">
          <ul class="nav">
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                TRẠNG THÁI
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                KIỂU DÁNG
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider">
            </li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                DÒNG SẢN PHẨM
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                GIÁ
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                BỘ SƯU TẬP
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                TRẠNG THÁI
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                SIZE GIÀY
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                MÀU SẮC
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>
            <li class="nav element">
              <label label-default class="tree-toggle nav-header orange">
                TRẠNG THÁI
              </label>
              <span class="icon orange"><i class="fa-solid fa-angle-up"></i></span>
              <ul class="nav tree" display="block">
                <li>Limited Edition</li>
                <li>Online Only</li>
                <li>Sale Off</li>
                <li>Best Seller</li>
                <li>New Arrival</li>
              </ul>
            </li>
            <li class="nav-divider"></li>

          </ul>
        </div>

      </div>
      <div class="product-list">
        <div class="product-list cover">
          <img src="https://ananas.vn/wp-content/uploads/desktop_productlist.jpg" />
        </div>

        <div class="product-list list">

          <?php

          $i = 0;
          $row = [];
          while ($row[$i] = mysqli_fetch_array($data["product"])) {

            echo '
              <div class="product-list card">
              <div class="card-image">
              <img src="' . $row[$i]['thumb'] . '" alt="">
              <div class="text"><a href="http://localhost/Aglet/product_details?id=' . $row[$i]['parent_id'] . '"MUA NGAY</a></div>
              </div>
              <div class="card-descr">
              <h3 class="name">' . $row[$i]['name'] . '</h3>
              <h3 class="color">' . $row[$i]['color'] . '</h3>
              <h3 class="price">' . $row[$i]['price'] . ' VNĐ</h3>
              </div>
              </div>
          ';
            $i++;
          }
          ?>


        </div>
      </div>
    </div>
  </div>

  <script src="./mvc/view/product-list/product-list.js"></script>
</body>

</html>