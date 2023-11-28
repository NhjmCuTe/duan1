<h1 class="text-center">Thêm sản phẩm</h1>
<?php
if (isset(($thongbao)) && ($thongbao != "")) {
  echo '<div class="alert alert-success">' . $thongbao . '</div>';
}
?>
<form class="pt-9 px-9" action="index.php?act=them_sp" method="post">
  <div class="form-floating mb-3">
    <input name="ten_sp" type="text" class="form-control" id="floatingInput" placeholder="">
    <label for="floatingInput">Tên sản phẩm</label>
    <span class="text text-danger" style="display: contents;"><?php echo $tenErr ?></span>
  </div>
  <div class="form-floating mb-3">
    <input name="gia" type="text" class="form-control" id="floatingPassword" placeholder="">
    <label for="floatingPassword">Giá</label>
    <span class="text text-danger" style="display: contents;"><?php echo $giaErr ?></span>
  </div>
  <div class="form-floating mb-3">
    <textarea name="mo_ta" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height:150px"></textarea>
    <label for="floatingTextarea">Mô tả</label>
  </div>


  <div class="row">
    <div class="form-floating col-md mb-3">
      <select class="form-select" id="floatingSelect" aria-label="Floating label select example" onchange="loadSubcategories(this.value)">
        <option selected></option>
        <?php foreach ($danh_muc as $value) : extract($value) ?>
          <option value="<?= $id_danhmuc ?>"><?= $ten_danhmuc ?></option>
        <?php endforeach ?>
      </select>
      <label for="floatingSelect">Danh mục</label>
    </div>
    <div class="form-floating col-md">
      <select name="danh_muc_con" class="form-select" id="subcategorySelect" aria-label="Floating label select example">
      </select>
      <label for="floatingSelect">Danh mục con</label>
    </div>
  </div>

  <button name="them_san_pham" class="btn btn-primary" value="them">Thêm sản phẩm</button>
  <button type="reset" class="btn btn-danger">Reset</button>
</form>