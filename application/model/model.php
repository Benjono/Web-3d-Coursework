<?php
class Model{
	//property declaration, points to database connection, will become PDO object

	public $dbhandle;
	//method to create database connection using PHP Data Objects as the interface to SQLite
	public function __construct(){
		//set up source name (DSN)
		$dsn = 'sqlite:./db/test1.db';
		//Then create a connection to database
		try{
			$this->dbhandle = new PDO($dsn,'user','password',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false,));
		}
		catch (PDOEXception $e){
			echo "Can't connect to database";
			print new Exception($e->getMessage());
		}
	}

	//Method to simulate Model data
	public function model3D_info(){
		//Simulate the Model's data
		return array(
			'model_1' => 'Coke Can 3D Image 1',
			'image3D_1' => 'coke_1',

			'model_2' => 'Coke Can 3D Image 2',
			'image3D_2' => 'coke_2',

			'model_3' => 'Sprite Bottle 3D Image 1',
			'image3D_3' => 'sprite_1',

			'model_4' => 'Sprite Bottle 3D Image 2',
			'image3D_4' => 'sprite_2',

			'model_5' => 'Dr Pepper Cup 3D Image 1',
			'image3D_5' => 'pepper_1',

			'model_6' => 'Dr Pepper Cup 3D Image 2',
			'image3D_6' => 'pepper_2',
		);
	}

	//--------------- Table Creation area
	// List of Default brands on the main page
	/* Consolidated into MainTextTable
	public function dbCreateBrandsTable(){
		try{
			//Contains what brands there are, what their names are and wheter they are on the main page
			$this->dbhandle->exec("CREATE TABLE MainBrands (brandid INT PRIMARY KEY, brand TEXT, onMainPage BOOLEAN)");
			return "MainBrands table is successfully created inside text1.db file";
		} catch (PDOEXception $e){
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}*/
	// Information for the brands on main page
	public function dbCreateMainTextTable(){
		try{
			//UNIQUE stops brand having multiple data entries, NOT NULL means you can't have brand information without a brand.
			//Foreign key to MainBrands brandid.
			// Brand information must have a brand, a brand may not neccessarily have information.
			$this->dbhandle->exec("CREATE TABLE MainText (brandID INT PRIMARY KEY, title TEXT, imgSrc TEXT, brand TEXT, onMainPage BOOLEAN, subtitle TEXT, description TEXT, FOREIGN KEY (brand) REFERENCES MainBrands(brandid))");
			return "MainText table is successfully created inside text1.db file";
		}
		catch (PDOEXception $e){
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	// If models have multiple images to swap
	public function dbCreateX3DImgSwapTable(){
	try{
			// Composite primary key. x3did is foreign key
			// Each model had an ID, a title, a URL to the image and 
			$this->dbhandle->exec("CREATE TABLE X3DImgSwap (x3did INT, x3dSwapURL TEXT, name TEXT, PRIMARY KEY (x3did, x3dSwapURL), FOREIGN KEY(x3did) REFERENCES X3DData(x3did))");
			return "X3DIMGSwap table is successfully created inside text1.db file";
		}
		catch (PDOEXception $e){
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	// information for models
	public function dbCreateX3DDataTable(){
		try{
			//Handle page data Information
			//Text info for models.
			//
			$this->dbhandle->exec("CREATE TABLE X3DData (x3did INT PRIMARY KEY, x3dModelTitle TEXT, x3dMainURL TEXT, title TEXT, subtitle TEXT, description TEXT, x3dCreationMethod TEXT)");
			return "X3DData table is successfully created inside text1.db file";
		}
		catch (PDOEXception $e){
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}

	//Info for misc text for x3d models
	public function dbCreateMiscDataTable(){
		try{
			//Handle page data Information
			//Text info for models.
			//
			$this->dbhandle->exec("CREATE TABLE MiscData (id INT PRIMARY KEY, title TEXT, subtitle TEXT)");
			return "MiscData table is successfully created inside text1.db file";
		}
		catch (PDOEXception $e){
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}



	//--------------- Information input area
	// Can insert more records for other brands that aren't, currently, on the main page
	/*
	public function dbInsertBrandData(){
		try{
			$this->dbhandle->exec(
				"INSERT INTO MainBrands (brandid, brand, onMainPage) VALUES (1, 'Fanta', TRUE);".
				"INSERT INTO MainBrands (brandid, brand, onMainPage) VALUES (2, 'Coke', TRUE);".
				"INSERT INTO MainBrands (brandid, brand, onMainPage) VALUES (3, 'Costa', TRUE);"
			);
			return "MainBrands data inserted successfully into text1.db file";	
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}*/

	public function dbInsertMainTextData(){
		try{
		//brandID INT PRIMARY KEY, title TEXT, imgSrc TEXT, brand TEXT, onMainPage BOOLEAN, subtitle TEXT, description TEXT,
			$this->dbhandle->exec(
				"INSERT INTO MainText (brandID, brand, imgSrc, title,  subtitle, description, onMainPage) VALUES (1, 'Fanta', './application/assets/images/site_images/fanta.jpg', 'Fanta', 'First Created in 1940 as a Coca Cola substitute','Fanta is a brand of fruit-flavored carbonated soft drinks created by Coca-Cola Deutschland under the leadership of German businessman Max Keith. There are more than 150 flavors worldwide. Fanta originated as a Coca-Cola substitute in 1940 due to the American trade embargo of Nazi Germany which affected the availability of Coca-Cola ingredients; the current formulation was developed in Italy.',TRUE);".	
				"INSERT INTO MainText (brandID, brand, imgSrc, title,  subtitle, description, onMainPage) VALUES (2, 'Coke', './application/assets/images/site_images/coke.jpg', 'Coca Cola Great Britain','Founded in 1868 Dr John S Pemberton','The Coca Cola Company is the worlds leading manufacturer, marketer and distributor of non-alcoholic beverage concentrates and syrups, and produces nearly 400 brands.',TRUE);".
				"INSERT INTO MainText (brandID, brand, imgSrc, title,  subtitle, description, onMainPage) VALUES (3, 'Costa', './application/assets/images/site_images/costa.jpg', 'Costa Coffee', 'Founded in 1971 by two brothers, Bruno and Sergio Costa', 'Costa Coffee is a British coffeehouse chain and a subsidiary of The Coca-Cola Company. It is headquartered in Dunstable, England.',TRUE);"


			);
			return "MainText data inserted successfully into text1.db file";	
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	public function dbInsertHeader(){
	try{
		//not a specific 'brand' with info
			$this->dbhandle->exec(
				"INSERT INTO MainText (brand,title,  subtitle, description) VALUES ('Main','Coca Cola Great Britain','Founded in 1868 Dr John S Pemberton','The Coca Cola Company is the worlds leading manufacturer, marketer and distributor of non-alcoholic beverage concentrates and syrups, and produces nearly 400 brands.');"
			);
			return "MainText data inserted successfully into text1.db file";	
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	
	}

	public function dbInsertX3DData(){
		try{
			$this->dbhandle->exec(
				"INSERT INTO X3DData (x3did, x3dModelTitle, x3dMainURL, title, subtitle, description, x3dCreationMethod) VALUES (1, 'Fanta', './application/assets/x3d/fanta_can.x3d', 'Fanta', 'A <b>fanta</b>stic drink', 'In 1943 alone, 3 million cases of Fanta were sold. Many bottles were not drunk but used to add sweetness and flavor to soups and stews, since wartime sugar was severely rationed.', 'This X3D model of the fanta can has been created in 3ds max');".
				"INSERT INTO X3DData (x3did, x3dModelTitle, x3dMainURL, title, subtitle, description, x3dCreationMethod) VALUES (2, 'Coke', './application/assets/x3d/coke_bottle.x3d', 'History of Coca Cola', 'Atlanta Beginnings','It was 1886, and in New York Harbour, workers were constructing the Statue of Liberty. Eight hundred miles away, another great American symbol was about to be unveiled. Like many people who change history, John Pemberton, an Atlanta pharmacist, was inspired by simple curiosity. One afternoon, he stirred up a fragrant, caramel-coloured liquid and, when it was done, he carried it a few doors down to Jacobs Pharmacy. Here, the mixture was combined with carbonated water and sampled by customers who all agreed - this new drink was something special. So Jacobs Pharmacy put it on sale for five cents (about 3p) a glass.','This X3D model of the coke bottle has been created in 3ds max');".
				"INSERT INTO X3DData (x3did, x3dModelTitle, x3dMainURL, title, subtitle, description, x3dCreationMethod) VALUES (3, 'Costa', './application/assets/x3d/coffee_cup.x3d', 'Costa coffee', 'The cost-a coffe','Brothers Bruno and Sergio Costa founded a coffee roastery in Lambeth, London, in 1971, supplying local caterers. The family had moved to England from Parma, Italy, in the 1960s.[6][7] Costa branched out to selling coffee in 1978, when its first store opened in Vauxhall Bridge Road, London.','This X3D model of the coffee cup has been created in 3ds max');"
			);
			return "X3DData data inserted successfully into text1.db file";	
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}

	public function dbInsertImgSwap(){
		try{
			$this->dbhandle->exec(
				"INSERT INTO X3DImgSwap (x3did, x3dSwapURL, name) VALUES (1, 'maps/fanta_can.jpg', 'Fanta');".
				"INSERT INTO X3DImgSwap (x3did, x3dSwapURL, name) VALUES (1, 'maps/coke_can.jpg', 'Coke');"
			);
			return "X3dImgSwap data inserted successfully into text1.db file";	
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	public function dbInsertMiscData(){
		try{
			$this->dbhandle->exec(
				"INSERT INTO MiscData (id, title, subtitle) VALUES (1, '3D Images', 'These 3D images of the Coke Can');".
				"INSERT INTO MiscData (id, title, subtitle) VALUES (2, 'Camera Views', 'These buttons select a range of X3D model viewpoints');"
			);
			return "Misc data inserted successfully into text1.db file";	
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}

	//----------------- Information retrieval area
	//-------- Used mostly by mainPage to retrieve info, several calls need to be made so handler isn't destroyed until the end by endhandle()
	// get brands for main page
	/*
	public function dbGetBrandsOnMain(){
		try{
			// True == 1
			$sql = 'SELECT * FROM MainBrands WHERE onMainPage=1';
			$stmt = $this->dbhandle->query($sql);
			$result=null;
			$i=-0;
			while($data=$stmt->fetch()){
				$result[$i]['brandid'] = $data['brandid'];
				$result[$i]['brand'] = $data['brand'];
				$i++;
			}
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		return $result;
	}*/
	//Should be called multiple times after dbGetBrandsOnMain, returning an array with brand info
	public function dbGetBrandInfo($brand){
		try{
			// return only info of brand given 
			$sql = 'SELECT * FROM MainText WHERE brand='.$input;
			$stmt = $this->dbhandle->query($sql);
			$result=null;
			// Things to return: imgSrc, title,  subtitle, description 
			$result['imgSrc'] = $data['imgSrc'];
			$result['title'] = $data['title'];
			$result['subtitle'] = $data['subtitle'];
			$result['description'] = $data['description'];
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		return $result;
	}
	public function dbGetBrandInfoOnMain(){
		try{
			// return only info of brand given 
			$sql = 'SELECT * FROM MainText WHERE onMainPage=1';
			$stmt = $this->dbhandle->query($sql);
			$result=null;
			$i=-0;
			// Things to return: imgSrc, title,  subtitle, description 
			while($data=$stmt->fetch()){
				$result[$i]['imgSrc'] = $data['imgSrc'];
				$result[$i]['brand'] = $data['brand'];
				$result[$i]['title'] = $data['title'];
				$result[$i]['subtitle'] = $data['subtitle'];
				$result[$i]['description'] = $data['description'];
				$i++;
			}
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		return $result;
	}
	// get x3d model info for all models
	public function dbGetX3DInfo(){
		try{
			//get all data from x3d
			$sql = 'SELECT * FROM X3DData';
			$stmt = $this->dbhandle->query($sql);
			$result=null;
			$i=-0;
			while($data=$stmt->fetch()){
				$result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
				$result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
				$result[$i]['x3dMainURL'] = $data['x3dMainURL'];
				$result[$i]['modelTitle'] = $data['title'];
				$result[$i]['modelSubtitle'] = $data['subtitle'];
				$result[$i]['modelDescription'] = $data['description'];
				$i++;
			}
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		return $result;
	}
	// Get misc titles like camera and gallery
	public function dbGetMiscInfo(){
		try{
			//get all data from misc
			$sql = 'SELECT * FROM MiscData';
			$stmt = $this->dbhandle->query($sql);
			$result=null;
			$i=-0;
			while($data=$stmt->fetch()){
				$result[$i]['title'] = $data['title'];
				$result[$i]['subtitle'] = $data['subtitle'];
				$i++;
			}
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		return $result;
	}
	public function dbGetSwapInfo(){
		try{
			//get all data from swap info
			$sql = 'SELECT * FROM X3DIMGSwap';
			$stmt = $this->dbhandle->query($sql);
			$result=null;
			$i=-0;
			while($data=$stmt->fetch()){
				$result[$i]['x3did'] = $data['x3did'];
				$result[$i]['x3dSwapURL'] = $data['x3dSwapURL'];
				$result[$i]['name'] = $data['name'];
				$i++;
			}
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		return $result;
	}
	public function dbMainData(){
		$sql = 'SELECT * FROM MainText WHERE brand="Main"';
		//should get main text for main banner on index and return it as an array
		$result = null;
		try{
			$stmt = $this->dbhandle->query($sql);
			$data=$stmt->fetch();
			$result['title'] = $data['title'];
			$result['subtitle'] = $data['subtitle'];
			$result['description'] = $data['description'];
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		return $result;
	}
	//--------------Misc
	public function endhandle(){
		$this->dbhandle = null;
	}
	public function dropTable($name){
		$sql = 'DROP TABLE IF EXISTS '.$name;
		try{
			$stmt = $this->dbhandle->query($sql);
			return "Drop table ".$name." successful";
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle=null;
	}

	public function dbCreateTable(){
		try{
			$this->dbhandle->exec("CREATE TABLE Model_3D (brand TEXT PRIMARY KEY, x3dModelTitle TEXT, x3dCreationMethod TEXT, modelTitle TEXT, modelSubtitle TEXT, modelDescription TEXT)");
			return	"Model_3D table is successfully created inside text1.db file";
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	public function dbInsertData(){
		try{
			$this->dbhandle->exec(
				"INSERT INTO Model_3D (brand, x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription) VALUES ('Coke', 'string_1', 'string_2', 'string_3', 'string_4','string_5');".
				"INSERT INTO Model_3D (brand, x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription) VALUES ('Sprite', 'string_1', 'string_2', 'string_3', 'string_4','string_5');".
				"INSERT INTO Model_3D (brand, x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription) VALUES ('ee', 'string_1', 'string_2', 'string_3', 'string_4','string_5');"
			);
			return "X3D model data inserted successfully into text1.db file";	
		} catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
	public function dbGetData(){
		try{
			$sql = 'SELECT * FROM Model_3D';
			$stmt = $this->dbhandle->query($sql);
			$result=null;
			$i=-0;
			while($data=$stmt->fetch()){
				$result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
				$result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
				$result[$i]['modelTitle'] = $data['modelTitle'];
				$result[$i]['modelSubtitle'] = $data['modelSubtitle'];
				$result[$i]['modelDescription'] = $data['modelDescription'];
				$i++;
			}
		}catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		$this->dbhandle = null;
		return $result;
	}
	//This is a simple fix to represent, what would in reality be, a table in the database containing brand names.
	//The database schema would then contain a foreign key for each drink entry linking back to the brand name
	// This structure allows us to read the list of brand names to populate a menu in a view. 
	public function dbGetBrand(){
		//Return Brand Names
		return array("-", "Coke", "Coke Light", "Coke Zero", "Sprite", "Dr Pepper", "Fanta");
	}
	public function dbGetData_2(){
		ChromePhp::log("ModelDrinksDetails.php: Hello World");
		ChromePhp::log($_SERVER);
		//brand name
		ChromePhp::warn('modelDrinksDetails.php: get brand details');
		$brandName = $_GET['brand'];
		ChromePhp::warn('modelDrinksDetails.php: Make a connection to test1.db');
		try{
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
			while ($data = $stmt->fetch()){
				ChromePhp::wwarn("modelDrinksDetails.php: PDO fetch() data from test1.db");
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
		$this->dbhandle = null;
		ChromePhp::warn('ModelDrinksDetails.php: echo result to frontend in JSON packet... or return it');
		ChromePhp::warn($result);
		return $result;
	}
}
?>	