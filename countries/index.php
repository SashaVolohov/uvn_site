<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Виртуальные государства - список стран</title>
		<meta charset="UTF-8"/>
		<link rel="shortcun icon" href="../images/icon.ico"/>
		<link rel="stylesheet" href="../css/index.css"/>
		<meta name="viewport" content="width=device-width"/>
	</head>
	<body>
		<div class="header">
			<div class="header_main_link">
				<a href="../"><img src="../images/logo.png" alt="Виртуальные государства"/></a>
			</div>
			<div class="header_links_div">
				<ul class="header_links">
					<li><a class="current_page" href="../map">Карта</a></li>
					<li><a class="li_page" href="">Государства ВГ</a></li>
					<li><a class="li_page" href="../tools">Инструменты моделирования</a></li>
				</ul>
			</div>
			<div class="mobile_links" onclick="OpenLinks()"></div>
		</div>
		<div class="content">
			<div class="countries_list">
				<?php
					require_once("../db_connect.php");
	
					$q = mysqli_query($connection, 'SELECT * FROM `countries`');
					$res = array();
					while ($r = mysqli_fetch_assoc($q)) {
						$res[] = $r;
					}

					$query = "SELECT count(*) FROM `countries`";
					$res_1 = mysqli_query($connection, $query);
					$row = mysqli_fetch_row($res_1);
					
					$i = 0;
					
					while($i < $row[0]) {
						$flag = $res[$i]['flag'];
						$name = $res[$i]['name'];
						$description = $res[$i]['description'];

						echo
						'<div class="countries_list_unit">
							<div class="clu_image">
								<img src="' . $flag . '" width="100" height="100" alt="' .$name . '"/>
							</div>
							<div class="clu_info">
								<div class="clu_info_name">' .$name . '</div>
								<p class="clu_info_description">' .$description . '</p>
							</div>
						</div>
						';

						$i++;
					}
				?>
			</div>
			<div class="mobile_links_block" id="mobile_links_block">
				<ul class="mobile_links_ul">
					<li><a class="current_page" href="../map">Карта</a></li>
					<li><a class="li_page" href="">Государства ВГ</a></li>
					<li><a class="li_page" href="../tools">Инструменты моделирования</a></li>
				</ul>
			</div>
			<div class="mobile_links_block_shadow" id="mobile_links_block_shadow" onclick="CloseLinks()"></div>
		</div>
		<a href="../news"><div class="more_button">Подробнее...</div></a>
		<script src="../js/mobile_pages.js"></script>
	</body>
</html>