// JavaScript source code
var currentModels = null;
$(document).ready(function () {
	$('[data-toggle="popover"]').popover();
	selectPage();
	selectModel();
	
	//none of this is doing a thing!



	function selectPage() {
		currentModels = document.querySelectorAll('[id^=x3dnav]');
		console.log(currentModels.length);
		$('#home').show();
		$('#about').hide();
		$('#models').hide();
		$('#further').hide();
		$('#interaction').hide();
		$('#cokeDescription').hide();
		$('#spriteDescription').hide();
		$('#pepperDescription').hide();

		$('#navHome').click(function () {
			$('#home').show();
			$('#about').hide();
			$('#models').hide();
			$('#further').hide();
			$('#interaction').hide();
			$('#cokeDescription').hide();
			$('#spriteDescription').hide();
			$('#pepperDescription').hide();
		});

		$('#navAbout').click(function () {
			$('#home').hide();
			$('#about').show();
			$('#models').hide();
			$('#further').hide();
			$('#interaction').hide();
			$('#cokeDescription').hide();
			$('#spriteDescription').hide();
			$('#pepperDescription').hide();
		});

		$('#navModels').click(function () {
			$('#home').hide();
			$('#about').hide();
			$('#models').show();
			$('#further').hide();
			$('#interaction').show();
			$('#cokeDescription').show();
			$('#spriteDescription').hide();
			$('#pepperDescription').hide();
		});
		$('#navFurther').click(function () {
			$('#home').hide();
			$('#about').hide();
			$('#models').hide();
			$('#further').show();
			$('#interaction').hide();
			$('#cokeDescription').hide();
			$('#spriteDescription').hide();
			$('#pepperDescription').hide();
		});
	}
	function selectModel() {
		// $('#x3dnav' + i); is the one to apply it to
		// $('#x3dinfo' + i) is what to show/hide
		// For each model
		for (i = 0; i < currentModels.length; i++) {
			$('#x3dinfo' + (i + 1)).hide(); //hide it's info
			$('#x3ddesc' + (i + 1)).hide();
			$('#x3dnav' + (i + 1)).click(function () { //apply a function to it's info
				for (z = 0; z < currentModels.length; z++) {
					$('#x3dinfo' + (z + 1)).hide(); //the function hides the info
					$('#x3ddesc' + (z + 1)).hide();
				}
				$('#x3dinfo' + ($(this).attr('value'))).show(); //and then shows the one clicked
				$('#x3ddesc' + ($(this).attr('value'))).show(); //the description for the one clicked
				$('#interaction').show(); //and the interaction
			});
		}
		$('#x3dinfo1').show(); //then show the first model
		$('#x3ddesc1').show(); // show the first description
		$('#interaction').show(); //show interaction
	}
});



var counter = 0;

function changelook() {
    counter += 1;
    switch (counter) {
        case 1:
            document.getElementById('body').style.backgroundColor = 'lightblue';
            document.getElementById('header').style.backgroundColor = '#FF0000';
            document.getElementById('footer').style.backgroundColor = '#FF9900';
            break;
        case 2:
            document.getElementById('body').style.backgroundColor = '#FF6600';
            document.getElementById('header').style.backgroundColor = '#FF9999';
            document.getElementById('footer').style.backgroundColor = '#996699';
            break;
        case 3:
            document.getElementById('body').style.backgroundColor = 'coral';
            document.getElementById('header').style.backgroundColor = 'darkcyan';
            document.getElementById('footer').style.backgroundColor = 'darksalmon';
			break;
		case 4:
			document.getElementById('body').style.backgroundColor = '#FFFFFF';
			document.getElementById('header').style.backgroundColor = 'rgba(175,0,0,1)';
			document.getElementById('footer').style.backgroundColor = 'rgba(175,0,0,1)';
			break;
        case 5:
            counter = 0;
            document.getElementById('body').style.backgroundColor = 'lightgrey';
            document.getElementById('header').style.backgroundColor = 'chocolate';
            document.getElementById('footer').style.backgroundColor = 'dimgrey';
            break;
    }
}
function changeBack() {
    document.getElementById('body').style.backgroundColor = '#FFFFFF';
    document.getElementById('header').style.backgroundColor = 'rgba(0,0,0,1)';
    document.getElementById('footer').style.backgroundColor = 'rgba(0,0,0,1)';
}