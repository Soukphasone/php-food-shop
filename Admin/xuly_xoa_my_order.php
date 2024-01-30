<?php
if (isset($_GET['id']) ){
    $id = $_GET['id'];
    $cn = mysqli_connect('localhost', 'root','', 'restaurant');
    if(!$cn){
        die("kết nối mysql không thành công, vui lòng kiểm tra lại server ");
    }
    // $sql = "DELETE `order_detail`, `order` FROM `order_detail` INNER JOIN `order` ON `order_detail`.`order_id` = `order`.`id` WHERE `order`.`id`= $id;"; 
    $sql = "DELETE FROM order WHERE id =$id ";
		$kq = mysqli_query($cn, $sql);
        var_dump($kq);
		// if($kq){
        //    echo "OK";
        // }
        // else{
        //   echo  "Thông tin chưa xóa thành công";
        // } 
		?>
		<?php
	}

?>