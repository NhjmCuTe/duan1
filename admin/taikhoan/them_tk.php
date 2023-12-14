<h1 class="text-center">Thêm tài khoản</h1>
<div class="quay_lai" style="font-size: 20px; margin-bottom: 20px; ">
<a href="index.php?act=ds_taikhoan" ><span><i class="fa-regular fa-left" style="margin-right: 10px;"></i>Quay lại</span></a>
</div>
<form class="pt-9 px-9 needs-validation" novalidate action="index.php?act=them_tk" method="post">
    <div class="mb-3">
        <div class="form-floating">
            <input name="username" type="text" class="form-control" placeholder="" required>
            <label>Tên tài khoản</label>
            <div class="invalid-feedback">
                Vui lòng nhập tên tài khoản
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <input name="email" type="email" class="form-control" placeholder="" required>
            <label>Email</label>
            <div class="invalid-feedback">
                Vui lòng nhập email
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <input name="sdt" type="text" class="form-control" placeholder="" required>
            <label>Số điện thoại</label>
            <div class="invalid-feedback">
                Vui lòng nhập số điện thoại
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <input name="address" type="text" class="form-control" placeholder="" required>
            <label>Địa chỉ</label>
            <div class="invalid-feedback">
                Vui lòng nhập địa chỉ
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="form-floating">
            <input name="password" type="text" class="form-control" placeholder="" required>
            <label>Password</label>
            <div class="invalid-feedback">
                Vui lòng nhập mật khẩu
            </div>
        </div>
    </div>
    <p class="text-danger text-start thong_bao_dk_sai" style="width: 100%;"><?= isset($thong_bao_dk)?$thong_bao_dk:'' ?></p>
    <input type="submit" name="them_tk" value="Thêm tài khoản" class="btn btn-primary">
    <button type="reset" class="btn btn-danger">Reset</button>
</form>