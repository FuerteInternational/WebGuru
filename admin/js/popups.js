function confirmAction(message) {
	confirmation = window.confirm(message);
	if (confirmation) {
		return true;
	}
	else {
		return false;
	}
}


var viewport = {
	o: function() {
		if (self.innerHeight) {
			this.pageYOffset = self.pageYOffset;
			this.pageXOffset = self.pageXOffset;
			this.innerHeight = self.innerHeight;
			this.innerWidth = self.innerWidth;
		} else if (document.documentElement && document.documentElement.clientHeight) {
			this.pageYOffset = document.documentElement.scrollTop;
			this.pageXOffset = document.documentElement.scrollLeft;
			this.innerHeight = document.documentElement.clientHeight;
			this.innerWidth = document.documentElement.clientWidth;
		} else if (document.body) {
			this.pageYOffset = document.body.scrollTop;
			this.pageXOffset = document.body.scrollLeft;
			this.innerHeight = document.body.clientHeight;
			this.innerWidth = document.body.clientWidth;
		}
		return this;
	},
	init: function(el) {
		$(el).css("width", (viewport.o().innerWidth - 150));
		$(el).css("height", (viewport.o().innerHeight - 150));
		$(el).css("left", Math.round(viewport.o().innerWidth/2) + viewport.o().pageXOffset - Math.round($(el).width()/2));
		top = Math.round(viewport.o().innerHeight/2) + viewport.o().pageYOffset - Math.round($(el).height()/2);
		if (top > 50) top = 50;
		$(el).css("top", top);
	}
};

var wgPopups = {

	createSmall: function(url) {
		$(".window").remove();
		var strSimple = "<div class='window' style=''><div class='simple_popup_inner'>";
		strSimple += "<p class='simple_close'><span>[x]</span></p>";
		strSimple += '<div id="windowInner"></div>';
		strSimple += "</div></div>";
		$("body").append(strSimple);
		$('#windowInner').load(url);
		viewport.init('.window');
		$(".simple_close").click(function(){
		    $(".window").remove();
		    return false;
		});
		return false;
	}

};






$(document).ready(function(){
	
	$(".simple_popup_info").each(function(){
	    $(this).css("display","none").siblings(".simple_popup").click(function(){
	        $(".simple_popup_div").remove();
	        var strSimple = "<div class='simple_popup_div'><div class='simple_popup_inner'>";
	        strSimple += "<p class='simple_close'><span>[x]</span></p>";
	        strSimple += $(this).siblings(".simple_popup_info").html();
	        strSimple += "</div></div>";
	        $("body").append(strSimple);
	        viewport.init(".simple_popup_div");
	        $(".simple_close").click(function(){
	            $(".simple_popup_div").remove();
	            return false;
	        });
	        return false;
	    });
	});
});
