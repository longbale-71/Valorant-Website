<?php
	include("lib_db.php");
	//1. get input, id của bài viết
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
	$p = isset($_REQUEST["p"]) ? $_REQUEST["p"] * 1 : 0;
	if ($p < 1) $p = 1;
	//2.1. Thông tin chi tiết của chuyên mục
	$sql = "select * from grab_category where id = {$id}";
	//2.2. Thực thi sql
	$result = select_one($sql);
	//print_r($result);exit();
	
	//2.1. Thông tin chi tiết của chuyên mục
	$nop = 10;
	$offset = $nop * ($p -1);
	$cond = "where cid = {$id}";
	$sql = "select * from grab_content {$cond}  limit {$nop} offset {$offset} ";
	//echo $sql;exit();
	//2.2. Thực thi sql
	$datas = select_list($sql);
	
	$sqlcount = "select count(*) as c from grab_content {$cond}";
	//2.2. Thực thi sql
	$count = select_one($sqlcount);
	$total = $count['c'];
	//print_r($count);exit();
	$nop = 10;
	$num = ceil($total / $nop);
	
?>
<?php include 'header.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $result["name"] ?></title>
	<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
	<link type="text/css" href="css/style.css" rel="stylesheet" media="screen"/>
	<link type="text/css" href="css/chuyen-muc.css" rel="stylesheet" media="screen"/>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.corner.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>	
<body>

<div class="m-wrapper"><div class="travel-wrapper">
	<div class="travel-content">
		<div class="content-main">
			<div class="title">
				<?php echo $result["name"] ?>
			</div>
			<ul>
			<?php foreach ($datas as $data) { ?>
				<li>
					<br><a href="chi-tiet.php?id=<?php echo $data["id"] ?>"><img src='<?php echo $data["img"] ?>' alt="" width="500px" height="300px"><?php echo $data["title"] ?></a></br>
				</li>
			<?php } ?>
			</ul>				
		</div>
	</div><!-- end travel-content -->
</div><!-- end wrapper --></div>
</body>
</html>

<?php include 'footer.php'; ?>