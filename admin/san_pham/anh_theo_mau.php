<h1 class="text-center">Ảnh sản phẩm</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="index.php?act=chi_tiet_sp&id_sp=<?= $id_sp ?>" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<div class="hien_thi"><button class="btn btn-primary button">Thêm ảnh</button>
    <form class="pt-9 px-9 form needs-validation" novalidate style="display: none;" action="index.php?act=anh_theo_mau&id_mau=<?= $id_mau_dang_xem ?>&them_anh&id_sp=<?= $id_sp ?>" method="post" enctype="multipart/form-data">

        <div class="mb-3 row">
            <input type="hidden" name="id_mau" value="<?= $id_mau_dang_xem ?>">
            <div class="row mb-3 col-md-6">
                <label for="inputEmail3" class="col-sm-3 col-form-label">Thêm ảnh</label>
                <div class="col-sm-9">
                    <input name="img" required class="form-control" type="file" id="formFileMultiple" multiple >
                    <div class="invalid-feedback">
                        Vui lòng thêm ảnh
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <button name="them_anh" class="btn btn-primary" value="them_anh">Thêm ảnh</button>
            </div>
        </div>
    </form>
</div>


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


                <td><a href="index.php?act=anh_theo_mau&id_mau=<?= $id_mau_dang_xem ?>&id_anh_xoa=<?= $id_anh ?>&id_sp=<?= $id_sp ?>" onclick="return confirm('bạn có chắc là muốn xóa')">Xóa</a></td>
                <!-- <td><a href="index.php?act=ds_san_pham&id_sp=<?= $id_sanpham ?>">Sửa</a></td> -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>