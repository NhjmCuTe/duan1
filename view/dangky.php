<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <p class="text-center">Đăng ký</p>
                            <form action="index.php?act=dangky" method="post">
                                <div class="alert alert-success"><?php if (isset(($thongbao)) && ($thongbao != "")) {
                                                                        echo $thongbao;
                                                                    } ?></div>

                                <div class="mb-3">
                                    <label for="exampleInputtext1" class="form-label">Tên</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputtext1" aria-describedby="textHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <input type="submit" name="dangky" value="Đăng ký" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Đã có tài khoản?</p>
                                    <a class="text-primary fw-bold ms-2" href="index.php?act=dangnhap">Đăng nhập</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>