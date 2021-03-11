!function(){function n(){

	function unwebp(){
		// кастомные атрибуты просто удаляем, а src придётся модифицировать
		var imgAttrs = ['data-srcset', 'data-src', 'srcset', 'src']; 
		for (var i = 0; i < imgAttrs.length; i++){
			var imgs = document.querySelectorAll('img['+imgAttrs[i]+'*=".webp"]');
			if (imgs.length){
				for (var k = 0; k < imgs.length; k++){
					if (imgAttrs[i] == 'src'){
						var attr = imgs[k].getAttribute(imgAttrs[i]);
						attr = attr.replace('.webp', '');
						imgs[k].setAttribute(imgAttrs[i], attr);
					} else {
						//imgs[k].removeAttribute(imgAttrs[i]);
						imgs[k].setAttribute(imgAttrs[i], imgs[k].src);
					}
				}
			}
		}

		var bgAttrs = ['data-background-image', 'data-bg', 'style'];
		for (var i = 0; i < bgAttrs.length; i++){
			var els = document.querySelectorAll('*['+bgAttrs[i]+'*=".webp"]');
			if (els.length){
				for (var k = 0; k < els.length; k++){
					var attr = els[k].getAttribute(bgAttrs[i]);
					attr = attr.replace('.webp', '');
					els[k].setAttribute(bgAttrs[i], attr);
				}
			}
		}
	}

	var d = document.documentElement.classList;
	if (!(d.contains("webp-on"))){
		if(!d.contains("webp-off")){
			var webp = "data:image/webp;base64,UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==";
			var img = new Image();
			img.onload = function(){d.add("webp-on")};
			img.onerror = function(){d.add("webp-off"); unwebp()};
			img.src = webp;
		} else {
			unwebp();
		}
	}

}"loading"!=document.readyState?n():document.addEventListener("DOMContentLoaded",function(){n()})}();