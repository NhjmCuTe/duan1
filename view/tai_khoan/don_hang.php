<div class="container thong_tin_tai_khoan mt-5">
    <div class="row">
        <div class="col-5">
            <div class="header">
                <div class="head">
                    <h3 class="text-center">XIN CHÀO BẠN</h3>
                </div>
                <div class="menu">
                    <ul class="row">
                        <a href="index.php?act=theo_doi_dh">
                            <li><i class="fa-regular fa-bag-shopping col-2"></i><span class="col-10">Đơn hàng</span></li>
                        </a>
                        <a href="index.php?act=dangxuat">
                            <li><i class="fa-regular fa-right-from-bracket col-2"></i><span class="col-10">Đăng xuất</span></li>
                        </a>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-7 ">
            <div class="border don_hang">
                <div class="head">
                    <h3 class="text-center">ĐƠN HÀNG</h3>
                </div>
                <div class="box_don_hang">
                    <?php foreach ($don_hang as $value) : extract($value);$mang_trang_thai = explode(',', $trang_thai); ?>
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
                                <div class="col-4">Tổng tiền: </div><span class="col-8 "><?=number_format($tong_tien,0,'','.')?> đ</span>
                            </div>
                            <div class="row trang_thai">
                                <div class="col-9 "><span class="thong_bao"><?=  end($mang_trang_thai) ?></span></div><span class="col-3"><a href="<?= $id_donhang ?>">Chi tiết</a></span>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>