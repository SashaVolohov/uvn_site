<?php
	require_once("../db_connect.php");
	require_once("tools_api.php");
	
	$toolsAPI = new ToolsAPI();
	
	if(@$_GET['id']) {
		$model_id = $_GET['id'];

		$query = "SELECT * FROM `models` WHERE `id` = '$model_id'";
		$data = mysqli_query($connection, $query);
		if(mysqli_num_rows($data) == 1) {
			$row = mysqli_fetch_assoc($data);
		} else {
			echo "Неверный ID.";
			exit();
		}
		
		$code = $row['code'];
		
		?>
			<!DOCTYPE html>
			<html lang="ru">
				<head>
					<title>Виртуальные государства - моделирование</title>
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
								<li><a class="li_page" href="../countries">Государства ВГ</a></li>
								<li><a class="li_page" href="">Инструменты моделирования</a></li>
							</ul>
						</div>
						<div class="mobile_links" onclick="OpenLinks()"></div>
					</div>
					<div class="content">
						<div class="model_block">
							<div class="mb_name">Найти цену</div>
							<form name="tools_form" action="get_result.php">
								<input type="hidden" name="id" value="<?php echo $model_id;?>">
								<?php
									eval($code);
								?>
								<div class="mb_result">
									<span class="mbu_result">Результат: <span id="mr_s"></span></span>
								</div>
								<button class="mb_get_result" type="submit">Найти результат</button>
							</form>
						</div>
						<div class="mobile_links_block" id="mobile_links_block">
							<ul class="mobile_links_ul">
								<li><a class="current_page" href="../map">Карта</a></li>
								<li><a class="li_page" href="../countries">Государства ВГ</a></li>
								<li><a class="li_page" href="">Инструменты моделирования</a></li>
							</ul>
						</div>
						<div class="mobile_links_block_shadow" id="mobile_links_block_shadow" onclick="CloseLinks()"></div>
					</div>
					<a href="../news"><div class="more_button">Подробнее...</div></a>
					<script src="../js/mobile_pages.js"></script>
					<script src="../js/tools.js"></script>
                    </script>
				</body>
			</html>
		<?php
	} else {
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Виртуальные государства - моделирование</title>
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
					<li><a class="li_page" href="../countries">Государства ВГ</a></li>
					<li><a class="li_page" href="">Инструменты моделирования</a></li>
				</ul>
			</div>
			<div class="mobile_links" onclick="OpenLinks()"></div>
		</div>
		<div class="content">
			<div class="countries_list">
				<?php
	
					$q = mysqli_query($connection, 'SELECT * FROM `models`');
					$res = array();
					while ($r = mysqli_fetch_assoc($q)) {
						$res[] = $r;
					}

					$query = "SELECT count(*) FROM `models`";
					$res_1 = mysqli_query($connection, $query);
					$row = mysqli_fetch_row($res_1);
					
					$i = 0;
					
					while($i < $row[0]) {
						$name = $res[$i]['name'];
						$description = $res[$i]['description'];
						$id = $res[$i]['id'];

						echo
						'<div class="countries_list_unit">
							<div class="clu_info_models">
								<a href="?id=' . $id . '"><div class="clu_info_name">' .$name . '</div></a>
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
					<li><a class="li_page" href="../countries">Государства ВГ</a></li>
					<li><a class="li_page" href="">Инструменты моделирования</a></li>
				</ul>
			</div>
			<div class="mobile_links_block_shadow" id="mobile_links_block_shadow" onclick="CloseLinks()"></div>
		</div>
		<a href="../news"><div class="more_button">Подробнее...</div></a>
		<script src="../js/mobile_pages.js"></script>
	</body>
</html>

<?php
	}
?>