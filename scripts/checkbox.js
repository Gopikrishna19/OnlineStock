$.fn.convertCB2Switch = function(options) {
	var sopts = $.extend({}, $.fn.convertCB2Switch.defaults, options);
	var switchCSS = {
		"height": "9px",
		"width": "9px",
		"border-radius": "10px",
		"margin-top": "-5px",
		"border": "5px ridge #666",
		"box-shadow": "0px 0px 2px 0px #000" 
	}
	var switchBoxCSS = {
		"background-color": "#AAA", 
		"border-radius": "10px", 
		"height": "10px", 
		"width": "30px", 
		"box-shadow": "inset #333 0px 0px 10px 0px", 
		"border": "1px solid #2f2f2f"
	}
	$(this).wrap("<div class='switch-box' />");
	$(".switch-box").click(function(e) {
		$("#switch", this).hasClass("on")?switchOff(this):switchOn(this);
	});
	switchConstruct = function() {
		$(".switch-box").prepend("<div id='switch'></div>");
		$(".switch-box #switch").css(switchCSS);
		$(".switch-box").css(switchBoxCSS);
		$(".switch-box input[type=checkbox]").css("display","none");
		$(".switch-box input[type=checkbox]").is(":checked")?
			$(".switch-box #switch").addClass("off"):
			$(".switch-box #switch").addClass("on");
	}
	switchOff = function (e) {
		$("#switch",e).css("margin-left","12px").css("background-color",sopts.offColor);
		$("#switch",e).addClass("off").removeClass("on");
		$("input[type=checkbox]",e).removeAttr("checked");
	}
	switchOn = function (e) {
		$("#switch",e).css("margin-left","-1px").css("background-color",sopts.onColor);
		$("#switch",e).addClass("on").removeClass("off");
		$("input[type=checkbox]",e).attr("checked","checked");
	}
	switchConstruct();
	$(".switch-box").click();
};
$.fn.convertCB2Switch.defaults = {
	"offColor":"#C00",
	"onColor":"#0C0"
}