<?php
include "model/pdo.php";
include "model/san_pham.php";
include "model/danh_muc.php";
include "model/kich_thuoc.php";

if(isset($_GET['act'])&&$_GET['act'])

include "view/menu.php";
// include "view/banner.php";
// include "view/main.php";
include "view/chitiet_sp.php";

include "view/footer.php";