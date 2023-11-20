<?php
function them_kich_thuoc($ten)
{
    $sql = "insert into kich_thuoc( ten_kichthuoc) values ('$ten')";
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
function one_kich_thuoc($id_kichthuoc){
    $sql= "select * from kich_thuoc where id_kichthuoc = $id_kichthuoc";
    $kq = pdo_query_one($sql);
    return $kq;
}
function edit_kich_thuoc($id_kichthuoc, $ten){
    $sql="update kich_thuoc set ten_kichthuoc = '$ten' where id_kichthuoc = $id_kichthuoc";
    pdo_execute($sql);
}