
var div_box = "<div id='load-screen'><div id='loading'></div></div>";

$("body").prepend(div_box);

$("#load-screen").delay(0).fadeOut(700, function() {
	$(this).remove();


});

$(document).ready(function() {

	tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  font_formats: 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats; Solaiman Lipi=SolaimanLipi; Siyam Rupali=SiyamRupali',
	mobile: {
		theme: 'silver'
	},
	

});


	$("#selectAllBoxes").click(function(event) {

		if(this.checked) {

			$(".checkBoxes").each(function() {
				this.checked = true;
			});

		} else {

			$(".checkBoxes").each(function() {
				this.checked = false;
			});
		}

	});



});

function loadUsersOnline() {

	$.get("functions.php?onlineusers=result", function(data) {

		$(".usersonline").text(data);

	});

}

setInterval(function() {

	loadUsersOnline();

}, 3000);
