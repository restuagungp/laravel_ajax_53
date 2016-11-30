$(document).ready(function(){
    $(".image").on('change', function () {

        if (typeof (FileReader) != "undefined") {
 
            var image_holder = $(".preview");
            image_holder.empty();
 
            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                    "style": "float:left;padding:0;width:100%;position:relative;border:1px solid #eee;border-top:none"
                }).appendTo(image_holder);
 
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } else {
            alert("This browser does not support FileReader.");
        }
    });
})