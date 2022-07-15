var map;

function MapInit() {
    if (this.status == 200 && this.responseText != null) {
		var get_map = this.responseText;
		var countries_list = JSON.parse(get_map);
	
		var i = 0;
	
		while (countries_list[i]) {
	
			var geo = DG.geoJson(JSON.parse(countries_list[i].geojson), {
				style: function() {
					return {
						color: countries_list[i].color
					};
				}
			}).addTo(map);
			geo.bindPopup(countries_list[i].name);
			i++;
	
		}
	}
}

DG.then(function() {
	map = DG.map('map', {
		center: [49.24, 17.94],
		zoom: 5,
		projectDetector: false,
		poi: false
	});
	
	var get_map = new XMLHttpRequest();
	get_map.onload = MapInit;
	get_map.open("GET", "get_map.php");
	get_map.send();
});