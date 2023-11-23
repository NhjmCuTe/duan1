<h1 class="text-center">Ảnh sản phẩm</h1>
<button id="button" class="btn btn-primary">Thêm ảnh</button>
<form id="form" class="pt-9 px-9 " style="display: none;" action="index.php?act=anh_theo_mau&id_mau=<?= $anh_theo_mau[0]['id_mau'] ?>&them_anh" method="post" enctype="multipart/form-data">

    <div class="mb-3 row">
        <input type="hidden" name="id_mau" value="<?= $anh_theo_mau[0]['id_mau'] ?>">
        <div class="row mb-3 col-md-8">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Thêm ảnh</label>
            <div class="col-sm-10">
                <input name="img" class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
        </div>
        <div class="col-md-4">
            <button name="them_anh" class="btn btn-primary" value="them_anh">Thêm ảnh</button>
        </div>
    </div>
</form>

<table class="table bang table-hover">
    <thead>
        <tr>
            <th scope="col">ID ảnh</th>
            <th scope="col">Ảnh sản phẩm</th>


            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($anh_theo_mau as $value) : extract($value) ?>
            <tr>
                <th scope="row"><?= $id_anh ?></th>
                <th scope="row"><img src="../<?= $duong_dan_anh . $img_anh ?>" alt="" width="80px"></th>


                <td><a href="index.php?act=anh_theo_mau&id_mau=<?= $anh_theo_mau[0]['id_mau'] ?>&id_anh_xoa=<?=$id_anh ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <!-- <td><a href="index.php?act=ds_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td> -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>