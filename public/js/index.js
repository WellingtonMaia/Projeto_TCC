$( document ).ready(function() {    	

	function getRandomInt(min, max) {
	  min = Math.ceil(min);
	  max = Math.floor(max);
	  return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
	}

	var n = getRandomInt(1,4);
	$(".aside::before").css("background","url('../img/sidebar-"+n+".jpg')");
	// $(".aside").css("background","#000");
});