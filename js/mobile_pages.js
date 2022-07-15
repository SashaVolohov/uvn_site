window.onload = function() {
	
	var mb_button = document.getElementById("mobile_links");
	var links_element = document.getElementById("mobile_links_block");
	var links_shadow_element = document.getElementById("mobile_links_block_shadow");
	
	mb_button.onclick = function() {
		links_element.style.display = "block";
		links_shadow_element.style.display = "block";
	};
	
	links_shadow_element.onclick = function() {
		links_element.style.display = "none";
		links_shadow_element.style.display = "none";
	};
	
};