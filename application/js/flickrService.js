$(document).ready(function () {
    loadImages();
});
function loadImages() {
    var txt = document.getElementById('txt').value;
    console.log(txt);
    var urlFlickr = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
    $.getJSON(urlFlickr, { tags: txt, tagmode: "all", format: "json" }, function (data) {
        console.log(data);
        // Build handler to grab the wanted data. I.e. images related to input value stored in txt
        $('#title').html(data.title);
        $('#link').html(data.link);
        $('#description').html(data.description);
        $('#modified').html(data.modified);
        $('#generator').html(data.gemerator);
        var htmlCode = "";
        //Examine console.log data to see the array returned
        $.each(data.items, function (i, item) {
            htmlCode += '<div class=imgBox>' + '<div><h3> Title: ' + item.title + '</h3></div>';
            htmlCode += '<img src="' + item.media.m + '"/>';
            htmlCode += '<div><h4> Published: ' + item.published + '</h4></div></div>';
            //Set loop variable, i.e. how many images to return, say first 4
            //Or comment out if *all* search images should be returned.
            if (i == 3) return false;
        });
        //Assign html code
        $('#images').html(htmlCode);
    });
}