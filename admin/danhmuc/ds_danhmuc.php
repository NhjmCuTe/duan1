<h1 class="text-center">Toàn bộ danh mục (<?= $sl_dm['sl_dm'] ?>)</h1>
<div class="hien_thi"><button class="btn btn-primary button">Thêm danh mục</button>
    <form class="pt-9 px-9 form needs-validation" novalidate style="display: none;" action="index.php?act=ds_danhmuc" method="post">

        <div class="mb-3 row">
            <div class="row mb-3 col-md-4">

                <div class="form-floating">
                    <input name="danh_muc" type="text" class="form-control" placeholder="" required>
                    <label>Tên danh mục</label>
                    <div class="invalid-feedback">
                        Vui lòng nhập tên danh mục
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button name="them_dm" class="btn btn-primary" value="them_kt" style="height: 58px;">Thêm danh mục</button>
            </div>
        </div>
    </form>
</div>
<?php if (isset($one_danhmuc)) {
    extract($one_danhmuc);
    include "edit_danhmuc.php";
} ?>
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
                <td><a href="index.php?act=ds_danhmuc_con&id_danhmuc=<?= $id_danhmuc ?>">Chi tiết</a></td>
                <td><a href="index.php?act=ds_danhmuc&id_danhmuc_xoa=<?= $id_danhmuc ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=ds_danhmuc&id_danhmuc_sua=<?= $id_danhmuc ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>