<?php
ob_start();
include "header.php";

include "../model/pdo.php";
include "../global.php";
include "../model/san_pham.php";
include "../model/danh_muc.php";
include "../model/kich_thuoc.php";
include "../model/tai_khoan.php";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
            $all_size = all_size();
            if (isset($_POST['them_size']) && $_POST['them_size']) {
                $id_sanpham = $_GET['id_sp'];
                $id_kichthuoc = $_POST['kich_thuoc'];
                them_kich_thuoc_sp($id_sanpham, $id_kichthuoc);
            }
            if (isset($_GET['id_kichthuoc']) && $_GET['id_kichthuoc'] != '') {
                $id_kichthuoc = $_GET['id_kichthuoc'];
                $id_sanpham = $_GET['id_sp'];
                xoa_kichthuoc_sp($id_kichthuoc, $id_sanpham);
            }
            if (isset($_GET['id_sp']) && $_GET['id_sp'] != '') {
                $size_sp = size_san_pham($_GET['id_sp']);
                $mau_sp = mau_san_pham($_GET['id_sp']);
                include "san_pham/chi_tiet_sp.php";
            }
            break;
        case 'anh_theo_mau':
            if (isset($_GET['id_mau']) && isset($_GET['them_anh']) && isset($_POST['them_anh'])) {
                $id_mau = $_GET['id_mau'];
                $ten_anh = $_FILES['img']['name'];
                if (move_uploaded_file($_FILES['img']['tmp_name'], '../' . $duong_dan_anh . $ten_anh));
                them_anh_sp($id_mau, $ten_anh);
            }
            if (isset($_GET['id_mau']) && isset($_GET['id_anh_xoa']) && $_GET['id_anh_xoa'] != '') {
                xoa_anh_sp($_GET['id_anh_xoa']);
            }
            if (isset($_GET['id_mau']) && $_GET['id_mau'] != '') {
                $anh_theo_mau = anh_theo_mau($_GET['id_mau']);
                include "san_pham/anh_theo_mau.php";
            }
            break;
        case 'them_sp':
            $danh_muc = danh_muc();
            $tenErr = $giaErr =  "";
            $ten = $gia = $mota = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST['ten_sp'])) {
                    $tenErr = "Tên không được để trống!";
                }
                if (empty($_POST['gia'])) {
                    $giaErr = "Giá không được để trống!";
                } else {
                    $ten = test_input($_POST['ten_sp']);
                    $gia = test_input($_POST["gia"]);
                    $mota = test_input($_POST["mo_ta"]);

                    if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $ten)) {
                        $tenErr = "Chỉ chữ cái, số và khoảng trắng được cho phép!";
                    } else if (!preg_match("/^[0-9]*$/", $gia)) {
                        $giaErr = "Chỉ số được cho phép!";
                    } else {
                        $danh_muc_con = $_POST['danh_muc_con'];
                        them_sp($ten, $gia, $mota, $danh_muc_con);
                        $thongbao = "Thêm sản phẩm thành công!";
                    }
                }
            }
            include "san_pham/them_san_pham.php";
            break;
        case 'edit_san_pham':
            $danh_muc = danh_muc();
            $tenErr = $giaErr =  "";
            $ten = $gia = $mota = "";

            if (isset($_GET['id_sp']) && $_GET['id_sp'] != '') {
                $load_1_sp = load_1_sp($_GET['id_sp']);
                include "san_pham/edit_san_pham.php";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST['ten_sp'])) {
                    $tenErr = "Tên không được để trống!";
                    $load_1_sp = load_1_sp($_POST['id_sp']);
                    include "san_pham/edit_san_pham.php";
                }
                if (empty($_POST['gia'])) {
                    $giaErr = "Giá không được để trống!";
                    $load_1_sp = load_1_sp($_POST['id_sp']);
                    include "san_pham/edit_san_pham.php";
                } else {
                    $ten = test_input($_POST['ten_sp']);
                    $gia = test_input($_POST["gia"]);
                    $mota = test_input($_POST["mo_ta"]);

                    if (!preg_match("/^[a-zA-Z0-9-' ]*$/", $ten)) {
                        $tenErr = "Chỉ chữ cái, số và khoảng trắng được cho phép!";
                        $load_1_sp = load_1_sp($_POST['id_sp']);
                        include "san_pham/edit_san_pham.php";
                    } else if (!preg_match("/^[0-9]*$/", $gia)) {
                        $giaErr = "Chỉ số được cho phép!";
                        $load_1_sp = load_1_sp($_POST['id_sp']);
                        include "san_pham/edit_san_pham.php";
                    } else {
                        $danh_muc_con = $_POST['danh_muc_con'];
                        edit_san_pham($id_sanpham, $ten, $gia, $mota, $danh_muc_con);
                        header('location: index.php?act=ds_san_pham');
                        die;
                    }
                }
            }
            break;

        case 'them_kich_thuoc':
            if (isset($_POST['them_kich_thuoc']) && $_POST['them_kich_thuoc']) {
                $ten_kich_thuoc = $_POST['ten_kt'];
                them_kich_thuoc($ten_kich_thuoc);
            }
            include "san_pham/them_kich_thuoc.php";
            break;
        case 'ds_kichthuoc':
            if (isset($_POST['them_kich_thuoc']) && $_POST['them_kich_thuoc']) {
                them_kich_thuoc($_POST['kich_thuoc']);
            }
            if (isset($_GET['id_kichthuoc_xoa']) && $_GET['id_kichthuoc_xoa'] != '') {
                xoa_kichthuoc($_GET['id_kichthuoc_xoa']);
            }
            $all_kich_thuoc = all_kich_thuoc();
            include "kich_thuoc/ds_kich_thuoc.php";
            break;
        case 'ds_danhmuc':
            if (isset($_POST['them_dm']) && $_POST['them_dm']) {
                insert_danhmuc($_POST['danh_muc']);
            }
            if (isset($_GET['id_danhmuc_xoa']) && $_GET['id_danhmuc_xoa'] != '') {
                delete_danhmuc($_GET['id_danhmuc_xoa']);
            }
            if (isset($_GET['id_danhmuc_sua']) && $_GET['id_danhmuc_sua'] != '') {
                $one_danhmuc = loadOne_danhmuc($_GET['id_danhmuc_sua']);
            }
            if (isset($_POST['edit_danhmuc']) && $_POST['edit_danhmuc']) {
                $id_danhmuc = $_POST['id_danhmuc'];
                $ten_danhmuc = $_POST['ten_dm'];
                update_danhmuc($id_danhmuc, $ten_danhmuc);
            }
            $ds_danhmuc = danh_muc();
            include "danhmuc/ds_danhmuc.php";
            break;

        case 'ds_taikhoan':
            if (isset($_POST['them_tk']) && $_POST['them_tk']) {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $address = $_POST['address'];
                insert_taikhoan($user, $pass, $email, $sdt, $address);
            }
            if (isset($_GET['id_tk_xoa']) && $_GET['id_tk_xoa']) {
                xoa_tk($_GET['id_tk_xoa']);
            }
            $ds_taikhoan = tk_nguoidung();
            include "taikhoan/ds_taikhoan.php";
            break;

        case 'them_tk':
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
                        $thongbao = "Đã thêm tài khoản thành công";
                    }
                }
            }
            include "taikhoan/them_tk.php";
            break;

        case 'edit_tk':
            if (isset($_GET['id_tk']) && $_GET['id_tk'] != '') {
                $load_tk = loadOne_taikhoan($_GET['id_tk']);
                include "taikhoan/edit_tk.php";
            }
            if (isset($_POST['edit_tk']) && $_POST['edit_tk']) {
                $id = $_POST['id_tk'];
                $user = $_POST['username'];
                $pass = $_POST['password'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $address = $_POST['address'];
                update_taikhoan($id, $user, $pass, $email, $sdt, $address);
                header('location: index.php?act=ds_taikhoan');
                die;
            }
            break;

        case 'ds_danhmuc_con':
            $danh_muc_hien_tai = '';
            if (isset($_POST['them_dm_con']) && $_POST['them_dm_con']) {
                $ten_dm_con = $_POST['danh_muc_con'];
                $id_danhmuc = $_POST['id_danhmuc'];
                insert_danhmuccon($ten_dm_con, $id_danhmuc);
            }
            if (isset($_GET['id_dm_con_xoa']) && $_GET['id_dm_con_xoa']) {
                delete_danhmuccon($_GET['id_dm_con_xoa']);
            }
            if (isset($_GET['id_dm_con_sua']) && $_GET['id_dm_con_sua']) {
                $one_danhmuc_con =  loadOne_danhmuccon($_GET['id_dm_con_sua']);
            }
            if (isset($_POST['edit_danhmuc_con']) && $_POST['edit_danhmuc_con']) {
                $id_dm_con = $_POST['id_danhmuc_con'];
                $ten_dm_con = $_POST['ten_dm_con'];
                update_danhmuccon($id_dm_con, $ten_dm_con);
            }
            if (isset($_GET['id_danhmuc']) && $_GET['id_danhmuc']) {
                $danh_muc_hien_tai = $_GET['id_danhmuc'];
                $ds_danh_muc_con = loadAll_danhmuccon($_GET['id_danhmuc']);
            }
            include "danhmuc/ds_danhmuc_con.php";
            break;

        default:
            include "main.php";
            break;
    }
} else {

    include "main.php";
}

include "footer.php";
