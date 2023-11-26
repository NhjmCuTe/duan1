<!-- Modal -->
<div class="modal fade " id="modal_dang_nhap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center"> <img src="img\account-login.png" alt="" style="width: 180px;"></div>

                <h2> Xin chào,</h2>
                Đăng nhập tài khoản Dmen

                <form action="index.php?act=dangnhap" method="post">
                    <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Tên tài khoản</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Mật khẩu</label>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="mua" style="width: 100%;">
                    <button id="mua" name="dangnhap" value="dn">Đăng nhập</button>
                    </form>
                    <div class="text-center dang_ky" data-bs-toggle="modal" data-bs-target="#modal_dang_ky" data-bs-dismiss="modal">Đăng ký</div>
                    * Khi ấn đăng nhập, bạn xác nhận đã đọc và đồng ý với Điều khoản dịch vụ cùng Chính sách bảo mật của Dmen.
                </div>
            </div>
        </div>
    </div>
</div>