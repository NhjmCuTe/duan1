<h1 class="text-center">Toàn bộ đơn hàng</h1>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID Đơn hàng</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Cách thanh toán</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Trạng thái</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ds_donhang as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_donhang ?></th>
                <td><?= $so_luong_mua ?></td>
                <td><?= $tong_tien ?></td>
                <td><?= $ten_khachhang ?></td>
                <td><?= $dia_chi ?></td>
                <td><?= $sdt ?></td>
                <td><?= $cach_thanh_toan ?></td>
                <td><?= $ghi_chu ?></td>
                <td><?= $trang_thai ?></td>
                <td><a href="index.php?act=chi_tiet_sp&id_sp=<?= $id_sanpham ?>" >Chi tiết</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=edit_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>