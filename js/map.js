let map;
let countries_list;

function MapInit() {
		if (this.status == 200 && this.responseText != null) {
				let get_map = this.responseText;

				countries_list = JSON.parse(get_map);

				let i = 0;

				while (i < countries_list.length) {
						let countryId = countries_list[i].id;
						let countryColor = countries_list[i].color;
						
						fetch(`../geo/${countryId}.geojson`)
								.then(response => {
										if (response.ok) {
												return response.json();
										} else {
												throw new Error("Error: " + response.status);
										}
								})
								.then(data => {
										L.geoJSON(data, {
												style: function () {
														return { color: countryColor };
												}
										}).bindPopup(function (layer) {
												return layer.feature.properties.name;
										}).addTo(map);
								})
								.catch(error => {
										console.error("Error:", error);
								});

						i++;
				}
		}
}

window.onload = function () {
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