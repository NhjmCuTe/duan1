<form id="form" class=" pt-9 px-9 " action="index.php?act=ds_kichthuoc" method="post">

    <div class="mb-3 row ">

        <div class="row mb-3 col-md-7">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Sửa kích thước</label>
            <div class="col-sm-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled value="<?= isset($id_kichthuoc) ? $id_kichthuoc : '' ?>">
                    <label for="floatingInputDisabled">ID kích thước</label>
                    <input type="hidden" name="id_kichthuoc" value="<?= $id_kichthuoc ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-floating">
                    <input name="ten_kt" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= isset($ten_kichthuoc) ? $ten_kichthuoc : '' ?>">
                    <label for="floatingInputDisabled">Tên kích thước</label>

                </div>
            </div>
        </div>
        <div class="col-md-5">
            <button name="edit_kich_thuoc" class="btn btn-primary" value="edit_kt" style="height: 58px;">Sửa kích thước</button>
        </div>
    </div>
</form>