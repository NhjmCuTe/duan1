<h1 class="text-center">Toàn bộ kích thước (<?= $sl_kt['sl_kt'] ?>)</h1>
<div class="hien_thi"><button class="btn btn-primary button">Thêm kích thước</button>
    <form class="pt-9 px-9 form needs-validation" novalidate style="display: none;" action="index.php?act=ds_kichthuoc" method="post">

        <div class="mb-3 row">
            <input type="hidden" name="id_mau" value="<?= $anh_theo_mau[0]['id_mau'] ?>" placeholder="123">

            <div class="row col-5">

                <div class="form-floating">
                    <input name="kich_thuoc" required type="text" class="form-control" id="floatingInput" placeholder="">
                    <label for="floatingInput">Tên kích thước</label>
                    <div class="invalid-feedback">
                        Vui lòng nhập tên kích thước
                    </div>
                </div>

            </div>
            <div class="col-7">
                <button name="them_kich_thuoc" class="btn btn-primary" style="height: 58px;" value="them_kt">Thêm kích thước</button>
            </div>
        </div>

    </form>
</div>

<?php if (isset($one_kich_thuoc)) {
    extract($one_kich_thuoc);
    include "edit_kich_thuoc.php";
} ?>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID kích thước</th>
            <th scope="col">Tên kích thước</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($all_kich_thuoc as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_kichthuoc ?></th>
                <td><?= $ten_kichthuoc ?></td>

                <!-- <td><a href="index.php?act=chi_tiet_sp&id_sp=<?= $id_sanpham ?>" >Chi tiết</a></td> -->
                <td><a href="index.php?act=ds_kichthuoc&id_kichthuoc_xoa=<?= $id_kichthuoc ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=ds_kichthuoc&id_kt_edit=<?= $id_kichthuoc ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>