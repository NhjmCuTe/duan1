<?php
include "../../model/pdo.php";
include "../../model/san_pham.php";
include "../../global.php";
$anh = anh_theo_mau($_GET['id_mau']);

header('Content-Type: application/json');
echo json_encode($anh);
// echo json_encode($duong_dan_anh);

