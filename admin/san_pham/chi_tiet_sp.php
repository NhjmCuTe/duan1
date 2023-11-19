<h1 class="text-center">Chi tiết sản phẩm</h1>

<button id="button" class=" btn btn-primary">Thêm kích thước</button>
<form id="form" class=" pt-9 px-9 " style="display: none;" action="index.php?act=chi_tiet_sp&id_sp=<?= $mau_sp[0]['id_sanpham'][0] ?>&them_anh" method="post">

    <div class="mb-3 row">
        <input type="hidden" name="id_mau" value="<?= $anh_theo_mau[0]['id_mau'] ?>">
        <div class="row mb-3 col-md-8">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Kích thước có sẵn</label>
            <div class="col-sm-9">
                <select class="form-select" aria-label="Small select example" name="kich_thuoc">
                    <option selected></option>
                    <?php foreach ($all_size as $value) : extract($value) ?>
                        <option value="<?= $id_kichthuoc ?>"><?= $ten_kichthuoc ?></option>
                    <?php endforeach ?>

                </select>
            </div>
        </div>
        <div class="col-md-4">
            <button name="them_size" class="btn btn-primary" value="them_size">Thêm kích thước</button>
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
        <?php 
        foreach ($size_sp as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_kichthuoc ?></th>
                <th scope="row"><?= $ten_kichthuoc ?></th>


                <td><a href="index.php?act=chi_tiet_sp&id_sp=<?= $mau_sp[0]['id_sanpham'][0]?>&id_kichthuoc=<?=$id_kichthuoc?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <!-- <td><a href="index.php?act=ds_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td> -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID màu</th>
            <th scope="col">Tên màu</th>
            <th scope="col">Ảnh màu</th>

            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mau_sp as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_mau ?></th>
                <th scope="row"><?= $ten_mau ?></th>
                <th scope="row"><img src="../<?= $duong_dan_anh . $img_mau ?>" alt="" width="80px"></th>


                <td><a href="index.php?act=anh_theo_mau&id_mau=<?= $id_mau ?>">Chi tiết</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp_xoa=<?= $id_sanpham ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <td><a href="index.php?act=ds_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>