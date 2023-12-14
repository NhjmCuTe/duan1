<div class="thong_bao_dat_hang d-flex flex-column align-items-center mt-3">
    <div class="d-flex align-items-center flex-column">
        <img src="img/7518748.png" alt="" style="width: 80px;">
        <h1>Đặt hàng thành công</h1>
        <p>Cảm ơn bạn đã mua sắm tại Dmen</p>
    </div>
    <div class="thong_tin">
        <div class="tieu_de">
            <h2 class="text-center">Thông tin đơn hàng</h2>
        </div>
        <div class="row p-9 chi_tiet">
            <div class="col-3">Mã đơn hàng: </div><span class="col-8 dam"><?= $id_giohang['last_giohang_id'] ?></span>
            <div class="col-3">Người nhận: </div><span class="col-8"><?= isset($ten) ? $ten : ''  ?></span>
            <div class="col-3">Địa chỉ:</div><span class="col-8"><?= isset($chi_tiet) ? $chi_tiet : '' ?></span>
            <div class="col-3">Tổng tiền: </div><span class="col-8 dam price" data-gia="<?=$tong_tien ?>"></span>
            <div class="col-3">Sản phẩm:</div> <span class="col-7"><?=$tong_sl ?></span> 
            <div class="mua">
                <a href="index.php?act=chi_tiet_dh&id_don_hang=<?= $id_giohang['last_giohang_id'] ?>"><button name="thanh_toan" value="thanh_toan">Theo dõi đơn hàng</button></a>
            </div>
            <a href="index.php" class="text-center tiep_tuc">Tiếp tục mua sắm</a>
        </div>
    </div>
</div>
<script src="js/thong_bao.js"></script>