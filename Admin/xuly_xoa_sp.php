<?php
if (isset($_GET['masp'])){
    $masp = $_GET['masp'];
    $cn = mysqli_connect('localhost', 'root','', 'restaurant');
    if(!$cn){
        die("kết nối mysql không thành công, vui lòng kiểm tra lại server ");
    }
    $sql = "DELETE FROM sanpham WHERE masp =$masp ";
		$kq = mysqli_query($cn, $sql);
		if($kq){
           header("Location: sanpham.php");
        }
        else{
          echo  "Thông tin chưa xóa thành công";
        } 
		?>
		<?php
	}

?>