<?php
session_start();
ob_start();
require_once "model/pdo.php";
require_once "global.php";

require_once "model/tai_khoan.php";
require_once "model/danh_muc.php";
require_once "model/san_pham.php";

$all_danhmuc_menu = danhmuc_menu();

include "view/menu.php";

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

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
         // define variables and set to empty values
         $userErr = $passErr = "";
         $user = $pass = "";

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['username'])) {
               $userErr = "Tài khoản không được để trống!";
            }
            if (empty($_POST['password'])) {
               $passErr = "Mật khẩu không được để trống!";
            } else {
               $user = test_input($_POST['username']);
               $pass = test_input($_POST["password"]);

               if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
                  $userErr = "Chỉ chữ cái và số được cho phép!";
               } else if (!preg_match("/^[a-zA-Z0-9]*$/", $pass)) {
                  $passErr = "Chỉ chữ cái và số được cho phép!";
               } else {
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
                     $thongbao = "Tài khoản không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký!";
                  }
               }
            }
         }

         include "view/dangnhap.php";
         break;

      case 'dangky':
         $userErr = $passErr = $emailErr = $sdtErr = $addressErr = "";
         $user = $pass = $email = $sdt = $address = "";

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['username'])) {
               $userErr = "Tài khoản không được để trống!";
            }
            if (empty($_POST['password'])) {
               $passErr = "Mật khẩu không được để trống!";
            }
            if (empty($_POST['email'])) {
               $emailErr = "Email không được để trống!";
            }
            if (empty($_POST['sdt'])) {
               $sdtErr = "Số điện thoại không được để trống!";
            }
            if (empty($_POST['address'])) {
               $addressErr = "Địa chỉ không được để trống!";
            } else {
               $user = test_input($_POST['username']);
               $pass = test_input($_POST["password"]);
               $email = test_input($_POST["email"]);
               $sdt = test_input($_POST["sdt"]);
               $address = test_input($_POST["address"]);

               $checkEmail = checkEmail($email);
               $checkussername = checkUsername($user);

               if (!preg_match("/^[a-zA-Z0-9]*$/", $user)) {
                  $userErr = "Chỉ chữ cái và số được cho phép!";
               } else if (!preg_match("/^[a-zA-Z0-9]*$/", $pass)) {
                  $passErr = "Chỉ chữ cái và số được cho phép!";
               } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Định dạng email sai!";
               } else if (!preg_match("/^[0-9]*$/", $sdt)) {
                  $sdtErr = "Chỉ số được cho phép!";
               } else if (is_array($checkEmail)) {
                  $emailErr = "Email đã được sử dụng, vui lòng nhập email khác!";
               } else if (is_array($checkussername)) {
                  $userErr = "Tên tài khoản đã được sử dụng, vui lòng nhập tên tài khoản khác!";
               } else {
                  insert_taikhoan($user, $pass, $email, $sdt, $address);
                  $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập";
               }
            }
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
