(function(){
	function testWebP(cbk) {
	    var w = new Image();
	    w.onload = function () {
	        cbk(true);
	    };
	    w.onerror = function () {
	        cbk(false);
	    };
	    w.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
	};

	var t=document.getElementsByTagName("html")[0];
	if (!(t.classList.contains('webp-on')) && !(t.classList.contains('webp-off'))){
		testWebP(function(support) {
			support?t.classList.add("webp-on"):t.classList.add("webp-off");
		});
	}
})();