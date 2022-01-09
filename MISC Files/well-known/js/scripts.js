


    var myVar = setInterval(myTimer, 1000);
function myTimer() {
	 var d = new Date();
	 var t = d.toLocaleTimeString();
	 $("#timeClock").html(t);
}

$(function() {
	 $('.js-conveyor-example').jConveyorTicker({
		 reverse_elm:     true
	 });
 });

 $('#carousel-1, #carousel-2').carousel();

 $('.item:first').addClass('active');
 $('.photoSlider:first').addClass('active');
 $('.videoSlider:first').addClass('active');


 $(document).ready(function () {

    //Disable part of page
    $(".newsContent").on("contextmenu",function(e){
        return false;
    });

    $('.newsContent').bind('cut copy paste', function (e) {
        e.preventDefault();
    });

    $(".newsContent").on("contextmenu",function(e){
        return false;
    });

});

$(window).scroll(function(){
    if($(document).scrollTop()>=$(document).height()/2)
        $("#spopup").show("slow");else $("#spopup").hide("slow");
});
function closeSPopup(){
    $('#spopup').hide('slow');
}


// $(window).scroll(function() {
//   if ($(window).scrollTop() + $(window).height() == $(document).height() && $("#myModal").attr("displayed") === "false") {
//     $('#myModal').modal('show');
//     $("#myModal").attr("displayed", "true");
//   }
// });
