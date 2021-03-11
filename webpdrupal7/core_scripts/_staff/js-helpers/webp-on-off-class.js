(function(){
	var d = document.documentElement.classList;
	if (!(d.contains("webp-on") || d.contains("webp-off"))){
		var webp = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
		var img = new Image();
		img.onload = function(){d.add("webp-on")};
		img.onerror = function(){d.add("webp-off")};
		img.src = webp;
	}
})();