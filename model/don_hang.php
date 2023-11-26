<?php
function them_don_hang($tong_sl, $tong_tien, $ten_kh, $dia_chi, $sdt, $cach_thanh_toan, $ghi_chu)
{
    $sql = "START TRANSACTION;

    INSERT INTO `don_hang` (`so_luong_mua`, `tong_tien`, `ten_khachhang`, `dia_chi`, `sdt`, `cach_thanh_toan`, ghi_chu) 
    VALUES ('$tong_sl', '$tong_tien', '$ten_kh', '$dia_chi', '$sdt', '$cach_thanh_toan', '$ghi_chu');
    

    SET @id_donhang = LAST_INSERT_ID();";

    foreach ($_SESSION['gio_hang'] as $sp) {
        extract($sp);
        $sql .= "INSERT INTO gio_hang(id_sanpham, id_mau, so_luong_mua, kich_thuoc, id_donhang)
       VALUES ($id_sp, $id_mau, $sl, '$kt', @id_donhang);";
    }

    $sql .= "COMMIT; ";
    pdo_execute($sql);
    unset($_SESSION['gio_hang']);

    $sql_2 = "SELECT MAX(id_donhang) AS last_giohang_id FROM don_hang";
    return pdo_query_one($sql_2);
}
function ds_donhang(){
    $sql = "SELECT * FROM `don_hang`";
    return pdo_query($sql);
}