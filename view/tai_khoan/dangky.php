<!-- Modal -->
<div class="modal fade " id="modal_dang_ky" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form class=" needs-validation form_dang_ki" novalidate>
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="text-center">Đăng ký</h1>




                    <div class="form-floating mb-3">
                        <input name="username" required type="text" class="form-control dk_username" id="floatingInput" placeholder="">
                        <label for="floatingInput">Tên tài khoản</label>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên tài khoản
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="sdt" required type="text" class="form-control dk_sdt" id="floatingInput" placeholder="">
                        <label for="floatingInput">Số điện thoại</label>
                        <div class="invalid-feedback">
                            Vui lòng nhập số điện thoại
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" required type="text" class="form-control dk_password" id="floatingInput" placeholder="">
                        <label for="floatingInput">Password</label>
                        <div class="invalid-feedback">
                            Vui lòng nhập mật khẩu
                        </div>
                    </div>
                    <input type="hidden" name="duong_dan_hien_tai" value="" class="duong_dan">

                </div>
                <div class="modal-footer">
                    <p class="text-danger text-center thong_bao_dk_sai" style="width: 100%;"></p>
                    <p class="text-primary text-center thong_bao_dk_dung" style="width: 100%;"></p>

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
<script>
    document.querySelector('.form_dang_ki').addEventListener('submit', function(event) {
        event.preventDefault();

        // Lấy giá trị từ form
        const username = document.querySelector('.dk_username').value;
        const password = document.querySelector('.dk_password').value;
        const sdt = document.querySelector('.dk_sdt').value;

        if (username.trim() === '' || password.trim() === '' || sdt.trim() === '') {
            return;
        }
        // Gửi yêu cầu đăng nhập
        dang_ki(username, password, sdt);
    });

    function dang_ki(username, password, sdt) {
        const loginUrl = './model/dang_ki.php';

        // Tạo đối tượng Request
        const dang_ki = new Request(loginUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}&sdt=${sdt}`,
        });

        // Gửi yêu cầu đăng nhập
        fetch(dang_ki)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {

                    // console.log('Đăng nhập thành công:', data.message);
                    // Xử lý sau khi đăng nhập thành công
                    document.querySelector('.thong_bao_dk_dung').innerHTML = `${data.message}`;
                    document.querySelector('.thong_bao_dk_sai').innerHTML = '';
                } else {
                    document.querySelector('.thong_bao_dk_sai').innerHTML = `${data.message}`;
                    document.querySelector('.thong_bao_dk_dung').innerHTML = '';
                    // console.error('Đăng nhập thất bại:', data.message);
                    // Hiển thị thông báo lỗi cho người dùng
                    // alert('Đăng nhập thất bại: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Đăng nhập thất bại hoặc có lỗi khác:', error);
            });
    }
</script>