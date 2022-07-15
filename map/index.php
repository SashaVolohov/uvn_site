<?php
	require_once("../db_connect.php");
	require_once("../utils.php");
	
	$utils = new Utils($connection);
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width"/>
		<title>ОВН - Карта</title>
		<link rel="shortcun icon" href="/favicon.ico"/>
		<link rel="stylesheet" href="/css/index.css"/>
		<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
		<script src="/js/mobile_pages.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="header_main_link">
				<a href="/"><img src="/images/logo.png" alt="Виртуальные государства"/></a>
			</div>
			<div class="header_links_div">
				<ul class="header_links">
					<?php
						$utils->ShowPages();
					?>
				</ul>
			</div>
			<div id="mobile_links"></div>
		</div>
		<div class="content">
			<div class="map" id="map"></div>
			<div id="mobile_links_block">
				<ul class="mobile_links_ul">
					<?php
						$utils->ShowPages();
					?>
				</ul>
			</div>
			<div id="mobile_links_block_shadow"></div>
		</div>
		<script src="../js/map.js"></script>
		<script src="../js/mobile_pages.js"></script>
	</body>
</html>