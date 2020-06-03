!function(){function n(){
    function testWebP(cbk) {
	    var w = new Image();
	    w.onerror = function () {
	        cbk(false);
	    };
	    w.src = 'data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA';
	};

	function unwebp(){
		var imgs = document.querySelectorAll('img[src*=".webp"], img[srcset*=".webp"], img[data-src*=".webp"], img[data-srcset*=".webp"]');

		if (imgs.length > 0){
			var attribs = ['src', 'srcset', 'data-src', 'data-srcset'];

			for (var i = 0; i < imgs.length; i++){
				for (var k = 0; k < attribs.length; k++){

					if (imgs[i].hasAttribute(attribs[k])){
						var attr = imgs[i].getAttribute(attribs[k]);
						attr = attr.replace('.webp', '');
						imgs[i].setAttribute(attribs[k], attr);
					}

				}
			}
		}

		var bgs = document.querySelectorAll('*[style*=".webp"], *[data-bg*=".webp"]');
		if (bgs.length > 0){
			var attribs = ['style', 'data-bg'];
			for (var i = 0; i < bgs.length; i++){
				for (var k = 0; k < attribs.length; k++){

					if (bgs[i].hasAttribute(attribs[k])){
						var attr = bgs[i].getAttribute(attribs[k]);
						attr = attr.replace('.webp', '');
						bgs[i].setAttribute(attribs[k], attr);
					}

				}
			}
		}
	}

	testWebP(function(support) {
	    if (!support){
	    	unwebp();
	    }
	});
}"loading"!=document.readyState?n():document.addEventListener("DOMContentLoaded",function(){n()})}();