<h1 class="text-center">Chi tiết đơn hàng</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="javascript:history.back()" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID Giỏ hàng</th>
            <th scope="col">ID Sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Giá</th>
            <th scope="col">Kích thước</th>
            <th scope="col">ID màu</th>
            <th scope="col">Tên màu</th>
            <th scope="col">Ảnh sản phẩm</th>
            <th scope="col">Số lượng</th>


            <!-- <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th> -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($chi_tiet_dh as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_giohang ?></th>
                <td><?= $id_sanpham ?></td>
                <td><?= $ten_sanpham ?></td>
                <td><?= number_format($gia,0,'','.') ?></td>
                <td><?= $kich_thuoc ?></td>
                <td><?= $id_mau ?></td>
                <td><?= $ten_mau ?></td>
                <td><img src="../<?= $duong_dan_anh . $img_mau ?>" alt="" style="width: 80px;"></td>
                <td><?= $so_luong_mua ?></td>


                <!-- <td><a href="index.php?act=chi_tiet_dh&id_dh=<?= $id_donhang ?>">Chi tiết</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=edit_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td> -->

                
            </tr>
        <?php endforeach ?>
    </tbody>
</table>