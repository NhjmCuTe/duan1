<?php
include "pdo.php";

// Lấy giá trị ngày từ yêu cầu
$selectedDate = $_GET['selectedDate'];

// Truy vấn cơ sở dữ liệu để lấy tổng doanh thu theo giờ trong ngày đã chọn
$sql = "SELECT
HOUR(ngay_dat_hang) AS gio,
SUM(tong_tien) AS tong_tien
FROM
don_hang
WHERE
DATE(ngay_dat_hang) = '$selectedDate' AND don_hang.thanh_cong = 1
GROUP BY
HOUR(ngay_dat_hang)
ORDER BY
gio";
$kq = pdo_query($sql);
$data = [];
foreach ($kq as $value) {
    $data['gio'][] = $value['gio'] . ' h';
    $data['tong_tien'][] = $value['tong_tien'];
}


$sql_2 = "SELECT
SUM(tong_tien) AS tong_tien
FROM
don_hang
WHERE
DATE(ngay_dat_hang) = '$selectedDate' AND don_hang.thanh_cong = 1";
$kq_2 = pdo_query($sql_2);
$data['tong_tien_ngay'] = $kq_2;



// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
exit();
