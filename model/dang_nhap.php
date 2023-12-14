<?php
session_start();
include "pdo.php";
include "tai_khoan.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $username = $_POST['username'];
    $password = $_POST['password'];

    $kq = checkuser($username,$password);

    if (is_array($kq)) {

        // Đăng nhập thành công
        echo json_encode(['status' => 'success', 'message' => 'Đăng nhập thành công']);
    } else {
        // Đăng nhập thất bại
        echo json_encode(['status' => 'error', 'message' => 'Tên đăng nhập hoặc mật khẩu không chính xác']);
    }
} else {
    // Tránh truy cập trực tiếp vào script
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
