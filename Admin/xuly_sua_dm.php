<?php
    $cn = mysqli_connect('localhost', 'root','', 'restaurant');
    if(!$cn){
        die("kết nối mysql không thành công, vui lòng kiểm tra lại server ");
    }
    if(isset($_POST['btn_gui']))
{
    $sql = "UPDATE danhmuc SET tendm = '$_POST[tendm]', mota = '$_POST[mota]' WHERE madm='$_POST[madm]'";
    $kq = mysqli_query($cn, $sql);
    if ($kq){
        header("Location: danhmuc.php");
    }
    else{
        echo "Thông tin chưa sửa thành công";
    }
}
?>
