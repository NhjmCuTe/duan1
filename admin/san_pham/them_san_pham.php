<h1 class="text-center">Thêm sản phẩm</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="index.php?act=ds_san_pham" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<form class="pt-9 px-9 needs-validation" novalidate action="index.php?act=them_sp" method="post">
  <div class="form-floating mb-3">
    <input name="ten_sp" type="text" required class="form-control" id="floatingInput" placeholder="">
    <label for="floatingInput">Tên sản phẩm</label>
    <div class="invalid-feedback">
      Vui lòng nhập tên sản phẩm
    </div>
  </div>
  <div class="form-floating mb-3">
    <input name="gia" type="text" required class="form-control" id="floatingPassword" placeholder="">
    <label for="floatingPassword">Giá</label>
    <div class="invalid-feedback">
      Vui lòng nhập giá
    </div>
  </div>
  <div class="form-floating mb-3">
    <textarea name="mo_ta" class="form-control" required placeholder="Leave a comment here" id="floatingTextarea" style="height:150px"></textarea>
    <label for="floatingTextarea">Mô tả</label>

    <div class="invalid-feedback">
      Vui lòng nhập mô tả
    </div>
  </div>


  <div class="row">
    <div class="form-floating col-md mb-3">
      <select class="form-select" required id="floatingSelect" aria-label="Floating label select example" onchange="loadSubcategories(this.value)">
        <option selected></option>
        <?php foreach ($danh_muc as $value) : extract($value) ?>
          <option value="<?= $id_danhmuc ?>"><?= $ten_danhmuc ?></option>
        <?php endforeach ?>
      </select>
      <div class="invalid-feedback">
        Vui lòng chọn danh mục
      </div>
      <label for="floatingSelect">Danh mục</label>
    </div>
    <div class="form-floating col-md">
      <select name="danh_muc_con" required class="form-select" id="subcategorySelect" aria-label="Floating label select example">
      </select>
      <div class="invalid-feedback">
        Vui lòng chọn danh mục con
      </div>
      <label for="floatingSelect">Danh mục con</label>
    </div>
  </div>

  <button name="them_san_pham" class="btn btn-primary" value="them">Thêm sản phẩm</button>
  <button type="reset" class="btn btn-danger">Reset</button>
</form>