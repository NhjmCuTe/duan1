<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
          <div class="card mb-0">
            <div class="card-body">
              <p class="text-center">Đăng Nhập</p>
              <?php
              if (isset(($thongbao)) && ($thongbao != "")) {
                echo '<div class="alert alert-danger">' .$thongbao. '</div>';
              }
              ?>
              <form action="index.php?act=dangnhap" method="post">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1">
                  <span class="text text-danger" style="display: contents;"><?php echo $userErr ?></span>
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                  <span class="text text-danger" style="display: contents;"><?php echo $passErr ?></span>
                </div>
                <input type="submit" name="dangnhap" value="Đăng nhập" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-4 mb-0 fw-bold">Bạn chưa có tài khoản?</p>
                  <a class="text-primary fw-bold ms-2" href="index.php?act=dangky">Tạo tài khoản mới</a>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>