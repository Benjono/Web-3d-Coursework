<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>JSON Sample</title>
</head>
<body>
	<div id="placeholder"></div>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
	//relative path so works on ITS web server
	$.getJSON('../application/model/createJson.php', function(data){
		//check object
		console.log(data);
		//then build handler to strip data from JSON and wrap in html
		var htmlCode="<ul>";
		//loop through json
		for (var i in data.users){
			htmlCode+="<li>" + data.users[i].firstName + " "
				+ data.users[i].lastName + " | "
				+ data.users[i].joined.month + " | "
				+ data.users[i].joined.year+"</li>";
		}
		htmlCode+="</ul>";
		console.log(htmlCode);
		//assign html code to placeholder using selector method
		$('#placeholder').html(htmlCode);
	});


	</script>
</body>
</HTML>