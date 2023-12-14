<?php
extract($thong_tin_dh);
$mang_trang_thai = explode(',', $trang_thai);
$mang_time = explode(',', $thoi_gian);  ?>

<div class="chi_tiet_dh">
    <div class="head_2 d-flex align-items-center justify-content-between "><span class="quay_lai"><i class="fa-regular fa-left"></i>Quay lại</span>
        <?php if ((stripos(end($mang_trang_thai), 'hủy') === false) && (stripos(end($mang_trang_thai), 'xác nhận') != false)) : ?>
            <a href="index.php?act=chi_tiet_dh&id_don_hang=<?= $id_donhang ?>&huy_dh=<?= $id_donhang ?>" onclick="return confirm('bạn có muốn hủy đơn hàng không?')"><button class="huy">Hủy đơn hàng</button></a>
        <?php elseif (stripos(end($mang_trang_thai), 'Đã giao') !== false) : ?>
            <a href="index.php?act=chi_tiet_dh&id_don_hang=<?= $id_donhang ?>&nhan_dh=<?= $id_donhang ?>" onclick="return confirm('bạn xác nhận đã nhận hàng?')"><button class="nhan">Đã nhận hàng</button></a>
        <?php endif ?>

    </div>
    <div class="">
        <h4 class="chi_tiet">Chi tiết đơn hàng</h4>
    </div>
    <div>
        <div class="box">
            <div class="row">
                <div class="col-4">Mã đơn hàng: </div><span class="col-4"><?= $id_donhang ?></span>
                <span class="col-4 theo_doi_dh" data-bs-custom-class="custom_thong_bao" data-bs-html="true" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content='<div class="theo_doi_dh">   <?php foreach (array_map(null, $mang_time, $mang_trang_thai) as [$tg, $tt]) : ?>
                    <div class="mb-2 row icon">
                        <span class="col-5"><?= $tg ?></span><i class="fa-sharp fa-regular fa-box-check col-1 xanh" style="font-size: 30px;"></i><span class="col-6"><?= $tt ?> <br></span>
                    </div>
                <?php endforeach ?>   </div>'>Theo dõi đơn hàng</span>

            </div>
            <div class="row">
                <div class="col-4">Ngày đặt hàng: </div><span class="col-8"><?= $ngay_dat_hang ?></span>
            </div>
            <div class="row">
                <div class="col-4">Người nhận:</div><span class="col-8"><?= $ten_khachhang ?></span>
            </div>
            <div class="row">
                <div class="col-4">Số điện thoại: </div><span class="col-8 "><?= $sdt ?></span>
            </div>
            <div class="row">
                <div class="col-4">Địa chỉ: </div><span class="col-8 "><?= $dia_chi ?></span>
            </div>
            <div class="row">
                <div class="col-4">Thanh toán: </div><span class="col-8 "><?= $cach_thanh_toan ?></span>
            </div>
            <div class="row">
                <div class="col-4">Trạng thái: </div><span class="col-8 "><span class="thong_bao"><?= end($mang_trang_thai) ?></span></span>
            </div>
        </div>
        <div>
            <div class="d-flex sp">
                <h5>Sản phẩm: </h5><span>(<?= $so_luong_mua ?>)</span>
            </div>
            <div>
                <?php foreach ($thong_tin_sp as $value) : extract($value) ?>
                    <div class="row box">
                        <div class="col-2 anh">
                            <a href="index.php?act=chitiet_sp&id_sp= <?= $id_sanpham ?>"><img src=" <?= $duong_dan_anh . $img_mau ?> " alt="" /></a>
                        </div>
                        <div class="col-4 info">
                            <a href="index.php?act=chitiet_sp&id_sp=<?= $id_sanpham ?>">
                                <p><?= $ten_sanpham ?></p>
                            </a>
                            <div class="thong_tin">
                                <div class="mau">
                                    <img src="<?= $duong_dan_anh . $img_mau ?>" alt="" />
                                </div>
                                <span><?= $ten_mau ?></span>|<span><?= $kich_thuoc ?></span>
                            </div>
                        </div>
                        <div class="col-3 price" data-gia=""><?= number_format($gia * $so_luong_mua, 0, ',', '.')  ?> đ</div>
                        <div class="col-3">Số lượng: <span class="sl"> <?= $so_luong_mua ?></span></div>

                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-4 tong_tien">
            <div class="me-3">Tổng tiền thanh toán:</div><span><?= number_format($tong_tien, 0, ',', '.') ?> đ</span>
        </div>
    </div>
</div>



</div>
</div>
</div>
<script>
    document.querySelector('.quay_lai').addEventListener('click', function() {
        window.location.href = 'index.php?act=theo_doi_dh';
    });
    const trang_thai = document.querySelector('.thong_tin_tai_khoan .chi_tiet_dh .thong_bao');
    if (trang_thai.innerText.includes('hủy')) {
        trang_thai.classList.remove('thong_bao');
        trang_thai.classList.add('da_huy');
    }

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    var dh = document.querySelector('span.theo_doi_dh');
    console.log(dh);
    dh.addEventListener('click', () => {
        dh.classList.toggle('bam');
    })
    
</script>