<h1 class="text-center">Toàn bộ sản phẩm</h1>
<a href="index.php?act=them_sp">Thêm sản phẩm</a>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID Sản phẩm</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">giá</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Danh mục con</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($all_san_pham as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_sanpham ?></th>
                <td><?= $ten_sanpham ?></td>
                <td><?= $gia ?></td>
                <td><?= $mo_ta ?></td>
                <td><?= $ten_danhmuc ?></td>
                <td><?= $ten_danhmuc_con ?></td>
                <td><a href="index.php?act=chi_tiet_sp&id_sp=<?= $id_sanpham ?>" >Chi tiết</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=edit_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>