<header class="container-fluid py-4 px-5">
    <div class="row header justify-content-between">
        <div class="col-2 logo">
            <a href="index.php"><img src="./img/logo.png" alt=""></a>
        </div>
        <div class="col-2 tiep_tuc_mua">
            <a href="index.php">TIẾP TỤC MUA SẮM</a>

        </div>
    </div>
</header>
<div class="buoc py-4">
    <div class="buoc_1"><span class="so">1</span><span>Giỏ hàng</span></div>
    <div class="buoc_hien_tai"><span class="so">2</span><span>Đặt hàng</span></div>
    <div class="buoc_3"><span class="so">3</span><span>Hoàn tất</span></div>
</div>
<main class="thong_tin_giao_hang container">
    <div class="row">
        <div class="col-8">
            <div class="khung">
                <div class="ten_dau"><i class="fa-light fa-map-location-dot"></i>
                    <h1>Thông tin giao hàng</h1>
                </div>
                <form action="index.php?act=dat_hang&an" method="post">
                    <div class="form-floating mb-3">
                        <input name="ho_ten" type="text" class="form-control" id="floatingInput" placeholder="" value="<?= isset($_SESSION['user']['ten']) ? $_SESSION['user']['ten'] : '' ?>">
                        <label for="floatingInput">Họ tên:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="sdt" type="text" class="form-control" id="floatingInput" placeholder="" value="<?= isset($_SESSION['user']['sdt']) ? $_SESSION['user']['sdt'] : '' ?>">
                        <label for="floatingInput">Số điện thoại:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select diachi" id="city" aria-label="Floating label select example" data-target="tinh">
                            <!-- <option value=""></option> -->

                        </select>
                        <label for="floatingSelect ">Tỉnh / Thành phố:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select diachi" id="district" aria-label="Floating label select example" data-target="quan">
                            <!-- <option value=""></option> -->
                        </select>
                        <label for="floatingSelect">Quận / Huyện:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select diachi" id="ward" aria-label="Floating label select example" data-target="xa">
                            <!-- <option value=""></option> -->

                        </select>
                        <label for="floatingSelect">Phường / Xã:</label>
                    </div>
                    <input type="hidden" name="xa" id="xa">
                    <input type="hidden" name="quan" id="quan">
                    <input type="hidden" name="tinh" id="tinh">
                    <div class="form-floating mb-3">
                        <input name="chi_tiet" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Nhập địa chỉ:</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="ghi_chu" type="text" class="form-control" id="floatingInput" placeholder="">
                        <label for="floatingInput">Nhập ghi chú:</label>
                    </div>
                    <input type="hidden" name="tong_tien" value="">
            </div>
            <div class="thanh_toan khung">
                <div class="ten_dau"><i class="fa-regular fa-wallet"></i>
                    <h1>Phương thức thanh toán</h1>
                </div>
                <label>
                    <input type="radio" name="cach_thanh_toan" value="cod" checked><img src="<?= $duong_dan_anh ?>cod.png" alt="">Thanh toán khi nhận hàng (COD)
                </label>
                <label>
                    <input type="radio" name="cach_thanh_toan" value="vnpay"><img src="<?= $duong_dan_anh ?>vnpay.png" alt="">Thanh toán bằng VNPAY
                </label>

            </div>
            <div class="san_pham_thanh_toan khung">
                <div class="ten_dau"><i class="fa-regular fa-bag-shopping"></i>
                    <h1>Sản phẩm</h1>
                </div>
                <?php foreach ($_SESSION['gio_hang'] as $sp) : extract($sp) ?>
                    <div class="row box">
                        <div class="col-2 anh">
                            <a href="index.php?act=chitiet_sp&id_sp= <?= $id_sp ?>  "><img src="<?= $ten_img ?> " alt="" /></a>
                        </div>
                        <div class="col-4 info">
                            <a href="index.php?act=chitiet_sp&id_sp=<?= $id_sp ?>">
                                <p><?= $ten_sp ?></p>
                            </a>
                            <div class="thong_tin">
                                <div class="mau">
                                    <img src="<?= $ten_img ?>" alt="" />
                                </div>
                                <span><?= $ten_mau ?></span>|<span><?= $kt ?></span>
                            </div>
                        </div>
                        <div class="col-3 price" data-gia="<?= $gia ?>"></div>
                        <div class="col-3">Số lượng: <span class="sl"><?= $sl ?></span></div>

                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-4">
            <div class="khung">
                <div class="ten_dau tong_tien"><span>Tổng tiền thanh toán:</span> <span class="gia price"></span></div>
                <div class="mua">
                    <button name="thanh_toan" value="thanh_toan">Thanh toán</button></a>
                </div>
            </div>
        </div>
        </form>
</main>

<script src="js/dat_hang.js"></script>
<script>
    var dia_chi = document.querySelectorAll(".diachi");

    // Lắng nghe sự kiện thay đổi trên từng trường select
    dia_chi.forEach(function(selectElement) {
        selectElement.addEventListener("change", function() {
            var selectedIndex = selectElement.selectedIndex;
            var selectedOption = selectElement.options[selectedIndex];
            var selectedValue = selectedOption.text;

            // Lấy thuộc tính data-target của trường select để xác định input hidden tương ứng
            var targetId = selectElement.getAttribute("data-target");
            var hiddenInput = document.getElementById(targetId);

            // Cập nhật giá trị của input hidden
            hiddenInput.value = selectedValue;
            console.log(hiddenInput.value);
        });
    });
</script>