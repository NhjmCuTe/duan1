<form id="form" class=" pt-9 px-9 needs-validation" novalidate action="index.php?act=ds_danhmuc" method="post">

    <div class="mb-3 row ">

        <div class="row mb-3 col-md-7">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Sửa danh mục</label>
            <div class="col-sm-4">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled value="<?= $id_danhmuc?>">
                    <label for="floatingInputDisabled">ID danh mục</label>
                    <input type="hidden" name="id_danhmuc" value="<?= $id_danhmuc ?>">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-floating">
                    <input name="ten_dm" type="text" class="form-control" required id="floatingInput" placeholder="name@example.com" value="<?= $ten_danhmuc ?>">
                    <label for="floatingInputDisabled">Tên danh mục</label>
                    <div class="invalid-feedback">
                        Vui lòng nhập tên danh mục
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <button name="edit_danhmuc" class="btn btn-primary" value="edit_dm" style="height: 58px;">Sửa danh mục</button>
        </div>
    </div>
</form>