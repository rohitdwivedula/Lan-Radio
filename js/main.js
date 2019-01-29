// Author Divyanshu Agrawal



$(".popup-close").on("click",function(){
	$(".popup").css("display","none");
});


$(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });

$(window).on('popstate', function(event) {
 if($(".popup").css("display")==="block"){
 	event.preventDefault();
 	$(".popup").css("display","none");
 }
});




 function qsearch(val){

    if(val.length>3){

        
    uri = "search.php?q="+val;
    ajaxify(uri,"search-results-list","false");
    }   
 }

 $('.nav-search').focus(function(event){
    $(".search-results").css("display","block");
    $(".custom-search-inner").focus();
 });
 $('.custom-search-inner').focus(function(event){
    $(".search-results").css("display","block");
 });


 $('.nav-search').focusout(function(event){
    $(".search-results").css("display","none");
    $('.custom-search-inner').val("");
 });


 $('.custom-search-inner').keyup(function(event){

    var val = $('.custom-search-inner').val();
    qsearch(val);
 });



 function updateBrowse(){
    var selected = $(".browse-sort").val();
    var partURI = "browse.php?sort=";
    if(selected === "Sort by Date ( Newest first )"){
       partURI+="1";
       ajaxify(partURI,"content-root");

    }else{
        partURI+="2";
        ajaxify(partURI,"content-root");
    }
 }

function processScroll(scroll){
    if(scroll==="up"){
        $(".custom-navbar").removeClass("scrolled");
    }else{
        $(".custom-navbar").addClass("scrolled");
    }
    organize();
}


(function () {
    var previousScroll = 0;

    $(window).scroll(function(){
       var currentScroll = $(this).scrollTop();
       if (currentScroll > previousScroll){
           processScroll("down");
       } else {
          processScroll("up");
       }
       previousScroll = currentScroll;
    });
}()); //run this anonymous function immediately