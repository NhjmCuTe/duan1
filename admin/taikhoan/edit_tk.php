<h1 class="text-center">Cập nhật tài khoản người dùng</h1>

<form class="pt-9 px-9" action="index.php?act=edit_tk" method="post">
<?php extract($load_tk) ?>
    <div class="mb-3">
        <label for="exampleInputtext1" class="form-label">Tên</label>
        <input type="text" name="username" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" value="<?= $ten?>">
        <input type="hidden" name="id_tk" value="<?= $id_taikhoan ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $email ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" id="exampleInputEmail1" value="<?= $sdt ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="<?= $address ?>">
    </div>
    <div class="mb-4">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="<?= $pass ?>">
    </div>

    <input type="submit" name="edit_tk" value="Cập nhật tài khoản" class="btn btn-primary">
    <button type="reset" class="btn btn-danger">Reset</button>
</form>