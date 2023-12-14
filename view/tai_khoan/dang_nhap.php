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

                <form class="needs-validation form_dang_nhap" novalidate>
                    <div class="form-floating mb-3">
                        <input name="username" required type="text" class="form-control dn_username" id="floatingInput" placeholder="">
                        <label for="floatingInput">Tên tài khoản</label>
                        <div class="invalid-feedback">
                            Vui lòng nhập tên tài khoản
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="password" required type="text" class="form-control dn_password" id="floatingInput" placeholder="">
                        <label for="floatingInput">Mật khẩu</label>
                        <div class="invalid-feedback">
                            Vui lòng nhập mật khẩu
                        </div>
                    </div>
                    <input type="hidden" name="duong_dan_hien_tai" value="" class="duong_dan">
            </div>
            <div class="modal-footer">
                <p class="text-danger text-center thong_bao_dn" style="width: 100%;"></p>
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
<script>
    document.querySelector('.form_dang_nhap').addEventListener('submit', function(event) {
        event.preventDefault();

        // Lấy giá trị từ form
        const username = document.querySelector('.dn_username').value;
        const password = document.querySelector('.dn_password').value;

        if (username.trim() === '' || password.trim() === '') {
            return;
        }
        // Gửi yêu cầu đăng nhập
        login(username, password);
    });

    function login(username, password) {
        const loginUrl = './model/dang_nhap.php';

        // Tạo đối tượng Request
        const loginRequest = new Request(loginUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`,
        });

        // Gửi yêu cầu đăng nhập
        fetch(loginRequest)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    location.reload();
                    // console.log('Đăng nhập thành công:', data.message);
                    // Xử lý sau khi đăng nhập thành công
                } else {
                    document.querySelector('.thong_bao_dn').innerHTML = `${data.message}`;
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