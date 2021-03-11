(function(){
	var d = document.documentElement.classList;
	if (!(d.contains("avif-on") || d.contains("avif-off"))){
		var avif = "data:image/avif;base64,AAAAFGZ0eXBhdmlmAAAAAG1pZjEAAACgbWV0YQAAAAAAAAAOcGl0bQAAAAAAAQAAAB5pbG9jAAAAAEQAAAEAAQAAAAEAAAC8AAAAGwAAACNpaW5mAAAAAAABAAAAFWluZmUCAAAAAAEAAGF2MDEAAAAARWlwcnAAAAAoaXBjbwAAABRpc3BlAAAAAAAAAAQAAAAEAAAADGF2MUOBAAAAAAAAFWlwbWEAAAAAAAAAAQABAgECAAAAI21kYXQSAAoIP8R8hAQ0BUAyDWeeUy0JG+QAACANEkA=";
		var img = new Image();
		img.onload = function(){d.add("avif-on")};
		img.onerror = function(){d.add("avif-off")};
		img.src = avif;
	}
})();