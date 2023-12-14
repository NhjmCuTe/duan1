<?php
include "pdo.php";

// Lấy giá trị ngày từ yêu cầu
$selectedDate = $_GET['selectedDate'];

// Truy vấn cơ sở dữ liệu để lấy tổng doanh thu theo giờ trong ngày đã chọn
$sql = "SELECT
MONTH(ngay_dat_hang) AS thang,
YEAR(ngay_dat_hang) AS nam,
SUM(tong_tien) AS tong_tien_thang
FROM
don_hang
WHERE YEAR(ngay_dat_hang) = '$selectedDate' AND don_hang.thanh_cong = 1
GROUP BY
YEAR(ngay_dat_hang), MONTH(ngay_dat_hang)
ORDER BY
YEAR(ngay_dat_hang), MONTH(ngay_dat_hang);";
$kq = pdo_query($sql);
$data = [];
foreach ($kq as $value) {
    $data['thang'][] = 'Tháng: '. $value['thang'] ;
    $data['tong_tien'][] = $value['tong_tien_thang'];
}


$sql_2 = "SELECT
SUM(tong_tien) AS tong_tien
FROM
don_hang
WHERE
YEAR(ngay_dat_hang) = '$selectedDate' AND don_hang.thanh_cong = 1";

$kq_2 = pdo_query($sql_2);
$data['tong_tien_nam'] = $kq_2;



// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($data);
exit();
