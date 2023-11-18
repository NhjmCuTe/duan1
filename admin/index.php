<?php
include 'pdo.php';
include 'header.php';

$stmt = $conn->prepare("SELECT * FROM danh_muc");
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<ul>";
    while ($row = $stmt->fetch()) {
        echo "<li>ID: " . $row["id_danhmuc"]. " - Tên danh mục: " . $row["ten_danhmuc"]. " <a href='?delete_id=".$row["id_danhmuc"]."'>Xóa</a></li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}
?>
<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $stmt = $conn->prepare("DELETE FROM danh_muc WHERE id_danhmuc = :delete_id");
    $stmt->bindParam(':delete_id', $delete_id);

    try {
        $stmt->execute();
        echo "Danh mục đã được xóa thành công!";
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
