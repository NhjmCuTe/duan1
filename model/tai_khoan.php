<?php
//check email và username khi đăng ký
function checkEmail($email)
{
    $sql = "select * from tai_khoan where email='" . $email . "'";
    $checkemail = pdo_query_one($sql);
    return $checkemail;
}

function checkUsername($user)
{
    $sql = "select * from tai_khoan where ten='" . $user . "'";
    $checkusername = pdo_query_one($sql);
    return $checkusername;
}

// thêm tài khoản ki đăng kí
function insert_taikhoan($user, $pass, $email, $sdt, $address)
{
    $sql = "INSERT INTO tai_khoan(ten,pass,email,sdt,address) VALUES ('$user','$pass','$email','$sdt','$address') ";
    pdo_execute($sql);
}

// check tài khoản khi đăng nhập
function checkuser($user, $pass)
{
    $sql = "select * from tai_khoan where ten='" . $user . "' and pass='" . $pass . "'";
    $checkuser = pdo_query_one($sql);
    return $checkuser;
}

//load All danh sách tài khoản
function all_taikhoan()
{
    $sql = "select * from tai_khoan ";
    $kq = pdo_query($sql);
    return $kq;
}

function tk_nguoidung()
{
    $sql = "select * from tai_khoan where role is null ";
    $kq = pdo_query($sql);
    return $kq;
}

//xuất thông tin tài khoản của người dùng
function loadOne_taikhoan($id){
    $sql = "select * from tai_khoan where id_taikhoan='".$id."'";
    $kq = pdo_query_one($sql);
    return $kq;
}

// // xác minh tài khoản theo email khi quên
// function loadAllone_checkemail($email){
//     $sql = " SELECT * FROM user where  email='".$email."'";
//     $listtk = pdo_query_one($sql);
//     return $listtk;
// }

// thay đổi thông tin dùng
function update_taikhoan($id,$user,$pass,$email,$sdt,$address){
    $sql = "update tai_khoan set ten='".$user."',  pass='".$pass."' ,email='".$email."' ,sdt='".$sdt."' ,address='".$address."'  where id_taikhoan='".$id."'";
    pdo_execute($sql);
}

//xóa người dùng
function xoa_tk($id_tk){
    $sql = "delete from tai_khoan where id_taikhoan = $id_tk";
    pdo_execute($sql);
}
