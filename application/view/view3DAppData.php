<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test View</title>
	<style>
		h1{
			color:red;
			margin-left: 5px;
		}
		h2{
			color:blue;
			margin: 5px;
		}
		p{
			color:green;
			margin-left:5px;
		}
		.imgBox{
			padding:0.25rem;
			margin-top:5px;
			margin-bottom:5px;
			border:1px solid #dee2d6;
			border-radius: 0.25rem;
			width:300px;
		}
		.boxModel{
			border: 3px solid rbga(0,1,0,1.0);
			padding: 5px;
			float:left;
			margin: 5px;
			width:auto;
			height:auto;
		}
		.boxText{
			border: 1px solid rgba(1,0,0,1.0);
			padding:5px;
			float: left;
			margin: 5px;
			width:220px;
			height: auto;
		}
	</style>
</head>
<body>
	<h1>Model_3D Data returned from the sqlite database</h1>
	<p> If you are seeing the test Model 3D Image Data below, then your basic MVC framework is working </p>
	<?php for ($i =0; $i<count($data);$i++){?> 
		<div class="boxModel">
			<div class="boxText">
				<h2><?php echo $data[$i]['x3dModelTitle'] ?></h2>
			</div>
			<div class="boxText">
				<h2><?php echo $data[$i]['x3dCreationMethod'] ?></h2>
			</div>
			<div class="boxText">
				<h2><?php echo $data[$i]['modelTitle'] ?></h2>
			</div>
			<div class="boxText">
				<h2><?php echo $data[$i]['modelSubtitle'] ?></h2>
			</div>
			<div class="boxText">
				<h2><?php echo $data[$i]['modelDescription'] ?></h2>
			</div>
		</div>
	<?php }?>
	
</body>
</html>