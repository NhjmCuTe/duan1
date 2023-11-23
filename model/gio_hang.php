<?php
session_start();

if (isset($_POST)) {
    $dataFromClient = json_decode(file_get_contents("php://input"), true);
    print_r($dataFromClient);
    $_SESSION['gio_hang'][] = $dataFromClient;
    if ($dataFromClient) {

        echo "Dữ liệu đã được nhận thành công!";
    } else {
        // Nếu không nhận được dữ liệu, có thể có lỗi ở phía client
        echo "Lỗi: Không nhận được dữ liệu từ phía client!";
    }
}
