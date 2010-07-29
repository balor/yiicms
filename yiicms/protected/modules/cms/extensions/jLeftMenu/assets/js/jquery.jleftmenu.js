function jLeftMenu(containerId)
{
    if (!containerId)
        containerId = "#root";
	$(containerId + " ul").each(function() {$(this).css("display", "none");});
	$(containerId + " .category").click(function() {
		var childid = "#" + $(this).attr("childid");
		if ($(childid).css("display") == "none") {
            $(childid).slideDown(100);
		    //$(childid).css("display", "block");
		}
		else {
            $(childid).slideUp(100);
		    //$(childid).css("display", "none");
	    }
		if ($(this).hasClass("cat_close")) {
		    $(this).removeClass("cat_close").addClass("cat_open");
	    }
		else {
		    $(this).removeClass("cat_open").addClass("cat_close");
	    }
	});
}
