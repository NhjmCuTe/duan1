<form id="form" class=" pt-9 px-9 " action="index.php?act=ds_danhmuc_con&id_danhmuc=<?= $danh_muc_hien_tai ?>" method="post">

    <div class="mb-3 row ">

        <div class="row mb-3 col-md-7">
            <label for="inputEmail3" class="col-sm-4 col-form-label">Sửa danh mục con</label>
            <div class="col-sm-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled value="<?= $id_danhmuc_con ?>">
                    <label for="floatingInputDisabled">ID danh mục</label>
                    <input type="hidden" name="id_danhmuc_con" value="<?= $id_danhmuc_con ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-floating">
                    <input name="ten_dm_con" type="text" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $ten_danhmuc_con ?>">
                    <label for="floatingInputDisabled">Tên danh mục con</label>

                </div>
            </div>
        </div>
        <div class="col-md-5">
            <button name="edit_danhmuc_con" class="btn btn-primary" value="edit_dm_con" style="height: 58px;">Sửa danh mục con</button>
        </div>
    </div>
</form>