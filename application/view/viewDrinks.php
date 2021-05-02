<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Drinks Image View</title>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
	<h1 style="margin:5px; padding:10px;">Choose a drink to see more details</h1>
	<b style="margin:5px; padding:10px;">Select a drinks brand name: </b>
	<form style="margin:5px; padding:10px;">
		<select id="select">
			<?php
				//Debug
				// $data = array("A","B","C","D");
				for ($i=0; $i<=count($data);$i++)
					echo '<option value="'.$data[$i].'">'.$data[$i].'</option>';
			?>
		</select>
	</form>

	<div id="placeholder" style="margin:5px; padding:10px;">Insert data here</div>

	<script>
	$(document).ready(function(){
		$('#select').change(function(){
			//debug
			var model = $(this).val();
			console.log('Drinks Model: ', model, ' has been selected');
			//hold html as built
			var str = "";
			//process selection to select desired drinks brand
			$('select option:selected').each(function(){
				//start with a title
				str+="<div><b>Drinks Brand: </b>" + $(this).text() + "</div>" + "</br>";
				//debug
				console.log("HTML Title is:", $(this).text());
				//debug
				var selection = $(this).text();
				//debug
				console.log('Selected brand model:', selection);
				//build up url path to the php model used to read the drinks brand data
				var brandUrl = "../application/model/modelDrinkDetails.php?brand="+selection;
				//debug
				console.log('URL to PHP Model is:', brandUrl);
				var debugUrl = "../application/model/phpDebug.php";
				//fire the AJAX call with the .getJSON function to get the service response from the URL (to the web server)
				$.getJSON(brandUrl)
					.done(function(json){
						//Debug
						console.log('Web service response for drink brand data: ', json);
						//write handler to display results in HTML
						//start container div tag
						str+="<div width=90% style='float:left; margin:5px; border:1px solid; border-color: blue; padding:10px;'>"
						for (var i=0; i<json.length; i++){
							str+= "<div width=15% style='float:left; color:blue; margin:5px; border:1px solid; border-color: red; padding:10px;'>" + json[i].brand + "</div>"+
								"<div width=15% style='float:left; color:blue; margin:5px; border:1px solid; border-color: red; padding:10px;'>" + json[i].x3dModelTitle + "</div>"+
								"<div width=15% style='float:left; color:blue; margin:5px; border:1px solid; border-color: red; padding:10px;'>" + json[i].x3dCreationMethod + "</div>"+
								"<div width=15% style='float:left; color:blue; margin:5px; border:1px solid; border-color: red; padding:10px;'>" + json[i].modelTitle + "</div>"+
								"<div width=15% style='float:left; color:blue; margin:5px; border:1px solid; border-color: red; padding:10px;'>" + json[i].modelSubtitle + "</div>"+
								"<div width=15% style='float:left; color:blue; margin:5px; border:1px solid; border-color: red; padding:10px;'>" + json[i].modelDescription + "</div>";
							str+=
								"<div width='30%' style='float:left; margin:5px; border:1px solid; border-color: green; border-radius:10px; padding:10px;'>"+
								"<img width='300px' src='../assets/images/gallery_images" + json[i].brand + ".jpg'></img>"+
								"</div>";
						}
						//close of container div tag
						str+="</div>";
						//return constructed HTMl to the placeholder </div>
						document.getElementById("placeholder").innerHTML = str;
						//could use ajax method $('#placeholder').html=str;

					})
					.fail(function(){
						console.log('viewDrinks JS Handler: Server returned an Error, trap this in your PHP server code');
					});
				console.log("help me");
			});
		});
	});
	</script>

</body>
</html>