<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="font-awesome-6-pro-main/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css.css">
    <script src=""></script>
    <title>Document</title>
</head>

<body>
<header class="container-fluid py-4 px-5">
    <div class="row header">
        <div class="col-2 logo">
            <img src="./img/logo.png" alt="">
        </div>
        <div class="col-4 menu">
            <ul>
                <li class="menu_chinh"><a href="">HÀNG MỚI</a></li>
                <li class="menu_chinh">
                    <a href="">SẢN PHẨM</a>
                    <ul class="menu_con">
                        <div class="menu_con_2">
                            <li><a href="">ÁO</a>
                                <ul>
                                    <li><a href="">Áo polo</a></li>
                                    <li><a href="">Áo phông</a></li>
                                    <li><a href="">Áo sơ mi</a></li>
                                    <li><a href="">Áo ba lỗ</a></li>
                                </ul>
                            </li>
                            <li><a href="">QUẦN</a>
                                <ul>
                                    <li><a href="">Áo polo</a></li>
                                    <li><a href="">Áo phông</a></li>
                                    <li><a href="">Áo sơ mi</a></li>
                                    <li><a href="">Áo ba lỗ</a></li>
                                </ul>
                            </li>
                            <li><a href="">ĐỒ MẶC NGOÀI</a>
                                <ul>
                                    <li><a href="">Áo polo</a></li>
                                    <li><a href="">Áo phông</a></li>
                                    <li><a href="">Áo sơ mi</a></li>
                                    <li><a href="">Áo ba lỗ</a></li>
                                </ul>
                            </li>
                            <li><a href="">ĐỒ MẶC TRONG</a>
                                <ul>
                                    <li><a href="">Áo polo</a></li>
                                    <li><a href="">Áo phông</a></li>
                                    <li><a href="">Áo sơ mi</a></li>
                                    <li><a href="">Áo ba lỗ</a></li>
                                </ul>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="menu_chinh"><a href="">SALE</a></li>
            </ul>
        </div>
        <div class="col-3">
            <form class="tim_kiem">
                <button type="submit"><i class="fas fa-search"></i></button>
                <input type="search" placeholder="Tìm kiếm" aria-label="Search" />
            </form>
        </div>
        <div class="col-3">
            <div class="row item">
                <div class="col hover">
                    <a href=""><i class="fa-regular fa-store"></i><span>Cửa hàng</span></a>
                </div>
                <div id="gio_hang" data-bs-toggle="modal" data-bs-target="#modal_gio_hang" class="col gio_hang hover">
                    <i class="fa-regular fa-cart-shopping"></i><span>Giỏ hàng</span>
                    <p>10</p>
                </div>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <div class="col hover">
                        <a href=""><i class="fa-regular fa-user"></i><span>Tài khoản</span></a>
                    </div>
                    <div class="col hover">
                        <a href="index.php?act=dangxuat"><i class="fa-regular fa-user"></i><span>Đăng xuất</span></a>
                    </div>
                <?php } else { ?>
                    <div class="col hover">
                        <a href="index.php?act=dangnhap"><i class="fa-regular fa-user"></i><span>Đăng nhập</span></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</header>