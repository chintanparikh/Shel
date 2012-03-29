$(document).ready(function(){
	$('#logo')
		.mouseover(function(){
            var src = $(this).attr("src").match(/[^\.]+/) + "hover.png";
            $(this).attr("src", src);
		})
        .mouseout(function() {
            var src = $(this).attr("src").replace("hover", "");
            $(this).attr("src", src);
        });
});