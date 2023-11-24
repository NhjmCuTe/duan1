<?php
session_start();
ob_start();
require_once "model/pdo.php";
require_once "global.php";

require_once "model/tai_khoan.php";
require_once "model/danh_muc.php";
require_once "model/san_pham.php";

$all_danhmuc_menu = danhmuc_menu();


// include "view/header.php";

include "view/menu.php";



if (isset($_GET['act']) && $_GET['act']) {

   $act = $_GET['act'];
   switch ($act) {
      case 'chitiet_sp':
         if (isset($_GET['id_mau']) && $_GET['id_mau']) {
            $mang_anh = anh_theo_mau($_GET['id_mau']);
         }
         if (isset($_GET['id_sp']) && $_GET['id_sp']) {
            $chitiet_sp = chitiet_sp($_GET['id_sp']);
            include "view/chitiet_sp.php";
         }

         break;
      case 'dangnhap':
         if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $checkuser = checkuser($user, $pass);
            // var_dump($checkuser);die;
            if (is_array($checkuser)) {
               extract($checkuser);

               $_SESSION['user'] = $checkuser;
               if ($role == 1) {
                  header('location: admin/index.php');
               } else {
                  header('location: index.php');
               }
            } else {
               $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra hoặc đăng ký!";
            }
         }
         include "view/dangnhap.php";
         break;

      case 'dangky':
         if (isset($_POST['dangky']) && ($_POST['dangky'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $address = $_POST['address'];
            insert_taikhoan($user, $pass, $email, $sdt, $address);
            $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập";
         }
         include "view/dangky.php";
         break;

      case 'dangxuat':
         unset($_SESSION['user']);
         header('Location:index.php');
         break;
      default:
         include "view/banner.php";
         $san_pham_home = sanpham_home();
         include "view/main.php";
         break;
   }
} else {

   include "view/banner.php";
   $san_pham_home = sanpham_home();
   include "view/main.php";
}

include "view/footer.php";
