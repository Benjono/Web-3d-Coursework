// JavaScript source code


$(document).ready(function () {
    //Create XMLHttpRequest for communication
    var xmlHttp = new XMLHttpRequest();
    // Stores newly generated gallery code
    var htmlCode = "";
    // Temporarily stores server response while code generated
    var response;
    //path
    var send = "./application/php/hook.php";
    //open connection
    xmlHttp.open("GET", send, true);
    //tell server we have no outgoing messgae
    xmlHttp.send(null);
    // check for valid response
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            //alert(xmlHttp.responseText);
            response = xmlHttp.responseText.split("~");
            //loop on the response array
            for (var i = 0; i < response.length; i++) {
                // Handler to build the HTML string
                //use this to provide the image
                htmlCode += '<a href="./application/assets/images/gallery_images' + response[i] + '" data-fancybox data-caption="'+response[i]+'">';
                htmlCode += '<img class="card-img-top img-thumbnail"  src="./application/assets/images/gallery_images' + response[i] + '"\>';
                htmlCode += '</a>';
            }
            document.getElementById('gallery').innerHTML = htmlCode;
            //document.getElementById('gallery_sprite').innerHTML = htmlCode;
            //document.getElementById('gallery_pepper').innerHTML = htmlCode;

        }
    }
});