<?php
function all_nam()
{
    $sql = "SELECT DISTINCT YEAR(ngay_dat_hang) AS nam FROM don_hang WHERE thanh_cong=1";
    return pdo_query($sql);
}
function top_10_sp_doanh_thu()
{
    $sql = "SELECT
    san_pham.id_sanpham,
    san_pham.ten_sanpham,
    SUM(
        gio_hang.so_luong_mua * san_pham.gia
    ) AS doanh_thu
FROM
    gio_hang
JOIN don_hang ON don_hang.id_donhang = gio_hang.id_donhang
JOIN san_pham ON san_pham.id_sanpham = gio_hang.id_sanpham
WHERE
    don_hang.thanh_cong = 1
GROUP BY
    san_pham.id_sanpham
ORDER BY
    doanh_thu
DESC
LIMIT 10";
    return pdo_query($sql);
}
function top_10_sp_so_luong()
{
    $sql = "SELECT
    san_pham.id_sanpham,
    san_pham.ten_sanpham,
    SUM(
        gio_hang.so_luong_mua
    ) AS so_luong_ban
FROM
    gio_hang
JOIN don_hang ON don_hang.id_donhang = gio_hang.id_donhang
JOIN san_pham ON san_pham.id_sanpham = gio_hang.id_sanpham
WHERE
    don_hang.thanh_cong = 1
GROUP BY
    san_pham.id_sanpham
ORDER BY
    so_luong_ban
DESC
LIMIT 10";
    return pdo_query($sql);
}
function top_10_sp_sl_va_dt()
{
    $sql = "SELECT
    san_pham.id_sanpham,
    san_pham.ten_sanpham,
    SUM(gio_hang.so_luong_mua) AS so_luong_ban,
    SUM(
        gio_hang.so_luong_mua * san_pham.gia
    ) AS doanh_thu
FROM
    gio_hang
JOIN don_hang ON don_hang.id_donhang = gio_hang.id_donhang
JOIN san_pham ON san_pham.id_sanpham = gio_hang.id_sanpham
WHERE
    don_hang.thanh_cong = 1
GROUP BY
    san_pham.id_sanpham
ORDER BY
    doanh_thu
DESC
LIMIT 10";
    $kq =  pdo_query($sql);
    $kq2 = [];
    foreach ($kq as $value) {
        $kq2['ten_sp'][] = $value['ten_sanpham'];
        $kq2['sl'][] = $value['so_luong_ban'];
        $kq2['dt'][] = $value['doanh_thu'];
    }
    return $kq;
}
function so_luong_dm()
{
    $sql = "SELECT
    COUNT(danh_muc.id_danhmuc) sl_dm
FROM
    danh_muc;";
    return pdo_query_one($sql);
}
function so_luong_sp()
{
    $sql = "SELECT
    COUNT(san_pham.id_sanpham) sl_sp
FROM
    san_pham;";
    return pdo_query_one($sql);
}
function so_luong_kt()
{
    $sql = "SELECT
    COUNT(kich_thuoc.id_kichthuoc) sl_kt
FROM
    kich_thuoc;";
    return pdo_query_one($sql);
}
function so_luong_tk()
{
    $sql = "SELECT
    COUNT(tai_khoan.id_taikhoan) sl_tk
FROM
    tai_khoan
    WHERE role is null";
    return pdo_query_one($sql);
}
function so_luong_dh_tc()
{
    $sql = "SELECT
    COUNT(don_hang.id_donhang) sl_dh
FROM
    don_hang
WHERE
    don_hang.thanh_cong = 1;";
    return pdo_query_one($sql);
}
function so_luong_dh()
{
    $sql = "SELECT
    COUNT(don_hang.id_donhang) sl_dh
FROM
    don_hang
WHERE
    don_hang.thanh_cong = 0;";
    return pdo_query_one($sql);
}
function so_luong_dh_huy()
{
    $sql = "SELECT
    COUNT(don_hang.id_donhang) sl_dh
FROM
    don_hang
WHERE
    don_hang.thanh_cong = 2;";
    return pdo_query_one($sql);
}
