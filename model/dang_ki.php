<?php
session_start();
include "pdo.php";
include "tai_khoan.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sdt = $_POST['sdt'];

    $kq = checkUsername($username);

    if (!is_array($kq)) {
        insert_taikhoan($username,$password,'',$sdt);
        echo json_encode(['status' => 'success', 'message' => 'Đăng kí thành công, vui lòng đăng nhập']);
    } else {
        // Đăng nhập thất bại
        echo json_encode(['status' => 'error', 'message' => 'Tên đăng kí đã tồn tại']);
    }
} else {
    // Tránh truy cập trực tiếp vào script
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
