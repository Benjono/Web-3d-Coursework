<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test View - Flickr Web Service </title>

	<link rel="stylesheet" href="../application/css/flickrService.css">
</head>
<body>
	<h1> Flickr Web Service </h1>
	<h2> Search on Flickr Feed </h2>
	<!-- Text input box-->
	<div class="textInput">
		<input type="text" value="sprite" id="txt" />
	</div>
	<div class="btn">
		<button onclick="loadImages()">Search</button>
	</div>
	<div class="box">
		<h1 id="title"></h1>
		<h2 id="link"></h2>
		<p id="description"></p>
		<p id="modified"></p>
		<p id="generator"></p>
		<div id="images"></div>
	</div>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="../application/js/flickrService.js"></script>
</body>
</html>