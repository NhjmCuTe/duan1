<h1 class="text-center">Toàn bộ danh mục con</h1>
<button id="button" class="btn btn-primary">Thêm danh mục con</button>
<form id="form" class="pt-9 px-9 " style="display: none;" action="index.php?act=ds_danhmuc" method="post">

    <div class="mb-3 row">
        <input type="hidden" name="id_mau" value="<?= $anh_theo_mau[0]['id_mau'] ?>">
        <div class="row mb-3 col-md-8">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Thêm danh mục con</label>
            <div class="col-sm-9">
                <input name="danh_muc" class="form-control" type="text" >
            </div>
        </div>
        <div class="col-md-4">
            <button name="them_dm" class="btn btn-primary" value="them_kt">Thêm danh mục con</button>
        </div>
    </div>
</form>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID Danh mục con</th>
            <th scope="col">Danh mục con</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ds_danhmuc as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_danhmuc ?></th>
                <td><?= $ten_danhmuc ?></td>
                <td><a href="index.php?act=chi_tiet_sp&id_sp=<?= $id_sanpham ?>" >Chi tiết</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=edit_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>