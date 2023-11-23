<?php
session_start();
include "model/pdo.php";
include "global.php";

include "model/san_pham.php";
include "model/danh_muc.php";
include "model/kich_thuoc.php";

$all_danhmuc_menu = danhmuc_menu();

include "view/menu.php";

if (isset($_GET['act']) && $_GET['act']) {

    $act = $_GET['act'];
    switch ($act) {
        case 'chitiet_sp':
            var_dump($_SESSION['gio_hang']);
            if (isset($_GET['id_mau']) && $_GET['id_mau']) {
                $mang_anh = anh_theo_mau($_GET['id_mau']);
            }
            if (isset($_GET['id_sp']) && $_GET['id_sp']) {
                $chitiet_sp = chitiet_sp($_GET['id_sp']);
                include "view/chitiet_sp.php";
            }

            break;
        case 'gio_hang':
            if (isset($_GET['them_vao_gio']) && $_GET['them_vao_gio']) {
                $_SESSION['gio_hang'] = $_GET['them_vao_gio'];
                var_dump($_SESSION['gio_hang']);
                die;
            }
            break;
        default:
            # code...
            break;
    }
} else {
    include "view/banner.php";
    $san_pham_home = sanpham_home();
    include "view/main.php";
    // include "view/chitiet_sp.php";

}



include "view/footer.php";
