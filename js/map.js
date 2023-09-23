let map;
let countries_list;

function MapInit() {
    if (this.status == 200 && this.responseText != null) {
		let get_map = this.responseText;

		countries_list = JSON.parse(get_map);
	
		let i = 0;
	
		while (countries_list[i]) {

			L.geoJSON(JSON.parse(fetch(`../geo/${countries_list[i].id}.geojson`)), {
				style: function () {
					return {color: countries_list[i].color};
				}
			}).bindPopup(function (layer) {

				return layer.feature.properties.name;
			}).addTo(map);

			i++;
	
		}
	}
}

window.onload = function() {

	map = L.map("map").setView([49.24, 17.94], 5);

	L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
		maxZoom: 19,
		attribution: "© OpenStreetMap"
	}).addTo(map);
		
	let get_map = new XMLHttpRequest();
	get_map.onload = MapInit;
	get_map.open("GET", "../map.json");
	get_map.send();

}