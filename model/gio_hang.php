<?php
session_start();
if (isset($_POST)) {
    $da_ton_tai = false;

    $data = json_decode(file_get_contents("php://input"), true);
    if (!isset($_SESSION['gio_hang'])) {
        $_SESSION['gio_hang'] = [];
    } else {

        $id_mau = $data['gio_hang']['id_mau'];
        $kich_thuoc = $data['gio_hang']['kt'];
        $so_luong = $data['gio_hang']['sl'];

        foreach ($_SESSION['gio_hang'] as &$_POST) {
            if ($_POST['id_mau'] == $id_mau && $_POST['kt'] == $kich_thuoc) {
                $_POST['sl'] += $so_luong;
                $da_ton_tai = true;
                break;
            }
        }
    }


    if (!$da_ton_tai) {
        $_SESSION['gio_hang'][] = $data['gio_hang'];
    }
    if ($data) {
        $_SESSION['sl_gio_hang']= count($_SESSION['gio_hang']);
        echo ($_SESSION['sl_gio_hang']);
    } else {

        echo "Lỗi: Không nhận được dữ liệu từ phía client!";
    }
}


