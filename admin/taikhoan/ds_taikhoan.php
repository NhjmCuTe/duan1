<h1 class="text-center">Toàn bộ tài khoản</h1>
<a href="index.php?act=them_tk"><button class="btn btn-primary">Thêm tài khoản</button></a>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID tài khoản</th>
            <th scope="col">Tên tài khoản</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ds_taikhoan as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_taikhoan ?></th>
                <td><?= $ten ?></td>
                <td><?= $pass ?></td>
                <td><?= $email ?></td>
                <td><?= $sdt?></td>
                <td><?= $address ?></td>
                <td><a href="index.php?act=ds_taikhoan&id_tk_xoa=<?= $id_taikhoan ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=edit_tk&id_tk=<?= $id_taikhoan ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>