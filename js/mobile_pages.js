window.onload = function() {
	
	let mobile_links_button = document.getElementById("mobile_links");
	let mobile_links_block = document.getElementById("mobile_links_block");
	let mobile_links_block_shadow = document.getElementById("mobile_links_block_shadow");
	
	mobile_links_button.onclick = function() {
		mobile_links_block.style.display = "block";
		mobile_links_block_shadow.style.display = "block";
	};
	
	mobile_links_block_shadow.onclick = function() {
		mobile_links_block.style.display = "none";
		mobile_links_block_shadow.style.display = "none";
	};
	
};