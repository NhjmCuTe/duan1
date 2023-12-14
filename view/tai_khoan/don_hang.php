<div class="border don_hang">
    <div class="head">
        <h3 class="text-center">ĐƠN HÀNG</h3>
    </div>
    <div class="box_don_hang">

        <?php if (!empty($don_hang)) :
            foreach ($don_hang as $value) : extract($value);
                $mang_trang_thai = explode(',', $trang_thai); ?>
                <div class="box">
                    <div class="row">
                        <div class="col-4">Mã đơn hàng: </div><span class="col-8"><?= $id_donhang ?></span>
                    </div>
                    <div class="row">
                        <div class="col-4">Ngày đặt hàng: </div><span class="col-8"><?= $ngay_dat_hang ?></span>
                    </div>
                    <div class="row">
                        <div class="col-4">Số lượng:</div><span class="col-8"><?= $so_luong_mua ?></span>
                    </div>
                    <div class="row">
                        <div class="col-4">Tổng tiền: </div><span class="col-8 "><?= number_format($tong_tien, 0, '', '.') ?> đ</span>
                    </div>
                    <div class="row trang_thai">
                        <div class="col-9 "><span class="thong_bao"><?= end($mang_trang_thai) ?></span></div><span class="col-3"><a href="index.php?act=chi_tiet_dh&id_don_hang=<?= $id_donhang ?>">Chi tiết</a></span>
                    </div>
                </div>
            <?php endforeach;
        else : ?>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <i class="fa-regular fa-bag-shopping mb-3" style="font-size: 100px;"></i>
                <h3>Bạn không có đơn hàng</h3>
            </div>
        <?php endif ?>
    </div>
</div>





</div>
</div>
</div>