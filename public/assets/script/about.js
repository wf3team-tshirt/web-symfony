






$(document).ready(function(e) {


// $(".span").hide();
$(".lire").prev().hide();


$(".lire").click(function(e) {


    if($ (this).prev().is(":hidden")) {
            $(this).text("Moins")
    } 
    else{
            $(this).text("Lire la suite")
    }

    $(this).prev().toggle("slow");
     
    });



});