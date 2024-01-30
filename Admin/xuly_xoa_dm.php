<?php
if (isset($_GET['madm'])){
    $madm = $_GET['madm'];
    $cn = mysqli_connect('localhost', 'root','', 'restaurant');
    if(!$cn){
        die("kết nối mysql không thành công, vui lòng kiểm tra lại server ");
    }
    $sql = "DELETE FROM danhmuc WHERE madm =$madm ";
		$kq = mysqli_query($cn, $sql);
		if($kq){
            header("Location: danhmuc.php");
        }
        else{
          echo  "Thông tin chưa xóa thành công";
        } 
		?>
		<?php
	}

?>