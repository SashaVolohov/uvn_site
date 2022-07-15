<?php
	require_once("db_connect.php");
	require_once("utils.php");
	
	$utils = new Utils($connection);
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
        <meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width"/>
		<title>ОВН</title>
		<link rel="shortcun icon" href="/favicon.ico"/>
		<link rel="stylesheet" href="/css/index.css"/>
		<script src="/js/mobile_pages.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="header_main_link">
				<a href="/"><img src="/images/logo.png" alt="ОВН"/></a>
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
			<div class="description_div">
				<h1 class="description_header">НАЧАЛО НОВОГО МИРА.</h1>
				<div class="description_text">
					Что такое ОВН?<br><br>

					ОВН - это ответ на то, во что превратился в ООВГ. Это площадка для дипломатии - а не место для бесконечных каждодневных войн. Это платформа для построения собственного виртуального государства, а не место для идиотизма.<br><br>В ОВН может вступить любое адекватное государство с адекватным правителем.
				</div>
			</div>
			<div class="mobile_links_block" id="mobile_links_block">
				<ul class="mobile_links_ul">
					<?php
						$utils->ShowPages();
					?>
				</ul>
			</div>
			<div id="mobile_links_block_shadow"></div>
		</div>
	</body>
</html>