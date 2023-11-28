<?php
function them_don_hang($tong_sl, $tong_tien, $ten_kh, $dia_chi, $sdt, $cach_thanh_toan, $ghi_chu, $id_tk)
{
    $sql = "START TRANSACTION;

    INSERT INTO `don_hang` (`so_luong_mua`, `tong_tien`, `ten_khachhang`, `dia_chi`, `sdt`, `cach_thanh_toan`, ghi_chu, id_taikhoan) 
    VALUES ('$tong_sl', '$tong_tien', '$ten_kh', '$dia_chi', '$sdt', '$cach_thanh_toan', '$ghi_chu', $id_tk);
    

    SET @id_donhang = LAST_INSERT_ID();";

    foreach ($_SESSION['gio_hang'] as $sp) {
        extract($sp);
        $sql .= "INSERT INTO gio_hang(id_sanpham, id_mau, so_luong_mua, kich_thuoc, id_donhang)
       VALUES ($id_sp, $id_mau, $sl, '$kt', @id_donhang);";
    }

    $sql .= "INSERT INTO trang_thai (id_donhang) VALUES (@id_donhang); COMMIT; ";
    pdo_execute($sql);
    unset($_SESSION['gio_hang']);
    $_SESSION['sl_gio_hang'] = 0;
    $sql_2 = "SELECT MAX(id_donhang) AS last_giohang_id FROM don_hang";
    return pdo_query_one($sql_2);
}
function ds_donhang()
{
    $sql = "SELECT
    don_hang.id_donhang, don_hang.id_taikhoan, don_hang.so_luong_mua, don_hang.tong_tien, don_hang.ten_khachhang, don_hang.dia_chi, don_hang.sdt, don_hang.cach_thanh_toan, don_hang.ghi_chu,
    DATE_FORMAT(don_hang.ngay_dat_hang, '%H:%i %d-%m-%Y') as ngay_dat_hang,
    GROUP_CONCAT(
        trang_thai.trang_thai
   ORDER BY
        trang_thai.time
    asc
    ) AS trang_thai,
    GROUP_CONCAT(DATE_FORMAT(trang_thai.time, '%H:%i %d-%m-%Y') ORDER  BY trang_thai.time asc) AS thoi_gian
FROM
    don_hang
LEFT JOIN trang_thai ON don_hang.id_donhang = trang_thai.id_donhang
GROUP BY
    don_hang.id_donhang
ORDER BY
    don_hang.id_donhang
DESC
    ;";
    return pdo_query($sql);
}
function chi_tiet_dh($id_donhang)
{
    $sql = "SELECT gio_hang.*, san_pham.ten_sanpham, san_pham.gia, mau.ten_mau, mau.img_mau
    FROM gio_hang
    JOIN san_pham ON gio_hang.id_sanpham = san_pham.id_sanpham
    JOIN mau ON gio_hang.id_mau = mau.id_mau
    WHERE gio_hang.id_donhang = $id_donhang";
    return pdo_query($sql);
}
function thay_doi_trang_thai($trang_thai, $id_donhang)
{
    $sql = "INSERT INTO trang_thai(trang_thai, id_donhang) VALUES ('$trang_thai', $id_donhang)";

    pdo_execute($sql);
}
function don_hang_user($id_tk)
{
    $sql = "SELECT don_hang.id_donhang, don_hang.id_taikhoan, don_hang.so_luong_mua, don_hang.tong_tien,
     GROUP_CONCAT( trang_thai.trang_thai ORDER BY trang_thai.time ASC ) AS trang_thai, DATE_FORMAT(don_hang.ngay_dat_hang, '%H:%i %d-%m-%Y') as ngay_dat_hang
     FROM don_hang LEFT JOIN trang_thai 
     ON don_hang.id_donhang = trang_thai.id_donhang 
     WHERE id_taikhoan = $id_tk
     GROUP BY don_hang.id_donhang 
     ORDER BY don_hang.id_donhang DESC;";
    return pdo_query($sql);
}
