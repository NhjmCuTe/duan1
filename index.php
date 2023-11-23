<?php
session_start();
ob_start();
include "view/header.php";

include "model/tai_khoan.php";
include "model/danh_muc.php";
include "model/cart.php";
include "model/san_pham.php";
include "model/pdo.php";
include "global.php";

if (isset($_GET['act'])) {
   $act = $_GET['act'];

   switch ($act) {
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
         include "view/home.php";
         break;
   }
} else {
         include "view/home.php";
}
include "view/footer.php";
