<h1 class="text-center">Toàn bộ danh mục con</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="index.php?act=ds_danhmuc" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<div class="hien_thi"><button class="btn btn-primary button">Thêm danh mục con</button>
    <form class="pt-9 px-9 form needs-validation" novalidate style="display: none;" action="index.php?act=ds_danhmuc_con&id_danhmuc=<?= $danh_muc_hien_tai ?>" method="post">

        <div class="mb-3 row">
            <div class="row mb-3 col-md-4">

                <div class="form-floating">
                    <input name="danh_muc_con" type="text" required class="form-control them_dm" id="floatingInput" placeholder="">
                    <label for="floatingInput">Tên danh mục con</label>
                    <input type="hidden" name="id_danhmuc" value="<?= $danh_muc_hien_tai ?>">
                    <div class="invalid-feedback">
                        Vui lòng nhập tên danh mục con
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button name="them_dm_con" class="btn btn-primary" value="them_dm_con" style="height: 58px;">Thêm danh mục con</button>
            </div>
        </div>
    </form>
</div>
<?php if (isset($one_danhmuc_con)) {
    extract($one_danhmuc_con);
    include "edit_danhmuc_con.php";
} ?>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID Danh mục con</th>
            <th scope="col">Danh mục con</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ds_danh_muc_con as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_danhmuc_con ?></th>
                <td><?= $ten_danhmuc_con ?></td>
                <!-- <td><a href="index.php?act=ds_danhmuc_con&id_danhmuc_con=<?= $id_danhmuc ?>">Chi tiết</a></td> -->
                <td><a href="index.php?act=ds_danhmuc_con&id_danhmuc=<?= $danh_muc_hien_tai ?>&id_dm_con_xoa=<?= $id_danhmuc_con ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=ds_danhmuc_con&id_danhmuc=<?= $danh_muc_hien_tai ?>&id_dm_con_sua=<?= $id_danhmuc_con ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>