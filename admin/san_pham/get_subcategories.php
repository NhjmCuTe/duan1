<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=shopquanao', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Kết nối CSDL thất bại: ' . $e->getMessage());
}
// include "../duan1/model/pdo.php";
// $pdo = pdo_get_connection();
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['categoryId'])) {
    $selectedCategoryId = $_GET['categoryId'];

    // Truy vấn CSDL để lấy danh sách danh mục con tương ứng với $selectedCategoryId
    $sql = "SELECT * FROM danh_muc_con WHERE id_danhmuc = :selectedCategoryId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':selectedCategoryId', $selectedCategoryId, PDO::PARAM_INT);
    $stmt->execute();
    $subcategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Trả về dữ liệu dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode($subcategories);
    exit();
}

