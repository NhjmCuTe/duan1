<div class="border don_hang">
    <div class="head">
        <h3 class="text-center">THÔNG TIN TÀI KHOẢN</h3>
    </div>
    <div class="box_don_hang">





        <form class="pt-9 px-9 needs-validation mb-4" novalidate action="index.php?act=tai_khoan" method="post">
            <input type="hidden" name="id_tk" value="<?= $_SESSION['user']['id_taikhoan'] ?>">

            <div class="mb-3">
                <div class="form-floating">
                    <input disabled type="text" class="form-control" placeholder="" required value="<?= $_SESSION['user']['ten'] ?>">
                    <input name="username" type="hidden" value="<?= $_SESSION['user']['ten'] ?>">
                    <label>Tên tài khoản</label>
                    <div class="invalid-feedback">
                        Vui lòng nhập tên tài khoản
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input name="email" type="email" class="form-control" placeholder="" required value="<?= $_SESSION['user']['email'] ?>">
                    <label>Email</label>
                    <div class="invalid-feedback">
                        Vui lòng nhập email
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input name="sdt" type="text" class="form-control" placeholder="" required value="<?= $_SESSION['user']['sdt'] ?>">
                    <label>Số điện thoại</label>
                    <div class="invalid-feedback">
                        Vui lòng nhập số điện thoại
                    </div>
                </div>
            </div>
            <!-- <div class="mb-3">
        <div class="form-floating">
            <input name="address" type="text" class="form-control" placeholder="" required value="<?= $_SESSION['user']['ten'] ?>">
            <label>Địa chỉ</label>
            <div class="invalid-feedback">
                Vui lòng nhập địa chỉ
            </div>
        </div>
    </div> -->
            <div class="mb-4">
                <div class="form-floating">
                    <input name="password" type="text" class="form-control" placeholder="" required>
                    <label>Password</label>
                    <div class="invalid-feedback">
                        Vui lòng nhập mật khẩu
                    </div>
                </div>
            </div>

            <button style="width: 100%;" type="submit" name="cap_nhat_tk" value="cn" class="btn btn-danger">Cập nhật tài khoản</button>
            <p class="text-primary mt-3"><?= isset($thong_bao_thanh_cong) ? $thong_bao_thanh_cong : '' ?></p>
        </form>


    </div>
</div>





</div>
</div>
</div>