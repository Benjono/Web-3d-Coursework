
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml" class="h-100">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="./application/css/bootstrap.css" />
	<!-- X3dom -->
	<link rel='stylesheet' type='text/css' href='./application/css/x3dom.css'>
	<!-- FancyBox -->
	<link rel="stylesheet" type="text/css" href="./application/css/jquery.fancybox.min.css"?
	<!-- custom -->
	<link rel="stylesheet" href="./application/css/custom.css" />


	<title>Coke Webpage</title>
</head>
<body id="body" class="d-flex flex-column h-100">
	<div class="flex-shrink-0">
		<nav id="header" class="navbar sticky-top navbar-expand-sm navbar_coca_cola">
			<div class="container-fluid">
				<div class="logo">
					<a class="navbar-brand" href="#">
						<h1>1</h1>
						<h1>oca</h1>
						<h2>Cola</h2>
						<h3>Journey</h3>
						<p>Refreshing the world, one story at a time</p>
					</a>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li>
							<a class="nav-link" href="#" id="navHome">
								Home
							</a>
						</li>
						<li>
							<a class="nav-link" href="#" id="navAbout" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="About Web 3D Applications" data-content="3D Apps is a final year and postgraduate module ...">
								About
							</a>
						</li>
						<li>
							<a class="nav-link" href="#" id="navFurther">
								Further Work
							</a>
						</li>
						<li>
							<a class="nav-link" href="#" id="navModels">
								Models
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div id="home" class="container-fluid main_contents">
			<div class="row">
				<div class="col-sm-12">
					<div id="theCarousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="./application/assets/images/site_images/coke_bottle_render.jpg" alt="coke bottle" data-holder-rendered="true"/>
								<div class="carousel-caption d-none d-md-block">
									<h3>Coke Bottle Render</h3>
									<p>Rendered in 3DS Max with 3 Free Photometric lights. Raycasting is used to make the glass 'glassy'</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="./application/assets/images/site_images/coffee_cup_render.jpg" alt="coffee cup" data-holder-rendered="true"/>
								<div class="carousel-caption d-none d-md-block">
									<h3>Costa Coffee Cup Render</h3>
									<p>Rendered in 3DS Max with 3 Free Photometric lights.</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" src="./application/assets/images/site_images/fanta_can_render.jpg" alt="fanta can" data-holder-rendered="true"/>
								<div class="carousel-caption d-none d-md-block">
									<h3>Fanta Can Render</h3>
									<p>Rendered in 3DS Max with 3 Free Photometric lights.</p>
								</div>
							</div>
							
						</div>
						<a class="carousel-control-prev" href="#theCarousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#theCarousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<?php for ($i = 0; $i < count($data['MainBrands']); $i++){ ?>
					<div class="col-sm-4">
						<div class="card">
							<?php echo "<a href=".$data['MainBrands'][$i]['imgSrc']." data-fancybox data-caption='".$data['MainBrands'][$i]['brand']."' class='thumbnail'> <img class='card-img-top img-fluid img-thumbnail' src=".$data['MainBrands'][$i]['imgSrc']." alt='".$data['MainBrands'][$i]['title']."'/> </a>" ?>
							<div class="card-body">
								<h2 class="drinksText" id="brandTitle-<?php echo $i?>"> <?php echo $data['MainBrands'][$i]['title']  ?>  </h2>
								<h3 class="drinksText"> <?php echo $data['MainBrands'][$i]['subtitle']  ?> </h3>
								<p class="drinksText"> <?php echo $data['MainBrands'][$i]['description']  ?> </p>
								<a href="https://www.coca-cola.co.uk/brands" class="btn btn-primary">Find out more ...</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div><!-- End home -->
		<div id="about" class="container-fluid main_contents">
			<div class="row">
				<div class="col-sm-12">
				</div>
			</div>
		</div>
		<div id="further" class="container-fluid main_contents">
			<div class="col-sm-12">
				<h2>Statement of originality</h2>
				<h4>This work is my work. Has been developed solely by me except where other libraries or the teachings from the web3d module are used.</h4>
			
				<p>Use of "for ($i = 0; $i < count($data['MainBrands']); $i++){" to set up html and reduce redundant code significantly. Use of naming conventions (e.g. RotZ-TIMERCoke, RotZ-TIMERCosta, RotZ-TIMERFanta) to enable javascript like document.querySelectorAll('[id$=Model]'); to target all appropriate models or to implement functionality. 
				For example, for each model it is titled 'x3dModel' and a number, then the AJAX can get the number of models, and apply functions to all x3dInfo+number id's. This code will work regardless of the number of models returned by the database</p></br>
				<p>Use of multiple functions in controller to fetch all the data from different tables which is then passed to this view. There are more than 20 functions in the controller.</p></br>
				<p>Use of multiple tables in the model. Including tables linked by foreign key to other tables and composite primary keys.</p></br>
				<p>Extra use of fonts and design inspired by coca-cola. Minimalist design, should properly adjust to different screen sizes. Assumes phones need larger items as everything aligns into one column when it becomes that small</p> </br>
				<p>Coke model particularly detailed with regular dips in model. Lid has extra detail. Good use of specular and gloss to get 'glass-like' textures.</p> </br>
				<p>Attempted to use blender, as seen in <a href="https://github.com/Benjono/Web-3d-Coursework/tree/main/_3DModelling">_3DModelling</a>, successfully did a model but the model won't export properly to X3D. Additionally, files are approximately 10+ times larger, which would slow loading times and consume ram</p></br>
				<p>GITHUB link: <a href="https://github.com/Benjono/Web-3d-Coursework">https://github.com/Benjono/Web-3d-Coursework </a> </p></br>
				<p>Link to Models specifically including assets: <a href="https://github.com/Benjono/Web-3d-Coursework/tree/main/application/assets/x3d">https://github.com/Benjono/Web-3d-Coursework/tree/main/application/assets/x3d </a> </p>
			</div>
		</div>

		<div id="models" class="container-fluid main_contents" style="display:none;">
			<div class="row">
				<div class="col-sm-8">
					<div class="card text-left">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<?php for ($i = 0; $i < count($data['x3dInfo']); $i++){ ?> <!-- For each model -->
									<li class="nav-item"> <!-- Create Navigation element, id example: nav1. What to click example: 'fanta' -->
										<a class="nav-link" href="#" id="<?php echo "x3dnav".($i+1) ?>" value="<?php echo $i+1 ?>"><?php echo $data['x3dInfo'][$i]['x3dModelTitle']?></a>
									</li>
								<?php } ?>
							</ul>

						</div>
						<div class="card-body">
							<!-- For each model -->
							<?php for ($i=0; $i<count($data['x3dInfo']);$i++){ ?>
								<div id="<?php echo "x3dinfo".($i+1) ?>">
									<h2> <?php echo $data['x3dInfo'][$i]['x3dModelTitle'] ?> </h2>
									<div class="model3D"> <x3d id="<?php echo $data['x3dInfo'][$i]['x3dModelTitle']?>Model"> <scene>  <inline nameSpaceName="model" mapDEFToID="true" onclick="animateModel();" url="<?php echo $data['x3dInfo'][$i]['x3dMainURL'] ?>"> </inline> </scene > </x3d > </div>
									<p><?php echo $data['x3dInfo'][$i]['x3dCreationMethod'] ?></p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div id="3d-image-gallery">
						<div class="card">
							<div class="card-header gallery-header">
								<ul class="nav nav-tabs card-header-tabs">
									<li class="nav-item">
										<a class="nav-link" href="#">Gallery</a>
									</li>
								</ul>
							</div>
							<div class="card-body">
								<div class="card-title title_gallery drinksText"> </div>
								<div class="gallery" id="gallery"></div>
								<div class="card-text description_gallery drinksText"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="card">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Cameras</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#" onclick="cameraSwitch('Front');">Front</a>
										<a class="dropdown-item" href="#" onclick="cameraSwitch('Back');">Back</a>
										<a class="dropdown-item" href="#" onclick="cameraSwitch('Left');">Left</a>
										<a class="dropdown-item" href="#" onclick="cameraSwitch('Right');">Right</a>
										<a class="dropdown-item" href="#" onclick="cameraSwitch('Top');">Top</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="card-title x3dCamera_Subtitle drinksText">
								<h3>Camera Views</h3>
							</div>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="cameraSwitch('Front');" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Front"><i class="fas fa-undo fa-2x"></i></a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="cameraSwitch('Back');" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Back"><i class="fas fa-angle-down fa-2x"></i></a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="cameraSwitch('Left');" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Left"><i class="fas fa-angle-left fa-2x"></i></a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="cameraSwitch('Right');" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Right"><i class="fas fa-angle-right fa-2x"></i></a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="cameraSwitch('Top');" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Top"><i class="fas fa-angle-up fa-2x"></i></a>
							<div class="card-text x3dCameraDescription drinksText">
								<p>These buttons select a limited range of X3D model viewpoints, use the dropdown menu for more camera views</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item">
									<a class="nav-link" href="#">Animations</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="card-title x3dAnimations_Subtitle drinksText">
								<h3>Animation Options</h3>
							</div>
							<a href="#" class="btn btn-outline-dark btn-responsive btn-anim" onclick="spin('X');">X</a>
							<a href="#" class="btn btn-outline-dark btn-responsive btn-anim" onclick="spin('Y');">Z</a>
							<a href="#" class="btn btn-outline-dark btn-responsive btn-anim" onclick="spin('Z');">Y</a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="stopRot();"><i class="fas fa-ban fa-2x"></i></a>
							<div class="card-text x3dAnimationDescription drinksText">
								<p>These buttons select a range of X3D animation options</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card">
						<div class="card-header">
							<ul class="nav nav-tabs card-header-tabs">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Render</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#" onclick="polygon();">Polygon</a>
										<a class="dropdown-item" href="#" onclick="wireframe();">Wireframe</a>
										<a class="dropdown-item" href="#" onclick="points();">Vertex</a>
									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Lights</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="#" onclick="defaultSettings();">Default</a>
										<a class="dropdown-item" href="#" onclick="omnilight();">Omni On/Off</a>
										<a class="dropdown-item" href="#" onclick="targetlight();">Target On/Off</a>
										<a class="dropdown-item" href="#" onclick="headlight();">Headlight On/Off</a>
									</div>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="card-title x3dRender_Subtitle drinksText">
								<h3>Render and Lighting Options</h3>
							</div>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="polygon();">Poly</a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="wireframe();">Wire</a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="headlight();">Headlight</a>
							<a href="#" class="btn btn-outline-dark btn-responsive" onclick="defaultSettings();">Default</a>
							<div class="card-text x3dRenderDescription drinksText">
								<p>These buttons select a limited number of render and lighting options; use the dropdown menus for more options</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Descriptions -->
			<?php for ($i=0; $i<count($data['x3dInfo']);$i++){ ?>
				<div id="<?php echo "x3ddesc".($i+1) ?>" class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="card-title drinksText"> 
									<h2 class="drinksText"> <?php echo $data['x3dInfo'][$i]['modelTitle'] ?> </h2>
								</div>
								<div class="card-title drinksText"> 
									<h3 class="drinksText">  <?php echo $data['x3dInfo'][$i]['modelSubtitle'] ?> </h3>
								</div>
								<div class="card-title drinksText"> 
									<p class="drinksText"> <?php echo $data['x3dInfo'][$i]['modelDescription'] ?> </p>
								</div>
								<a href="http://www.coca-cola.co.uk/drinks/coca-cola/coca-cola" class="btn btn-primary">Find out more ...</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<!-- Footer -->
	<nav id="footer" class="navbar navbar-expand-sm footer mt-auto py-3">
		<div class="container-fluid">
			<div class="navbar-text float-left copyright">
				<p>
					<span class="align-baseline"></span>
					&copy 2019 Mobile Web 3D applications |
					<a href="javascript:changelook()">Change Look</a> |
					<a href="javascript:changeBack()">Reset Look</a>
				</p>
			</div>
			<div class="navbar-text float-left">

			</div>
			<div class="navbar-text float-right social">
				<a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
				<a href="#"><i class="fab fa-twitter fa-2x"></i></a>
				<a href="#"><i class="fab fa-google-plus fa-2x"></i></a>
				<a href="#"><i class="fab fa-github-square fa-2x"></i></a>
			</div>
		</div>
	</nav>
	<div class="modal fade" id="contactModal">

	</div>


	<!-- My 3D App modals -->
	<!-- Contact Modal -->
	<!-- The Modal -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="./application/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/2d506ca9cf.js" crossorigin="anonymous"></script>
	<script src="./application/js/custom.js"></script>
	<!-- X3dom -->
	<script type='text/javascript' src='./application/js/x3dom.js'></script>
	<script type='text/javascript' src="./application/js/gallery_generator.js"></script>
	<!-- This script gets data from a json file, circumvents MVC model -->
	<script type="text/javascript" src="./application/js/jquery.fancybox.min.js"></script>
	<script type="text/javascript" src="./application/js/modelInteraction.js"></script>
</body>
</html>