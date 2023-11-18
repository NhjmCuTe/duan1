<?php
ob_start();
include "../model/pdo.php";
include "../global.php";
include "../model/san_pham.php";
include "../model/danh_muc.php";

include "header.php";


if (isset($_GET['act']) && $_GET['act'] != '') {
    $act = $_GET['act'];
    switch ($act) {
        case 'ds_san_pham':
            if (isset($_GET['id_sp_xoa']) && $_GET['id_sp_xoa'] != '') {
                xoa_san_pham($_GET['id_sp_xoa']);
            }
            $all_san_pham = all_san_pham();

            include "san_pham/ds_san_pham.php";
            break;
        case 'chi_tiet_sp':
            if (isset($_GET['id_sp']) && $_GET['id_sp'] != '') {
                $size_sp = size_san_pham($_GET['id_sp']);
                $mau_sp = mau_san_pham($_GET['id_sp']);
                include "san_pham/chi_tiet_sp.php";
            }
            break;
        case 'anh_theo_mau':
            if(isset($_GET['id_mau'])&&isset($_GET['them_anh'])&&isset($_POST['them_anh'])){
                $id_mau = $_GET['id_mau'];
                
            }
            if (isset($_GET['id_mau']) && $_GET['id_mau'] != '') {
                $anh_theo_mau = anh_theo_mau($_GET['id_mau']);
                include "san_pham/anh_theo_mau.php";
            }
            break;
        case 'them_sp':
            $danh_muc = danh_muc();
            if (isset($_POST['them_san_pham']) && $_POST['them_san_pham']) {
                $ten = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $mota = $_POST['mo_ta'];
                $danh_muc_con = $_POST['danh_muc_con'];

                them_sp($ten, $gia, $mota, $danh_muc_con);
            }
            include "san_pham/them_san_pham.php";
            break;
        case 'edit_san_pham':
            $danh_muc = danh_muc();
            if (isset($_GET['id_sp']) && $_GET['id_sp'] != '') {
                $load_1_sp = load_1_sp($_GET['id_sp']);
                include "san_pham/edit_san_pham.php";
            }
            if (isset($_POST['edit_san_pham']) && $_POST['edit_san_pham']) {
                $id_sanpham = $_POST['id_sp'];
                $ten = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $mota = $_POST['mo_ta'];
                $danh_muc_con = $_POST['danh_muc_con'];
                edit_san_pham($id_sanpham, $ten, $gia, $mota, $danh_muc_con);
                header('location: index.php?act=ds_san_pham');
                die;
            }

            break;
        case 'them_kich_thuoc':
            if (isset($_POST['them_kich_thuoc']) && $_POST['them_kich_thuoc']) {
                $ten_kich_thuoc = $_POST['ten_kt'];
                them_kich_thuoc($ten_kich_thuoc);
            }
            include "san_pham/them_kich_thuoc.php";
            break;
        case 'them_anh_sp':

            break;

        default:
            include "main.php";
            break;
    }
} else {

    include "main.php";
}




include "footer.php";
