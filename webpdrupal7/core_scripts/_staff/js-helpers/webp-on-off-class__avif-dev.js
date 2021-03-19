(function(){
	var d = document.documentElement.classList;
	var sto = window.localStorage;
	var sup;
	if (!(d.contains("avif-on") || d.contains("avif-off"))){
		sup = sto.getItem('avifsupp');
		if (sup == '1'){
			d.add("avif-on");
		} else if (sup == '0'){
			d.add("avif-off");
		} else {
			var avif = "data:image/avif;base64,AAAAFGZ0eXBhdmlmAAAAAG1pZjEAAACgbWV0YQAAAAAAAAAOcGl0bQAAAAAAAQAAAB5pbG9jAAAAAEQAAAEAAQAAAAEAAAC8AAAAGwAAACNpaW5mAAAAAAABAAAAFWluZmUCAAAAAAEAAGF2MDEAAAAARWlwcnAAAAAoaXBjbwAAABRpc3BlAAAAAAAAAAQAAAAEAAAADGF2MUOBAAAAAAAAFWlwbWEAAAAAAAAAAQABAgECAAAAI21kYXQSAAoIP8R8hAQ0BUAyDWeeUy0JG+QAACANEkA=";
			var img = new Image();
			img.onload = function(){d.add("avif-on");sto.setItem('avifsupp', '1')};
			img.onerror = function(){d.add("avif-off");sto.setItem('avifsupp', '0')};
			img.src = avif;
		}
	}

	if (!(d.contains("webp-on") || d.contains("webp-off"))){
		sup = sto.getItem('webpsupp');
		if (sup == '1'){
			d.add("webp-on");
		} else if (sup == '0'){
			d.add("webp-off");
		} else {
			var webp = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
			var img = new Image();
			img.onload = function(){d.add("webp-on");sto.setItem('webpsupp', '1')};
			img.onerror = function(){d.add("webp-off");sto.setItem('webpsupp', '0')};
			img.src = webp;
		}
	}
})();

/* universal - some slowly
(function(){
	// AVIF supporting
	var d = document.documentElement.classList;
	function testImg(type){
		var sto = window.localStorage;
		var sup = sto.getItem(type+'supp');
		// localStorage
		if (sup == '1'){
			d.add(type+'-on');
		} else if (sup == '0'){
			d.add(type+'-off');
		} else {
			var avif = "data:image/avif;base64,AAAAFGZ0eXBhdmlmAAAAAG1pZjEAAACgbWV0YQAAAAAAAAAOcGl0bQAAAAAAAQAAAB5pbG9jAAAAAEQAAAEAAQAAAAEAAAC8AAAAGwAAACNpaW5mAAAAAAABAAAAFWluZmUCAAAAAAEAAGF2MDEAAAAARWlwcnAAAAAoaXBjbwAAABRpc3BlAAAAAAAAAAQAAAAEAAAADGF2MUOBAAAAAAAAFWlwbWEAAAAAAAAAAQABAgECAAAAI21kYXQSAAoIP8R8hAQ0BUAyDWeeUy0JG+QAACANEkA=";
			var webp = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
			var img = new Image();
			img.onload = function(){d.add(type+'-on');sto.setItem(type+'supp','1')};
			img.onerror = function(){d.add(type+'-off');sto.setItem(type+'supp','0')};
			if (type == "avif"){
				img.src = avif;
			} else {
				img.src = webp;
			}
		}
	}
	if (!(d.contains("avif-on") || d.contains("avif-off"))){
		testImg("avif");
	}
	if (!(d.contains("webp-on") || d.contains("webp-off"))){
		testImg("webp");
	}
})();
*/

/* without prechecking, and no-cache
(function(){
	function addClass(classname){ document.documentElement.classList.add(classname) }
	// avif
	var avif = new Image();
	avif.onload = function(){addClass('avif-on')};
	avif.onerror = function(){addClass('avif-off')};
	avif.src = "data:image/avif;base64,AAAAFGZ0eXBhdmlmAAAAAG1pZjEAAACgbWV0YQAAAAAAAAAOcGl0bQAAAAAAAQAAAB5pbG9jAAAAAEQAAAEAAQAAAAEAAAC8AAAAGwAAACNpaW5mAAAAAAABAAAAFWluZmUCAAAAAAEAAGF2MDEAAAAARWlwcnAAAAAoaXBjbwAAABRpc3BlAAAAAAAAAAQAAAAEAAAADGF2MUOBAAAAAAAAFWlwbWEAAAAAAAAAAQABAgECAAAAI21kYXQSAAoIP8R8hAQ0BUAyDWeeUy0JG+QAACANEkA=";

	// webp
	var webp = new Image();
	webp.onload = function(){addClass('webp-on')};
	webp.onerror = function(){addClass('webp-off')};
	webp.src = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
})();
*/