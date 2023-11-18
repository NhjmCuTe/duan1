<?php
function danh_muc()
{
    $sql = "select * from danh_muc ";
    $kq = pdo_query($sql);

    return $kq;
}
