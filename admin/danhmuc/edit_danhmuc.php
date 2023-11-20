<?php

if (is_array($dm)) {
    extract($dm);
}

if (isset($_POST['capnhap'])) {
    $tenloai = $_POST['tenloai'];
    $idDm = $_POST['id'];

    // Xử lý tập tin hình ảnh (lưu ý: cần kiểm tra và xử lý đầy đủ về hình ảnh)
    $hinh = $_FILES['hinh']['name'];
    $temp = $_FILES['hinh']['tmp_name'];
    $uploads_dir = "uploads/"; // Đường dẫn thư mục để lưu trữ hình ảnh (tạo thư mục này nếu chưa có)
    move_uploaded_file($temp, $uploads_dir . $hinh);

    // Thực hiện cập nhật vào cơ sở dữ liệu
    update_danhmuc($idDm, $tenloai, $hinh);

    // Hiển thị thông báo thành công
    $thongbao = "Cập nhật loại hàng thành công!";
}

?>

<section class="row">
    <h1>CẬP NHẬP LOẠI HÀNG HÓA</h1>
    <form action="index.php?act=update" method="post" enctype="multipart/form-data">
        <div class="row_content">Mã loại <br> <input type="text" name="idDm" value="<?php echo $idDm ?>" disabled></div>
        <div class="row_content">Tên loại <br><input type="text" name="tenloai" value="<?php echo $name ?>"></div>
        <div class="row_content">Hình <br><input type="file" name="hinh" id=""></div>
        <input type="hidden" name="id" value="<?= $idDm ?>">
        <input type="submit" name="capnhap" value="CẬP NHẬP">
        <input type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>
        <?php
        if (isset($thongbao) && $thongbao != "") {
            echo $thongbao;
        }
        ?>
    </form>
</section>