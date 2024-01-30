	<?php include_once("include/connect.php"); ?>
<?php 
$sql = "SELECT  * FROM sanpham ORDER BY masp DESC LIMIT 0, 4";
// $sql = "SELECT  * FROM sanpham ";
	$kq = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($kq);
	// echo "<div>Có $n sản phẩm</div>";
	$i=0;
  $li ='';
  $div = '';
	while($sp=mysqli_fetch_object($kq))
	{
		// $i++;
		$anhsp ='images/anhsp/0.jpg';
		if(is_file('images/anhsp/'.$sp->masp.'.jpg'))
			{
				$anhsp = 'images/anhsp/'.$sp->masp.'.jpg';
			}
      if ($i == 0)
      {
        $li .='<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
        $div .=' 
        <div class="item active">
        <img src="'.$anhsp.'" alt="'.$sp->tensp.'" style="width:50%; height:400px; margin-left: auto; margin-right: auto;">
        <div class="carousel-caption">
          <p>'.$sp->tensp.'</p>
        </div>
     
        '; 
      }
      else{
        $li .='<li data-target="#myCarousel" data-slide-to="'.$i.'" ></li>';
        $div .=' 
        <div class="item">
        <img src="'.$anhsp.'" alt="'.$sp->tensp.'" style="width:50%; height:400px; margin-left: auto; margin-right: auto;">
        <div class="carousel-caption">
          <p>'.$sp->tensp.'</p>
        </div>
     
        '; 
      }
      $div .='</div>';
     $i++;
     
}
		?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
     
    <?php echo $li; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

    <?php echo $div; ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
