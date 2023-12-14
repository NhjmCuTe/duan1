<?php
include "pdo.php";
include "../global.php";
include "san_pham.php";
if (isset($_GET['kich_thuoc']) && $_GET['kich_thuoc']) :
    $sp = san_pham_theo_dk('', '', '', $_GET['kich_thuoc']);
    foreach ($sp as $value) : extract($value);
        $mang_anh = explode(',', $value['img_mau']); ?>


        <div class=" col-4 mb-4 sanpham">
            <div class="img-prd">
                <div class="img"><a href="index.php?act=chitiet_sp&id_sp=<?= $value['id_sanpham'] ?>">
                        <img src="<?= $duong_dan_anh . $mang_anh[0] ?>" alt="" /></a></div>
                <a href="index.php?"><button class="add-to-cart">
                        <span>Thêm nhanh vào giỏ</span>
                    </button></a>
            </div>
            <div class="info-prd">
                <div class="bang_mau">
                    <?php
                    foreach ($mang_anh as $anh) : ?>
                        <div class="anh">
                            <img src="<?= $duong_dan_anh . $anh ?>" alt="" />
                        </div>
                    <?php endforeach ?>
                </div>
                <h6 class="product-item-name">
                    <a href="index.php?act=chitiet_sp&id_sp=<?= $value['id_sanpham'] ?>"><?= $ten_sanpham ?></a>
                </h6>
                <span class="price"><?= number_format($gia, 0, '', '.') ?> đ</span>
            </div>
        </div>

    <?php endforeach ?>
<?php else : ?>
    <h1 class="text-center">Không có sản phẩm</h1>
<?php endif ?>