<?php
include './debug/ChromePhp.php';
ChromePhp::log('controller.php: Hello World');
ChromePhp::log($_SERVER);
//declare class
class Controller{
	//public variables
	public $load;
	public $model;
	//functions
	function __construct($pageURI = null){
		//new objects for load and model
		$this->load = new Load();
		$this->model = new Model();
		//determine page I'm on
		if ($pageURI !=null){
			$this->$pageURI();
		}
	}
	// home page function
	function home(){
		// Get data from the defined model method - lots of tables!
		$data = null;
		$data['mainTitle'] = $this->apiMainData();
		$data['MainBrands'] = $this->apiGetBrandInfoOnMain();
		$data['x3dInfo'] = $this->apiGetX3DInfo();
		$data['Misc'] = $this->apiGetMiscInfo();
		$data['swapInfo'] = $this->apiGetSwapInfo();
		$this->apiEndHandle();
		// Tell the loader what view to load and which dat to use
		$this->load->view('mainPage',$data);
	}
	//Creation API
	/* Legacy
	function apiCreateBrandsTable(){
		$data = $this->model->dbCreateBrandsTable();
		$this->load->view('viewMessage', $data);
	}*/
	function apiCreateMainTextTable(){
		$data = $this->model->dbCreateMainTextTable();
		$this->load->view('viewMessage', $data);
	}
	function apiCreateX3DImgSwapTable(){
		$data = $this->model->dbCreateX3DImgSwapTable();
		$this->load->view('viewMessage', $data);
	}
	function apiCreateX3DDataTable(){
		$data = $this->model->dbCreateX3DDataTable();
		$this->load->view('viewMessage', $data);
	}
	function apiCreateMiscDataTable(){
		$data = $this->model->dbCreateMiscDataTable();
		$this->load->view('viewMessage', $data);
	}
	//Insertion API
	/* Legacy
	function apiInsertBrandData(){
		$data = $this->model->dbInsertBrandData();
		$this->load->view('viewMessage', $data);
	}*/
	function apiInsertMainTextData(){
		$data = $this->model->dbInsertMainTextData();
		$this->load->view('viewMessage', $data);
	}
	function apiInsertX3DData(){
		$data = $this->model->dbInsertX3DData();
		$this->load->view('viewMessage', $data);
	}
	function apiInsertImgSwap(){
		$data = $this->model->dbInsertImgSwap();
		$this->load->view('viewMessage', $data);
	}
	function apiInsertMiscData(){
		$data = $this->model->dbInsertMiscData();
		$this->load->view('viewMessage', $data);
	}
	function apiInsertHeader(){
		$data = $this->model->dbInsertHeader();
		$this->load->view('viewMessage', $data);
	}
	//gettingAPI
	/*
	function apiGetBrandsOnMain(){
		$data = $this->model->dbGetBrandsOnMain();
		return $data;
	}*/
	function apiMainData(){ //for main data
		$data = $this->model->dbMainData();
		return $data;
	}
	function apiGetBrandInfoOnMain(){ //for three cards
		$data = $this->model->dbGetBrandInfoOnMain();
		return $data;
	}
	function apidbGetBrandInfo(){ //legacy
		$data = $this->model->dbGetBrandInfo();
		return $data;
	}
	function apiGetX3DInfo(){ //model info
		$data = $this->model->dbGetX3DInfo();
		return $data;
	}
	function apiGetMiscInfo(){ //gallery titles, etc
		$data = $this->model->dbGetMiscInfo();
		return $data;
	}
	function apiGetSwapInfo(){ //for swapping imgs on models
		$data = $this->model->dbGetSwapInfo();
		return $data;
	}
	//end handle
	function apiEndHandle(){
		$this->model->endhandle();
	}




	function apiCreateTable(){
		$data = $this->model->dbCreateTable();
		$this->load->view('viewMessage', $data);
	}
	function apiInsertData(){
		$data = $this->model->dbInsertData();
		$this->load->view('viewMessage', $data);
	}
	function apiGetData(){
		$data = $this->model->dbGetData();
		$this->load->view('view3DAppData', $data);
	}
	function apiGetFlickrService(){
		$this->load->view('viewFlickrService');
	}
	function apiGetJson(){
		$this->load->view('viewJson');
	}
	function apiLoadImage(){
		//get the brand data from (this) Model using the dbGetBrand() method in this Model class
		ChromePhp::warn('controller.php: [apiLoadImage] Get the Brand Data');
		$data = $this->model->dbGetBrand();
		//Note, the viewDrinks.php view being loaded here calls a new Model
		// called modelDrinksDetails.php, which is not part of this model class
		// It is a seperate Model illustrating that you can have many models
		ChromePhp::log($data);
		$this->load->view('viewDrinks', $data);
	}
}
?>