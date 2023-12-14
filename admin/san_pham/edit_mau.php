<form id="form" class=" pt-9 px-9 needs-validation" novalidate action="index.php?act=chi_tiet_sp&id_sp=<?= $id_sp_dang_xem ?>" method="post" enctype="multipart/form-data">

    <div class="mb-3 row ">


        <label for="inputEmail3" class="col-2 col-form-label">Sửa màu sắc</label>
        <div class="col-2">
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled value="<?= $load_1_mau['id_mau'] ?>">
                <label for="floatingInputDisabled">ID màu sắc</label>
                <input type="hidden" name="id_mau" value="<?= $load_1_mau['id_mau'] ?>">
            </div>
        </div>
        <div class="col-2">

            <input style="height: 58px;" name="img_mau" class="form-control" type="file" id="formFileMultiple" multiple>

        </div>
        <div class="col-2" style="width: 100px;">
            <img src="<?= '../' . $duong_dan_anh . $load_1_mau['img_mau'] ?>" alt="" width="100%">
        </div>
        <div class="col-2">
            <div class="form-floating">
                <input name="ten_mau" required type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $load_1_mau['ten_mau'] ?>">
                <label for="floatingInputDisabled">Tên màu</label>
                <div class="invalid-feedback">
                    Vui lòng nhập tên màu sắc
                </div>
            </div>
        </div>


        <button name="edit_mau" class="btn btn-primary col-2" value="edit_mau" style="height: 58px;">Sửa kích thước</button>

    </div>
</form>