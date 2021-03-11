(function(){
	var d = document.documentElement.classList;
	if (!(d.contains("avif-on") || d.contains("avif-off"))){
		var avif = "data:image/avif;base64,AAAAFGZ0eXBhdmlmAAAAAG1pZjEAAACgbWV0YQAAAAAAAAAOcGl0bQAAAAAAAQAAAB5pbG9jAAAAAEQAAAEAAQAAAAEAAAC8AAAAGwAAACNpaW5mAAAAAAABAAAAFWluZmUCAAAAAAEAAGF2MDEAAAAARWlwcnAAAAAoaXBjbwAAABRpc3BlAAAAAAAAAAQAAAAEAAAADGF2MUOBAAAAAAAAFWlwbWEAAAAAAAAAAQABAgECAAAAI21kYXQSAAoIP8R8hAQ0BUAyDWeeUy0JG+QAACANEkA=";
		var img = new Image();
		img.onload = function(){d.add("avif-on")};
		img.onerror = function(){d.add("avif-off")};
		img.src = avif;
	}

	if (!(d.contains("webp-on") || d.contains("webp-off"))){
		var webp = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
		var img = new Image();
		img.onload = function(){d.add("webp-on")};
		img.onerror = function(){d.add("webp-off")};
		img.src = webp;
	}
})();

/* universal - some slowly
(function(){
	// AVIF supporting
	var d = document.documentElement.classList;
	function testImg(type){
		var avif = "data:image/avif;base64,AAAAFGZ0eXBhdmlmAAAAAG1pZjEAAACgbWV0YQAAAAAAAAAOcGl0bQAAAAAAAQAAAB5pbG9jAAAAAEQAAAEAAQAAAAEAAAC8AAAAGwAAACNpaW5mAAAAAAABAAAAFWluZmUCAAAAAAEAAGF2MDEAAAAARWlwcnAAAAAoaXBjbwAAABRpc3BlAAAAAAAAAAQAAAAEAAAADGF2MUOBAAAAAAAAFWlwbWEAAAAAAAAAAQABAgECAAAAI21kYXQSAAoIP8R8hAQ0BUAyDWeeUy0JG+QAACANEkA=";
		var webp = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
		var img = new Image();
		img.onload = function(){d.add(type+'-on')};
		img.onerror = function(){d.add(type+'-off')};
		if (type == "avif"){
			img.src = avif;
		} else {
			img.src = webp;
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

/* without prechecking
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