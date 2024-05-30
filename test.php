<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ phần thân của yêu cầu
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);
    // var_dump( $data);
    // Kiểm tra xem dữ liệu có hợp lệ không (đây chỉ là ví dụ)
    // echo $json_data;
    // header('location: index.php');
    // var_dump($_GET);
    
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    echo json_encode($response);
}
