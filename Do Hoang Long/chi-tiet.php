<?php
	include("lib_db.php");
	//get input -> ko co, vi la trang chu
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
	//$q = isset($_REQUEST["q"]) ? trim($_REQUEST["q"]) : "";
	if ($id <  1) return ;
	//tao sql
	//$sql = "select * from grab_content where id={$id}";
	$sql = "select * from grab_content where id=" . $id ;
	//echo $sql;exit();
	//thuc thi cau lenh sql
	$result = select_one($sql);
	//print_r($result);exit();
	if (!$result) return ;
	
	$sql = "select * from grab_content 
	where cid={$result['cid']} limit 10";
	
	//echo $sql;exit();
	
	$resultOther = select_list($sql);
	//print_r($resultOther);exit();
?>

<?php include 'header.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Chi tiết</title>
	<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
	<link rel="icon" href="images/favicon.png" type="image/png" />
	<link type="text/css" href="css/chi-tiet.css" rel="stylesheet" media="screen"/>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.corner.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>	
<body>

<div class="m-wrapper"><div class="travel-wrapper">
	<div class="content">
		<div class="content-main">
			<img src="<?php echo $result["img"]?>" alt="" width="1920px" height="800px">
			<h2><?php echo $result["title"]?></h2>
			<div class="content-body">
				<?php echo $result["body"]?>
				<br><a href="tin-tuc.php?id=1"> Tới danh sách bài viết</a></br>
			</div>
			<h3>Tin cung chuyen muc</h3>
			<div class="content-other">
				<ul>
				<?php foreach ($resultOther as $item) {?>
					<li><a href="/Do Hoang Long/chi-tiet.php?id=<?php echo $item["id"]?>"><?php echo $item["title"]?></a></li>
				<?php } ?>
				</ul>
			</div>
		</div><!-- end travel-content-main -->
	</div><!-- end travel-content -->
	<!-- end wrapper -->
</div>
</body>
</html>

<?php include 'footer.php';?>