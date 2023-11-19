<?php
function them_kich_thuoc($ten)
{
    $sql = "insert into kich_thuoc(id_kichthuoc, ten_kichthuoc) values (null,'$ten')";
    pdo_execute($sql);
}
function all_kich_thuoc(){
    $sql = "select * from kich_thuoc order by id_kichthuoc desc";
    $kq = pdo_query($sql);
    return $kq;
}
function xoa_kichthuoc($id_kichthuoc){
    $sql = "delete from kich_thuoc where id_kichthuoc = $id_kichthuoc";
    pdo_execute($sql);
}