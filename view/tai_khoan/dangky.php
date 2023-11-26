<!-- Modal -->
<div class="modal fade " id="modal_dang_ky" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form action="index.php?act=dangky" method="post">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="text-center">Đăng ký</h1>

                   


                    <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Tên tài khoản</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="sdt" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Số điện thoại</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Password</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="mua" style="width: 100%;">
                        <button id="mua" name="dangky" value="Đăng ký">Đăng ký</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center" style="width: 100%;">
                        <p class="fs-4 mb-0 fw-bold me-1">Đã có tài khoản?</p>
                        <div data-bs-toggle="modal" data-bs-target="#modal_dang_nhap" data-bs-dismiss="modal" class="dang_ky">Đăng nhập</div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>