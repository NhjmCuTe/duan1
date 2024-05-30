<h1 class="text-center">Sửa sản phẩm</h1>
<?php
if (isset(($thongbao)) && ($thongbao != "")) {
  echo '<div class="alert alert-success">' . $thongbao . '</div>';
}
?>
<form class="pt-9 px-9" action="index.php?act=edit_san_pham" method="post">
    <?php extract($load_1_sp) ?>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled value="<?= isset($id_sanpham) ? $id_sanpham : '' ?>">
        <label for="floatingInputDisabled">ID sản phẩm</label>
        <input type="hidden" name="id_sp" value="<?= $id_sanpham ?>">
    </div>
    <div class="form-floating mb-3">
        <input name="ten_sp" type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $ten_sanpham ?>">
        <label for="floatingInputDisabled">Tên sản phẩm</label>
    <span class="text text-danger" style="display: contents;"><?php echo $tenErr ?></span>
    </div>
    <div class="form-floating mb-3">
        <input name="gia" type="text" class="form-control" id="floatingPassword" placeholder="" value="<?= $gia ?>">
        <label for="floatingPassword">Giá</label>
    <span class="text text-danger" style="display: contents;"><?php echo $giaErr ?></span>
    </div>
    <div class="form-floating mb-3">
        <textarea name="mo_ta" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height:150px"><?= $mo_ta ?></textarea>
        <label for="floatingTextarea">Mô tả</label>
    </div>


    <div class="row">
        <div class="form-floating col-md mb-3">
            <select class="form-select" name="id_danhmuc" id="exampleFormControlSelect1">
            <?php foreach ($danh_muc as $value) : extract($value) ?>
                    <option value="<?= $id_danhmuc ?>" <?= $id_danhmuc = $load_1_sp['id_danhmuc'] ? 'selected' : '' ?>><?= $ten_danhmuc ?></option>
                <?php endforeach ?>
            </select>
            <label for="floatingSelect">Danh mục</label>
        </div>
        <div class="form-floating col-md">
            <select name="danh_muc_con" class="form-select" id="subcategorySelect" aria-label="Floating label select example">
                <option value="<?= $danh_muc_con ?>" <?= $danh_muc_con = $load_1_sp['id_danhmuc_con'] ? 'selected' : '' ?>><?= $ten_danhmuc_con ?></option>
            </select>
            <label for="floatingSelect">Danh mục con</label>
        </div>
    </div>

    <input type="submit" name="edit_san_pham" class="btn btn-primary" value="sua">Sửa sản phẩm</button>
    <button type="reset" class="btn btn-danger">Reset</button>
</form>