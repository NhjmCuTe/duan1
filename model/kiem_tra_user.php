<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']) {
    echo "ton_tai";
} else {
    echo "khong_ton_tai";
}
