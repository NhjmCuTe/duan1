
<?php extract($load_tk) ?>
<h1 class="text-center">Cập nhật tài khoản người dùng</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="index.php?act=ds_taikhoan" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<form class="pt-9 px-9 needs-validation" novalidate action="index.php?act=edit_tk" method="post">
<input type="hidden" name="id_tk" value="<?= $id_taikhoan ?>">

    <div class="mb-3">
        <div class="form-floating">
            <input name="username" type="text" class="form-control" placeholder="" required value="<?= $ten?>">
            <label>Tên tài khoản</label>
            <div class="invalid-feedback">
                Vui lòng nhập tên tài khoản
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <input name="email" type="email" class="form-control" placeholder="" required value="<?= $email ?>">
            <label>Email</label>
            <div class="invalid-feedback">
                Vui lòng nhập email
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <input name="sdt" type="text" class="form-control" placeholder="" required value="<?= $sdt ?>">
            <label>Số điện thoại</label>
            <div class="invalid-feedback">
                Vui lòng nhập số điện thoại
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <input name="address" type="text" class="form-control" placeholder="" required value="<?= $address ?>">
            <label>Địa chỉ</label>
            <div class="invalid-feedback">
                Vui lòng nhập địa chỉ
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="form-floating">
            <input name="password" type="text" class="form-control" placeholder="" required value="<?= $pass ?>">
            <label>Password</label>
            <div class="invalid-feedback">
                Vui lòng nhập mật khẩu
            </div>
        </div>
    </div>

    <input type="submit" name="edit_tk" value="Cập nhật tài khoản" class="btn btn-primary">
    <button type="reset" class="btn btn-danger">Reset</button>
</form>