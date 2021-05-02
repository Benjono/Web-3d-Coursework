<?php
//path
$directory = '../../application/assets/images/gallery_images';
//only files with extensions
$allowed_extensions = array('jpg', 'jpeg', 'gif', 'png');
// array used to separate the extension from file
$file_parts = array();
// Response
$response = "";
//Opens the directory to parse the images
$dir_handle = opendir($directory);
//iterate through files
while ($file = readdir($dir_handle)){
	//check for hidden files
	if (substr($file, 0, 1) != '.'){
		//Split each file name to extract the file extension
		$file_components = explode('.',$file);
		//grab extension token
		$extension = strtolower(array_pop($file_components));
		//is the file a valid images
		if (in_array($extension,$allowed_extensions)){
			//build a response string using the ~ symbol as a string separator
			$response .= '/'.$file.'~';
		}
	}
}
closedir($dir_handle);
// Return response while removing the last ~ separator
echo substr_replace($response,"",-1);
?>