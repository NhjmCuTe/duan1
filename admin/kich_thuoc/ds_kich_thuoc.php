<h1 class="text-center">Toàn bộ kích thước</h1>
<button id="button" class="btn btn-primary">Thêm kích thước</button>
<form id="form" class="pt-9 px-9 " style="display: none;" action="index.php?act=ds_kichthuoc" method="post">

    <div class="mb-3 row">
        <input type="hidden" name="id_mau" value="<?= $anh_theo_mau[0]['id_mau'] ?>">
        <div class="row mb-3 col-md-8">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Thêm kích thước</label>
            <div class="col-sm-9">
                <input name="kich_thuoc" class="form-control" type="text" >
            </div>
        </div>
        <div class="col-md-4">
            <button name="them_kich_thuoc" class="btn btn-primary" value="them_kt">Thêm kích thước</button>
        </div>
    </div>
</form>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID kích thước</th>
            <th scope="col">Tên kích thước</th>
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
                <td><a href="index.php?act=edit_san_pham&id_sp=<?= $id_kichthuoc ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>