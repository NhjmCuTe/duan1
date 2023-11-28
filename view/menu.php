<header class="container-fluid py-4 px-5">
    <div class="row header">
        <div class="col-2 logo">
            <a href="index.php"><img src="./img/logo.png" alt=""></a>
        </div>
        <div class="col-4 menu">
            <ul>
                <li class="menu_chinh"><a href="">HÀNG MỚI</a></li>
                <li class="menu_chinh">
                    <a href="">SẢN PHẨM</a>
                    <ul class="menu_con">
                        <div class="menu_con_2">
                            <?php foreach ($all_danhmuc_menu as $one_dm) {
                                $mang_dm_con = explode(',', $one_dm['danh_muc_con']);
                                echo '<li><a href="">' . $one_dm['ten_danhmuc'] . '</a>
                                    <ul>';
                                foreach ($mang_dm_con as $dm_con) {
                                    echo '<li><a href="">' . $dm_con . '</a></li>';
                                }
                                echo '</ul>
                                    </li>';
                            } ?>
                        </div>
                    </ul>
                </li>
                <li class="menu_chinh"><a href="">SALE</a></li>
            </ul>
        </div>
        <div class="col-3">
            <form class="tim_kiem">
                <button type="submit"><i class="fas fa-search"></i></button>
                <input type="search" placeholder="Tìm kiếm" aria-label="Search" />
            </form>
        </div>
        <div class="col-3">
            <div class="row item">
                <div class="col hover">
                    <a href=""><i class="fa-regular fa-store"></i><span>Cửa hàng</span></a>
                </div>

                <div id="gio_hang" data-bs-toggle="modal" data-bs-target="#modal_gio_hang" class="col gio_hang hover">
                    <i class="fa-regular fa-cart-shopping"></i><span>Giỏ hàng</span>
                    <p id="sl_gio_hang"><?= isset($_SESSION['sl_gio_hang']) ? $_SESSION['sl_gio_hang'] : 0 ?></p>
                </div>

                <?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
                    <div class="col hover dang_nhap">
                        <i class="fa-regular fa-user"></i><span>Tài khoản</span>
                    </div>
                    <div class="thong_tin_dang_nhap">
                        <div class="name"><a href="">Xin chào: <span><?= $_SESSION['user']['ten']  ?></span></a></div>
                        <div class="link">
                            <?= isset($_SESSION['user']['role']) == 1 ? '<a href="admin">Quản trị</a>' : '' ?>
                            <a href="index.php?act=theo_doi_dh">Theo dõi đơn hàng</a>
                            <a href="index.php?act=dangxuat">Đăng xuất</a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col hover dang_nhap" data-bs-toggle="modal" data-bs-target="#modal_dang_nhap">
                        <i class="fa-regular fa-user"></i><span>Tài khoản</span>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</header>

<?php include "view/san_pham/gio_hang.php" ?>
<?php include "view/tai_khoan/dang_nhap.php" ?>
<?php include "view/tai_khoan/dangky.php" ?>