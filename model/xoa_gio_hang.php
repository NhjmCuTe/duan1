<?php
session_start();

if (isset($_GET['index'])) {
    $indexCanXoa = $_GET['index'];

    // Sử dụng array_splice để xóa sản phẩm khỏi giỏ hàng theo index
    array_splice($_SESSION['gio_hang'], $indexCanXoa, 1);
}