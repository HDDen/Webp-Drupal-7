(function(){
	function testWebP(cbk) {
	    var w = new Image();
	    w.onload = function () {
	        cbk(true);
	    };
	    w.onerror = function () {
	        cbk(false);
	    };
	    w.src = 'data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==';
	};

	var t=document.getElementsByTagName("html")[0];
	if (!(t.classList.contains('webp-on')) && !(t.classList.contains('webp-off'))){
		testWebP(function(support) {
			support?t.classList.add("webp-on"):t.classList.add("webp-off");
		});
	}
})();