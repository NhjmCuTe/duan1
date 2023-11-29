<?php
session_start();
ob_start();
require_once "model/pdo.php";
require_once "global.php";

require_once "model/tai_khoan.php";
require_once "model/danh_muc.php";
require_once "model/san_pham.php";
require_once "model/don_hang.php";

$all_danhmuc_menu = danhmuc_menu();

include "view/header.php";
// unset($_SESSION['user']);
if (!isset($_GET['an'])) {
   include "view/menu.php";
}
// include "view/menu.php";

// function test_input($data)
// {
//    $data = trim($data);
//    $data = stripslashes($data);
//    $data = htmlspecialchars($data);
//    return $data;
// }

if (isset($_GET['act']) && $_GET['act']) {

   $act = $_GET['act'];
   switch ($act) {
      case 'chitiet_sp':
         if (isset($_GET['id_mau']) && $_GET['id_mau']) {
            $mang_anh = anh_theo_mau($_GET['id_mau']);
         }
         if (isset($_GET['id_sp']) && $_GET['id_sp']) {
            $chitiet_sp = chitiet_sp($_GET['id_sp']);
            include "view/san_pham/chitiet_sp.php";
         }

         break;
      case 'thanh_toan_1':
         if (isset($_SESSION['gio_hang']) && $_SESSION['gio_hang']) {
            include "view/san_pham/dat_hang.php";
         } else {
            header('location: index.php');
         }
         break;
      case 'thanh_toan_2':
         var_dump($_GET);
         $json_data = file_get_contents('php://input');
         echo $json_data;
         $data = json_decode($json_data, true);
         header('location: index.php');
         if (isset($_POST['thanh_toan'])) {
            $ten = $_POST['ho_ten'];
            $sdt = $_POST['sdt'];
            $tinh = $_POST['tinh'];
            $quan = $_POST['quan'];
            $xa = $_POST['xa'];
            $chi_tiet = $_POST['chi_tiet'];
            header('location: index.php');
         }
         break;
      case 'dat_hang':
         if (isset($_POST['thanh_toan']) && $_POST['thanh_toan']) {
            $ten = $_POST['ho_ten'];
            $sdt = $_POST['sdt'];
            $tinh = $_POST['tinh'];
            $quan = $_POST['quan'];
            $xa = $_POST['xa'];
            $chi_tiet = $_POST['chi_tiet'] . ', ' . $_POST['xa'] . ', ' . $_POST['quan'] . ', ' . $_POST['tinh'];
            $cach_thanh_toan = $_POST['cach_thanh_toan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_sl = 0;
            $tong_tien = 0;
            $id_tk = $_SESSION['user']['id_taikhoan'];
            foreach ($_SESSION['gio_hang'] as $sp) {
               $tong_sl += $sp['sl'];
               $tong_tien += $sp['gia'] * $sp['sl'];
            }
            $id_giohang = them_don_hang($tong_sl, $tong_tien, $ten, $chi_tiet, $sdt, $cach_thanh_toan, $ghi_chu, $id_tk);
            include "view/san_pham/thong_bao.php";
         }
         break;
      case 'dangnhap':

         if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $duong_dan = 'location:' . $_POST['duong_dan_hien_tai'];
            $checkuser = checkuser($user, $pass);
            // var_dump($checkuser);die;
            if (is_array($checkuser)) {
               extract($checkuser);
               $_SESSION['user'] = $checkuser;
               header($duong_dan);
         // define variables and set to empty values
         // $userErr = $passErr = "";
         // $user = $pass = "";

         // if ($_SERVER["REQUEST_METHOD"] == "POST") {
         //    if (empty($_POST['username'])) {
         //       $userErr = "Tài khoản không được để trống!";
         //    }
         //    if (empty($_POST['password'])) {
         //       $passErr = "Mật khẩu không được để trống!";
         //    } else {
         //       $user = test_input($_POST['username']);
         //       $pass = test_input($_POST["password"]);

         //       if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
         //          $userErr = "Chỉ chữ cái và số được cho phép!";
         //       } else if (!preg_match("/^[a-zA-Z0-9]*$/", $pass)) {
         //          $passErr = "Chỉ chữ cái và số được cho phép!";
         //       } else {
         //          $checkuser = checkuser($user, $pass);
         //          // var_dump($checkuser);die;
         //          if (is_array($checkuser)) {
         //             extract($checkuser);

         //             $_SESSION['user'] = $checkuser;
         //             if ($role == 1) {
         //                header('location: admin/index.php');
         //             } else {
         //                header('location: index.php');
         //             }
         //          } else {
         //             $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký!";
         //          }
         //       }
            }
         }

         break;

      case 'dangky':
         if (isset($_POST['dangky']) && ($_POST['dangky'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            // $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            // $address = $_POST['address'];
            insert_taikhoan($user, $pass, '', $sdt, '');
            $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập";
            echo "<script>alert('cập nhật thành công')</script>";
            $duong_dan = 'location:' . $_POST['duong_dan_hien_tai'];
            // echo $duong_dan;die;
            header($duong_dan);
         include "view/dangnhap.php";
         break;

      // case 'dangky':
      //    $userErr = $passErr = $emailErr = $sdtErr = $addressErr = "";
      //    $user = $pass = $email = $sdt = $address = "";

      //    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //       if (empty($_POST['username'])) {
      //          $userErr = "Tài khoản không được để trống!";
      //       }
      //       if (empty($_POST['password'])) {
      //          $passErr = "Mật khẩu không được để trống!";
      //       }
      //       if (empty($_POST['email'])) {
      //          $emailErr = "Email không được để trống!";
      //       }
      //       if (empty($_POST['sdt'])) {
      //          $sdtErr = "Số điện thoại không được để trống!";
      //       }
      //       if (empty($_POST['address'])) {
      //          $addressErr = "Địa chỉ không được để trống!";
      //       } else {
      //          $user = test_input($_POST['username']);
      //          $pass = test_input($_POST["password"]);
      //          $email = test_input($_POST["email"]);
      //          $sdt = test_input($_POST["sdt"]);
      //          $address = test_input($_POST["address"]);

      //          $checkEmail = checkEmail($email);
      //          $checkussername = checkUsername($user);

      //          if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
      //             $userErr = "Chỉ chữ cái và số được cho phép!";
      //          } else if (!preg_match("/^[a-zA-Z0-9]*$/", $pass)) {
      //             $passErr = "Chỉ chữ cái và số được cho phép!";
      //          } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //             $emailErr = "Định dạng email sai!";
      //          } else if (!preg_match("/^[0-9]*$/", $sdt)) {
      //             $sdtErr = "Chỉ số được cho phép!";
      //          } else if (is_array($checkEmail)) {
      //             $emailErr = "Email đã được sử dụng, vui lòng nhập email khác!";
      //          } else if (is_array($checkussername)) {
      //             $userErr = "Tên tài khoản đã được sử dụng, vui lòng nhập tên tài khoản khác!";
      //          } else {
      //             insert_taikhoan($user, $pass, $email, $sdt, $address);
      //             $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập";
      //          }
      //       }
         }

         break;

      case 'dangxuat':
         unset($_SESSION['user']);
         header('Location:index.php');
         break;
      case 'theo_doi_dh':
         if (isset($_SESSION['user']) && $_SESSION['user']) {
            $don_hang = don_hang_user($_SESSION['user']['id_taikhoan']);
            include "view/tai_khoan/don_hang.php";
         }
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
if (!isset($_GET['an'])) {
   include "view/footer.php";
}
