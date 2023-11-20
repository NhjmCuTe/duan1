<h1 class="text-center">Toàn bộ danh mục</h1>
<div class="hien_thi"><button class="btn btn-primary button">Thêm danh mục</button>
    <form  class="pt-9 px-9 form" style="display: none;" action="index.php?act=ds_danhmuc" method="post">

        <div class="mb-3 row">
            <input type="hidden" name="id_mau" value="<?= $anh_theo_mau[0]['id_mau'] ?>">
            <div class="row mb-3 col-md-8">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Thêm danh mục</label>
                <div class="col-sm-9">
                    <input name="danh_muc" class="form-control" type="text">
                </div>
            </div>
            <div class="col-md-4">
                <button name="them_dm" class="btn btn-primary" value="them_kt">Thêm danh mục</button>
            </div>
        </div>
    </form>
</div>

<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID Danh mục</th>
            <th scope="col">Danh mục</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ds_danhmuc as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_danhmuc ?></th>
                <td><?= $ten_danhmuc ?></td>
                <td><a href="index.php?act=ds_danhmuc_con&id_sp=<?= $id_sanpham ?>">Chi tiết</a></td>
                <td><a href="index.php?act=ds_danhmuc&id_danhmuc_xoa=<?= $id_danhmuc ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=edit_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>