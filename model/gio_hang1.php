<?php
session_start();
if (isset($_GET) && isset($_SESSION['gio_hang'])) {
    $sanpham = '';
    foreach ($_SESSION['gio_hang'] as $index => $sp_giohang) {
        $ten_img_gh = $sp_giohang['ten_img'];
        $ten_sp_gh = $sp_giohang['ten_sp'];
        $id_sp_gh = $sp_giohang['id_sp'];
        $kt_gh = $sp_giohang['kt'];
        $ten_mau_gh = $sp_giohang['ten_mau'];
        $gia_gh = $sp_giohang['gia'];
        $sl_gh = $sp_giohang['sl'];

        echo '<div class="row box">
                <div class="col-3 anh">
                    <i class="fa-solid fa-xmark xoa_gh" data-index="'.$index.'"></i><a href="index.php?act=chitiet_sp&id_sp=' . $id_sp_gh . '"><img src="' . $ten_img_gh . '" alt="" /></a>
                </div>
                <div class="col-9 info">
                    <a href="index.php?act=chitiet_sp&id_sp=' . $id_sp_gh . '">
                        <p>' . $ten_sp_gh . '</p>
                    </a>
                    <div class="thong_tin">
                        <div class="mau">
                            <img src="' . $ten_img_gh . '" alt="" />
                        </div>
                        <span>' . $ten_mau_gh . '</span>|<span>' . $kt_gh . '</span>
                    </div>

                    <div class="gia">
                        <h5 class="price" data-gia="' . $gia_gh . '"></h5>
                       
                        <div class="so_luong">
                            <button class="bt1">
                                <i class="fa-solid fa-minus"></i></button><input type="number" name="" id="" min="1" value="' . $sl_gh . '" placeholder="Số lượng" /><button class="bt2">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>';
    }
}
