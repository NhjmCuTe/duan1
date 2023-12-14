<h1 class="text-center">Sửa sản phẩm</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="index.php?act=ds_san_pham" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<form class="pt-9 px-9 needs-validation" novalidate action="index.php?act=edit_san_pham" method="post">
  <?php extract($load_1_sp) ?>

  <div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInputDisabled" placeholder="name@example.com" disabled value="<?= isset($id_sanpham) ? $id_sanpham : '' ?>">
    <label for="floatingInputDisabled">ID sản phẩm</label>
    <input type="hidden" name="id_sp" value="<?= $id_sanpham ?>">
  </div>
  <div class="form-floating mb-3">
    <input name="ten_sp" required type="text" class="form-control" id="floatingInputDisabled" placeholder="" value="<?= $ten_sanpham ?>">
    <label for="floatingInputDisabled">Tên sản phẩm</label>
    <div class="invalid-feedback">
      Vui lòng nhập tên sản phẩm
    </div>
  </div>
  <div class="form-floating mb-3">
    <input name="gia" type="text" required class="form-control" id="floatingPassword" placeholder="" value="<?= $gia ?>">
    <label for="floatingPassword">Giá</label>
    <div class="invalid-feedback">
      Vui lòng nhập giá
    </div>
  </div>
  <div class="form-floating mb-3">
    <textarea name="mo_ta" required class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height:150px"><?= $mo_ta ?></textarea>
    <label for="floatingTextarea">Mô tả</label><div class="invalid-feedback">
      Vui lòng nhập mô tả
    </div>
  </div>



  <div class="row">
    <div class="form-floating col-md mb-3">
      <select class="form-select" required id="floatingSelect" aria-label="Floating label select example" onchange="loadSubcategories(this.value)">
        <option selected></option>
        <?php foreach ($danh_muc as $value) : extract($value) ?>
          <option value="<?= $id_danhmuc ?>" <?= $id_danhmuc == $load_1_sp['id_danhmuc'] ? 'selected' : '' ?>><?= $ten_danhmuc ?></option>
        <?php endforeach ?>
      </select><div class="invalid-feedback">
        Vui lòng chọn danh mục
      </div>
      <label for="floatingSelect">Danh mục</label>
    </div>
    <div class="form-floating col-md">
      <select name="danh_muc_con" required class="form-select" id="subcategorySelect" aria-label="Floating label select example">
      </select><div class="invalid-feedback">
        Vui lòng chọn danh mục con
      </div>
      <label for="floatingSelect">Danh mục con</label>
    </div>
  </div>



  <button type="submit" name="edit_san_pham" class="btn btn-primary" value="sua" >Sửa sản phẩm</button>
  <button type="reset" class="btn btn-danger">Reset</button>
</form>