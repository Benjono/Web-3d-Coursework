<?php
include '../../debug/ChromePhp.php';
ChromePhp::log("ModelDrinksDetails.php: Hello World");
ChromePhp::log($_SERVER);
//set up source name (DSN)
$dsn = 'sqlite:../../db/test1.db';
//brand name
ChromePhp::warn('modelDrinksDetails.php: get brand details');	
$brandName = $_GET['brand'];
ChromePhp::warn('modelDrinksDetails.php: Make a connection to test1.db');

//Then create a connection to database
try{
	$dbhandle = new PDO($dsn,'user','password',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false,));
	ChromePhp::warn('modelDrinksDetails.php: Connected');
	//prep sql statement to select a record matching the brand name selected in view drop-down list
	ChromePhp::warn('modelDrinksDetails.php: Prepare PDO statement');
	$sql = 'SELECT * FROM Model_3D WHERE brand = "'.$brandName.'"';
	ChromePhp::warn($sql);
	//use PDO query to the database with prepared SQL statement
	ChromePhp::warn('ModelDrinksDetails.php: PDO query() SQL statement');
	$stmt = $dbhandle->query($sql);
	ChromePhp::warn($stmt);
	$result = null;
	$i=0;
	while ($data = $stmt->fetch()) {
		ChromePhp::warn($i);
		ChromePhp::warn("modelDrinksDetails.php: PDO fetch() data from test1.db");
		ChromePhp::warn($data);
		$result[$i]['brand'] = $data['brand'];
		$result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
		$result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
		$result[$i]['modelTitle'] = $data['modelTitle'];
		$result[$i]['modelSubtitle'] = $data['modelSubtitle'];
		$result[$i]['modelDescription'] = $data['modelDescription'];
		$i++;
		ChromePhp::warn("ModelDrinksDetails.php: Here is the test1.db data");
		ChromePhp::warn($result);
	}
}catch (PDOEXception $e) {
	ChromePhp::warn('modelDrinksDetails.php: Code error on server?');
	print new Exception($e->getMessage());
}
$dbhandle = null;
ChromePhp::warn('ModelDrinksDetails.php: echo result to frontend in JSON packet... or return it');
ChromePhp::warn($result);
echo json_encode($result);
?>	