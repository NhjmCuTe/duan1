<?php
include "model/pdo.php";
include "model/san_pham.php";
include "model/danh_muc.php";
include "model/kich_thuoc.php";

$all_danhmuc_menu = danhmuc_menu();
// var_dump($all_danhmuc_menu);
// foreach($all_danhmuc_menu as $one_dm){
// echo $one_dm['ten_danhmuc'];
// $mang_dm_con = explode(',', $one_dm['danh_muc_con']);
// foreach ($mang_dm_con as $dm_con){
//     echo $dm_con;
//     echo '<br>';
// }
// // var_dump($mang_dm_con);
// echo '<br>';
// }
// die;
include "view/menu.php";

if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
        case 'value':
            include "view/chitiet_sp.php";

            break;

        default:
            # code...
            break;
    }
} else {
    include "view/banner.php";
    include "view/main.php";
}



include "view/footer.php";
