let map;

function MapInit() {
    if (this.status == 200 && this.responseText != null) {
		let get_map = this.responseText;
		let countries_list = JSON.parse(get_map);
	
		let i = 0;
	
		while (countries_list[i]) {
	
			let geo = DG.geoJson(JSON.parse(countries_list[i].geojson), {
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

window.onload = function() {

	DG.then(function() {
		map = DG.map('map', {
			center: [49.24, 17.94],
			zoom: 5,
			projectDetector: false,
			poi: false
		});
		
		let get_map = new XMLHttpRequest();
		get_map.onload = MapInit;
		get_map.open("GET", "../map.json");
		get_map.send();
	});

}